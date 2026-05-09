@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Frozeria Stok Dashboard</h2>
        </div>

        <div class="row g-0 mb-4 border">
            <div class="col-md-3 border-end p-3 bg-white text-center">
                <small class="text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.7rem;">Total barang</small>
                <h2 class="fw-bold mb-0 text-dark">{{ $items->total() }}</h2>
            </div>
            <div class="col-md-3 border-end p-3 bg-white text-center">
                <small class="text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.7rem;">Total kategori</small>
                <h2 class="fw-bold mb-0 text-dark">{{ $categories->count() }}</h2>
            </div>
            <div class="col-md-3 border-end p-3 bg-white text-center">
                <small class="text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.7rem;">Stok menipis</small>
                <h2 class="fw-bold mb-0 text-warning">{{ $stokMenipis }}</h2>
            </div>
            <div class="col-md-3 p-3 bg-white text-center">
                <small class="text-muted d-block mb-1 text-uppercase fw-bold" style="font-size: 0.7rem;">Stok habis</small>
                <h2 class="fw-bold mb-0 text-danger">{{ $stokHabis }}</h2>
            </div>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md-9 col-lg-10">
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Cari nama barang..."
                            value="{{ request('search') }}" oninput="autoSearch(this)">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <button class="btn btn-secondary px-4" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-lg-2 text-end">
                <form action="{{ route('dashboard') }}" method="GET">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="table-responsive bg-white shadow-sm border rounded-0">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3 py-2">Nama barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga jual</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td class="ps-3">{{ $item->name }}</td>
                            <td>
                                <span class="border px-2 py-1 small bg-light text-dark">
                                    {{ $item->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="{{ $item->stock < $item->stock_min ? 'text-danger fw-bold' : '' }}">
                                {{ $item->stock }}
                            </td>
                            <td>{{ $item->unit ?? 'pcs' }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('item.detail', $item->id) }}" class="btn btn-outline-secondary btn-sm px-2">Detail</a>
                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-outline-primary btn-sm px-2">Edit</a>
                                    <button type="button" class="btn btn-outline-danger btn-sm px-2"
                                        onclick="confirmDelete('{{ $item->id }}', '{{ $item->name }}')">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-box-seam d-block mb-2" style="font-size: 2.5rem;"></i>
                                Data barang tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted small">
                Menampilkan <strong>{{ $items->firstItem() ?? 0 }}</strong> sampai <strong>{{ $items->lastItem() ?? 0 }}</strong> dari <strong>{{ $items->total() }}</strong> data barang.
            </div>
            <div>
                {{-- Ini adalah fungsi pagination otomatis Laravel --}}
                {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content shadow border-0">
                <div class="modal-body text-center p-4">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-triangle" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Hapus barang?</h5>
                    <p class="text-muted small">Data <span id="itemNameSpan" class="fw-bold text-dark"></span> akan dihapus secara permanen.</p>
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
    </div>

    <script>
        let typingTimer;
        function autoSearch(input) {
            clearTimeout(typingTimer);
            if (input.value === '') {
                input.form.submit();
                return;
            }
            typingTimer = setTimeout(() => {
                input.form.submit();
            }, 500);
        }

        function confirmDelete(id, name) {
            document.getElementById('itemNameSpan').innerText = name;
            const form = document.getElementById('deleteActionForm');
            form.action = '/item/delete/' + id;
            const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            deleteModal.show();
        }
    </script>
@endsection