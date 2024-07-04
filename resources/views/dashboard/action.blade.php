<!-- Modal Edit -->
<div class="modal fade" id="edit{{$wisata->idwisata}}" tabindex="-1" aria-labelledby="editModalLabel{{$wisata->idwisata}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-start" id="editModalLabel{{$wisata->idwisata}}">Edit Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form edit data wisata -->
                <form action="{{ route('admin.update-wisata', ['id' => $wisata->idwisata]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="destinasi">Destinasi</label>
                        <select class="form-control" id="destinasi" name="destinasi">
                            <option value="Dieng">Dieng</option>
                            <option value="Bromo">Bromo</option>
                            <option value="Batu">Batu</option>
                            <option value="Jogja">Jogja</option>
                            <option value="Karimun Jawa">Karimun Jawa</option>
                            <option value="Bali">Bali</option>
                        </select>
                        </select>
                    </div>
                    <div class="form-group text-start">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="{{ $wisata->nama_wisata }}">
                    </div>
                    <div class="form-group text-start">
                        <label for="alamat_wisata">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $wisata->harga }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete{{$wisata->idwisata}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$wisata->idwisata}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-end" id="deleteModalLabel{{$wisata->idwisata}}">Hapus Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Form konfirmasi hapus data wisata -->
                <form id="deleteForm" action="{{ route('admin.hapus-wisata', ['id' => $wisata->idwisata]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- Form field for delete -->
                    <input type="hidden" name="delete_id" id="delete_id">

                    <p>Anda yakin ingin menghapus data wisata ini?</p>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>