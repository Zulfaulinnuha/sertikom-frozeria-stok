@extends('layouts.app')

@section('content')
<div class="container-fluid"> <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-3 px-3">
                <i class="bi bi-chevron-left"></i> Kembali
            </a>
            <h4 class="fw-bold mb-0">Detail Barang</h4>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-outline-primary px-4">
                <i class="bi bi-pencil-square me-2"></i>Edit Barang
            </a>
            <button type="button" class="btn btn-outline-danger px-4" onclick="confirmDelete('{{ $item->id }}', '{{ $item->name }}')">
                <i class="bi bi-trash me-2"></i>Hapus
            </button>
        </div>
    </div>

    <div class="card shadow-sm border rounded-0">
        <div class="card-body p-4 p-md-5"> <div class="row align-items-start mb-5">
                <div class="col-md-auto mb-3 mb-md-0">
                    <div class="border bg-light rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 200px; height: 200px;">
                        @if($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        @else
                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                        @endif
                    </div>
                </div>

                <div class="col-md ps-md-5">
                    <h1 class="fw-bold text-dark mb-2" style="font-size: 2.5rem;">{{ $item->name }}</h1>
                    <span class="badge bg-light text-dark border px-4 py-2 rounded-0 fs-6">
                        <i class="bi bi-tag me-2"></i>{{ $item->category->name }}
                    </span>
                </div>
            </div>

            <div class="row g-0 border">
                <div class="col-md-6 border-end border-bottom p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Jumlah stok</small>
                    <span class="fw-bold fs-4 text-dark">{{ $item->stock }} {{ $item->unit }}</span>
                </div>
                <div class="col-md-6 border-bottom p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Stok minimum</small>
                    <span class="fw-bold fs-4 text-dark">{{ $item->stock_min }} {{ $item->unit }}</span>
                </div>
                
                <div class="col-md-6 border-end border-bottom p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Harga jual</small>
                    <span class="fw-bold fs-4 text-success">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                </div>
                <div class="col-md-6 border-bottom p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Harga beli</small>
                    <span class="fw-bold fs-4 text-secondary">Rp {{ number_format($item->price_buy, 0, ',', '.') }}</span>
                </div>

                <div class="col-md-6 border-end p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Berat / ukuran</small>
                    <span class="fw-bold fs-4 text-dark">{{ $item->weight ?? '-' }}</span>
                </div>
                <div class="col-md-6 p-4">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Lokasi simpan</small>
                    <span class="fw-bold fs-4 text-dark">{{ $item->location ?? '-' }}</span>
                </div>

                <div class="col-12 border-top p-4 bg-light bg-opacity-25">
                    <small class="text-muted d-block text-uppercase fw-bold mb-2" style="font-size: 0.75rem;">Deskripsi</small>
                    <p class="mb-0 fs-5 text-secondary" style="line-height: 1.6;">{{ $item->description ?? 'Tidak ada deskripsi tersedia untuk produk ini.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content shadow border-0 text-center p-4">
            <div class="text-danger mb-3">
                <i class="bi bi-exclamation-triangle" style="font-size: 3rem;"></i>
            </div>
            <h5 class="fw-bold">Hapus barang?</h5>
            <p class="text-muted small">Data <span id="itemNameSpan" class="fw-bold text-dark"></span> akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            <div class="d-flex justify-content-center gap-2 mt-4">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                <form id="deleteActionForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 text-white">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('itemNameSpan').innerText = name;
        const form = document.getElementById('deleteActionForm');
        form.action = '/item/delete/' + id;
        const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        deleteModal.show();
    }
</script>
@endsection