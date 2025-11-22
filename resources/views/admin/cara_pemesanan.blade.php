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
                <button type="button" class="add-btn" id="addRowBtn">+ Tambah cara pemesanan</button>
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
                    <tbody id="stepsTbody">
                        <!-- Static Create Row (hidden by default) -->
                        <tr id="createRow" style="display:none;">
                            <td>
                                <style>
                                    .form-grid { display:grid; grid-template-columns: 1fr 220px; gap:12px; align-items:start; }
                                    .input, .select, .textarea { width:100%; padding:10px 12px; border:1px solid #e5e7eb; border-radius:10px; font-size:14px; background:#fff; }
                                    .input:focus, .select:focus, .textarea:focus { outline:none; border-color:#ff9500; box-shadow:0 0 0 3px rgba(255,149,0,0.1); }
                                    .textarea { min-height:90px; resize:vertical; font-size:14px; color:#374151; line-height:1.55; font-weight:500; }
                                    .field { display:flex; flex-direction:column; gap:6px; }
                                    .label { font-size:12px; color:#6b7280; font-weight:600; }
                                    .icon-picker { display:flex; gap:10px; align-items:center; }
                                    .actions { display:flex; gap:8px; margin-top:4px; }
                                    .number-badge { display:inline-flex; align-items:center; justify-content:center; font-weight:800; font-size:12px; color:#FE9C03; background:rgba(254,156,3,.08); border:2px solid rgba(254,156,3,.25); border-radius:9999px; width:34px; height:34px; }
                                    .title-wrap { display:flex; align-items:center; gap:10px; }
                                </style>
                                <form action="{{ route('admin.cara-pemesanan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="aktif">
                                    <input type="hidden" name="urutan" value="{{ ($langkah->count() ?? 0) + 1 }}">
                                    <div class="form-grid">
                                        <div class="field">
                                            <div class="title-wrap"><span class="number-badge" id="createNumberPreview">{{ str_pad(($langkah->count() ?? 0) + 1, 2, '0', STR_PAD_LEFT) }}</span><span class="label">Judul</span></div>
                                            <input class="input" type="text" name="judul" placeholder="Contoh: Kunjungi Website" required>
                                        </div>
                                        <div class="field">
                                            <span class="label">Icon</span>
                                            <select class="select" name="ikon">
                                                <option value="fas fa-globe" selected>fa-globe</option>
                                                <option value="fas fa-map">fa-map</option>
                                                <option value="fas fa-calendar">fa-calendar</option>
                                                <option value="fas fa-clipboard-check">fa-clipboard-check</option>
                                                <option value="fas fa-credit-card">fa-credit-card</option>
                                                <option value="fas fa-star">fa-star</option>
                                            </select>
                                        </div>
                                        <div class="field">
                                            <span class="label">Urutan</span>
                                            <input class="input" type="number" id="createOrderInput" name="urutan" min="1" value="{{ ($langkah->count() ?? 0) + 1 }}" required>
                                        </div>
                                        <div class="field" style="grid-column: 1 / -1;">
                                            <span class="label">Deskripsi</span>
                                            <textarea class="textarea" name="deskripsi" placeholder="Tulis deskripsi singkat langkah ini" required></textarea>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button type="submit" class="add-btn">Simpan</button>
                                        <button type="button" class="btn btn-delete" id="cancelCreateStatic">Hapus</button>
                                    </div>
                                </form>
                                <script>
                                    (function(){
                                        const input = document.getElementById('createOrderInput');
                                        const badge = document.getElementById('createNumberPreview');
                                        if (input && badge) {
                                            input.addEventListener('input', function(){
                                                let v = parseInt(this.value || '1', 10);
                                                if (isNaN(v) || v < 1) v = 1;
                                                const pad = v.toString().padStart(2, '0');
                                                badge.textContent = pad;
                                            });
                                        }
                                    })();
                                </script>
                            </td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td></td>
                        </tr>
                        @forelse(($langkah ?? []) as $row)
                        <tr>
                            <td>
                                <div class="title-wrap"><span class="number-badge">{{ str_pad($row->urutan, 2, '0', STR_PAD_LEFT) }}</span><span class="step-title">{{ $row->judul }}</span></div>
                                <div style="color:#4b5563; font-size:13.5px; line-height:1.6; margin-top:4px;">{{ \Illuminate\Support\Str::limit($row->deskripsi, 120) }}</div>
                                <details style="margin-top:6px;">
                                    <summary style="cursor:pointer; color:#ff9500;">Edit</summary>
                                    <form action="{{ route('admin.cara-pemesanan.update', $row->id) }}" method="POST" style="margin-top:8px;">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-grid">
                                            <div class="field">
                                                <span class="label">Judul</span>
                                                <input class="input" type="text" name="judul" value="{{ $row->judul }}" required>
                                            </div>
                                            <div class="field">
                                                <span class="label">Icon</span>
                                                <select class="select" name="ikon">
                                                    <option value="">Pilih Icon</option>
                                                    <option value="fas fa-globe" {{ $row->ikon==='fas fa-globe'?'selected':'' }}>fa-globe</option>
                                                    <option value="fas fa-map" {{ $row->ikon==='fas fa-map'?'selected':'' }}>fa-map</option>
                                                    <option value="fas fa-calendar" {{ $row->ikon==='fas fa-calendar'?'selected':'' }}>fa-calendar</option>
                                                    <option value="fas fa-clipboard-check" {{ $row->ikon==='fas fa-clipboard-check'?'selected':'' }}>fa-clipboard-check</option>
                                                    <option value="fas fa-credit-card" {{ $row->ikon==='fas fa-credit-card'?'selected':'' }}>fa-credit-card</option>
                                                    <option value="fas fa-star" {{ $row->ikon==='fas fa-star'?'selected':'' }}>fa-star</option>
                                                </select>
                                            </div>
                                            <div class="field" style="grid-column: 1 / -1;">
                                                <span class="label">Deskripsi</span>
                                                <textarea class="textarea" name="deskripsi" required>{{ $row->deskripsi }}</textarea>
                                            </div>
                                            <div class="field">
                                                <span class="label">Urutan</span>
                                                <input class="input" type="number" name="urutan" min="1" value="{{ $row->urutan }}" required>
                                            </div>
                                            <div class="field">
                                                <span class="label">Status</span>
                                                <select class="select" name="status" required>
                                                    <option value="aktif" {{ $row->status==='aktif'?'selected':'' }}>Aktif</option>
                                                    <option value="nonaktif" {{ $row->status==='nonaktif'?'selected':'' }}>Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <button type="submit" class="add-btn">Simpan</button>
                                        </div>
                                    </form>
                                    
                                </details>
                            </td>
                            <td>
                                <span class="status-badge {{ $row->status==='aktif' ? 'status-aktif' : '' }}">{{ ucfirst($row->status) }}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <form action="{{ route('admin.cara-pemesanan.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus langkah ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr id="emptyRow">
                            <td colspan="3" style="text-align:center; color:#6b7280;">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const addBtn = document.getElementById('addRowBtn');
            const createRow = document.getElementById('createRow');
            const emptyRow = document.getElementById('emptyRow');
            const cancelCreate = document.getElementById('cancelCreateStatic');

            if (addBtn && createRow) {
                addBtn.addEventListener('click', function(){
                    createRow.style.display = 'table-row';
                    if (emptyRow) emptyRow.style.display = 'none';
                });
            }
            if (cancelCreate && createRow) {
                cancelCreate.addEventListener('click', function(){
                    createRow.style.display = 'none';
                    // Jika tidak ada data lain (hanya createRow tersembunyi), tampilkan emptyRow
                    const hasDataRow = document.querySelectorAll('#stepsTbody tr').length > 1; // termasuk createRow
                    if (!hasDataRow && emptyRow) emptyRow.style.display = 'table-row';
                });
            }
        });
    </script>

@endsection