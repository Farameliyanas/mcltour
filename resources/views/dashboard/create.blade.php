<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body" style="background-color: white;">
                <!-- Form untuk menambah data -->
                <form id="tambahWisataForm" action="{{ route('admin.store-wisata') }}" method="POST">
                    @csrf
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
                    </div>
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" min="0" step="0.01">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>