@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-3 px-3">
            <i class="bi bi-chevron-left"></i> Kembali
        </a>
        <h4 class="fw-bold mb-0">Tambah Barang Baru</h4> </div>

    <div class="card shadow-sm border rounded-0">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-bold">Foto barang</label>
                    <div class="border-dashed border-2 py-5 text-center bg-light position-relative" style="border: 2px dashed #ccc;">
                        <div class="mb-2">
                            @if($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" class="img-fluid rounded mb-2" style="max-height: 180px;">
                            @else
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            @endif
                        </div>
                        <p class="text-muted small mb-2">Klik untuk memilih foto, atau seret file ke sini<br>Format: JPG, PNG — Maks. 2 MB</p>
                        <div class="d-flex justify-content-center">
                            <input type="file" name="photo" class="form-control form-control-sm w-50">
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-bold">Nama barang <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $item->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Satuan <span class="text-danger">*</span></label>
                        <input type="text" name="unit" class="form-control" value="{{ $item->unit }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jumlah stok <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control" value="{{ $item->stock }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Stok minimum</label>
                        <input type="number" name="stock_min" class="form-control" value="{{ $item->stock_min }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Harga jual (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Harga beli (Rp)</label>
                        <input type="number" name="price_buy" class="form-control" value="{{ $item->price_buy }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Berat / ukuran</label>
                        <input type="text" name="weight" class="form-control" value="{{ $item->weight }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Lokasi simpan</label>
                        <input type="text" name="location" class="form-control" value="{{ $item->location }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5">{{ $item->description }}</textarea>
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