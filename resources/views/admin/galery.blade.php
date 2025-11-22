@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')
@section('page-title', '')

@section('content')
<style>
        
        .gallery-page-header {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-top: 4px solid #FFC100;
        }
        
        .d-flex {
            display: flex;
        }
        
        .justify-content-between {
            justify-content: space-between;
        }
        
        .align-items-center {
            align-items: center;
        }
        
        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            font-weight: 400;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
            box-shadow: 0 0.125rem 0.25rem rgba(255, 193, 0, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(255, 193, 0, 0.3);
        }
        
        .btn-outline {
            background: transparent;
            color: #FE9C03;
            border: 2px solid #FFC100;
        }
        
        .btn-outline:hover {
            background: #FFC100;
            color: white;
            transform: translateY(-2px);
        }
        
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #FFC100, #FE9C03);
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .stat-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #6c757d;
            font-weight: 500;
            margin-top: 0.25rem;
        }
        
        .stat-change {
            font-size: 0.75rem;
            color: #28a745;
            font-weight: 600;
            margin-top: 0.5rem;
        }
        
        .gallery-controls {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .controls-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .view-controls {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-group {
            display: flex;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 2px solid #FFC100;
        }
        
        .btn-group .btn {
            border-radius: 0;
            margin: 0;
            padding: 0.5rem 1rem;
            background: white;
            color: #FE9C03;
            border: none;
        }
        
        .btn-group .btn.active {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
        }
        
        .btn-group .btn:hover:not(.active) {
            background: #fff8e1;
        }
        
        .filter-controls {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.875rem;
        }
        
        .form-select {
            padding: 0.5rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 0.5rem;
            background: white;
            color: #495057;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            min-width: 140px;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #FFC100;
            box-shadow: 0 0 0 0.125rem rgba(255, 193, 0, 0.25);
        }
        
        .search-box {
            position: relative;
            flex: 1;
            max-width: 300px;
        }
        
        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 2px solid #e9ecef;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #FFC100;
            box-shadow: 0 0 0 0.125rem rgba(255, 193, 0, 0.25);
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2rem;
        }
        
        .gallery-item {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #e9ecef;
        }
        
        .gallery-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .gallery-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            position: relative;
            overflow: hidden;
        }
        
        .image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #adb5bd;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .overlay-btn {
            padding: 0.5rem;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 0.375rem;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        
        .overlay-btn:hover {
            background: #FFC100;
            color: white;
        }
        
        .gallery-info {
            padding: 1.5rem;
        }
        
        .gallery-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }
        
        .gallery-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .gallery-category {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .gallery-date {
            font-size: 0.75rem;
            color: #6c757d;
        }
        
        .gallery-description {
            font-size: 0.9rem;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .gallery-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .btn-sm {
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-secondary {
            background: #f8f9fa;
            color: #495057;
            border: 1px solid #dee2e6;
        }
        
        .btn-secondary:hover {
            background: #e9ecef;
            transform: translateY(-1px);
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-1px);
        }
        
        .upload-zone {
            background: white;
            border: 3px dashed #FFC100;
            border-radius: 1rem;
            padding: 3rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .upload-zone:hover {
            border-color: #FE9C03;
            background: #fff8e1;
        }
        
        .upload-zone.dragover {
            border-color: #FE9C03;
            background: #fff8e1;
            transform: scale(1.02);
        }
        
        .upload-icon {
            font-size: 3rem;
            color: #FFC100;
            margin-bottom: 1rem;
        }
        
        .upload-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .upload-subtext {
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .hidden-input {
            display: none;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
        
        .pagination-btn {
            padding: 0.5rem 1rem;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 0.5rem;
            color: #495057;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .pagination-btn:hover {
            border-color: #FFC100;
            background: #fff8e1;
        }
        
        .pagination-btn.active {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
            border-color: #FFC100;
        }
        
        .pagination-info {
            color: #6c757d;
            font-size: 0.875rem;
            margin: 0 1rem;
        }
        
        .bulk-actions {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            display: none;
            align-items: center;
            gap: 1rem;
        }
        
        .bulk-actions.show {
            display: flex;
        }
        
        .bulk-text {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .btn-warning {
            background: #ffc107;
            color: #212529;
        }
        
        .btn-warning:hover {
            background: #e0a800;
            transform: translateY(-1px);
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        .empty-text {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal.show {
            display: flex;
        }
        
        .modal-content {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #6c757d;
            cursor: pointer;
            padding: 0.25rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e9ecef;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #FFC100;
            box-shadow: 0 0 0 0.125rem rgba(255, 193, 0, 0.25);
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
        
        /* FontAwesome Icon Replacements */
        .fa-plus::before { content: "➕"; }
        .fa-upload::before { content: "📤"; }
        .fa-images::before { content: "🖼️"; }
        .fa-video::before { content: "🎥"; }
        .fa-file::before { content: "📄"; }
        .fa-eye::before { content: "👁️"; }
        .fa-download::before { content: "⬇️"; }
        .fa-edit::before { content: "✏️"; }
        .fa-trash::before { content: "🗑️"; }
        .fa-th::before { content: "⊞"; }
        .fa-list::before { content: "☰"; }
        .fa-search::before { content: "🔍"; }
        .fa-folder::before { content: "📁"; }
        .fa-calendar::before { content: "📅"; }
        .fa-times::before { content: "✕"; }
        .fa-check::before { content: "✓"; }
        
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
            }
            
            .d-flex {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start !important;
            }
            
            .header-actions {
                width: 100%;
                justify-content: stretch;
            }
            
            .header-actions .btn {
                flex: 1;
                justify-content: center;
            }
            
            .page-title {
                font-size: 1.75rem;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-section {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .filter-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            
            .search-box {
                max-width: 100%;
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .gallery-item {
            animation: fadeInUp 0.5s ease forwards;
        }
        
        .gallery-item:nth-child(1) { animation-delay: 0.1s; }
        .gallery-item:nth-child(2) { animation-delay: 0.2s; }
        .gallery-item:nth-child(3) { animation-delay: 0.3s; }
        .gallery-item:nth-child(4) { animation-delay: 0.4s; }
        .gallery-item:nth-child(5) { animation-delay: 0.5s; }
        .gallery-item:nth-child(6) { animation-delay: 0.6s; }
    </style>

    <!-- Page Header -->
    <div class="gallery-page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Kelola Galeri</h1>
                <p class="page-subtitle">Kelola foto dan video untuk konten wisata</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-outline" onclick="showBulkActions()">
                    <i class="fa-check"></i>
                    Pilih Multiple
                </button>
                <a class="btn btn-primary" href="#upload-form">
                    <i class="fa-plus"></i>
                    Upload Media
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div style="background:#d4edda;color:#155724;border:1px solid #c3e6cb;padding:12px 16px;border-radius:8px;margin-bottom:16px;">
            {{ session('success') }}
        </div>
    @endif

        <!-- Statistics -->
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $galleryStats['total'] ?? 0 }}</div>
                        <div class="stat-label">Total Media</div>
                        <div class="stat-change">
                            @php($delta = $galleryStats['total_this_month'] ?? 0)
                            @if(($delta) > 0)
                                ↗ +{{ $delta }} bulan ini
                            @else
                                —
                            @endif
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fa-images"></i>
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $galleryStats['photos'] ?? 0 }}</div>
                        <div class="stat-label">Foto</div>
                        <div class="stat-change">
                            @php($delta = $galleryStats['photos_this_month'] ?? 0)
                            @if(($delta) > 0)
                                ↗ +{{ $delta }} bulan ini
                            @else
                                —
                            @endif
                        </div>
                    </div>
                    <div class="stat-icon">
                        📸
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $galleryStats['videos'] ?? 0 }}</div>
                        <div class="stat-label">Video</div>
                        <div class="stat-change">
                            @php($delta = $galleryStats['videos_this_month'] ?? 0)
                            @if(($delta) > 0)
                                ↗ +{{ $delta }} bulan ini
                            @else
                                —
                            @endif
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fa-video"></i>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Upload Form -->
        <div id="upload-form" class="upload-zone">
            <form method="POST" action="{{ route('admin.galery.store') }}" enctype="multipart/form-data" style="display:grid;gap:12px;max-width:720px;margin:0 auto;">
                @csrf
                <div class="upload-icon">📤</div>
                <div class="upload-text">Unggah Media Baru</div>
                <div class="upload-subtext">Mendukung JPG, PNG (maks 10MB)</div>
                <div class="form-group">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" placeholder="Judul media" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" placeholder="Deskripsi singkat (opsional)" rows="3"></textarea>
                </div>
                <div class="form-group" style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                    <div>
                        <label class="form-label">Kategori</label>
                        <input type="text" name="category" class="form-control" placeholder="Misal: bromo">
                    </div>
                    <div>
                        <label class="form-label">Tipe</label>
                        <select name="type" class="form-control">
                            <option value="image">Foto</option>
                            <option value="video" disabled>Video (belum didukung)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="bulkActions">
            <div class="bulk-text">
                <span id="selectedCount">0</span> item dipilih
            </div>
            <button class="btn btn-warning btn-sm">
                <i class="fa-folder"></i>
                Pindah ke Album
            </button>
            <button class="btn btn-danger btn-sm">
                <i class="fa-trash"></i>
                Hapus Terpilih
            </button>
            <button class="btn btn-secondary btn-sm" onclick="clearSelection()">
                Batal
            </button>
        </div>

        <!-- Gallery Controls -->
        <div class="gallery-controls">
            <div class="controls-top">
                <h2 class="section-title">Galeri Media</h2>
                <div class="view-controls">
                    <div class="btn-group">
                        <button class="btn active" onclick="setView('grid')">
                            <i class="fa-th"></i> Grid
                        </button>
                        <button class="btn" onclick="setView('list')">
                            <i class="fa-list"></i> List
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="filter-controls">
                <div class="filter-group">
                    <label class="filter-label">Kategori:</label>
                    <select class="form-select" onchange="filterByCategory(this.value)">
                        <option value="">Semua</option>
                        <option value="bromo">Bromo</option>
                        <option value="malang">Malang</option>
                        <option value="ijen">Ijen</option>
                        <option value="hotel">Hotel</option>
                        <option value="transport">Transport</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Tipe:</label>
                    <select class="form-select" onchange="filterByType(this.value)">
                        <option value="">Semua</option>
                        <option value="image">Foto</option>
                        <option value="video">Video</option>
                    </select>
                </div>
                
                <div class="search-box">
                    <i class="fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Cari media..." onkeyup="searchMedia(this.value)">
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid" id="galleryGrid">
            @isset($galleries)
                @forelse($galleries as $item)
                    <div class="gallery-item" data-category="{{ $item->category }}" data-type="{{ $item->type }}">
                        <div class="gallery-image">
                            @if($item->image_path)
                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" style="width:100%;height:220px;object-fit:cover;">
                            @else
                                <div class="image-placeholder">🖼️</div>
                            @endif
                            <div class="gallery-overlay">
                                <a class="overlay-btn" href="{{ asset('storage/'.$item->image_path) }}" target="_blank" rel="noopener">
                                    <i class="fa-eye"></i>
                                </a>
                                <a class="overlay-btn" href="{{ asset('storage/'.$item->image_path) }}" download>
                                    <i class="fa-download"></i>
                                </a>
                                <button class="overlay-btn" 
                                    onclick="openEditFromButton(this)"
                                    data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-description="{{ $item->description }}"
                                    data-category="{{ $item->category }}"
                                    data-type="{{ $item->type }}"
                                    data-image-url="{{ asset('storage/'.$item->image_path) }}">
                                    <i class="fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.galery.destroy', $item) }}" onsubmit="return confirm('Hapus media ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="overlay-btn"><i class="fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <div class="gallery-title">{{ $item->title }}</div>
                            <div class="gallery-meta">
                                <span class="gallery-category">{{ $item->category ?? 'Umum' }}</span>
                                <span class="gallery-date">{{ $item->created_at?->format('d M Y') }}</span>
                            </div>
                            <div class="gallery-description">{{ $item->description }}</div>
                            <div class="gallery-actions">
                                <a class="btn btn-secondary btn-sm" href="{{ asset('storage/'.$item->image_path) }}" target="_blank"><i class="fa-eye"></i> Lihat</a>
                                <button class="btn btn-primary btn-sm"
                                    onclick="openEditFromButton(this)"
                                    data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-description="{{ $item->description }}"
                                    data-category="{{ $item->category }}"
                                    data-type="{{ $item->type }}"
                                    data-image-url="{{ asset('storage/'.$item->image_path) }}">
                                    <i class="fa-edit"></i> Edit
                                </button>
                                <form method="POST" action="{{ route('admin.galery.destroy', $item) }}" onsubmit="return confirm('Hapus media ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column: 1/-1;">
                        <div class="empty-icon">🖼️</div>
                        <div class="empty-title">Belum ada media</div>
                        <div class="empty-text">Unggah gambar pertama Anda menggunakan form di atas.</div>
                    </div>
                @endforelse
            @endisset
        </div>

        <!-- Edit Modal -->
        <div class="modal" id="editModal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Edit Media</div>
                    <button class="close-btn" type="button" onclick="closeEditModal()">✕</button>
                </div>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group" style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                        <div>
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" id="editCategory" class="form-control">
                        </div>
                        <div>
                            <label class="form-label">Tipe</label>
                            <select name="type" id="editType" class="form-control">
                                <option value="image">Foto</option>
                                <option value="video" disabled>Video (belum didukung)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gambar (opsional, untuk ganti)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div style="margin-top:8px;font-size:12px;color:#6c757d;">Pratinjau saat ini:</div>
                        <img id="editPreview" src="" alt="Preview" style="margin-top:6px;max-height:160px;border-radius:8px;">
                    </div>
                    <div style="display:flex;gap:8px;justify-content:flex-end;">
                        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script>
// Gallery functionality
function showBulkActions() {
    const bulkActions = document.getElementById('bulkActions');
    bulkActions.classList.toggle('show');
}

function showUploadModal() {
    alert('Upload modal akan dibuka');
}

function clearSelection() {
    const bulkActions = document.getElementById('bulkActions');
    bulkActions.classList.remove('show');
}

function setView(view) {
    const buttons = document.querySelectorAll('.btn-group .btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
}

function filterByCategory(category) {
    console.log('Filter by category:', category);
}

function filterByType(type) {
    console.log('Filter by type:', type);
}

function searchMedia(query) {
    console.log('Search:', query);
}

function viewMedia(id) {
    console.log('View media:', id);
}

function downloadMedia(id) {
    console.log('Download media:', id);
}

function editMedia(id) {
    console.log('Edit media:', id);
}

function deleteMedia(id) {
    if (confirm('Apakah Anda yakin ingin menghapus media ini?')) {
        console.log('Delete media:', id);
    }
}

function handleDrop(event) {
    event.preventDefault();
    const uploadZone = event.target.closest('.upload-zone');
    uploadZone.classList.remove('dragover');
    console.log('Files dropped:', event.dataTransfer.files);
}

function handleDragOver(event) {
    event.preventDefault();
    const uploadZone = event.target.closest('.upload-zone');
    uploadZone.classList.add('dragover');
}

function handleDragLeave(event) {
    const uploadZone = event.target.closest('.upload-zone');
    uploadZone.classList.remove('dragover');
}

function handleFileSelect(event) {
    console.log('Files selected:', event.target.files);
}

// ===== Edit Modal Logic =====
function openEditFromButton(btn){
    const id = btn.dataset.id;
    const title = btn.dataset.title || '';
    const description = btn.dataset.description || '';
    const category = btn.dataset.category || '';
    const type = btn.dataset.type || 'image';
    const imageUrl = btn.dataset.imageUrl || '';

    const form = document.getElementById('editForm');
    const actionTemplate = "{{ route('admin.galery.update', ['gallery' => '__ID__']) }}";
    form.action = actionTemplate.replace('__ID__', id);

    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;
    document.getElementById('editCategory').value = category;
    document.getElementById('editType').value = type;
    document.getElementById('editPreview').src = imageUrl;

    document.getElementById('editModal').classList.add('show');
}

function closeEditModal(){
    document.getElementById('editModal').classList.remove('show');
}
</script>
@endsection