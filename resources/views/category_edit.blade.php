@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary btn-sm me-3 px-3">
            <i class="bi bi-chevron-left"></i> Kembali
        </a>
        <h4 class="fw-bold mb-0">Edit Kategori</h4>
    </div>

    <div class="card shadow-sm border rounded-0">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">Nama kategori <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control" 
                           value="{{ $category->name }}" 
                           required>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-bold">Deskripsi (opsional)</label>
                    <textarea id="description" 
                              name="description" 
                              class="form-control" 
                              rows="8"
                              placeholder="Produk berbahan dasar ayam beku...">{{ $category->description }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-outline-success px-4" style="background-color: #f1f8e9; border-color: #c5e1a5; color: #33691e;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection