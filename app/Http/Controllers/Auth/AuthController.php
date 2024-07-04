<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Wisata;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('users.register');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = $this->create($request->all());

            // Autentikasi user setelah registrasi
            Auth::login($user);

            return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan login.');
        } catch (\Exception $e) {
            // Tangani kesalahan yang terjadi saat proses registrasi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan registrasi. Silahkan coba lagi.');
        }
    }

    // Validasi data registrasi
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor_telp' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'string'],
        ]);
    }

    // Membuat user baru
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],
            'nomor_telp' => $data['nomor_telp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'role' => 'user', // Atur peran sebagai 'user' saat registrasi
        ]);
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('users.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            if (Auth::user()->role === 'user') {
                // Tambahkan logika untuk menentukan di mana pengguna harus diarahkan setelah login
                return redirect()->intended(route('home'))->with('success', 'Login berhasil.');
            } else if (Auth::user()->role === 'admin'|| Auth::user()->role === 'sadmin') {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login berhasil.');
            }
        }

        // Jika autentikasi gagal
        return redirect()->back()->with('error', 'Login gagal, periksa email dan password.');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }

    // Halaman utama setelah login
    public function home()
    {
        $wisataData = Wisata::all();
        // Mengirim data ke view 'frontend.booking'
        return view('frontend.home', compact('wisataData'));
    }

    // Menampilkan form untuk mengubah password
    public function showChangePasswordForm()
    {
        return view('frontend.change-password');
    }

    // Mengubah password
    // Mengubah password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'different:current_password'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);

        // Mendapatkan instance User yang benar
        $user = User::find(Auth::id());

        // Memeriksa apakah password saat ini sesuai
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }

        // Mengubah password user
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Logout pengguna setelah mengubah password
        Auth::logout();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login', ['forceRedirect' => true])->with('success', 'Password berhasil diubah. Silahkan login kembali.');
    }
    public function adminShowChangePasswordForm()
    {
        return view('dashboard.change-password');
    }
    public function adminChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'different:current_password'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);

        // Mendapatkan instance User yang benar
        $admin = User::find(Auth::id());

        // Memeriksa apakah password saat ini sesuai
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }

        // Mengubah password admin
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        // Logout admin setelah mengubah password
        Auth::logout();

        // Redirect ke halaman login admin dengan pesan sukses
        return redirect()->route('login')->with('success', 'Password admin berhasil diubah. Silahkan login kembali.');
    }
    
}
