<!-- Modal Delete -->
<div class="modal fade" id="delete{{$transaksi->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$transaksi->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-end" id="deleteModalLabel{{$transaksi->id}}">Hapus transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Form konfirmasi hapus data transaksi -->
                <form id="deleteForm" action="{{ route('admin.hapus-transaksi', ['id' => $transaksi->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- Form field for delete -->
                    <input type="hidden" name="delete_id" id="delete_id">

                    <p>Anda yakin ingin menghapus data user transaksi ini?</p>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
