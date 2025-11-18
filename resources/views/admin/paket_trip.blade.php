@extends('admin.layouts.app')

@section('title', 'Paket Trip Premium')
@section('page-title', 'Paket Trip Premium')
@section('page-subtitle', 'Pilih petualangan impian Anda dengan standar pelayanan terbaik')

@section('content')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Scoped styles for this page only */
        .page-content {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* .page-title removed */
        
        .section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        
        .add-btn {
            background: #ff9500;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .add-btn:hover {
            background: #e6860a;
            transform: translateY(-1px);
        }
        
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 24px;
            align-items: stretch;
        }
        
        .package-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .package-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }
        
        .package-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .package-content {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }
        
        .package-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #333;
        }
        
        .package-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }
        
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-edit {
            background: #ff9500;
            color: white;
        }
        
        .btn-edit:hover {
            background: #e6860a;
        }
        
        .btn-delete {
            background: #6c757d;
            color: white;
        }
        
        .btn-delete:hover {
            background: #545b62;
        }
        
        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        
        .table th,
        .table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            font-size: 14px;
        }
        
        .table td {
            font-size: 14px;
            color: #333;
        }
        
        .table tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            min-width: 60px;
        }
        
        .status-aktif {
            background-color: #d4edda;
            color: #155724;
        }
        
        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .type-paket {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .type-panorama {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .action-buttons {
            display: flex;
            gap: 6px;
        }
        
        .btn-sm {
            padding: 4px 8px;
            font-size: 11px;
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background: #218838;
        }
        
        .package-thumbnail {
            width: 60px;
            height: 40px;
            border-radius: 6px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .page-content {
                padding: 16px;
            }
            
            .packages-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .section {
                padding: 16px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }
            
            .section-tabs {
                justify-content: center;
            }
            
            .table-container {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 8px 12px;
            }
        }
    </style>
    <div class="page-content">
        
        <!-- Packages Grid Section -->
        <div class="section">
            <div class="section-header">
                <div></div>
                <button class="add-btn">+ Tambah Paket</button>
            </div>
            
            <div class="packages-grid">
                <div class="package-card">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Bromo Sunrise" class="package-image">
                    <div class="package-content">
                        <div class="package-title">Daily Trip Bromo Sunrise</div>
                        <div class="package-actions">
                            <a href="#" class="btn btn-edit">Edit</a>
                            <button class="btn btn-delete">Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="package-card">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Travel to Malang" class="package-image">
                    <div class="package-content">
                        <div class="package-title">Travel to Malang Bromo</div>
                        <div class="package-actions">
                            <a href="#" class="btn btn-edit">Edit</a>
                            <button class="btn btn-delete">Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="package-card">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Paket Bromo Ijen" class="package-image">
                    <div class="package-content">
                        <div class="package-title">Paket Bromo Ijen WNA</div>
                        <div class="package-actions">
                            <a href="#" class="btn btn-edit">Edit</a>
                            <button class="btn btn-delete">Hapus</button>
                        </div>
                    </div>
                </div>
                
                <div class="package-card">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Open Trip Bromo" class="package-image">
                    <div class="package-content">
                        <div class="package-title">Open Trip Bromo</div>
                        <div class="package-actions">
                            <a href="#" class="btn btn-edit">Edit</a>
                            <button class="btn btn-delete">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Table Section 1 -->
        <div class="section">
            <div class="section-header">
                <div></div>
                <button class="add-btn">+ Tambah Layanan</button>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Fitur</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Penjemputan Malang (Pulang Pergi)</td>
                            <td>Layanan penjemputan dari dan ke Malang untuk kemudahan perjalanan Anda</td>
                            <td><span class="type-badge type-paket"><i class="fas fa-star"></i> Paket</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Driver, BBM, Parkir</td>
                            <td>Driver berpengalaman, bensin bahan bakar, dan biaya parkir sudah termasuk</td>
                            <td><span class="type-badge type-paket"><i class="fas fa-star"></i> Paket</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>JEEP Bromo</td>
                            <td>Kendaraan jeep khusus untuk menjelajahi medan Bromo yang menantang</td>
                            <td><span class="type-badge type-paket"><i class="fas fa-star"></i> Paket</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiket Masuk Bromo</td>
                            <td>Tiket masuk ke kawasan Taman Nasional Bromo Tengger Semeru</td>
                            <td><span class="type-badge type-paket"><i class="fas fa-star"></i> Paket</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Table Section 2 -->
        <div class="section">
            <div class="section-header">
                <div></div>
                <button class="add-btn">+ Tambah Wisatloka</button>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Fitur</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sunrise Point</td>
                            <td>Saksikan matahari terbit yang spektakular dari puncak Penanjakan dengan pemandangan Gunung Bromo yang memukau.</td>
                            <td><img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Sunrise Point" class="package-thumbnail"></td>
                            <td><span class="type-badge type-panorama"><i class="fas fa-mountain"></i> Panorama</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Widodaren</td>
                            <td>Titik tertinggi untuk menyaksikan panorama lengkap Bromo dengan view 360 derajat yang menakjubkan.</td>
                            <td><img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Widodaren" class="package-thumbnail"></td>
                            <td><span class="type-badge type-panorama"><i class="fas fa-mountain"></i> Panorama</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Pasir Berbisik</td>
                            <td>Rasakan sensasi unik berjalan di hamparan pasir vulkanik yang menggelitik suara berbisik saat tertiup angin.</td>
                            <td><img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Pasir Berbisik" class="package-thumbnail"></td>
                            <td><span class="type-badge type-panorama"><i class="fas fa-mountain"></i> Panorama</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kawah Bromo</td>
                            <td>Jelajahi kawah aktif Bromo dan rasakan pengalaman mendebarkan melihat aktivitas vulkanik dari dekat.</td>
                            <td><img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Kawah Bromo" class="package-thumbnail"></td>
                            <td><span class="type-badge type-panorama"><i class="fas fa-mountain"></i> Panorama</span></td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-sm">Aktif</button>
                                    <button class="btn btn-edit btn-sm">Edit</button>
                                    <button class="btn btn-delete btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Button interactions
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (this.textContent.includes('Tambah')) {
                    alert('Fungsi tambah akan membuka form baru');
                } else if (this.textContent.includes('Edit')) {
                    alert('Fungsi edit untuk: ' + this.closest('tr')?.cells[0]?.textContent || 'item ini');
                } else if (this.textContent.includes('Hapus')) {
                    if (confirm('Yakin ingin menghapus item ini?')) {
                        alert('Item berhasil dihapus');
                    }
                } else if (this.textContent.includes('Aktif')) {
                    alert('Status berhasil diubah');
                }
            });
        });
    </script>

@endsection