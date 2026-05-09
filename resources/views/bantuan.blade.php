@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="fw-bold mb-4">Panduan Penggunaan Sistem</h4>

    <div class="card mb-3 shadow-sm border rounded-0">
        <div class="card-body p-4">
            <h6 class="fw-bold mb-3">Cara menambah barang baru</h6>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">1</div>
                <p class="mb-0">Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</p>
            </div>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">2</div>
                <p class="mb-0">Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</p>
            </div>
            <div class="d-flex mb-0">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">3</div>
                <p class="mb-0">Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</p>
            </div>
        </div>
    </div>

    <div class="card mb-3 shadow-sm border rounded-0">
        <div class="card-body p-4">
            <h6 class="fw-bold mb-3">Cara update stok barang masuk</h6>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">1</div>
                <p class="mb-0">Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</p>
            </div>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">2</div>
                <p class="mb-0">Klik tombol <strong>Edit</strong> pada baris barang tersebut.</p>
            </div>
            <div class="d-flex mb-0">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">3</div>
                <p class="mb-0">Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Barang</strong>.</p>
            </div>
        </div>
    </div>

    <div class="card mb-3 shadow-sm border rounded-0">
        <div class="card-body p-4">
            <h6 class="fw-bold mb-3">Cara mengelola kategori</h6>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">1</div>
                <p class="mb-0">Buka halaman <strong>Kategori</strong> dari navigasi atas.</p>
            </div>
            <div class="d-flex mb-2">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">2</div>
                <p class="mb-0">Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</p>
            </div>
            <div class="d-flex mb-0">
                <div class="me-3 border px-2 bg-white fw-bold shadow-sm" style="height: fit-content;">3</div>
                <p class="mb-0">Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</p>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border rounded-0 mb-4">
        <div class="card-body p-3">
            <div class="d-flex align-items-center">
                <i class="bi bi-info-circle me-3 fs-5"></i>
                <p class="mb-0 text-secondary">Satuan barang diisi bebas sesuai kebutuhan — misalnya: <strong>pcs, pack, box, kg, liter,</strong> dan lain-lain.</p>
            </div>
        </div>
    </div>

    <div class="py-5 border-top text-center">
        <p class="text-muted mb-0" style="font-size: 0.85rem; letter-spacing: 0.5px;">
            <span class="fw-bold text-dark">{{ strtoupper('Zulfa Ulinnuha Azazi') }}</span> 
            <span class="mx-2 text-secondary">|</span> NIM: <strong>2241760131</strong> 
            <span class="mx-2 text-secondary">|</span> Kelas: <strong>SIB-4A</strong> 
            <span class="mx-2 text-secondary">|</span> <strong>{{ 'Kanigoro, Blitar' }}</strong> 
            <span class="mx-2 text-secondary">|</span> {{ '085777172814' }} 
            <span class="mx-2 text-secondary">|</span> {{ 'zulfanuha016@gmail.com' }}
        </p>
        <p class="mt-3 mb-0 text-uppercase fw-light text-secondary" style="font-size: 0.7rem; letter-spacing: 2px;">
            Aplikasi Frozeria Stok Opname
        </p>
    </div>
</div>
@endsection