@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', '')

@section('content')
<div class="content">


  <!-- Stats Cards -->
  <div class="stats-container" id="statsContainer">
    <div class="stat-card visitors-card">
      <div class="stat-icon">
        <i class="fas fa-chart-line"></i>
      </div>
      <div class="stat-info">
        <div class="stat-number" id="totalVisitors">150</div>
        <div class="stat-label">Total Pengunjung</div>
        <div class="stat-trend positive">
          <i class="fas fa-arrow-up"></i>
          <span>+12% dari bulan lalu</span>
        </div>
      </div>
      <div class="stat-chart">
        <!-- <div class="mini-chart" data-values="20,25,30,28,35,40,38"></div> -->
      </div>
    </div>
    
    <div class="stat-card packages-card">
      <div class="stat-icon">
        <i class="fas fa-box"></i>
      </div>
      <div class="stat-info">
        <div class="stat-number" id="activePackages" data-target="{{ (int) ($activePackages ?? 0) }}">{{ number_format((int) ($activePackages ?? 0)) }}</div>
        <div class="stat-label">Paket Aktif</div>
        <div class="stat-trend positive">
          <i class="fas fa-plus"></i>
          <span>3 paket baru</span>
        </div>
      </div>
      <div class="stat-chart">
        <div class="mini-chart" data-values="1,2,3,4"></div>
      </div>
    </div>
    
    <div class="stat-card bookings-card">
      <div class="stat-icon">
        <i class="fas fa-calendar-check"></i>
      </div>
      <div class="stat-info">
        <div class="stat-number" id="monthlyBookings">{{ number_format((int) ($monthlyBookings ?? 0)) }}</div>
        <div class="stat-label">Booking Bulan Ini</div>
        <div class="stat-trend positive">
          <i class="fas fa-target"></i>
          <span>80% target tercapai</span>
        </div>
      </div>
      <div class="stat-chart">
        <div class="mini-chart" data-values="5,7,9,12,10,12,12"></div>
      </div>
    </div>

    <div class="stat-card revenue-card">
      <div class="stat-icon">
        <i class="fas fa-dollar-sign"></i>
      </div>
      <div class="stat-info">
        <div class="stat-number">Rp {{ number_format((int) ($monthlyRevenue ?? 0), 0, ',', '.') }}</div>
        <div class="stat-label">Revenue Bulan Ini</div>
        <div class="stat-trend positive">
          <i class="fas fa-arrow-up"></i>
          <span>+18% dari target</span>
        </div>
      </div>
      <div class="stat-chart">
        <div class="mini-chart" data-values="10,15,20,24.5,22,24.5,24.5"></div>
      </div>
    </div>
  </div>

  <!-- Main Dashboard Grid -->
  <div class="dashboard-grid">
    <div class="chart-container">
      <div class="chart-header">
        <div class="chart-title-section">
          <h3>Analisis Pengunjung Website</h3>
          <p class="chart-subtitle">Pantau performa website dan trend pengunjung dalam 30 hari terakhir dengan analisis mendalam dan prediksi.</p>
        </div>
        <div class="chart-controls">
          <select class="time-selector">
            <option value="7">7 Hari</option>
            <option value="30" selected>30 Hari</option>
            <option value="90">90 Hari</option>
          </select>
          <div class="export-dropdown">
            <button class="export-btn" onclick="toggleExportMenu()">
              <i class="fas fa-download"></i>
              Export
              <i class="fas fa-chevron-down"></i>
            </button>
            <div class="export-menu" id="exportMenu">
              <button onclick="exportToCSV()" class="export-option">
                <i class="fas fa-file-csv"></i>
                Export CSV
              </button>
              <button onclick="exportToPDF()" class="export-option">
                <i class="fas fa-file-pdf"></i>
                Export PDF
              </button>
              <button onclick="exportToImage()" class="export-option">
                <i class="fas fa-image"></i>
                Export PNG
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="chart-stats-mini">
        <div class="mini-stat">
          <span class="mini-stat-label">Rata-rata Harian</span>
          <span class="mini-stat-value">425 pengunjung</span>
        </div>
        <div class="mini-stat">
          <span class="mini-stat-label">Peak Time</span>
          <span class="mini-stat-value">14:00 - 16:00</span>
        </div>
        <div class="mini-stat">
          <span class="mini-stat-label">Bounce Rate</span>
          <span class="mini-stat-value">32.5%</span>
        </div>
      </div>

      <div class="chart-placeholder">
        <svg viewBox="0 0 1000 500" class="activity-chart" id="activityChart">
          <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" style="stop-color:#FE9C03;stop-opacity:0.4" />
              <stop offset="100%" style="stop-color:#FE9C03;stop-opacity:0.05" />
            </linearGradient>
            <filter id="glow">
              <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
              <feMerge> 
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
              </feMerge>
            </filter>
          </defs>
          
          <!-- Grid -->
          <g stroke="#e9ecef" stroke-width="2" opacity="0.5">
            <line x1="100" y1="100" x2="900" y2="100"/>
            <line x1="100" y1="150" x2="900" y2="150"/>
            <line x1="100" y1="200" x2="900" y2="200"/>
            <line x1="100" y1="250" x2="900" y2="250"/>
            <line x1="100" y1="300" x2="900" y2="300"/>
            <line x1="100" y1="350" x2="900" y2="350"/>
            <line x1="100" y1="400" x2="900" y2="400"/>
          </g>
          
          <!-- Main Chart Line -->
          <path d="M 100 400 Q 200 350 250 300 T 350 250 T 450 200 T 550 225 T 650 175 T 750 150 T 850 200" 
                stroke="#FE9C03" stroke-width="8" fill="none" filter="url(#glow)" stroke-linecap="round"/>
          
          <!-- Fill Area -->
          <path d="M 100 400 Q 200 350 250 300 T 350 250 T 450 200 T 550 225 T 650 175 T 750 150 T 850 200 L 850 450 L 100 450 Z" 
                fill="url(#gradient)"/>
          
          <!-- Data Points -->
          <circle cx="100" cy="400" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="250" cy="300" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="350" cy="250" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="450" cy="200" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="550" cy="225" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="650" cy="175" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="750" cy="150" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          <circle cx="850" cy="200" r="10" fill="#FE9C03" stroke="white" stroke-width="4"/>
          
          <!-- Y-axis labels -->
          <text x="75" y="110" class="chart-label">600</text>
          <text x="75" y="160" class="chart-label">500</text>
          <text x="75" y="210" class="chart-label">400</text>
          <text x="75" y="260" class="chart-label">300</text>
          <text x="75" y="310" class="chart-label">200</text>
          <text x="75" y="360" class="chart-label">100</text>
          <text x="75" y="410" class="chart-label">0</text>
          
          <!-- X-axis labels -->
          <text x="175" y="480" class="chart-label">Week 1</text>
          <text x="350" y="480" class="chart-label">Week 2</text>
          <text x="550" y="480" class="chart-label">Week 3</text>
          <text x="750" y="480" class="chart-label">Week 4</text>
        </svg>
      </div>
    </div>

    <div class="activity-sidebar">
      <div class="activity-card">
        <div class="activity-header">
          <h4>
            <i class="fas fa-clock"></i>
            Aktivitas Real-time
          </h4>
          <div class="activity-status">
            <div class="status-dot active"></div>
            <span>Live</span>
          </div>
        </div>
        
        <div class="activity-list" id="recentActivities">
          @forelse(($recentBookings ?? []) as $rb)
          <?php
            $status = strtolower($rb->status ?? '');
            $icon = 'fas fa-shopping-cart';
            $indicator = 'new';
            if ($status === 'dikonfirmasi') { $icon = 'fas fa-check-circle'; $indicator = 'success'; }
            elseif ($status === 'dibatalkan') { $icon = 'fas fa-times-circle'; $indicator = 'negative'; }
            elseif ($status === 'selesai') { $icon = 'fas fa-flag-checkered'; $indicator = 'positive'; }
          ?>
          <div class="activity-item">
            <div class="activity-avatar">
              <i class="{{ $icon }}"></i>
            </div>
            <div class="activity-content">
              <span class="activity-text">{{ $rb->paket }} - {{ ucfirst($status ?: 'menunggu') }} ({{ (int) $rb->peserta }} org)</span>
              <span class="activity-time">{{ optional($rb->created_at)->diffForHumans() }}</span>
            </div>
            <div class="activity-status-indicator {{ $indicator }}"></div>
          </div>
          @empty
          <div class="activity-item">
            <div class="activity-avatar">
              <i class="fas fa-info-circle"></i>
            </div>
            <div class="activity-content">
              <span class="activity-text">Belum ada aktivitas booking terbaru</span>
              <span class="activity-time">-</span>
            </div>
          </div>
          @endforelse
        </div>
        
        <div class="activity-footer">
          <button class="view-all-btn">
            <span>Lihat Semua</span>
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Additional Widgets Row -->
  <div class="widgets-row">
    <div class="widget-card">
      <div class="widget-header">
        <h4>Top Paket Trip</h4>
        <form method="GET" action="{{ route('admin.dashboard') }}" style="display:flex;gap:8px;align-items:center;">
          <select class="widget-filter" name="period" onchange="this.form.submit()">
            <option value="7" {{ ($period ?? 30) == 7 ? 'selected' : '' }}>7 Hari</option>
            <option value="30" {{ ($period ?? 30) == 30 ? 'selected' : '' }}>30 Hari</option>
            <option value="90" {{ ($period ?? 30) == 90 ? 'selected' : '' }}>90 Hari</option>
          </select>
        </form>
      </div>
      <div class="destination-list">
        @forelse(($topDestinations ?? []) as $idx => $dest)
        <div class="destination-item">
          <div class="destination-rank">{{ $idx + 1 }}</div>
          <div class="destination-info">
            <span class="destination-name">{{ $dest->name }}</span>
            <span class="destination-bookings">{{ number_format($dest->bookings) }} booking</span>
          </div>
          <div class="destination-progress">
            <?php $pct = max(0, min(100, ($topDestinations->max('bookings') ?: 1) ? intval(($dest->bookings / max(1, $topDestinations->max('bookings'))) * 100) : 0)); ?>
            <div class="progress-bar" style="width: {{ $pct }}%"></div>
          </div>
        </div>
        @empty
        <div class="destination-item">
          <div class="destination-rank">-</div>
          <div class="destination-info">
            <span class="destination-name">Belum ada data</span>
            <span class="destination-bookings">Tambahkan lewat menu Top Destinasi</span>
          </div>
          <div class="destination-progress">
            <div class="progress-bar" style="width: 0%"></div>
          </div>
        </div>
        @endforelse
      </div>
    </div>

    <div class="widget-card">
      <div class="widget-header">
        <h4>Performance Metrics</h4>
        <button class="widget-refresh" onclick="refreshMetrics()">
          <i class="fas fa-sync-alt"></i>
        </button>
      </div>
      <div class="metrics-grid">
        <div class="metric-item">
          <div class="metric-icon bounce-rate">
            <i class="fas fa-receipt"></i>
          </div>
          <div class="metric-info">
            <span class="metric-value">Rp {{ number_format((int) ($avgBookingValue ?? 0), 0, ',', '.') }}</span>
            <span class="metric-label">Rata-rata Nilai Booking</span>
          </div>
        </div>
        <div class="metric-item">
          <div class="metric-icon session-duration">
            <i class="fas fa-check-circle"></i>
          </div>
          <div class="metric-info">
            <span class="metric-value">{{ number_format((float) ($confirmationRate ?? 0), 1) }}%</span>
            <span class="metric-label">Tingkat Konfirmasi</span>
          </div>
        </div>
        <div class="metric-item">
          <div class="metric-icon conversion-rate">
            <i class="fas fa-times-circle"></i>
          </div>
          <div class="metric-info">
            <span class="metric-value">{{ number_format((float) ($cancellationRate ?? 0), 1) }}%</span>
            <span class="metric-label">Tingkat Pembatalan</span>
          </div>
        </div>
        <div class="metric-item">
          <div class="metric-icon page-views">
            <i class="fas fa-user-plus"></i>
          </div>
          <div class="metric-info">
            <span class="metric-value">{{ number_format((int) ($newUsersThisMonth ?? 0)) }}</span>
            <span class="metric-label">User Baru Bulan Ini</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
/* ===== ENHANCED CSS UNTUK DASHBOARD PROFESSIONAL ===== */
.content {
  padding: 5px;
  min-height: 100vh;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}



/* Stats Cards */
.stats-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 30px;
}

.stat-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(15px);
  padding: 25px;
  border-radius: 20px;
  height: 150px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.1);
  display: flex;
  align-items: center;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,0.2);
}

.stat-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(254, 156, 3, 0.1), transparent);
  transition: left 0.6s;
}

.stat-card:hover::before {
  left: 100%;
}

.stat-card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.stat-icon {
  font-size: 32px;
  margin-right: 20px;
  width: 70px;
  height: 70px;
  background: linear-gradient(135deg, rgba(254, 156, 3, 0.15), rgba(254, 156, 3, 0.05));
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 20px;
  color: #FE9C03;
  border: 2px solid rgba(254, 156, 3, 0.1);
}

.stat-info {
  flex: 1;
}

.stat-number {
  font-size: 20px;
  font-weight: 800;
  color: #333;
  margin-bottom: 5px;
  background: linear-gradient(135deg, #FE9C03, #ff8c00);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.stat-label {
  color: #666;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 8px;
}

.stat-trend {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 12px;
  font-weight: 600;
}

.stat-trend.positive {
  color: #28a745;
}

.stat-trend.negative {
  color: #dc3545;
}
/*
.stat-chart {
  width: 55px;
  height: 25px;
  margin-left: 15px;
}
  */

.mini-chart {
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(254, 156, 3, 0.1), transparent);
  border-radius: 8px;
  position: relative;
}

/* Dashboard Grid */
.dashboard-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 25px;
  margin-bottom: 30px;
}

.chart-container {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(15px);
  padding: 20px;
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  height: 100%;
}

.chart-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 25px;
}

.chart-title-section h3 {
  color: #333;
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 8px;
}

.chart-subtitle {
  color: #666;
  font-size: 14px;
  line-height: 1.5;
  max-width: 400px;
}

.chart-controls {
  display: flex;
  gap: 10px;
  align-items: center;
}

.time-selector {
  padding: 8px 15px;
  border: 2px solid #e9ecef;
  border-radius: 10px;
  background: white;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

.time-selector:focus {
  outline: none;
  border-color: #FE9C03;
}

.export-dropdown {
  position: relative;
  display: inline-block;
}

.export-btn {
  padding: 8px 15px;
  background: linear-gradient(135deg, #FE9C03, #ff8c00);
  color: white;
  border: none;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
}

.export-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(254, 156, 3, 0.4);
}

.export-menu {
  position: absolute;
  top: 100%;
  right: 0;
  background: white;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
  border: 1px solid #e9ecef;
  min-width: 180px;
  z-index: 1000;
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
}

.export-menu.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.export-option {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  padding: 12px 16px;
  background: none;
  border: none;
  text-align: left;
  font-size: 14px;
  font-weight: 500;
  color: #333;
  cursor: pointer;
  transition: all 0.2s ease;
  border-radius: 8px;
  margin: 4px;
}

.export-option:hover {
  background: #f8f9fa;
  color: #FE9C03;
}

.export-option i {
  width: 16px;
  color: #666;
}

.chart-stats-mini {
  display: flex;
  gap: 30px;
  margin-bottom: 20px;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 12px;
}

.mini-stat {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.mini-stat-label {
  font-size: 12px;
  color: #666;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.mini-stat-value {
  font-size: 16px;
  color: #333;
  font-weight: 700;
}

.activity-chart {
  width: 100%;
  height: 500px;
}

.chart-label {
  font-size: 12px;
  fill: #666;
  font-weight: 600;
}

/* Activity Sidebar */
.activity-sidebar {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.activity-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(15px);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.1);
  border: 1px solid rgba(255,255,255,0.2);
}

.activity-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.activity-header h4 {
  color: #333;
  font-size: 18px;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 10px;
}

.activity-status {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  color: #28a745;
  font-weight: 600;
}

.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #28a745;
  animation: pulse-dot 2s infinite;
}

@keyframes pulse-dot {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}

.activity-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.activity-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px;
  border-radius: 12px;
  transition: all 0.3s ease;
  position: relative;
}

.activity-item:hover {
  background: rgba(254, 156, 3, 0.05);
  transform: translateX(5px);
}

.activity-avatar {
  width: 40px;
  height: 40px;
  border-radius: 12px;
  background: linear-gradient(135deg, rgba(254, 156, 3, 0.15), rgba(254, 156, 3, 0.05));
  display: flex;
  align-items: center;
  justify-content: center;
  color: #FE9C03;
  font-size: 16px;
}

.activity-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.activity-text {
  font-size: 14px;
  color: #333;
  font-weight: 500;
}

.activity-time {
  font-size: 12px;
  color: #666;
}

.activity-status-indicator {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  position: absolute;
  right: 15px;
}

.activity-status-indicator.new {
  background: #007bff;
}

.activity-status-indicator.success {
  background: #28a745;
}

.activity-status-indicator.positive {
  background: #ffc107;
}

.activity-footer {
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid #e9ecef;
}

.view-all-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding: 12px;
  background: transparent;
  border: 2px solid #FE9C03;
  color: #FE9C03;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

.view-all-btn:hover {
  background: #FE9C03;
  color: white;
  transform: translateY(-2px);
}

.quick-actions {
  background: linear-gradient(135deg, #FE9C03 0%, #ff8c00 100%);
  padding: 25px;
  border-radius: 20px;
  color: white;
  position: relative;
  overflow: hidden;
}

.quick-actions::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 150px;
  height: 150px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
}

.quick-actions-header {
  margin-bottom: 20px;
  position: relative;
  z-index: 2;
}

.quick-actions-header h4 {
  font-size: 18px;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 10px;
}

.action-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 15px;
  position: relative;
  z-index: 2;
}

.action-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.3s ease;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.action-item:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-2px);
}

.action-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
}

.action-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.action-title {
  font-size: 14px;
  font-weight: 600;
}

.action-subtitle {
  font-size: 12px;
  opacity: 0.8;
}

/* Widgets Row */
.widgets-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  gap: 25px;
  margin-bottom: 30px;
}

.widget-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(15px);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.1);
  border: 1px solid rgba(255,255,255,0.2);
}

.widget-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.widget-header h4 {
  color: #333;
  font-size: 18px;
  font-weight: 700;
}

.widget-filter {
  padding: 8px 15px;
  border: 2px solid #e9ecef;
  border-radius: 10px;
  background: white;
  font-size: 12px;
  font-weight: 600;
  cursor: pointer;
}

.widget-refresh {
  width: 35px;
  height: 35px;
  border: none;
  background: #f8f9fa;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.widget-refresh:hover {
  background: #FE9C03;
  color: white;
  transform: rotate(180deg);
}

.destination-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.destination-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 12px;
  transition: all 0.3s ease;
}

.destination-item:hover {
  background: rgba(254, 156, 3, 0.05);
  transform: scale(1.02);
}

.destination-rank {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: linear-gradient(135deg, #FE9C03, #ff8c00);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 14px;
}

.destination-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.destination-name {
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.destination-bookings {
  font-size: 12px;
  color: #666;
}

.destination-progress {
  width: 80px;
  height: 6px;
  background: #e9ecef;
  border-radius: 3px;
  overflow: hidden;
}

.progress-bar {
  height: 100%;
  background: linear-gradient(135deg, #FE9C03, #ff8c00);
  border-radius: 3px;
  transition: width 0.3s ease;
}

.metrics-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}

.metric-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 20px;
  background: #f8f9fa;
  border-radius: 15px;
  transition: all 0.3s ease;
}

.metric-item:hover {
  background: rgba(254, 156, 3, 0.05);
  transform: translateY(-2px);
}

.metric-icon {
  width: 45px;
  height: 45px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 18px;
}

.metric-icon.bounce-rate {
  background: linear-gradient(135deg, #dc3545, #c82333);
}

.metric-icon.session-duration {
  background: linear-gradient(135deg, #007bff, #0056b3);
}

.metric-icon.conversion-rate {
  background: linear-gradient(135deg, #28a745, #1e7e34);
}

.metric-icon.page-views {
  background: linear-gradient(135deg, #6f42c1, #5a32a3);
}

.metric-info {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.metric-value {
  font-size: 20px;
  font-weight: 800;
  color: #333;
}

.metric-label {
  font-size: 12px;
  color: #666;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Responsive Design */
@media (max-width: 1400px) {
  .dashboard-grid {
    grid-template-columns: 1fr;
  }
  
  .activity-sidebar {
    flex-direction: row;
  }
  
  .activity-card, .quick-actions {
    flex: 1;
  }
}

@media (max-width: 1200px) {
  .widgets-row {
    grid-template-columns: 1fr;
  }
  
  .metrics-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .content {
    padding: 15px;
  }
  
  .header-bar {
    flex-direction: column;
    gap: 20px;
  }
  
  .search-container {
    width: 100%;
  }
  
  .profile-section {
    width: 100%;
    justify-content: center;
  }
  
  .stats-container {
    grid-template-columns: 1fr;
  }
  
  .activity-sidebar {
    flex-direction: column;
  }
  
  .chart-header {
    flex-direction: column;
    gap: 15px;
  }
  
  .chart-controls {
    width: 100%;
    justify-content: space-between;
  }
  
  .chart-stats-mini {
    flex-direction: column;
    gap: 15px;
  }
}

/* Loading States */
.loading {
  position: relative;
  overflow: hidden;
}

.loading::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
  animation: loading-sweep 1.5s infinite;
}

@keyframes loading-sweep {
  0% { left: -100%; }
  100% { left: 100%; }
}

/* Notification Styles */
.notification {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 15px 20px;
  border-radius: 12px;
  color: white;
  font-weight: 600;
  z-index: 1000;
  transform: translateX(400px);
  transition: transform 0.3s ease;
}

.notification.show {
  transform: translateX(0);
}

.notification.success {
  background: linear-gradient(135deg, #28a745, #20c997);
}

.notification.error {
  background: linear-gradient(135deg, #dc3545, #e74c3c);
}

.notification.info {
  background: linear-gradient(135deg, #FE9C03, #ff8c00);
}

@media (max-width: 1024px) {
  .stats-container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 600px) {
  .stats-container {
    grid-template-columns: 1fr;
  }
}

/* Animation Classes */
.fade-in {
  animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.slide-in-right {
  animation: slideInRight 0.5s ease;
}

@keyframes slideInRight {
  from { opacity: 0; transform: translateX(50px); }
  to { opacity: 1; transform: translateX(0); }
}

.bounce-in {
  animation: bounceIn 0.6s ease;
}

@keyframes bounceIn {
  0% { opacity: 0; transform: scale(0.3); }
  50% { opacity: 1; transform: scale(1.1); }
  100% { opacity: 1; transform: scale(1); }
}
</style>

<script>
// Enhanced JavaScript Functions
document.addEventListener('DOMContentLoaded', function() {
  initializeDashboard();
  startRealTimeUpdates();
  initializeAnimations();
});

function initializeDashboard() {
  // Animate counters
  animateCounter(document.getElementById('totalVisitors'), 150, 2000);
  const activeEl = document.getElementById('activePackages');
  const activeTarget = parseInt(activeEl?.dataset?.target || activeEl?.textContent || '0', 10);
  animateCounter(activeEl, activeTarget, 1800);
  animateCounter(document.getElementById('monthlyBookings'), 12, 1600);
  
  // Initialize search functionality
  initializeSearch();
  
  // Add loading states
  addLoadingStates();
}

function animateCounter(element, target, duration = 2000) {
  if (!element) return;
  
  const start = 0;
  const increment = target / (duration / 16);
  let current = start;
  
  const timer = setInterval(() => {
    current += increment;
    if (current >= target) {
      current = target;
      clearInterval(timer);
    }
    element.textContent = Math.floor(current);
  }, 16);
}

function initializeSearch() {
  const searchInput = document.getElementById('searchInput');
  const searchLoader = document.querySelector('.search-loader');
  
  if (searchInput && searchLoader) {
    searchInput.addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      
      if (searchTerm.length > 0) {
        searchLoader.style.width = '100%';
        
        setTimeout(() => {
          searchLoader.style.width = '0';
          if (searchTerm.length > 2) {
            showNotification(`Mencari "${searchTerm}"...`, 'info');
          }
        }, 500);
      } else {
        searchLoader.style.width = '0';
      }
    });
  }
}

function startRealTimeUpdates() {
  // Update stats every 30 seconds
  setInterval(updateRandomStats, 30000);
  
  // Add random activities every 15 seconds
  setInterval(addRandomActivity, 15000);
  
  // Update time stamps every minute
  setInterval(updateTimeStamps, 60000);
}

function updateRandomStats() {
  const variations = {
    visitors: Math.floor(Math.random() * 50) + 120,
    bookings: Math.floor(Math.random() * 8) + 8
  };
  
  animateCounter(document.getElementById('totalVisitors'), variations.visitors);
  animateCounter(document.getElementById('monthlyBookings'), variations.bookings);
}

const sampleActivities = [
  { icon: 'fa-user-plus', text: 'User baru mendaftar dari Surabaya', type: 'new' },
  { icon: 'fa-credit-card', text: 'Pembayaran berhasil untuk paket Tumpak Sewu', type: 'success' },
  { icon: 'fa-star', text: 'Review 5 bintang ditambahkan', type: 'positive' },
  { icon: 'fa-calendar-check', text: 'Booking paket Bandung dikonfirmasi', type: 'success' },
  { icon: 'fa-download', text: 'User mengunduh e-ticket', type: 'new' },
  { icon: 'fa-plus', text: 'Paket baru: Adventure Malang', type: 'new' },
  { icon: 'fa-times-circle', text: 'Pembatalan booking diproses', type: 'warning' },
  { icon: 'fa-map-marker-alt', text: 'Check-in di hotel Bromo Malang', type: 'success' }
];

function addRandomActivity() {
  const activity = sampleActivities[Math.floor(Math.random() * sampleActivities.length)];
  addActivity(activity.icon, activity.text, activity.type);
}

function addActivity(icon, text, type = 'new') {
  const activitiesContainer = document.getElementById('recentActivities');
  if (!activitiesContainer) return;
  
  const timeAgo = Math.floor(Math.random() * 30) + 1;
  
  const newActivity = document.createElement('div');
  newActivity.className = 'activity-item slide-in-right';
  newActivity.innerHTML = `
    <div class="activity-avatar">
      <i class="fas ${icon}"></i>
    </div>
    <div class="activity-content">
      <span class="activity-text">${text}</span>
      <span class="activity-time">${timeAgo} menit lalu</span>
    </div>
    <div class="activity-status-indicator ${type}"></div>
  `;
  
  activitiesContainer.insertBefore(newActivity, activitiesContainer.firstChild);
  
  // Remove excess activities
  const activities = activitiesContainer.querySelectorAll('.activity-item');
  if (activities.length > 6) {
    const lastActivity = activities[activities.length - 1];
    lastActivity.style.opacity = '0';
    lastActivity.style.transform = 'translateX(-20px)';
    setTimeout(() => {
      if (lastActivity.parentNode) {
        lastActivity.parentNode.removeChild(lastActivity);
      }
    }, 300);
  }
}

function updateTimeStamps() {
  const timeElements = document.querySelectorAll('.activity-time');
  timeElements.forEach(element => {
    const currentMinutes = parseInt(element.textContent);
    element.textContent = `${currentMinutes + 1} menit lalu`;
  });
}

// Header Functions
function openSettings() {
  showNotification('Membuka pengaturan sistem...', 'info');
  // Add loading state
  const settingsBtn = event.target.closest('.icon-btn');
  if (settingsBtn) {
    settingsBtn.classList.add('loading');
    setTimeout(() => settingsBtn.classList.remove('loading'), 1000);
  }
}

function openNotifications() {
  showNotification('5 notifikasi baru ditemukan', 'success');
  // Update notification badge
  const badge = document.querySelector('.notification-badge');
  if (badge) {
    badge.textContent = '0';
    setTimeout(() => badge.textContent = Math.floor(Math.random() * 5) + 1, 3000);
  }
}

function openProfile() {
  showNotification('Membuka profil pengguna...', 'info');
}

// Quick Actions
function addNewPackage() {
  showNotification('Form tambah paket baru akan dibuka', 'info');
  // Simulate navigation
  setTimeout(() => {
    showNotification('Redirecting ke halaman tambah paket...', 'success');
  }, 1000);
}

function viewReports() {
  showNotification('Mengakses halaman laporan...', 'info');
  // Add loading animation to chart
  const chartContainer = document.querySelector('.chart-container');
  if (chartContainer) {
    chartContainer.classList.add('loading');
    setTimeout(() => chartContainer.classList.remove('loading'), 2000);
  }
}

function manageUsers() {
  showNotification('Membuka manajemen pengguna...', 'info');
}

function viewBookings() {
  showNotification('Membuka halaman booking...', 'info');
}

function refreshMetrics() {
  const refreshBtn = event.target.closest('.widget-refresh');
  if (refreshBtn) {
    refreshBtn.style.transform = 'rotate(360deg)';
    showNotification('Memperbarui metrics...', 'info');
    
    setTimeout(() => {
      refreshBtn.style.transform = 'rotate(0deg)';
      showNotification('Metrics berhasil diperbarui', 'success');
    }, 1000);
  }
}

// Enhanced Notification System
function showNotification(message, type = 'info', duration = 3000) {
  // Remove existing notifications
  const existingNotifications = document.querySelectorAll('.notification');
  existingNotifications.forEach(notif => notif.remove());
  
  const notification = document.createElement('div');
  notification.className = `notification ${type}`;
  notification.innerHTML = `
    <div style="display: flex; align-items: center; gap: 10px;">
      <i class="fas ${getNotificationIcon(type)}"></i>
      <span>${message}</span>
    </div>
  `;
  
  document.body.appendChild(notification);
  
  // Show notification
  setTimeout(() => notification.classList.add('show'), 10);
  
  // Hide notification
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => notification.remove(), 300);
  }, duration);
}

function getNotificationIcon(type) {
  switch(type) {
    case 'success': return 'fa-check-circle';
    case 'error': return 'fa-exclamation-circle';
    case 'warning': return 'fa-exclamation-triangle';
    default: return 'fa-info-circle';
  }
}

function initializeAnimations() {
  // Add animation classes to elements as they come into view
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
      }
    });
  }, observerOptions);
  
  // Observe all cards and widgets
  document.querySelectorAll('.stat-card, .widget-card, .activity-card, .quick-actions').forEach(el => {
    observer.observe(el);
  });
}

// Export Functions
function toggleExportMenu() {
  const menu = document.getElementById('exportMenu');
  menu.classList.toggle('show');
  
  // Close menu when clicking outside
  document.addEventListener('click', function closeMenu(e) {
    if (!e.target.closest('.export-dropdown')) {
      menu.classList.remove('show');
      document.removeEventListener('click', closeMenu);
    }
  });
}

// Initialize tooltips and interactive elements
function initializeInteractivity() {
  // Add hover effects to stat cards
  document.querySelectorAll('.stat-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.querySelector('.mini-chart')?.classList.add('animate');
    });
    
    card.addEventListener('mouseleave', function() {
      this.querySelector('.mini-chart')?.classList.remove('animate');
    });
  });
}

// Call initialization functions
setTimeout(initializeInteractivity, 500);
</script>

@endsection