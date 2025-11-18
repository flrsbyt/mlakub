@extends('admin.layouts.app')
@section('title', 'Cara Pemesanan')
@section('page-title', 'Panduan Cara Pemesanan')
@section('page-subtitle', 'Ikuti langkah-langkah berikut untuk melakukan pemesanan dengan mudah dan cepat')
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
        
        .action-buttons {
            display: flex;
            gap: 6px;
        }
        
        .btn {
            padding: 4px 8px;
            border: none;
            border-radius: 6px;
            font-size: 11px;
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
        
        .step-title {
            font-weight: 600;
            color: #333;
            line-height: 1.4;
        }
        
        @media (max-width: 768px) {
            .page-content {
                padding: 16px;
            }
            
            .section {
                padding: 16px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }
            
            .table-container {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 8px 12px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
        }
    </style>

    <div class="page-content">
        <!-- Cara Pemesanan Table Section -->
        <div class="section">
            <div class="section-header">
                <div></div>
                <button class="add-btn">+ Tambah cara pemesanan</button>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="step-title">Mencari Website kami "Malukubromo.id.com"</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="step-title">Memilih Tanggal keberangkatan</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="step-title">Pilih Paket Tour yang ingin anda booking</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="step-title">Konfirmasi booking melalui WhatsApp</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="step-title">JEEP Bromo</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="step-title">Nikmati Perjalanan Anda</div>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-edit">Edit</button>
                                    <button class="btn btn-delete">Hapus</button>
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
                    alert('Fungsi edit untuk: ' + this.closest('tr')?.cells[0]?.textContent?.trim() || 'item ini');
                } else if (this.textContent.includes('Hapus')) {
                    if (confirm('Yakin ingin menghapus item ini?')) {
                        alert('Item berhasil dihapus');
                    }
                }
            });
        });
    </script>

@endsection