<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozeria - Stok Opname</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root { --fz-primary: #4f46e5; --fz-bg: #f8fafc; --fz-navbar: #ffffff; --fz-text-main: #1e293b; }
        body { background-color: var(--fz-bg); color: var(--fz-text-main); font-family: 'Segoe UI', sans-serif; }
        
        .navbar { background-color: var(--fz-navbar) !important; border-bottom: 1px solid #e2e8f0; padding: 12px 0; }
        .navbar-brand { font-size: 1.25rem; }
        
        .nav-item .nav-link { color: #64748b !important; padding: 6px 16px !important; margin: 0 4px; border-radius: 6px; transition: all 0.2s; }
        .nav-item .nav-link.active { color: var(--fz-primary) !important; background-color: #f5f3ff !important; border: 1px solid #ddd6fe !important; }
        
        .btn-add-nav { background-color: var(--fz-primary); color: white; border: none; font-size: 0.85rem; font-weight: 600; border-radius: 6px; padding: 8px 18px !important; transition: all 0.2s; }
        .btn-add-nav:hover { background-color: #4338ca; color: white; transform: translateY(-1px); }

        // PERBAIKAN SEARCH BAR (FULL BORDER)
        .input-group { 
            border: 1px solid #dee2e6; 
            border-radius: 0.5rem; 
            overflow: hidden; 
            background-color: #fff;
            transition: all 0.2s ease;
        }

        .input-group:focus-within { 
            border-color: var(--fz-primary) !important; 
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important; 
        }

        .input-group-text { background-color: #fff; border: none; color: #94a3b8; }
        
        .input-group .form-control, .input-group .btn-secondary { border: none !important; }
        .form-control:focus { box-shadow: none !important; }

        //DROPDOWN KATEGORI
        .form-select { border: 1px solid #dee2e6 !important; border-radius: 0.5rem !important; }
        .form-select:focus { border-color: var(--fz-primary) !important; box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm mb-4">
        <div class="container-fluid px-lg-5">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}" style="color: var(--fz-primary)">Frozeria <span class="fw-light text-dark">Stok</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') || request()->is('item*') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kategori*') || request()->is('category*') ? 'active' : '' }}" href="{{ route('category.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('bantuan') ? 'active' : '' }}" href="{{ route('bantuan') }}">Bantuan</a>
                    </li>
                </ul>

                @if (request()->is('/') || request()->is('item*') || request()->is('dashboard*'))
                    <a href="{{ route('item.create') }}" class="btn btn-add-nav">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Barang
                    </a>
                @elseif(request()->is('kategori*') || request()->is('category*'))
                    <a href="{{ route('category.create') }}" class="btn btn-add-nav">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
                    </a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container-fluid px-lg-5 pb-5">
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm auto-close" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".auto-close").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 3000);
        });
    </script>
</body>
</html>