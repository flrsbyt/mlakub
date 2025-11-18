<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kontak</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            line-height: 1.6;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 24px 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .header-subtitle {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 2px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-container {
            position: relative;
        }

        .search-box {
            padding: 10px 16px 10px 44px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            outline: none;
            width: 320px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-box:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #3b82f6;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 10px;
            transition: background-color 0.2s ease;
        }

        .user-profile:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }

        .user-info h4 {
            font-size: 0.95rem;
            font-weight: 600;
        }

        .user-info p {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 32px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-header p {
            color: #64748b;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Contact Layout */
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            margin-bottom: 64px;
        }

        /* Contact Info Cards */
        .contact-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f5f9;
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
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
            width: 72px;
            height: 72px;
            background: #fff7ed;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 2rem;
            transition: all 0.3s ease;
        }

        .whatsapp-icon {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
        }

        .instagram-icon {
            background: linear-gradient(135deg, #fdf2f8, #fce7f3);
        }

        .email-icon {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
        }

        .facebook-icon {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
        }

        .contact-card:hover .contact-icon {
            transform: scale(1.1);
        }

        .contact-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .contact-value {
            color: #64748b;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .contact-link {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .contact-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
        }

        /* Contact Form */
        .contact-form {
            background: white;
            border-radius: 20px;
            padding: 48px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f5f9;
            position: relative;
            overflow: hidden;
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
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 32px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafbfc;
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-textarea {
            resize: vertical;
            min-height: 140px;
            font-family: inherit;
        }

        .form-button {
            width: 100%;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
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
</head>
<body>
    <!-- Main Content -->
    <div class="container">
        <!-- Search Bar -->
        <div class="search-container">
            <input type="text" class="search-box" placeholder="Cari pesan atau kontak...">
            <svg class="search-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>

        <div class="page-header">
            <h1>Portal Kontak</h1>
            <p>Kelola semua informasi kontak dan pesan dari pengunjung dalam satu tempat</p>
        </div>

        <div class="contact-layout">
            <!-- Contact Information -->
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon whatsapp-icon">💬</div>
                    <h3 class="contact-title">WhatsApp</h3>
                    <p class="contact-value">+62 812-3456-7890</p>
                    <a href="https://wa.me/6281234567890" class="contact-link" target="_blank">Chat Sekarang</a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon instagram-icon">📷</div>
                    <h3 class="contact-title">Instagram</h3>
                    <p class="contact-value">@company_official</p>
                    <a href="https://instagram.com/company_official" class="contact-link" target="_blank">Kunjungi Profile</a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon email-icon">✉️</div>
                    <h3 class="contact-title">Email</h3>
                    <p class="contact-value">contact@company.com</p>
                    <a href="mailto:contact@company.com" class="contact-link">Kirim Email</a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon facebook-icon">👥</div>
                    <h3 class="contact-title">Facebook</h3>
                    <p class="contact-value">Company Official</p>
                    <a href="https://facebook.com/company" class="contact-link" target="_blank">Lihat Halaman</a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3 class="form-title">Kirim Pesan Baru</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" class="form-input" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" class="form-input" placeholder="nama@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subjek" class="form-label">Subjek Pesan</label>
                        <input type="text" id="subjek" class="form-input" placeholder="Subjek pesan" required>
                    </div>

                    <div class="form-group">
                        <label for="pesan" class="form-label">Isi Pesan</label>
                        <textarea id="pesan" class="form-input form-textarea" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="form-button">Kirim Pesan</button>
                </form>
            </div>
        </div>

        <!-- Messages Section -->
        <div class="messages-section">
            <div class="section-header">
                <h2 class="section-title">Pesan Masuk</h2>
                <div class="messages-stats">
                    <div class="stat-item">
                        <div class="stat-number" id="totalMessages">5</div>
                        <div class="stat-label">Total</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="unreadMessages">3</div>
                        <div class="stat-label">Belum Dibaca</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="readMessages">2</div>
                        <div class="stat-label">Sudah Dibaca</div>
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
                        <tr>
                            <td>Ahmad Rizki</td>
                            <td>ahmad.rizki@email.com</td>
                            <td>Pertanyaan tentang produk</td>
                            <td>15 Sep 2025</td>
                            <td><span class="status-badge status-new">Baru</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn primary" onclick="readMessage(1)">Baca</button>
                                    <button class="action-btn" onclick="replyMessage(1)">Balas</button>
                                    <button class="action-btn danger" onclick="deleteMessage(1)">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sarah Putri</td>
                            <td>sarah.putri@gmail.com</td>
                            <td>Keluhan layanan</td>
                            <td>14 Sep 2025</td>
                            <td><span class="status-badge status-read">Dibaca</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn primary" onclick="readMessage(2)">Baca</button>
                                    <button class="action-btn" onclick="replyMessage(2)">Balas</button>
                                    <button class="action-btn danger" onclick="deleteMessage(2)">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Budi Santoso</td>
                            <td>budi.santoso@yahoo.com</td>
                            <td>Request demo produk</td>
                            <td>13 Sep 2025</td>
                            <td><span class="status-badge status-new">Baru</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn primary" onclick="readMessage(3)">Baca</button>
                                    <button class="action-btn" onclick="replyMessage(3)">Balas</button>
                                    <button class="action-btn danger" onclick="deleteMessage(3)">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maya Sari</td>
                            <td>maya.sari@company.com</td>
                            <td>Kerjasama bisnis</td>
                            <td>12 Sep 2025</td>
                            <td><span class="status-badge status-read">Dibaca</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn primary" onclick="readMessage(4)">Baca</button>
                                    <button class="action-btn" onclick="replyMessage(4)">Balas</button>
                                    <button class="action-btn danger" onclick="deleteMessage(4)">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Doni Prasetyo</td>
                            <td>doni.prasetyo@startup.id</td>
                            <td>Informasi harga paket</td>
                            <td>11 Sep 2025</td>
                            <td><span class="status-badge status-new">Baru</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn primary" onclick="readMessage(5)">Baca</button>
                                    <button class="action-btn" onclick="replyMessage(5)">Balas</button>
                                    <button class="action-btn danger" onclick="deleteMessage(5)">Hapus</button>
                                </div>
                            </td>
                        </tr>
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
</body>
</html>
