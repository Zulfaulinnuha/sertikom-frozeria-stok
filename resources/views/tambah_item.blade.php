@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Diubah: Menghapus row justify-content-center dan col-lg-10 agar Full Lebar --}}
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-3 px-3">
            <i class="bi bi-chevron-left"></i> Kembali
        </a>
        <h4 class="fw-bold mb-0">Tambah Barang Baru</h4>
    </div>

    <div class="card shadow-sm border rounded-0">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase text-muted">Foto barang</label>
                    <div class="border-dashed py-5 text-center bg-light" style="border: 2px dashed #dee2e6; border-radius: 8px;">
                        <div class="mb-2">
                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <p class="text-muted small mb-3">Klik untuk memilih foto, atau seret file ke sini<br>Format: JPG, PNG — Maks. 2 MB</p>
                        <div class="d-flex justify-content-center">
                            <input type="file" name="photo" class="form-control form-control-sm w-50" style="border: 1px solid #dee2e6 !important;">
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-bold small text-uppercase text-muted">Nama barang <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Contoh: Ayam nugget crispy" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Kategori <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select py-2" style="border: 1px solid #dee2e6 !important;" required>
                            <option value="">Pilih kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Satuan <span class="text-danger">*</span></label>
                        <input type="text" name="unit" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Contoh: pcs / pack / kg" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Jumlah stok <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="0" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Stok minimum</label>
                        <input type="number" name="stock_min" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" value="20">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Harga jual (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Masukkan harga jual" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Harga beli (Rp)</label>
                        <input type="number" name="price_buy" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Masukkan harga beli">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Berat / ukuran</label>
                        <input type="text" name="weight" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Contoh: 500 gram">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase text-muted">Lokasi simpan</label>
                        <input type="text" name="location" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" placeholder="Contoh: Rak A-3">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold small text-uppercase text-muted">Deskripsi</label>
                        <textarea name="description" class="form-control py-2" style="border: 1px solid #dee2e6 !important;" rows="4" placeholder="Ketik deskripsi lengkap barang di sini..."></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-5 py-2">Batal</a>
                    <button type="submit" class="btn btn-outline-success px-5 py-2" style="background-color: #f1f8e9; border-color: #c5e1a5; color: #33691e;">
                        Simpan Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection