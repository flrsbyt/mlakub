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
    <div class="table-title">
      Daftar Pemesanan Paket
      @if(($stat['menunggu'] ?? 0) > 0)
        <span style="margin-left:10px; background:#fff; color:#FE9C03; border-radius:999px; padding:4px 10px; font-size:12px; border:1px solid #FE9C03; display:inline-flex; align-items:center; gap:6px;">
          <i class="fas fa-bell"></i>
          <span>{{ $stat['menunggu'] }} pesanan menunggu konfirmasi</span>
        </span>
      @endif
    </div>
    <div class="table-info">📊 Total {{ $pemesanan->total() }} pemesanan 📈 Pembayaran Rp {{ number_format($sumPembayaran,0,',','.') }}</div>
  </div>
  
  <table class="data-table" id="bookingTable">
    <thead>
      <tr>
        <th>PELANGGAN</th>
        <th>PAKET WISATA</th>
        <th>TANGGAL KEBERANGKATAN</th>
        <th>PESERTA</th>
        <th>METODE BAYAR</th>
        <th>STATUS</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody id="bookingTableBody">
      @forelse($pemesanan as $row)
        @php
          $defaultMeetingPoint = 'Perum Tunggul Ametung Inside Blok B1';
          $lowerPaket = strtolower($row->paket);
          if (str_contains($lowerPaket, 'daily trip') || str_contains($lowerPaket, 'travel to malang')) {
            $displayTitik = $defaultMeetingPoint;
          } else {
            $displayTitik = $row->titik_penjemputan ?? '-';
          }
        @endphp
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
              <small style="color:#666;">
                Titik jemput:
                {{ $displayTitik }}
              </small>
            </div>
          </td>
          <td>
            <div style="text-align:center;">
              <strong>{{ $row->peserta }}</strong><br>
              <small style="color:#666;">orang</small>
            </div>
          </td>
          <td>
            {{ $row->metode_pembayaran ?? '-' }}
          </td>
          <td>
            @php
              $statusText = [
                'menunggu' => 'Menunggu Konfirmasi',
                'menunggu_pembayaran' => 'Menunggu Pembayaran',
                'aktif' => 'Aktif',
                'selesai' => 'Selesai',
                'dikonfirmasi' => 'Dikonfirmasi',
                'dibatalkan' => 'Dibatalkan'
              ];
              $badge = 'status-menunggu';
              if($row->status==='menunggu_pembayaran') $badge='status-menunggu-pembayaran';
              elseif($row->status==='aktif') $badge='status-aktif';
              elseif($row->status==='selesai') $badge='status-selesai';
              elseif($row->status==='dikonfirmasi') $badge='status-dikonfirmasi';
              elseif($row->status==='dibatalkan') $badge='status-dibatalkan';
            @endphp
            <span class="status-badge {{ $badge }}">
              @if($row->status === 'menunggu' || $row->status === 'menunggu_pembayaran')
                <i class="fas fa-clock"></i>
              @elseif($row->status === 'aktif' || $row->status === 'dikonfirmasi')
                <i class="fas fa-check-circle"></i>
              @elseif($row->status === 'dibatalkan')
                <i class="fas fa-times-circle"></i>
              @elseif($row->status === 'selesai')
                <i class="fas fa-check-circle"></i>
              @endif
              {{ $statusText[$row->status] ?? ucfirst($row->status) }}
            </span>
          </td>
          <td>
            <div class="action-buttons">
              @if($row->status === 'menunggu')
                {{-- Baru dipesan, admin hanya bisa konfirmasi atau tolak --}}
                <form method="POST" action="{{ route('admin.pemesanan.status',$row) }}" onsubmit="return confirm('Konfirmasi pemesanan ini?')">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="dikonfirmasi">
                  <button class="action-btn btn-confirm" type="submit" title="Konfirmasi">
                    <i class="fas fa-check"></i>
                    <span>Konfirmasi</span>
                  </button>
                </form>
                <form method="POST" action="{{ route('admin.pemesanan.status',$row) }}" onsubmit="return confirm('Tolak pemesanan ini?')">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="dibatalkan">
                  <button class="action-btn btn-cancel" type="submit" title="Tolak">
                    <i class="fas fa-times"></i>
                    <span>Tolak</span>
                  </button>
                </form>
              @elseif($row->status === 'dikonfirmasi')
                {{-- Sudah dikonfirmasi, menunggu / setelah pembayaran, admin bisa menandai selesai --}}
                <form method="POST" action="{{ route('admin.pemesanan.status',$row) }}" onsubmit="return confirm('Tandai pemesanan ini sebagai selesai?')">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="selesai">
                  <button class="action-btn btn-confirm" type="submit" title="Selesai">
                    <i class="fas fa-check-double"></i>
                    <span>Selesai</span>
                  </button>
                </form>
              @endif

              {{-- Tombol hapus tersedia di semua status --}}
              <form method="POST" action="{{ route('admin.pemesanan.destroy',$row) }}" onsubmit="return confirm('Hapus pemesanan ini?')">
                @csrf
                @method('DELETE')
                <button class="action-btn btn-detail" type="submit" title="Hapus">
                  <i class="fas fa-trash"></i>
                </button>
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
  
  /* Status Badges - samakan gaya dengan badge di halaman testimoni */
  .table-container .data-table tbody td .status-badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    min-width: 80px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    text-transform: none;
  }

  .table-container .data-table tbody td .status-badge i {
    font-size: 12px;
  }

  .table-container .data-table tbody td .status-menunggu,
  .table-container .data-table tbody td .status-menunggu-pembayaran {
    background-color: #fff3cd;
    color: #856404;
  }

  .table-container .data-table tbody td .status-aktif,
  .table-container .data-table tbody td .status-dikonfirmasi {
    background-color: #d4edda;
    color: #155724;
  }

  .table-container .data-table tbody td .status-dibatalkan {
    background-color: #f8d7da;
    color: #721c24;
  }

  .table-container .data-table tbody td .status-selesai {
    background-color: #d1ecf1;
    color: #0c5460;
  }
  
  /* Action Buttons */
  .action-buttons {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
  }
  
  .action-btn {
    padding: 4px 12px;
    border: 1px solid transparent;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    text-transform: none;
    letter-spacing: 0.3px;
  }
  
  .action-btn i {
    font-size: 12px;
  }
  
  .btn-confirm {
    background-color: #f0fdf4;
    color: #16a34a;
    border-color: #bbf7d0;
  }
  
  .btn-confirm:hover {
    background-color: #dcfce7;
  }
  
  .btn-cancel {
    background-color: #fef2f2;
    color: #dc2626;
    border-color: #fecaca;
  }
  
  .btn-cancel:hover {
    background-color: #fee2e2;
  }
  
  .btn-detail {
    background-color: #eff6ff;
    color: #2563eb;
    border-color: #bfdbfe;
  }
  
  .btn-detail:hover {
    background-color: #dbeafe;
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

