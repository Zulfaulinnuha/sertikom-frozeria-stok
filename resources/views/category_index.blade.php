@extends('layouts.app')

@section('content')
<div class="container-fluid"> <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Daftar Kategori</h3>
    </div>

    <div class="card shadow-sm border-0 mb-4 bg-light">
        <div class="card-body py-3">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" id="searchCategory" class="form-control border-start-0" placeholder="Cari nama kategori...">
            </div>
        </div>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded border p-3">
        <table class="table table-hover align-middle mb-0" id="categoryTable">
            <thead class="table-light">
                <tr>
                    <th class="ps-3" style="width: 35%">Nama kategori</th>
                    <th style="width: 20%">Jumlah barang</th>
                    <th style="width: 20%">Dibuat</th>
                    <th style="width: 25%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                <tr>
                    <td class="ps-3 fw-bold text-dark">{{ $cat->name }}</td>
                    <td>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary border px-3">{{ $cat->items_count }} barang</span>
                    </td>
                    <td>{{ $cat->created_at->format('j M Y') }}</td>
                    <td class="text-center">
                        <div class="btn-group shadow-sm">
                            <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-outline-primary btn-sm px-3">
                                Edit
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm px-3" 
                                onclick="confirmDeleteCategory('{{ $cat->id }}', '{{ $cat->name }}')">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-5">
                        <i class="bi bi-tags d-block mb-2" style="font-size: 2.5rem;"></i>
                        Belum ada kategori yang ditambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-3 text-muted small">
        Menampilkan <strong>{{ $categories->count() }}</strong> kategori terdaftar.
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content shadow border-0">
            <div class="modal-body text-center p-4">
                <div class="text-danger mb-3">
                    <i class="bi bi-exclamation-triangle" style="font-size: 3rem;"></i>
                </div>
                <h5 class="fw-bold mb-2">Hapus kategori?</h5>
                <p class="text-muted small">Kategori <span id="categoryNameSpan" class="fw-bold text-dark"></span> akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteCategoryForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-4 text-white">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi Konfirmasi Hapus
    function confirmDeleteCategory(id, name) {
        document.getElementById('categoryNameSpan').innerText = name;
        const form = document.getElementById('deleteCategoryForm');
        form.action = '/category/destroy/' + id; 
        
        const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        deleteModal.show();
    }

    // Fungsi Pencarian Sederhana di Sisi Client
    document.getElementById('searchCategory').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelector("#categoryTable tbody").rows;
        
        for (let i = 0; i < rows.length; i++) {
            let firstCol = rows[i].cells[0].textContent.toLowerCase();
            if (firstCol.indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }      
        }
    });
</script>
@endsection