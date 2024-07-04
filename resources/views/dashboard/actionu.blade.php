<!-- Modal Edit -->
<div class="modal fade" id="edit{{$users->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$users->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$users->id}}">Edit users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form edit data users -->
                <form action="{{ route('admin.update-users', ['id' => $users->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama users</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email users</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $users->alamat }}">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value="{{ $users->nomor_telp }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="laki_laki_edit{{$users->id}}" name="jenis_kelamin" value="Laki-laki" {{ $users->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="laki_laki_edit{{$users->id}}">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="perempuan_edit{{$users->id}}" name="jenis_kelamin" value="Perempuan" {{ $users->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan_edit{{$users->id}}">Perempuan</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="delete{{$users->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$users->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{$users->id}}">Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Anda yakin ingin menghapus data user ini?</p>
                <form id="deleteForm" action="{{ route('admin.hapus-users', ['id' => $users->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>