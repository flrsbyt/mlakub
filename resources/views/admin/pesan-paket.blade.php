@extends('admin.layouts.app')

@section('title', 'Pesan Paket')
@section('page-title', 'PESAN PAKET')
@section('page-subtitle', 'Kelola pemesanan paket wisata bromo dan pelanggan')

@section('content')

<!-- Stats Cards -->
<div class="stats-container" id="statsContainer">
  <div class="stat-card">
    <div class="stat-number" id="totalPemesanan">24</div>
    <div class="stat-label">Total Pemesanan</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="menungguKonfirmasi">10</div>
    <div class="stat-label">Menunggu Konfirmasi</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="dikonfirmasi">13</div>
    <div class="stat-label">Dikonfirmasi</div>
  </div>
  
  <div class="stat-card">
    <div class="stat-number" id="dibatalkan">1</div>
    <div class="stat-label">Dibatalkan</div>
  </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
  <div class="filter-group">
    <label>Status</label>
    <select class="filter-input" id="filterStatus">
      <option value="">Semua Status</option>
      <option value="menunggu">Menunggu</option>
      <option value="dikonfirmasi">Dikonfirmasi</option>
      <option value="dibatalkan">Dibatalkan</option>
    </select>
  </div>
  
  <div class="filter-group">
    <label>Paket</label>
    <select class="filter-input" id="filterPaket">
      <option value="">Semua Paket</option>
      <option value="bromo-midnight">Bromo Midnight</option>
      <option value="sunrise-tour">Sunrise Tour</option>
      <option value="bromo-ijen">Bromo Ijen</option>
    </select>
  </div>
  
  <div class="filter-group">
    <label>Tanggal Dari</label>
    <input type="date" class="filter-input" id="filterDateFrom">
  </div>
  
  <div class="filter-group">
    <label>Tanggal Sampai</label>
    <input type="date" class="filter-input" id="filterDateTo">
  </div>
  
  <button class="filter-btn" onclick="applyFilter()">Filter</button>
</div>

<!-- Table Container -->
<div class="table-container">
  <div class="table-header">
    <div class="table-title">Daftar Pemesanan Paket</div>
    <div class="table-info">📊 Total 3 pemesanan 📈 Pembayaran Rp 12.500.000</div>
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
      <!-- Data akan diisi oleh JavaScript -->
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
  // ===== DATA PEMESANAN (CONTOH) =====
  const bookingData = [
    {
      id: 1,
      customer: {
        name: 'Ahmad Yusuf',
        phone: '📱 +62 812 3456 7890',
        avatar: 'A'
      },
      package: {
        name: 'Paket Bromo Ijen WNA',
        icon: '🌄',
        price: 'Rp 1.500.000'
      },
      date: '25 Agustus 2025',
      time: '02:00 - 10:00',
      participants: 4,
      status: 'menunggu'
    },
    {
      id: 2,
      customer: {
        name: 'Siti Rahma',
        phone: '📱 +62 813 9876 5432',
        avatar: 'S'
      },
      package: {
        name: 'Daily Trip Bromo Sunrise',
        icon: '🌅',
        price: 'Rp 2.800.000'
      },
      date: '01 September 2025',
      time: '03:00 - 11:00',
      participants: 6,
      status: 'dikonfirmasi'
    },
    {
      id: 3,
      customer: {
        name: 'Budi Santoso',
        phone: '📱 +62 814 1122 3344',
        avatar: 'B'
      },
      package: {
        name: 'Trip Bromo Sunrise',
        icon: '🏔️',
        price: 'Rp 6.200.000'
      },
      date: '15 September 2025',
      time: '01:00 - 16:00',
      participants: 8,
      status: 'dibatalkan'
    }
  ];
  
  // ===== FUNGSI UNTUK RENDER TABLE =====
  function renderBookingTable(data = bookingData) {
    const tbody = document.getElementById('bookingTableBody');
    tbody.innerHTML = '';
    
    data.forEach(booking => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>
          <div class="customer-info">
            <div class="customer-avatar">${booking.customer.avatar}</div>
            <div class="customer-details">
              <h4>${booking.customer.name}</h4>
              <p>${booking.customer.phone}</p>
            </div>
          </div>
        </td>
        <td>
          <div class="package-info">
            <span class="package-icon">${booking.package.icon}</span>
            <div class="package-details">
              <h4>${booking.package.name}</h4>
              <p class="price">${booking.package.price}</p>
            </div>
          </div>
        </td>
        <td>
          <div>
            <strong>${booking.date}</strong><br>
            <small style="color: #666;">${booking.time}</small>
          </div>
        </td>
        <td>
          <div style="text-align: center;">
            <strong>${booking.participants}</strong><br>
            <small style="color: #666;">orang</small>
          </div>
        </td>
        <td>
          <span class="status-badge status-${booking.status}">
            ${booking.status.toUpperCase()}
          </span>
        </td>
        <td>
          <div class="action-buttons">
            ${getActionButtons(booking)}
          </div>
        </td>
      `;
      tbody.appendChild(row);
    });
  }
  
  // ===== FUNGSI UNTUK ACTION BUTTONS =====
  function getActionButtons(booking) {
    switch(booking.status) {
      case 'menunggu':
        return `
          <button class="action-btn btn-confirm" onclick="confirmBooking(${booking.id})">KONFIRMASI</button>
          <button class="action-btn btn-cancel" onclick="cancelBooking(${booking.id})">TOLAK</button>
        `;
      case 'dikonfirmasi':
        return `
          <button class="action-btn btn-detail" onclick="viewDetail(${booking.id})">DETAIL</button>
          <button class="action-btn btn-chat" onclick="openChat(${booking.id})">CHAT</button>
        `;
      case 'dibatalkan':
        return `
          <button class="action-btn btn-detail" onclick="viewDetail(${booking.id})">DETAIL</button>
          <button class="action-btn btn-invoice" onclick="viewInvoice(${booking.id})">INVOICE</button>
        `;
    }
  }
  
  // ===== FUNGSI UNTUK UPDATE STATISTIK =====
  function updateStats() {
    const total = bookingData.length;
    const menunggu = bookingData.filter(b => b.status === 'menunggu').length;
    const dikonfirmasi = bookingData.filter(b => b.status === 'dikonfirmasi').length;
    const dibatalkan = bookingData.filter(b => b.status === 'dibatalkan').length;
    
    document.getElementById('totalPemesanan').textContent = total;
    document.getElementById('menungguKonfirmasi').textContent = menunggu;
    document.getElementById('dikonfirmasi').textContent = dikonfirmasi;
    document.getElementById('dibatalkan').textContent = dibatalkan;
  }
  
  // ===== ACTION FUNCTIONS =====
  function confirmBooking(id) {
    const booking = bookingData.find(b => b.id === id);
    if (booking) {
      booking.status = 'dikonfirmasi';
      renderBookingTable();
      updateStats();
      alert(`Pemesanan ${booking.customer.name} telah dikonfirmasi!`);
    }
  }
  
  function cancelBooking(id) {
    const booking = bookingData.find(b => b.id === id);
    if (booking && confirm('Yakin ingin menolak pemesanan ini?')) {
      booking.status = 'dibatalkan';
      renderBookingTable();
      updateStats();
      alert(`Pemesanan ${booking.customer.name} telah ditolak!`);
    }
  }
  
  function viewDetail(id) {
    alert(`Melihat detail pemesanan ID: ${id}`);
  }
  
  function openChat(id) {
    alert(`Membuka chat dengan pelanggan ID: ${id}`);
  }
  
  function viewInvoice(id) {
    alert(`Melihat invoice pemesanan ID: ${id}`);
  }
  
  // ===== FILTER FUNCTION =====
  function applyFilter() {
    const statusFilter = document.getElementById('filterStatus').value;
    const paketFilter = document.getElementById('filterPaket').value;
    
    let filteredData = bookingData;
    
    if (statusFilter) {
      filteredData = filteredData.filter(b => b.status === statusFilter);
    }
    
    if (paketFilter) {
      filteredData = filteredData.filter(b => 
        b.package.name.toLowerCase().includes(paketFilter.toLowerCase())
      );
    }
    
    renderBookingTable(filteredData);
  }
  
  // ===== SEARCH FUNCTION (using admin header search) =====
  // Search functionality can be implemented here if needed
  
  // ===== INITIALIZE =====
  document.addEventListener('DOMContentLoaded', function() {
    renderBookingTable();
    updateStats();
  });
</script>
@endsection

