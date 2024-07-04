<!-- Modal Edit -->
<div class="modal fade" id="edit{{$pelanggan->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$pelanggan->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start" id="editModalLabel{{$pelanggan->id}}">Edit Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form edit data  Pelanggan -->
                <!-- Form edit data Pelanggan -->
                <form action="{{ route('admin.update-pelanggan', ['id' => $pelanggan->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group text-start">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $pelanggan->name }}">
                    </div>
                    <div class="form-group text-start">
                        <label for="email">Email Pelanggan</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" readonly>
                    </div>
                    <div class="form-group text-start">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}">
                    </div>
                    <div class="form-group text-start">
                        <label for="nomor_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value="{{ $pelanggan->nomor_telp }}">
                    </div>
                    <div class="form-group text-start">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $pelanggan->username }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="laki_laki_edit{{$pelanggan->id}}" name="jenis_kelamin" value="Laki-laki" {{ $pelanggan->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="laki_laki_edit{{$pelanggan->id}}">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="perempuan_edit{{$pelanggan->id}}" name="jenis_kelamin" value="Perempuan" {{ $pelanggan->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan_edit{{$pelanggan->id}}">Perempuan</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete{{$pelanggan->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$pelanggan->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-end" id="deleteModalLabel{{$pelanggan->id}}">Hapus Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Form konfirmasi hapus data pelanggan -->
                <form id="deleteForm" action="{{ route('admin.hapus-pelanggan', ['id' => $pelanggan->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- Form field for delete -->
                    <input type="hidden" name="delete_id" id="delete_id">

                    <p>Anda yakin ingin menghapus data user pelanggan ini?</p>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
