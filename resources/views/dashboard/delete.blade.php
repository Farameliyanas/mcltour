<div class="modal fade"  id="delete{{$wisata->idwisata}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$wisata->idwisata}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-end" id="deleteModalLabel{{$wisata->idwisata}}">Hapus Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-end">
                <!-- Form konfirmasi hapus data wisata -->
                <p>Anda yakin ingin menghapus wisata ini?</p>
                <form action="{{ route('hapus-wisata', ['id' => $wisata->idwisata]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>