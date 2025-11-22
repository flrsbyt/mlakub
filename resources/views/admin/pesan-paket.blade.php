@extends('admin.layouts.app')

@section('title', 'Pesan Paket')
@section('page-title', 'PESAN PAKET')
@section('page-subtitle', 'Kelola pemesanan paket wisata bromo dan pelanggan')

@section('content')

<!-- Stats Cards -->
<div class="stats-container" id="statsContainer">
  <div class="stat-card">
    <div class="stat-number" id="totalPemesanan">{{ $stat['total'] ?? 0 }}</div>
    <div class="stat-label">Total Pemesanan</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="menungguKonfirmasi">{{ $stat['menunggu'] ?? 0 }}</div>
    <div class="stat-label">Menunggu Konfirmasi</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="dikonfirmasi">{{ $stat['dikonfirmasi'] ?? 0 }}</div>
    <div class="stat-label">Dikonfirmasi</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="dibatalkan">{{ $stat['dibatalkan'] ?? 0 }}</div>
    <div class="stat-label">Dibatalkan</div>
  </div>
</div>

<!-- Filter Bar -->
<form class="filter-bar" id="filterForm" method="GET" action="{{ route('admin.pesan-paket') }}">
  <div class="filter-group">
    <label>Status</label>
    <select class="filter-input" name="status">
      <option value="semua">Semua Status</option>
      @foreach(['menunggu','dikonfirmasi','selesai','dibatalkan'] as $s)
        <option value="{{ $s }}" {{ request('status')===$s?'selected':'' }}>{{ ucfirst($s) }}</option>
      @endforeach
    </select>
  </div>
  
  <div class="filter-group">
    <label>Paket</label>
    <select class="filter-input" name="paket">
      <option value="semua">Semua Paket</option>
      @foreach($paketList as $p)
        <option value="{{ $p }}" {{ request('paket')===$p?'selected':'' }}>{{ $p }}</option>
      @endforeach
    </select>
  </div>
  
  <div class="filter-group">
    <label>Tanggal Dari</label>
    <input type="date" class="filter-input" name="dari" value="{{ request('dari') }}">
  </div>
  
  <div class="filter-group">
    <label>Tanggal Sampai</label>
    <input type="date" class="filter-input" name="sampai" value="{{ request('sampai') }}">
  </div>
  
  <div style="display:flex; gap:10px; align-items:flex-end;">
    <button class="filter-btn" type="submit">Filter</button>
    <a href="{{ route('admin.pesan-paket') }}" class="filter-btn" style="background:#6c757d; text-decoration:none;">Reset</a>
  </div>
</form>

<!-- Table Container -->
<div class="table-container">
  <div class="table-header">
    <div class="table-title">Daftar Pemesanan Paket</div>
    <div class="table-info">📊 Total {{ $pemesanan->total() }} pemesanan 📈 Pembayaran Rp {{ number_format($sumPembayaran,0,',','.') }}</div>
  </div>
  
  <table class="data-table" id="bookingTable">
    <thead>
      <tr>
        <th>PELANGGAN</th>
        <th>PAKET WISATA</th>
        <th>TANGGAL KEBERANGKATAN</th>
        <th>PESERTA</th>
        <th>STATUS</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody id="bookingTableBody">
      @forelse($pemesanan as $row)
        <tr>
          <td>
            <div class="customer-info">
              <div class="customer-avatar">{{ strtoupper(substr(optional($row->user)->username ?? 'U',0,1)) }}</div>
              <div class="customer-details">
                <h4>{{ optional($row->user)->username ?? '-' }}</h4>
                <p>{{ optional($row->user)->nomor_hp ? '+62 ' . optional($row->user)->nomor_hp : '' }}</p>
              </div>
            </div>
          </td>
          <td>
            <div class="package-info">
              <span class="package-icon">🌄</span>
              <div class="package-details">
                <h4>{{ $row->paket }}</h4>
                <p class="price">Rp {{ number_format($row->total,0,',','.') }}</p>
              </div>
            </div>
          </td>
          <td>
            <div>
              <strong>{{ \Carbon\Carbon::parse($row->tanggal_keberangkatan)->translatedFormat('d F Y') }}</strong><br>
              <small style="color:#666;">&nbsp;</small>
            </div>
          </td>
          <td>
            <div style="text-align:center;">
              <strong>{{ $row->peserta }}</strong><br>
              <small style="color:#666;">orang</small>
            </div>
          </td>
          <td>
            @php
              $badge = 'status-menunggu';
              if($row->status==='dikonfirmasi') $badge='status-dikonfirmasi';
              elseif($row->status==='dibatalkan') $badge='status-dibatalkan';
            @endphp
            <span class="status-badge {{ $badge }}">{{ strtoupper($row->status) }}</span>
          </td>
          <td>
            <div class="action-buttons">
              <form method="POST" action="{{ route('admin.pemesanan.status',$row) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="dikonfirmasi">
                <button class="action-btn btn-confirm" type="submit">KONFIRMASI</button>
              </form>
              <form method="POST" action="{{ route('admin.pemesanan.status',$row) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="dibatalkan">
                <button class="action-btn btn-cancel" type="submit">TOLAK</button>
              </form>
              <form method="POST" action="{{ route('admin.pemesanan.destroy',$row) }}" onsubmit="return confirm('Hapus pemesanan ini?')">
                @csrf
                @method('DELETE')
                <button class="action-btn btn-detail" type="submit">HAPUS</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" style="text-align:center; color:#666;">Belum ada pemesanan.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<style>
  /* ===== CSS UNTUK ISI/CONTENT ===== */
  .content {
    padding: 0;
    background-color: #f8f9fa;
    overflow-y: auto;
    min-height: 100vh;
  }
  
  
  /* Stats Cards */
  .stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 30px;
  }
  
  .stat-card {
    background: white;
    padding: 25px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    text-align: center;
    transition: transform 0.3s ease;
    border-left: 4px solid #FE9C03;
  }
  
  .stat-card:hover {
    transform: translateY(-5px);
  }
  
  .stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
  }
  
  .stat-label {
    color: #666;
    font-size: 13px;
    font-weight: 500;
  }
  
  /* Filter Bar */
  .filter-bar {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }
  
  .filter-group label {
    font-size: 12px;
    color: #666;
    font-weight: 500;
  }
  
  .filter-input {
    padding: 8px 12px;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    font-size: 14px;
    min-width: 120px;
  }
  
  .filter-btn {
    background: #FE9C03;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    margin-top: 20px;
  }
  
  .filter-btn:hover {
    background: #e88a02;
  }
  
  /* Table Container */
  .table-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    overflow: hidden;
  }
  
  .table-header {
    background: linear-gradient(135deg, #FE9C03 0%, #ff8c00 100%);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .table-title {
    font-size: 16px;
    font-weight: 600;
  }
  
  .table-info {
    font-size: 14px;
    opacity: 0.9;
  }
  
  /* Table */
  .data-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .data-table th {
    background: #f8f9fa;
    padding: 12px 15px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #666;
    text-transform: uppercase;
    border-bottom: 1px solid #e9ecef;
  }
  
  .data-table td {
    padding: 15px;
    border-bottom: 1px solid #f1f3f4;
    font-size: 14px;
  }
  
  .data-table tbody tr:hover {
    background: #f8f9fa;
  }
  
  /* Customer Info */
  .customer-info {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  
  .customer-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #FE9C03;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 14px;
  }
  
  .customer-details h4 {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 2px;
  }
  
  .customer-details p {
    font-size: 12px;
    color: #666;
  }
  
  /* Package Info */
  .package-info {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .package-icon {
    font-size: 16px;
  }
  
  .package-details h4 {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 2px;
  }
  
  .package-details p {
    font-size: 12px;
    color: #666;
  }
  
  /* Price */
  .price {
    font-weight: 600;
    color: #FE9C03;
  }
  
  /* Status Badges */
  .status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
  }
  
  .status-menunggu {
    background: #fff3cd;
    color: #856404;
  }
  
  .status-dikonfirmasi {
    background: #d1edff;
    color: #0c5460;
  }
  
  .status-dibatalkan {
    background: #f8d7da;
    color: #721c24;
  }
  
  /* Action Buttons */
  .action-buttons {
    display: flex;
    gap: 8px;
  }
  
  .action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .btn-confirm {
    background: #28a745;
    color: white;
  }
  
  .btn-confirm:hover {
    background: #218838;
  }
  
  .btn-cancel {
    background: #dc3545;
    color: white;
  }
  
  .btn-cancel:hover {
    background: #c82333;
  }
  
  .btn-detail {
    background: #6c757d;
    color: white;
  }
  
  .btn-detail:hover {
    background: #545b62;
  }
  
  .btn-chat {
    background: #17a2b8;
    color: white;
  }
  
  .btn-chat:hover {
    background: #138496;
  }
  
  .btn-invoice {
    background: #fd7e14;
    color: white;
  }
  
  .btn-invoice:hover {
    background: #e66a00;
  }
  
  /* Responsive */
  @media (max-width: 768px) {
    .content {
      padding: 15px;
    }
    
    .header-bar {
      flex-direction: column;
      gap: 15px;
    }
    
    .search-container {
      width: 100%;
    }
    
    .stats-container {
      grid-template-columns: 1fr;
    }
    
    .filter-bar {
      flex-direction: column;
      align-items: stretch;
    }
    
    .filter-group {
      width: 100%;
    }
    
    .data-table {
      font-size: 12px;
    }
    
    .data-table th,
    .data-table td {
      padding: 8px;
    }
  }
</style>

<script>
  (function(){
    const form = document.getElementById('filterForm');
    if(!form) return;
    const status = form.querySelector('select[name="status"]');
    const paket = form.querySelector('select[name="paket"]');
    const dari = form.querySelector('input[name="dari"]');
    const sampai = form.querySelector('input[name="sampai"]');

    function validDateRange(){
      if(dari && sampai && dari.value && sampai.value){
        if(new Date(dari.value) > new Date(sampai.value)){
          alert('Tanggal Dari tidak boleh lebih besar dari Tanggal Sampai');
          return false;
        }
      }
      return true;
    }

    form.addEventListener('submit', function(e){ if(!validDateRange()) { e.preventDefault(); }});
    if(status) status.addEventListener('change', ()=> form.submit());
    if(paket) paket.addEventListener('change', ()=> form.submit());
    if(dari) dari.addEventListener('change', ()=> { if(validDateRange()) form.submit(); });
    if(sampai) sampai.addEventListener('change', ()=> { if(validDateRange()) form.submit(); });
  })();
</script>
@endsection

