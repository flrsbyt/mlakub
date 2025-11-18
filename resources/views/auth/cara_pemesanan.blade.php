@extends('admin.layouts.app')

@section('page-title', 'Dashboard Pemesanan')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: #2d3748;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.2rem;
            color: #718096;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 1rem;
            color: #718096;
            font-weight: 500;
        }

        .stat-change {
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 8px;
        }

        .stat-change.positive {
            color: #38a169;
        }

        .stat-change.negative {
            color: #e53e3e;
        }

        /* Main Content Grid */
        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 32px;
            margin-bottom: 40px;
        }

        /* Booking Management Section */
        .booking-section {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f7fafc;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3748;
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
        }

        .filter-tab {
            padding: 8px 20px;
            border: none;
            border-radius: 25px;
            background: #f7fafc;
            color: #718096;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .filter-tab.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .filter-tab:hover {
            background: #e2e8f0;
        }

        .filter-tab.active:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        /* Booking Timeline */
        .booking-timeline {
            position: relative;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 32px;
            position: relative;
            padding-left: 60px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 24px;
            top: 48px;
            bottom: -16px;
            width: 2px;
            background: #e2e8f0;
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .timeline-step {
            position: absolute;
            left: 0;
            top: 16px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            color: white;
            z-index: 2;
        }

        .timeline-step.pending {
            background: linear-gradient(135deg, #fbb6ce, #f687b3);
        }

        .timeline-step.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
        }

        .timeline-step.completed {
            background: linear-gradient(135deg, #48bb78, #38a169);
        }

        .booking-card {
            flex: 1;
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px;
            border-left: 4px solid;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .booking-card:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .booking-card.pending {
            border-left-color: #f687b3;
            background: linear-gradient(135deg, #fff5f7, #fed7e2);
        }

        .booking-card.active {
            border-left-color: #667eea;
            background: linear-gradient(135deg, #ebf4ff, #bee3f8);
        }

        .booking-card.completed {
            border-left-color: #48bb78;
            background: linear-gradient(135deg, #f0fff4, #c6f6d5);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 16px;
        }

        .booking-id {
            font-size: 0.85rem;
            font-weight: 600;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .booking-status {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fed7e2;
            color: #b83280;
        }

        .status-active {
            background: #bee3f8;
            color: #3182ce;
        }

        .status-completed {
            background: #c6f6d5;
            color: #2f855a;
        }

        .booking-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 12px;
        }

        .booking-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #4a5568;
        }

        .detail-icon {
            width: 16px;
            height: 16px;
            opacity: 0.7;
        }

        .booking-actions {
            display: flex;
            gap: 8px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .action-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ed8936, #dd6b20);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f56565, #e53e3e);
            color: white;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Quick Actions Panel */
        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            height: fit-content;
        }

        .quick-action-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            margin-bottom: 12px;
            border-radius: 12px;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .quick-action-item:hover {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-left-color: #667eea;
            transform: translateX(4px);
        }

        .quick-action-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .quick-action-content h4 {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 4px;
        }

        .quick-action-content p {
            font-size: 0.85rem;
            color: #718096;
        }

        /* Recent Activities */
        .recent-activities {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 32px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            margin-bottom: 8px;
            border-radius: 12px;
            transition: background 0.2s ease;
        }

        .activity-item:hover {
            background: #f8fafc;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #718096;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .booking-section,
            .quick-actions,
            .recent-activities {
                padding: 20px;
            }

            .booking-details {
                grid-template-columns: 1fr;
            }

            .filter-tabs {
                flex-wrap: wrap;
            }

            .section-header {
                flex-direction: column;
                gap: 16px;
            }
        }

        /* Animations */
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

        .booking-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .booking-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .booking-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .booking-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">🌐</div>
                <div class="stat-number" id="websiteVisits">1,245</div>
                <div class="stat-label">Kunjungan Website</div>
                <div class="stat-change positive">+12% dari kemarin</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c);">📅</div>
                <div class="stat-number" id="activeBookings">23</div>
                <div class="stat-label">Booking Aktif</div>
                <div class="stat-change positive">+5 booking baru</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">💬</div>
                <div class="stat-number" id="whatsappConfirms">18</div>
                <div class="stat-label">Konfirmasi WhatsApp</div>
                <div class="stat-change positive">+8 konfirmasi</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b, #38f9d7);">✅</div>
                <div class="stat-number" id="completedBookings">156</div>
                <div class="stat-label">Booking Selesai</div>
                <div class="stat-change positive">+15 bulan ini</div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="main-grid">
            <!-- Booking Management Section -->
            <div class="booking-section">
                <div class="section-header">
                    <h2 class="section-title">Manajemen Pemesanan</h2>
                    <div class="filter-tabs">
                        <button class="filter-tab active" data-filter="all">Semua</button>
                        <button class="filter-tab" data-filter="pending">Pending</button>
                        <button class="filter-tab" data-filter="active">Aktif</button>
                        <button class="filter-tab" data-filter="completed">Selesai</button>
                    </div>
                </div>

                <div class="booking-timeline" id="bookingTimeline">
                    <!-- Booking Item 1 -->
                    <div class="timeline-item" data-status="active">
                        <div class="timeline-step active">1</div>
                        <div class="booking-card active">
                            <div class="booking-header">
                                <div class="booking-id">BK-2025-001</div>
                                <div class="booking-status status-active">Proses</div>
                            </div>
                            <h3 class="booking-title">Paket Wisata Bromo 3D2N</h3>
                            <div class="booking-details">
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Ahmad Rizki
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6"/>
                                    </svg>
                                    4 Orang
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"/>
                                    </svg>
                                    20-22 Sep 2025
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                    Rp 2.400.000
                                </div>
                            </div>
                            <div class="booking-actions">
                                <button class="action-btn btn-primary" onclick="updateStatus('BK-2025-001', 'confirmed')">Konfirmasi</button>
                                <button class="action-btn btn-warning" onclick="viewDetails('BK-2025-001')">Detail</button>
                                <button class="action-btn btn-success" onclick="contactCustomer('BK-2025-001')">WhatsApp</button>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Item 2 -->
                    <div class="timeline-item" data-status="pending">
                        <div class="timeline-step pending">2</div>
                        <div class="booking-card pending">
                            <div class="booking-header">
                                <div class="booking-id">BK-2025-002</div>
                                <div class="booking-status status-pending">Menunggu</div>
                            </div>
                            <h3 class="booking-title">Paket Wisata Malioboro 2D1N</h3>
                            <div class="booking-details">
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Sarah Putri
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6"/>
                                    </svg>
                                    2 Orang
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"/>
                                    </svg>
                                    25-26 Sep 2025
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                    Rp 1.200.000
                                </div>
                            </div>
                            <div class="booking-actions">
                                <button class="action-btn btn-primary" onclick="updateStatus('BK-2025-002', 'process')">Proses</button>
                                <button class="action-btn btn-warning" onclick="viewDetails('BK-2025-002')">Detail</button>
                                <button class="action-btn btn-danger" onclick="cancelBooking('BK-2025-002')">Batal</button>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Item 3 -->
                    <div class="timeline-item" data-status="completed">
                        <div class="timeline-step completed">3</div>
                        <div class="booking-card completed">
                            <div class="booking-header">
                                <div class="booking-id">BK-2025-003</div>
                                <div class="booking-status status-completed">Selesai</div>
                            </div>
                            <h3 class="booking-title">Paket Wisata Bali 5D4N</h3>
                            <div class="booking-details">
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Budi Santoso
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6"/>
                                    </svg>
                                    6 Orang
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6"/>
                                    </svg>
                                    10-14 Sep 2025
                                </div>
                                <div class="detail-item">
                                    <svg class="detail-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                    Rp 4.800.000
                                </div>
                            </div>
                            <div class="booking-actions">
                                <button class="action-btn btn-success" onclick="viewDetails('BK-2025-003')">Lihat</button>
                                <button class="action-btn btn-warning" onclick="downloadReceipt('BK-2025-003')">Receipt</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Panel -->
            <div class="quick-actions">
                <h3 class="section-title" style="margin-bottom: 24px;">Aksi Cepat</h3>
                
                <div class="quick-action-item" onclick="openNewBooking()">
                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">+</div>
                    <div class="quick-action-content">
                        <h4>Booking Baru</h4>
                        <p>Tambah pemesanan manual</p>
                    </div>
                </div>

                <div class="quick-action-item" onclick="checkWebsiteStatus()">
                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe); color: white;">🌐</div>
                    <div class="quick-action-content">
                        <h4>Cek Website</h4>
                        <p>Monitor status website</p>
                    </div>
                </div>

                <div class="quick-action-item" onclick="sendBulkWhatsapp()">
                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #43e97b, #38f9d7); color: white;">📱</div>
                    <div class="quick-action-content">
                        <h4>Broadcast WA</h4>
                        <p>Kirim pesan massal</p>
                    </div>
                </div>

                <div class="quick-action-item" onclick="generateReport()">
                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c); color: white;">📊</div>
                    <div class="quick-action-content">
                        <h4>Laporan</h4>
                        <p>Generate laporan harian</p>
                    </div>
                </div>

                <div class="quick-action-item" onclick="managePackages()">
                    <div class="quick-action-icon" style="background: linear-gradient(135deg, #ffecd2, #fcb69f); color: #d69e2e;">🏖️</div>
                    <div class="quick-action-content">
                        <h4>Kelola Paket</h4>
                        <p>Edit paket wisata</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="recent-activities">
            <h3 class="section-title" style="margin-bottom: 24px;">Aktivitas Terbaru</h3>
            
            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">👤</div>
                <div class="activity-content">
                    <div class="activity-title">Booking baru dari Ahmad Rizki</div>
                    <div class="activity-time">2 menit yang lalu</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #43e97b, #38f9d7); color: white;">✅</div>
                <div class="activity-content">
                    <div class="activity-title">Konfirmasi WhatsApp dari Sarah Putri</div>
                    <div class="activity-time">15 menit yang lalu</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c); color: white;">💰</div>
                <div class="activity-content">
                    <div class="activity-title">Pembayaran selesai - BK-2025-003</div>
                    <div class="activity-time">1 jam yang lalu</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe); color: white;">🌐</div>
                <div class="activity-content">
                    <div class="activity-title">45 pengunjung baru di website</div>
                    <div class="activity-time">2 jam yang lalu</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon" style="background: linear-gradient(135deg, #ffecd2, #fcb69f); color: #d69e2e;">📝</div>
                <div class="activity-content">
                    <div class="activity-title">Update paket wisata Bali Premium</div>
                    <div class="activity-time">3 jam yang lalu</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Filter functionality
        const filterTabs = document.querySelectorAll('.filter-tab');
        const timelineItems = document.querySelectorAll('.timeline-item');

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                
                timelineItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-status') === filter) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // Booking management functions
        function updateStatus(bookingId, newStatus) {
            const statusMessages = {
                'process': 'Booking berhasil diproses',
                'confirmed': 'Booking berhasil dikonfirmasi',
                'completed': 'Booking telah diselesaikan'
            };
            
            showNotification(statusMessages[newStatus] || 'Status booking diperbarui', 'success');
            
            // Update UI (simulate)
            setTimeout(() => {
                updateStats();
            }, 500);
        }

        function viewDetails(bookingId) {
            showBookingModal(bookingId);
        }

        function contactCustomer(bookingId) {
            const phoneNumber = '6281234567890'; // Example phone number
            const message = `Halo! Terima kasih telah melakukan booking dengan ID ${bookingId}. Kami akan segera memproses pesanan Anda.`;
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
            
            window.open(whatsappUrl, '_blank');
            showNotification('Membuka WhatsApp...', 'info');
        }

        function cancelBooking(bookingId) {
            if (confirm(`Apakah Anda yakin ingin membatalkan booking ${bookingId}?`)) {
                showNotification('Booking berhasil dibatalkan', 'warning');
                // Remove the booking item with animation
                const bookingItem = document.querySelector(`[data-booking-id="${bookingId}"]`);
                if (bookingItem) {
                    bookingItem.style.animation = 'fadeOut 0.5s ease-out';
                    setTimeout(() => {
                        bookingItem.remove();
                        updateStats();
                    }, 500);
                }
            }
        }

        function downloadReceipt(bookingId) {
            showNotification('Mengunduh receipt...', 'info');
            // Simulate download
            setTimeout(() => {
                showNotification('Receipt berhasil diunduh', 'success');
            }, 1500);
        }

        // Quick actions functions
        function openNewBooking() {
            showBookingForm();
        }

        function checkWebsiteStatus() {
            showNotification('Website berjalan normal', 'success');
        }

        function sendBulkWhatsapp() {
            showNotification('Fitur broadcast WhatsApp akan segera hadir', 'info');
        }

        function generateReport() {
            showNotification('Generating laporan...', 'info');
            setTimeout(() => {
                showNotification('Laporan berhasil dibuat', 'success');
            }, 2000);
        }

        function managePackages() {
            showNotification('Membuka manajemen paket...', 'info');
        }

        // Modal functions
        function showBookingModal(bookingId) {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10000;
                backdrop-filter: blur(4px);
            `;
            
            const modalContent = document.createElement('div');
            modalContent.style.cssText = `
                background: white;
                border-radius: 20px;
                padding: 40px;
                max-width: 700px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
                position: relative;
            `;
            
            modalContent.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #f7fafc; padding-bottom: 20px;">
                    <h3 style="font-size: 1.8rem; font-weight: 700; color: #2d3748; margin: 0;">Detail Booking</h3>
                    <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" 
                            style="background: #f7fafc; border: none; width: 40px; height: 40px; border-radius: 50%; 
                                   font-size: 1.5rem; cursor: pointer; color: #718096; display: flex; align-items: center; 
                                   justify-content: center; transition: all 0.2s ease;">×</button>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
                    <div style="background: #f8fafc; padding: 20px; border-radius: 12px;">
                        <div style="font-weight: 600; color: #718096; font-size: 0.9rem; margin-bottom: 8px;">ID Booking</div>
                        <div style="color: #2d3748; font-weight: 600; font-size: 1.1rem;">${bookingId}</div>
                    </div>
                    <div style="background: #f8fafc; padding: 20px; border-radius: 12px;">
                        <div style="font-weight: 600; color: #718096; font-size: 0.9rem; margin-bottom: 8px;">Status</div>
                        <div style="color: #2d3748; font-weight: 600; font-size: 1.1rem;">Aktif</div>
                    </div>
                </div>

                <div style="background: #f8fafc; padding: 24px; border-radius: 12px; margin-bottom: 24px;">
                    <h4 style="font-weight: 700; color: #2d3748; margin-bottom: 16px;">Informasi Pelanggan</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <div style="font-weight: 600; color: #718096; font-size: 0.85rem;">Nama</div>
                            <div style="color: #2d3748;">Ahmad Rizki</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #718096; font-size: 0.85rem;">Email</div>
                            <div style="color: #2d3748;">ahmad.rizki@email.com</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #718096; font-size: 0.85rem;">Telepon</div>
                            <div style="color: #2d3748;">+62 812-3456-7890</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #718096; font-size: 0.85rem;">Jumlah Peserta</div>
                            <div style="color: #2d3748;">4 Orang</div>
                        </div>
                    </div>
                </div>

                <div style="background: #f8fafc; padding: 24px; border-radius: 12px; margin-bottom: 24px;">
                    <h4 style="font-weight: 700; color: #2d3748; margin-bottom: 16px;">Detail Paket</h4>
                    <div style="margin-bottom: 16px;">
                        <div style="font-weight: 600; color: #2d3748; font-size: 1.1rem;">Paket Wisata Bromo 3D2N</div>
                        <div style="color: #718096; font-size: 0.9rem;">Tanggal: 20-22 September 2025</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: white; border-radius: 8px;">
                        <div style="font-weight: 600; color: #2d3748;">Total Pembayaran</div>
                        <div style="font-size: 1.3rem; font-weight: 700; color: #667eea;">Rp 2.400.000</div>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <button onclick="contactCustomer('${bookingId}'); this.closest('[style*=\"position: fixed\"]').remove();" 
                            style="flex: 1; background: linear-gradient(135deg, #43e97b, #38f9d7); color: white; border: none; 
                                   padding: 14px 28px; border-radius: 10px; font-weight: 600; cursor: pointer; 
                                   transition: all 0.2s ease; font-size: 1rem;">WhatsApp</button>
                    <button onclick="updateStatus('${bookingId}', 'confirmed'); this.closest('[style*=\"position: fixed\"]').remove();" 
                            style="flex: 1; background: linear-gradient(135deg, #667eea, #764ba2); color: white; border: none; 
                                   padding: 14px 28px; border-radius: 10px; font-weight: 600; cursor: pointer; 
                                   transition: all 0.2s ease; font-size: 1rem;">Konfirmasi</button>
                    <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" 
                            style="flex: 1; background: #f7fafc; color: #718096; border: none; padding: 14px 28px; 
                                   border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s ease; 
                                   font-size: 1rem;">Tutup</button>
                </div>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        function showBookingForm() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10000;
                backdrop-filter: blur(4px);
            `;
            
            const modalContent = document.createElement('div');
            modalContent.style.cssText = `
                background: white;
                border-radius: 20px;
                padding: 40px;
                max-width: 600px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            `;
            
            modalContent.innerHTML = `
                <h3 style="font-size: 1.8rem; font-weight: 700; color: #2d3748; margin-bottom: 24px; text-align: center;">Booking Baru</h3>
                
                <form id="newBookingForm">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Nama Pelanggan</label>
                        <input type="text" required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Email</label>
                        <input type="email" required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Telepon</label>
                        <input type="tel" required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Jumlah Peserta</label>
                            <input type="number" min="1" required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                        </div>
                        <div>
                            <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Paket Wisata</label>
                            <select required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                                <option value="">Pilih Paket</option>
                                <option value="bromo-3d2n">Bromo 3D2N</option>
                                <option value="bali-5d4n">Bali 5D4N</option>
                                <option value="malioboro-2d1n">Malioboro 2D1N</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 24px;">
                        <label style="display: block; font-weight: 600; color: #4a5568; margin-bottom: 8px;">Tanggal Keberangkatan</label>
                        <input type="date" required style="width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem;">
                    </div>
                    
                    <div style="display: flex; gap: 12px;">
                        <button type="submit" style="flex: 1; background: linear-gradient(135deg, #667eea, #764ba2); color: white; border: none; padding: 14px 28px; border-radius: 10px; font-weight: 600; cursor: pointer; font-size: 1rem;">Buat Booking</button>
                        <button type="button" onclick="this.closest('[style*=\"position: fixed\"]').remove()" style="flex: 1; background: #f7fafc; color: #718096; border: none; padding: 14px 28px; border-radius: 10px; font-weight: 600; cursor: pointer; font-size: 1rem;">Batal</button>
                    </div>
                </form>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);

            // Handle form submission
            document.getElementById('newBookingForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Booking baru berhasil ditambahkan!', 'success');
                modal.remove();
                updateStats();
            });
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 16px 24px;
                border-radius: 12px;
                color: white;
                font-weight: 600;
                z-index: 10001;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
                animation: slideIn 0.3s ease-out;
            `;
            
            switch(type) {
                case 'success':
                    notification.style.background = 'linear-gradient(135deg, #48bb78, #38a169)';
                    break;
                case 'error':
                    notification.style.background = 'linear-gradient(135deg, #f56565, #e53e3e)';
                    break;
                case 'warning':
                    notification.style.background = 'linear-gradient(135deg, #ed8936, #dd6b20)';
                    break;
                default:
                    notification.style.background = 'linear-gradient(135deg, #667eea, #764ba2)';
            }
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, 4000);
        }

        // Update statistics
        function updateStats() {
            // Simulate stat updates
            const stats = {
                websiteVisits: Math.floor(Math.random() * 100) + 1200,
                activeBookings: Math.floor(Math.random() * 10) + 20,
                whatsappConfirms: Math.floor(Math.random() * 5) + 15,
                completedBookings: Math.floor(Math.random() * 20) + 150
            };
            
            Object.keys(stats).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    element.textContent = stats[key].toLocaleString();
                }
            });
        }

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('Dashboard pemesanan siap digunakan!', 'success');
            
            // Add entrance animations
            const cards = document.querySelectorAll('.stat-card, .booking-section, .quick-actions, .recent-activities');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                e.preventDefault();
                openNewBooking();
            }
            
            if (e.key === 'Escape') {
                const modal = document.querySelector('[style*="position: fixed"]');
                if (modal) {
                    modal.remove();
                }
            }
        });

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { opacity: 0; transform: translateX(100%); }
                to { opacity: 1; transform: translateX(0); }
            }
            
            @keyframes slideOut {
                from { opacity: 1; transform: translateX(0); }
                to { opacity: 0; transform: translateX(100%); }
            }
            
    </script>
@endsection