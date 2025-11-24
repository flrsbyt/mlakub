@extends('admin.layouts.app')

@section('title', 'Manajemen Kontak')
@section('page-title', 'Manajemen Kontak')
@section('page-subtitle', 'Kelola informasi kontak dan pesan pengunjung dengan mudah')

@section('content')
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
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
        
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .btn-primary {
            background: #ff9500;
            color: white;
        }
        
        .btn-primary:hover {
            background: #e6860a;
            transform: translateY(-1px);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid #d1d5db;
            color: #4b5563;
        }
        
        .btn-outline:hover {
            background: #f3f4f6;
        }
        
        .btn-sm {
            padding: 4px 12px;
            font-size: 13px;
        }
        
        .btn i {
            font-size: 14px;
        }
        
        /* Table Styles */
        .table-container {
            overflow-x: auto;
            margin-top: 16px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
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
            vertical-align: middle;
        }
        
        .table tr:hover {
            background-color: #f8f9fa;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
        }
        
        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }
        
        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .action-buttons {
            display: flex;
            gap: 6px;
        }
        
        .btn-view {
            background: #e9ecef;
            color: #495057;
        }
        
        .btn-view:hover {
            background: #dee2e6;
        }
        
        .btn-reply {
            background: #e6f7ff;
            color: #0056b3;
        }
        
        .btn-reply:hover {
            background: #d0ebff;
        }
        
        .btn-delete {
            background: #f8d7da;
            color: #721c24;
        }
        
        .btn-delete:hover {
            background: #f5c6cb;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #495057;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #ff9500;
            box-shadow: 0 0 0 3px rgba(255, 149, 0, 0.1);
        }
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        
        /* Contact Cards */
        .contact-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        
        .contact-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 16px;
            color: white;
        }
        
        .contact-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .contact-value {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 12px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-content {
                padding: 16px;
            }
            
            .section {
                padding: 16px;
            }
            
            .contact-cards {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        /* Modern Contact Page Styles */
        .contact-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        
        .page-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }
        
        .page-header p {
            color: #718096;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Contact Layout */
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        @media (max-width: 1024px) {
            .contact-layout {
                grid-template-columns: 1fr;
            }
        }

        /* Contact Info Cards */
        .contact-info {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        
        .contact-section {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f0f4f8;
        }

        .contact-card {
            background: #fff;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
            text-align: left;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            cursor: pointer;
        }
        
        .contact-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-color: #cbd5e0;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #f59e0b, #d97706);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .contact-card:hover::before {
            transform: scaleX(1);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .whatsapp-icon {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }

        .instagram-icon {
            background: linear-gradient(45deg, #833AB4, #E1306C, #FCAF45);
        }

        .email-icon {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
        }

        .facebook-icon {
            background: linear-gradient(135deg, #1877F2, #0A58CA);
        }

        .contact-card:hover .contact-icon {
            transform: scale(1.1);
        }

        .contact-content {
            flex: 1;
        }
        
        .contact-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }

        .contact-value {
            color: #718096;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            word-break: break-all;
        }

        .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #f8fafc;
            color: #4b5563;
            text-decoration: none;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }
        
        .contact-link i {
            font-size: 1rem;
        }

        .contact-link:hover {
            background: #f1f5f9;
            color: #1e40af;
            border-color: #bfdbfe;
        }

        /* Contact Form */
        .contact-form {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            height: 100%;
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f0f4f8;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            transition: all 0.2s ease;
            background: #fff;
            color: #2d3748;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
            line-height: 1.5;
        }

        .form-button {
            width: 100%;
            background: #3b82f6;
            color: white;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 0.5rem;
        }
        
        .form-button:hover {
            background: #2563eb;
        }
            color: white;
            border: none;
            padding: 18px 32px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(59, 130, 246, 0.4);
        }

        .form-button:active {
            transform: translateY(-1px);
        }

        /* Messages Section */
        .messages-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f5f9;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
        }

        .messages-stats {
            display: flex;
            gap: 24px;
        }

        .stat-item {
            text-align: center;
            padding: 12px 20px;
            background: #f8fafc;
            border-radius: 12px;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .messages-table {
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            padding: 20px;
            text-align: left;
            font-weight: 700;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.01);
        }

        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-new {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
        }

        .status-read {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #166534;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 16px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-btn.primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border-color: #3b82f6;
        }

        .action-btn.danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border-color: #ef4444;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .contact-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .contact-info {
                grid-template-columns: 1fr 1fr;
            }

            .header-content {
                padding: 0 20px;
            }

            .container {
                padding: 30px 20px;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .header-right {
                width: 100%;
                justify-content: center;
            }

            .search-box {
                width: 100%;
                max-width: 300px;
            }

            .contact-info {
                grid-template-columns: 1fr;
            }

            .contact-card,
            .contact-form {
                padding: 24px;
            }

            .messages-section {
                padding: 24px;
            }

            .section-header {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .messages-stats {
                justify-content: center;
            }

            .table {
                font-size: 0.8rem;
            }

            .table th,
            .table td {
                padding: 12px 8px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }

            .action-btn {
                font-size: 0.75rem;
                padding: 6px 12px;
            }
        }

        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .contact-card,
            .contact-form,
            .messages-section {
                padding: 20px;
            }

            .user-profile {
                flex-direction: column;
                gap: 8px;
            }

            .table th,
            .table td {
                padding: 8px 4px;
                font-size: 0.75rem;
            }
        }

        /* Animations */
        @keyframes fadeOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            z-index: 10000;
            animation: slideIn 0.3s ease-out;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .notification.success {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .notification.error {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .notification.warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .notification.info {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }
    </style>

<div class="page-content">
    <!-- Contact Information Section -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Kontak Kami</h2>
        </div>
        
        <div class="contact-cards">
            <!-- WhatsApp -->
            <div class="contact-card">
                <div class="contact-icon" style="background: linear-gradient(135deg, #25D366, #128C7E);">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="contact-title">WhatsApp</h3>
                <p class="contact-value">+62 812-3456-7890</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline btn-sm">
                    <i class="fas fa-paper-plane"></i> Kirim Pesan
                </a>
            </div>
            
            <!-- Email -->
            <div class="contact-card">
                <div class="contact-icon" style="background: linear-gradient(135deg, #4F46E5, #7C3AED);">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="contact-title">Email</h3>
                <p class="contact-value">info@mlakub.com</p>
                <a href="mailto:info@mlakub.com" class="btn btn-outline btn-sm">
                    <i class="fas fa-envelope"></i> Kirim Email
                </a>
            </div>
            
            <!-- Instagram -->
            <div class="contact-card">
                <div class="contact-icon" style="background: linear-gradient(45deg, #833AB4, #E1306C, #FCAF45);">
                    <i class="fab fa-instagram"></i>
                </div>
                <h3 class="contact-title">Instagram</h3>
                <p class="contact-value">@mlakub_travel</p>
                <a href="https://instagram.com/mlakub_travel" target="_blank" class="btn btn-outline btn-sm">
                    <i class="fab fa-instagram"></i> Kunjungi
                </a>
            </div>
            
            <!-- Facebook -->
            <div class="contact-card">
                <div class="contact-icon" style="background: linear-gradient(135deg, #1877F2, #0A58CA);">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <h3 class="contact-title">Facebook</h3>
                <p class="contact-value">Mlakub Travel</p>
                <a href="https://facebook.com/mlakubtravel" target="_blank" class="btn btn-outline btn-sm">
                    <i class="fab fa-facebook-f"></i> Kunjungi
                </a>
            </div>
        </div>
    </div>
    
    <!-- Contact Form Section -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Kirim Pesan</h2>
        </div>
        
        <form id="contactForm" class="contact-form">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" placeholder="email@contoh.com" required>
            </div>
            
            <div class="form-group">
                <label for="subject" class="form-label">Subjek</label>
                <input type="text" id="subject" class="form-control" placeholder="Subjek pesan" required>
            </div>
            
            <div class="form-group">
                <label for="message" class="form-label">Pesan</label>
                <textarea id="message" class="form-control" rows="4" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
        </form>
    </div>
    
    <!-- Messages List Section -->
    <div class="section">
        <div class="section-header" style="border-bottom: 1px solid #e9ecef; padding-bottom: 16px; margin-bottom: 20px;">
            <h2 class="section-title">Pesan Masuk</h2>
            <div style="display: flex; gap: 12px;">
                <div style="position: relative;">
                    <input type="text" class="form-control" placeholder="Cari pesan..." style="padding-left: 36px; width: 240px;">
                    <i class="fas fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                </div>
                <button class="btn btn-outline">
                    <i class="fas fa-sync-alt"></i> Segarkan
                </button>
            </div>
        </div>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row -->
                    <tr>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Pertanyaan tentang paket wisata</td>
                        <td>24 Nov 2025</td>
                        <td><span class="badge badge-warning">Menunggu</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-view btn-sm">
                                    <i class="far fa-eye"></i>
                                </button>
                                <button class="btn btn-reply btn-sm">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="btn btn-delete btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 16px; border-top: 1px solid #e9ecef;">
            <div>
                <p style="font-size: 14px; color: #6c757d;">
                    Menampilkan <span style="font-weight: 600;">1</span> sampai <span style="font-weight: 600;">10</span> dari <span style="font-weight: 600;">24</span> hasil
                </p>
            </div>
            <div style="display: flex; gap: 4px;">
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-sm" style="background: #ff9500; color: white;">1</button>
                <button class="btn btn-outline btn-sm">2</button>
                <button class="btn btn-outline btn-sm">3</button>
                <span class="btn btn-outline btn-sm" style="border: none; cursor: default;">...</span>
                <button class="btn btn-outline btn-sm">8</button>
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                const message = document.getElementById('message').value;
                
                // Here you would typically send the data to your server
                console.log('Form submitted:', { name, email, subject, message });
                
                // Show success message
                alert('Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
                
                // Reset form
                this.reset();
            });
        }
        
        // Function to view message details
        function viewMessage(id) {
            // In a real application, you would fetch the message details from the server
            alert('Viewing message with ID: ' + id);
        }
        
        // Function to delete a message
        function deleteMessage(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pesan ini?')) {
                // In a real application, you would send a delete request to the server
                console.log('Deleting message with ID:', id);
                alert('Pesan berhasil dihapus');
            }
        }
        
        // Make functions available globally
        window.viewMessage = viewMessage;
        window.deleteMessage = deleteMessage;
    });
</script>
                <div class="btn-group">
                    <a href="{{ route('admin.kontak') }}" class="btn {{ request('status') == null ? 'btn-primary' : 'btn-outline-primary' }}">Semua ({{ $stat['total'] }})</a>
                    <a href="{{ route('admin.kontak', ['status' => 'menunggu']) }}" class="btn {{ request('status') == 'menunggu' ? 'btn-warning' : 'btn-outline-warning' }}">Menunggu ({{ $stat['menunggu'] }})</a>
                    <a href="{{ route('admin.kontak', ['status' => 'diterima']) }}" class="btn {{ request('status') == 'diterima' ? 'btn-success' : 'btn-outline-success' }}">Diterima ({{ $stat['diterima'] }})</a>
                    <a href="{{ route('admin.kontak', ['status' => 'ditolak']) }}" class="btn {{ request('status') == 'ditolak' ? 'btn-danger' : 'btn-outline-danger' }}">Ditolak ({{ $stat['ditolak'] }})</a>
                <div class="messages-stats">
                    <div class="stat-item">
                        <div class="stat-number" id="totalMessages">{{ $stat['total'] ?? 0 }}</div>
                        <div class="stat-label">Total</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="unreadMessages">{{ $stat['menunggu'] ?? 0 }}</div>
                        <div class="stat-label">Belum Dibaca</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="readMessages">{{ ($stat['diterima'] ?? 0) + ($stat['ditolak'] ?? 0) }}</div>
                        <div class="stat-label">Sudah Diproses</div>
                    </div>
                </div>
            </div>
            
            <div class="messages-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Pengirim</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="messagesTableBody">
                        @php $badgeClass = fn($s) => $s==='menunggu' ? 'status-new' : 'status-read'; @endphp
                        @forelse(($pesan ?? collect()) as $row)
                        <tr>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($row->keterangan, 40) }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d M Y') }}</td>
                            <td>
                                <span class="status-badge {{ $badgeClass($row->status) }}">{{ strtoupper($row->status==='menunggu'?'BARU':$row->status) }}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <form action="{{ route('admin.kontak.status', $row->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="{{ $row->status==='menunggu' ? 'diterima' : 'menunggu' }}">
                                        <button class="action-btn primary">{{ $row->status==='menunggu' ? 'Tandai Dibaca' : 'Tandai Baru' }}</button>
                                    </form>
                                    <form action="{{ route('admin.kontak.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center; color:#6b7280;">Belum ada pesan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                nama: document.getElementById('nama').value,
                email: document.getElementById('email').value,
                subjek: document.getElementById('subjek').value,
                pesan: document.getElementById('pesan').value
            };
            
            // Simulate form submission
            const submitButton = this.querySelector('.form-button');
            const originalText = submitButton.textContent;
            
            submitButton.textContent = 'Mengirim Pesan...';
            submitButton.disabled = true;
            
            setTimeout(() => {
                addNewMessage(formData);
                this.reset();
                
                submitButton.textContent = originalText;
                submitButton.disabled = false;
                
                showNotification('Pesan berhasil dikirim!', 'success');
                updateStats();
            }, 1500);
        });

        // Add new message to table
        function addNewMessage(data) {
            const tbody = document.getElementById('messagesTableBody');
            const newRow = document.createElement('tr');
            const today = new Date().toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
            
            newRow.innerHTML = `
                <td>${data.nama}</td>
                <td>${data.email}</td>
                <td>${data.subjek}</td>
                <td>${today}</td>
                <td><span class="status-badge status-new">Baru</span></td>
                <td>
                    <div class="action-buttons">
                        <button class="action-btn primary" onclick="readMessage(${Date.now()})">Baca</button>
                        <button class="action-btn" onclick="replyMessage(${Date.now()})">Balas</button>
                        <button class="action-btn danger" onclick="deleteMessage(${Date.now()})">Hapus</button>
                    </div>
                </td>
            `;
            
            // Add to top of table
            tbody.insertBefore(newRow, tbody.firstChild);
            
            // Add animation
            newRow.style.background = 'linear-gradient(135deg, #f0f9ff, #e0f2fe)';
            newRow.style.animation = 'pulse 0.6s ease-in-out';
            setTimeout(() => {
                newRow.style.background = '';
                newRow.style.animation = '';
            }, 3000);
        }

        // Update statistics
        function updateStats() {
            const rows = document.querySelectorAll('#messagesTableBody tr');
            const newMessages = document.querySelectorAll('.status-new').length;
            const readMessages = document.querySelectorAll('.status-read').length;
            
            document.getElementById('totalMessages').textContent = rows.length;
            document.getElementById('unreadMessages').textContent = newMessages;
            document.getElementById('readMessages').textContent = readMessages;
        }

        // Message Actions
        function readMessage(id) {
            const row = event.target.closest('tr');
            const statusBadge = row.querySelector('.status-badge');
            
            if (statusBadge.classList.contains('status-new')) {
                statusBadge.textContent = 'Dibaca';
                statusBadge.classList.remove('status-new');
                statusBadge.classList.add('status-read');
                updateStats();
            }
            
            showMessageModal(row);
        }

        function replyMessage(id) {
            const row = event.target.closest('tr');
            const email = row.cells[1].textContent;
            const subject = row.cells[2].textContent;
            
            const mailtoLink = `mailto:${email}?subject=Re: ${subject}`;
            window.open(mailtoLink);
            
            showNotification('Membuka aplikasi email...', 'info');
        }

        function deleteMessage(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pesan ini?')) {
                const row = event.target.closest('tr');
                row.style.animation = 'fadeOut 0.5s ease-out';
                
                setTimeout(() => {
                    row.remove();
                    updateStats();
                    showNotification('Pesan berhasil dihapus', 'success');
                }, 500);
            }
        }

        // Show message modal
        function showMessageModal(row) {
            const nama = row.cells[0].textContent;
            const email = row.cells[1].textContent;
            const subjek = row.cells[2].textContent;
            const tanggal = row.cells[3].textContent;
            
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
                max-width: 650px;
                width: 90%;
                max-height: 85vh;
                overflow-y: auto;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
                position: relative;
                animation: slideIn 0.3s ease-out;
            `;
            
            modalContent.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #f1f5f9; padding-bottom: 20px;">
                    <h3 style="font-size: 1.8rem; font-weight: 700; color: #1e293b; margin: 0;">Detail Pesan</h3>
                    <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" 
                            style="background: #f1f5f9; border: none; width: 40px; height: 40px; border-radius: 50%; 
                                   font-size: 1.5rem; cursor: pointer; color: #64748b; display: flex; align-items: center; 
                                   justify-content: center; transition: all 0.2s ease;">×</button>
                </div>
                
                <div style="space-y: 20px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px;">
                            <div style="font-weight: 600; color: #374151; font-size: 0.9rem; margin-bottom: 4px;">Pengirim</div>
                            <div style="color: #1e293b; font-weight: 500;">${nama}</div>
                        </div>
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px;">
                            <div style="font-weight: 600; color: #374151; font-size: 0.9rem; margin-bottom: 4px;">Email</div>
                            <div style="color: #1e293b; font-weight: 500;">${email}</div>
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px;">
                            <div style="font-weight: 600; color: #374151; font-size: 0.9rem; margin-bottom: 4px;">Subjek</div>
                            <div style="color: #1e293b; font-weight: 500;">${subjek}</div>
                        </div>
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px;">
                            <div style="font-weight: 600; color: #374151; font-size: 0.9rem; margin-bottom: 4px;">Tanggal</div>
                            <div style="color: #1e293b; font-weight: 500;">${tanggal}, 14:30</div>
                        </div>
                    </div>
                    
                    <div style="background: #f8fafc; padding: 20px; border-radius: 12px; border-left: 4px solid #3b82f6;">
                        <div style="font-weight: 600; color: #374151; font-size: 0.9rem; margin-bottom: 12px;">Isi Pesan</div>
                        <p style="margin: 0; line-height: 1.7; color: #4b5563; font-size: 1rem;">
                            Selamat siang, saya tertarik dengan produk yang Anda tawarkan. 
                            Bisakah Anda memberikan informasi lebih detail mengenai fitur-fitur 
                            yang tersedia dan harga paket yang sesuai untuk bisnis kecil seperti saya? 
                            Saya juga ingin mengetahui apakah ada periode trial yang bisa saya coba 
                            terlebih dahulu. Terima kasih atas perhatiannya.
                        </p>
                    </div>
                </div>
                
                <div style="margin-top: 30px; display: flex; gap: 12px;">
                    <button onclick="replyMessage(1); this.closest('[style*=\"position: fixed\"]').remove();" 
                            style="flex: 1; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; border: none; 
                                   padding: 14px 28px; border-radius: 10px; font-weight: 600; cursor: pointer; 
                                   transition: all 0.2s ease; font-size: 1rem;">Balas Pesan</button>
                    <button onclick="this.closest('[style*=\"position: fixed\"]').remove()" 
                            style="flex: 1; background: #f1f5f9; color: #64748b; border: none; padding: 14px 28px; 
                                   border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s ease; 
                                   font-size: 1rem;">Tutup</button>
                </div>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
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

        // Search functionality
        const searchBox = document.querySelector('.search-box');
        searchBox.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#messagesTableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Contact card interactions
        const contactCards = document.querySelectorAll('.contact-card');
        contactCards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.classList.contains('contact-link')) {
                    return;
                }
                
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Form validation
        const formInputs = document.querySelectorAll('.form-input');
        formInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.style.borderColor = '#ef4444';
                    this.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
                } else if (this.type === 'email' && this.value && !isValidEmail(this.value)) {
                    this.style.borderColor = '#ef4444';
                    this.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
                } else {
                    this.style.borderColor = '#10b981';
                    this.style.boxShadow = '0 0 0 4px rgba(16, 185, 129, 0.1)';
                }
            });
            
            input.addEventListener('focus', function() {
                this.style.borderColor = '#3b82f6';
                this.style.boxShadow = '0 0 0 4px rgba(59, 130, 246, 0.1)';
            });
        });

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Copy contact info
        contactCards.forEach(card => {
            const title = card.querySelector('.contact-title').textContent;
            const value = card.querySelector('.contact-value').textContent;
            
            card.addEventListener('dblclick', function() {
                navigator.clipboard.writeText(value).then(() => {
                    showNotification(`${title} disalin ke clipboard!`, 'success');
                });
            });
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            updateStats();
            showNotification('Portal kontak siap digunakan!', 'success');
            
            // Add some visual effects
            const cards = document.querySelectorAll('.contact-card, .contact-form, .messages-section');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K for search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchBox.focus();
            }
            
            // Escape to close modals
            if (e.key === 'Escape') {
                const modal = document.querySelector('[style*="position: fixed"]');
                if (modal) {
                    modal.remove();
                }
            }
        });
    </script>
</div>
@endsection
