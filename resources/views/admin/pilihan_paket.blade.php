@extends('admin.layouts.app')

@section('title', 'Pilanhan Paket')
@section('page-title', 'PILANHAN PAKET')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket Wisata</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px;
        }
        
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .page-header {
            background: white;
            padding: 1.5rem;
            border-radius: 0.75rem;
            margin-bottom: 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
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
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }
        
        .mb-1 {
            margin-bottom: 0.25rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 300;
        }
        
        .mb-0 {
            margin-bottom: 0;
        }
        
        .add-package-btn {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .add-package-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 193, 0, 0.3);
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -12px;
        }
        
        .col-xl-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 12px;
        }
        
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .mb-3 {
            margin-bottom: 1rem;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        
        .card {
            background: white;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-header {
            padding: 1rem 1.5rem;
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            border-radius: 0.75rem 0.75rem 0 0;
        }
        
        .card-footer {
            padding: 0.75rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 0 0 0.75rem 0.75rem;
        }
        
        .stat-card {
            color: white;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
            border-radius: 0.75rem;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
        }
        
        .stat-card-1 {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
        }
        
        .stat-card-2 {
            background: linear-gradient(135deg, #FE9C03, #FF8F00);
        }
        
        .stat-card-3 {
            background: linear-gradient(135deg, #FFD54F, #FFC100);
        }
        
        .stat-card-4 {
            background: linear-gradient(135deg, #FFAB00, #FF6F00);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .opacity-75 {
            opacity: 0.75;
        }
        
        .bg-white {
            background-color: white !important;
        }
        
        .bg-opacity-25 {
            background-color: rgba(255, 255, 255, 0.25) !important;
        }
        
        h5 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .btn-group {
            display: flex;
            border-radius: 0.375rem;
            overflow: hidden;
        }
        
        .btn-group .btn {
            border-radius: 0;
            margin: 0;
        }
        
        .btn-group .btn:first-child {
            border-radius: 0.375rem 0 0 0.375rem;
        }
        
        .btn-group .btn:last-child {
            border-radius: 0 0.375rem 0.375rem 0;
        }
        
        .btn-group-sm .btn {
            padding: 0.375rem 0.75rem;
            font-size: 0.8rem;
        }
        
        .btn-outline-secondary {
            background: transparent;
            color: #FE9C03;
            border: 1px solid #FFC100;
        }
        
        .btn-outline-secondary:hover {
            background: #FFC100;
            color: white;
        }
        
        .btn-outline-secondary.active {
            background: #FFC100;
            color: white;
            border-color: #FFC100;
        }
        
        .p-0 {
            padding: 0;
        }
        
        .p-3 {
            padding: 1rem;
        }
        
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .package-card {
            background: white;
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
            transition: transform 0.3s ease;
            border-left: 4px solid #FFC100;
        }
        
        .package-card:hover {
            transform: translateY(-2px);
            border-left-color: #FE9C03;
        }
        
        .package-image {
            background: linear-gradient(135deg, #FFC100 0%, #FE9C03 100%);
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .package-icon {
            font-size: 3rem;
            color: white;
            z-index: 1;
        }
        
        .package-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.375rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.688rem;
            font-weight: 600;
            text-transform: uppercase;
            background: rgba(76, 175, 80, 0.9);
            color: white;
            backdrop-filter: blur(10px);
        }
        
        .package-body {
            padding: 1.5rem;
        }
        
        .package-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .package-subtitle {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        .package-details {
            margin-bottom: 1rem;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            background: #f8f9fa;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .detail-item:hover {
            background: #e9ecef;
            transform: translateX(4px);
        }
        
        .detail-icon {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            color: white;
            font-weight: 600;
        }
        
        .detail-content {
            flex: 1;
        }
        
        .detail-label {
            font-size: 0.75rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.125rem;
        }
        
        .detail-value {
            font-size: 0.875rem;
            color: #2c3e50;
            font-weight: 600;
        }
        
        .package-price {
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.75rem;
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            border-radius: 0.5rem;
            color: white;
        }
        
        .price-amount {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .price-unit {
            font-size: 0.75rem;
            opacity: 0.9;
        }
        
        .package-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn {
            flex: 1;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #FFC100, #FE9C03);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
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
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-1px);
        }
        
        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.8rem;
        }
        
        /* FontAwesome Icon Replacements */
        .fas {
            font-family: inherit;
            font-style: normal;
        }
        
        .fa-2x {
            font-size: 2em;
        }
        
        .fa-plus::before { content: "+"; }
        .fa-suitcase::before { content: "🧳"; }
        .fa-check-circle::before { content: "✅"; }
        .fa-calendar-check::before { content: "📅"; }
        .fa-users::before { content: "👥"; }
        .fa-angle-right::before { content: "›"; }
        .fa-th-large::before { content: "⊞"; }
        .fa-list::before { content: "☰"; }
        .fa-mountain::before { content: "🏔️"; }
        .fa-sun::before { content: "🌅"; }
        .fa-eye::before { content: "👁️"; }
        .fa-edit::before { content: "✏️"; }
        .fa-trash::before { content: "🗑️"; }
        .fa-tag::before { content: "🏷️"; }
        .fa-clock::before { content: "⏰"; }
        
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            .packages-grid {
                grid-template-columns: 1fr;
            }
            
            .col-xl-3, .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .d-flex {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start !important;
            }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .col-xl-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .package-card, .stat-card {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .package-card:nth-child(1) { animation-delay: 0.1s; }
        .package-card:nth-child(2) { animation-delay: 0.2s; }
        .package-card:nth-child(3) { animation-delay: 0.3s; }
        .package-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="main-content">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="page-title mb-1">Kelola Paket Wisata</h2>
                    <p class="page-subtitle mb-0">Kelola semua paket wisata yang tersedia</p>
                </div>
                <button class="add-package-btn" onclick="showCreateForm()">
                    <i class="fas fa-plus"></i>
                    Tambah Paket Baru
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card stat-card stat-card-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-number">4</div>
                                <div class="stat-label">Total Paket</div>
                            </div>
                            <div class="opacity-75">
                                <i class="fas fa-suitcase fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Lihat Detail</small>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card stat-card stat-card-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-number">4</div>
                                <div class="stat-label">Paket Aktif</div>
                            </div>
                            <div class="opacity-75">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Kelola Paket</small>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card stat-card stat-card-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-number">12</div>
                                <div class="stat-label">Total Booking</div>
                            </div>
                            <div class="opacity-75">
                                <i class="fas fa-calendar-check fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Lihat Booking</small>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card stat-card stat-card-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="stat-number">8</div>
                                <div class="stat-label">Pelanggan</div>
                            </div>
                            <div class="opacity-75">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Lihat Pelanggan</small>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Package Management Table -->
        <div class="packages-container">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Paket Wisata</h5>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary active" onclick="showCardView()">
                            <i class="fas fa-th-large"></i> Grid
                        </button>
                        <button class="btn btn-outline-secondary" onclick="showTableView()">
                            <i class="fas fa-list"></i> Tabel
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!-- Card View -->
                    <div id="cardView" class="p-3">
                        <div class="packages-grid">
                            <div class="package-card">
                                <div class="package-image">
                                    <div class="package-status">Aktif</div>
                                    <div class="package-icon">
                                        <i class="fas fa-mountain"></i>
                                    </div>
                                </div>
                                <div class="package-body">
                                    <div class="package-title">Open Trip Bromo</div>
                                    <div class="package-subtitle">Nikmati keindahan matahari terbit di Bromo bersama group</div>
                                    <div class="package-details">
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-tag"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Tipe</div>
                                                <div class="detail-value">Open Trip</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Durasi</div>
                                                <div class="detail-value">2 hari 1 malam</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-users"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Max Orang</div>
                                                <div class="detail-value">15 orang</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-price">
                                        <div class="price-amount">Rp 300.000</div>
                                        <div class="price-unit">per orang</div>
                                    </div>
                                    <div class="package-actions">
                                        <button class="btn btn-secondary btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="package-card">
                                <div class="package-image">
                                    <div class="package-status">Aktif</div>
                                    <div class="package-icon">
                                        <i class="fas fa-sun"></i>
                                    </div>
                                </div>
                                <div class="package-body">
                                    <div class="package-title">Daily Trip Bromo Sunrise</div>
                                    <div class="package-subtitle">Paket harian untuk menyaksikan sunrise di Bromo</div>
                                    <div class="package-details">
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-tag"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Tipe</div>
                                                <div class="detail-value">Daily Trip</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Durasi</div>
                                                <div class="detail-value">1 hari</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-users"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Max Orang</div>
                                                <div class="detail-value">8 orang</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-price">
                                        <div class="price-amount">Rp 350.000</div>
                                        <div class="price-unit">per orang</div>
                                    </div>
                                    <div class="package-actions">
                                        <button class="btn btn-secondary btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="package-card">
                                <div class="package-image">
                                    <div class="package-status">Aktif</div>
                                    <div class="package-icon">
                                        🚗
                                    </div>
                                </div>
                                <div class="package-body">
                                    <div class="package-title">Travel to Malang Bromo</div>
                                    <div class="package-subtitle">Paket travel lengkap dengan kendaraan pribadi</div>
                                    <div class="package-details">
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-tag"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Tipe</div>
                                                <div class="detail-value">Private Travel</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Durasi</div>
                                                <div class="detail-value">3 hari 2 malam</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-users"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Max Orang</div>
                                                <div class="detail-value">6 orang</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="package-price">
                                        <div class="price-amount">Rp 2.000.000</div>
                                        <div class="price-unit">per mobil</div>
                                    </div>
                                    <div class="package-actions">
                                        <button class="btn btn-secondary btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="package-card">
                                <div class="package-image">
                                    <div class="package-status">Aktif</div>
                                    <div class="package-icon">
                                        🏕️
                                    </div>
                                </div>
                                <div class="package-body">
                                    <div class="package-title">Paket Bromo Ijen WNA</div>
                                    <div class="package-subtitle">Paket khusus untuk wisatawan asing</div>
                                    <div class="package-details">
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-tag"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Tipe</div>
                                                <div class="detail-value">International</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                            <div class="detail-content">
                                                <div class="detail-label">Durasi</div>
                                                <div class="detail-value">3 hari 2 malam</div>
                                            </div>
                                        </div>
                                        <div class="detail-item">
                                            <div class="detail