<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Trip Bromo Sunrise - MlakuBromo.ID</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
            margin-top: -30px !important;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: transparent;
            z-index: 1000;
            padding: 15px 0;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .header.scrolled .logo {
            background: transparent;
        }

        .logo img {
            height: 55px;
            width: auto;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .header.scrolled .nav-menu a {
            color: #333;
            text-shadow: none;
        }

        .nav-menu a:hover {
            color: #FE9C03;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-menu a.active {
            color: #FE9C03;
            font-weight: 600;
        }

        .nav-menu a.active::after {
            width: 100%;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(248, 249, 250, 0.9);
            border-radius: 25px;
            padding: 7px 9px;
            border: 1px solid rgba(224, 224, 224, 0.8);
            transition: all 0.3s;
            backdrop-filter: blur(10px);
        }

        .header.scrolled .search-box {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
        }

        .search-box:focus-within {
            border-color: #FE9C03;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }

        .search-box input {
            border: none;
            background: none;
            outline: none;
            padding: 5px;
            width: 200px;
            font-size: 14px;
            color: #333;
        }

        .search-box input::placeholder {
            color: #666;
        }

        .search-box i {
            color: #666;
            margin-left: 5px;
        }

        .search-btn {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

                /* Profile Dropdown Styles */
                .profile-dropdown {
            position: relative;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(248, 249, 250, 0.9);
            border: 1px solid rgba(224, 224, 224, 0.8);
            border-radius: 25px;
            padding: 8px 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-size: 14px;
            color: #333;
            min-width: 120px;
        }

        .header.scrolled .profile-btn {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
        }

        .profile-btn:hover {
            background: #fff;
            border-color: #FE9C03;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #FE9C03;
        }

        .profile-name {
            font-weight: 500;
            max-width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile-btn i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .profile-btn.active i {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1001;
            margin-top: 10px;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .dropdown-item:first-child {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .dropdown-item:last-child {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            color: #FE9C03;
            padding-left: 20px;
        }

        .dropdown-item i {
            width: 16px;
            font-size: 14px;
            color: #666;
        }

        .dropdown-item:hover i {
            color: #FE9C03;
        }

        .dropdown-divider {
            border: none;
            border-top: 1px solid #e9ecef;
            margin: 8px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-btn {
                padding: 6px 12px;
                min-width: 100px;
            }
            
            .profile-name {
                max-width: 60px;
                font-size: 13px;
            }
            
            .profile-avatar {
                width: 28px;
                height: 28px;
            }
            
            .dropdown-menu {
                min-width: 180px;
                right: -10px;
            }
        }

        @media (max-width: 480px) {
            .profile-btn {
                padding: 5px 10px;
                min-width: 90px;
            }
            
            .profile-name {
                display: none;
            }
            
            .dropdown-menu {
                min-width: 160px;
                right: -20px;
            }
        }

        .login-btn {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border: 2px solid transparent;
            padding: 10px 20px;
            border-radius: 25px;
            color: black;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .login-btn:hover {
            background: transparent !important;
            color: white !important;
            border: 2px solid #FE9C03 !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        /* ========== MODAL STYLES - CLEAN ORANGE DESIGN ========== */

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        .modal-content {
            background: #f8f9fa;
            padding: 30px;
            margin: 5% auto;
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-content h3 {
            text-align: left;
            margin-bottom: 30px;
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 25px;
            cursor: pointer;
            font-size: 20px;
            color: #999;
            transition: color 0.3s ease;
            background: #e9ecef;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close:hover {
            color: #666;
            background: #dee2e6;
        }

        /* Form Inputs */
        .modal-content input {
            width: 100%;
            margin: 15px 0;
            padding: 15px 20px;
            border: none;
            border-radius: 15px;
            font-size: 14px;
            box-sizing: border-box;
            background: white;
            color: #333;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .modal-content input:focus {
            outline: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .modal-content input::placeholder {
            color: #999;
            font-weight: 400;
        }

        /* Password Input with Eye Icon */
        .password-container {
            position: relative;
            margin: 15px 0;
        }

        .password-container input {
            margin: 0;
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #666;
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: right;
            margin: 10px 0 25px 0;
        }

        .forgot-password a {
            color: #FE9C03;
            text-decoration: none;
            font-size: 13px;
            font-weight: 400;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Form Buttons */
        .modal-content button[type="submit"] {
            width: 100%;
            margin: 20px 0 15px 0;
            padding: 15px;
            background: #FE9C03;
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .modal-content button[type="submit"]:hover {
            background: #e55a2b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .modal-content button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Switch Form Links */
        .modal-content p {
            text-align: center;
            margin: 20px 0 0 0;
            color: #999;
            font-size: 14px;
        }

        .modal-content p a {
            color: #FE9C03;
            text-decoration: none;
            font-weight: 500;
        }

        .modal-content p a:hover {
            text-decoration: underline;
        }

        /* Error Messages */
        #loginError, 
        #registerError {
            color: #e74c3c;
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            border-radius: 10px;
            background: #ffebee;
            border: 1px solid #ffcdd2;
            font-size: 13px;
            display: none;
        }

        #loginError.show,
        #registerError.show {
            display: block;
        }

        /* Label Styling */
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
            font-weight: 500;
            margin-top: 20px;
        }

        .form-label:first-of-type {
            margin-top: 0;
        }

        /* ========== LOGOUT MODAL STYLES ========== */
        .logout-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logout-modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }

        .logout-modal-content {
            background: #f8f9fa;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: scale(0.7);
            transition: transform 0.3s ease;
        }

        .logout-modal.show .logout-modal-content {
            transform: scale(1);
        }

        .logout-modal-content h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.6rem;
            font-weight: 700;
            color: #333;
        }

        .logout-modal-content p {
            text-align: center;
            margin-bottom: 30px;
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }

        .logout-close {
            position: absolute;
            top: 20px;
            right: 25px;
            cursor: pointer;
            font-size: 20px;
            color: #999;
            transition: color 0.3s ease;
            background: #e9ecef;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-close:hover {
            color: #666;
            background: #dee2e6;
        }

        .logout-button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }

        .logout-btn {
            padding: 12px 30px;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 100px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .logout-btn-cancel {
            background: #6c757d;
            color: white;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        .logout-btn-cancel:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
        }

        .logout-btn-confirm {
            background: #FE9C03;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .logout-btn-confirm:hover {
            background: #e55a2b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.8), rgba(247, 147, 30, 0.8)),
                        url('images/hero-background.jpg');
            background-size: cover;
            background-position: center 30%;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, transparent 0%, rgba(0,0,0,0.3) 100%);
        }

        .hero-content {
            max-width: 1200px;
            margin: 80px auto 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        .hero-text h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            white-space: nowrap; /* Mencegah kata terpisah ke baris baru */
        }

        /* Untuk responsive */
        @media (max-width: 768px) {
            .hero-text h1 {
                white-space: normal;
                word-break: break-word;
            }
        }

        .hero-text h1 .highlight {
            background : #FE9C03;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }

        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 35px;
            opacity: 0.95;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            color: black;
            padding: 12px 25px;
            border: 2px solid transparent;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            display: inline-block;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            font-size: 0.95rem;
        }

        .btn-primary:hover {
            background: transparent !important;
            color: white !important;
            border: 2px solid #FE9C03 !important;
            box-shadow: none !important;
            transform: translateY(-3px);
        }

        /* KONTAK - Normal: line, Hover: background */
        .btn-secondary {
            background: transparent;
            color: white;
            padding: 12px 25px;
            border: 2px solid #FE9C03;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            display: inline-block;
            font-size: 0.95rem;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: #FE9C03 !important;
            color: #333 !important;
            border: 2px solid #FE9C03 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3) !important;
        }

        .hero-images {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            position: relative;
            flex-wrap: wrap;
            padding: 40px 0;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: rotate(-45deg) scale(1.4);
            border-radius: 15px;
        }

        .hero-image {
            width: 120px;
            height: 120px;
            background: #ffffff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            transform: rotate(45deg);
            margin: 10px;
        }

        .hero-image:hover {
            transform: rotate(45deg) translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .section {
            padding: 20px 0;
        }
        
        .section.packages {
            padding: 0;
        }

        /* Main Content - Fixed scroll offset */
        .main-content {
            padding: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            /* Add scroll margin to all sections */
            scroll-margin-top: 100px;
        }

        /* ========== OPEN TRIP SECTION STYLES ========== */

        /* Open Trip Section */
        .open-trip {
            background: linear-gradient(135deg, #fff 0%, #fef8ed 100%);
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .highlight {
            color: #FE9C03;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto 30px;
            line-height: 1.8;
        }

        .btn-pesan {
            background: transparent;
            color: #FE9C03;
            padding: 12px 28px;
            border: 2px solid #FE9C03;
            border-radius: 40px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .btn-pesan:hover {
            background: #FE9C03;
            color: black;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(254, 156, 3, 0.3);
        }

        /* Features Grid - Row by row layout */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px 40px;
            margin-top: 50px;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .feature-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(254, 156, 3, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            text-align: left;
            gap: 20px;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(254, 156, 3, 0.15);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #FE9C03, #ff8c00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            flex-shrink: 0;
        }

        .feature-content {
            flex: 1;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .feature-desc {
            color: #666;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* ========== PRICING SECTION STYLES ========== */

        /* Pricing Section - New Modern Layout */
        .pricing {
            background: linear-gradient(135deg, #fef7f0 0%, #ffffff 100%);
            text-align: center;
            position: relative;
            padding: 100px 0;
        }

        .pricing::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 50px,
                rgba(254, 156, 3, 0.02) 50px,
                rgba(254, 156, 3, 0.02) 100px
            );
            opacity: 0.6;
        }

        .price-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 5px auto 0;
            transition: all 0.4s ease;
            border: 2px solid #f0f0f0;
            position: relative;
            padding: 40px;
        }

        .price-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(254, 156, 3, 0.15);
            border-color: #FE9C03;
        }

        .price-header {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 30px;
        }

        .price-header-content {
            flex: 1;
            text-align: left;
        }

        .trip-image-container {
            width: 400px;
            height: 250px;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            border-radius: 15px;
        }

        .price-content {
            text-align: left;
        }

        .trip-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
            border-radius: 15px;
        }

        .price-card:hover .trip-image {
            transform: scale(1.05);
        }

        .trip-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(0, 0, 0, 0.3) 0%, 
                rgba(254, 156, 3, 0.1) 50%, 
                transparent 100%);
            border-radius: 15px;
        }

        .price-content {
            text-align: center;
        }

        .price-header {
            margin-bottom: 25px;
        }

        .price-badge {
            background: linear-gradient(135deg, #FE9C03, #ff8c00);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 12px;
        }

        .trip-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #333;
            position: relative;
        }

        .trip-title .highlight {
            color: #FE9C03;
        }

        .trip-subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .price-main {
            background: #FE9C03;
            border-radius: 25px;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 25px;
        }

        .price-amount {
            font-size: 1.8rem;
            font-weight: 900;
            color: white;
            line-height: 1;
        }

        .price-currency {
            font-size: 0.9rem;
            color: white;
            font-weight: 500;
            opacity: 0.9;
        }

        .price-per {
            color: white;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .btn-detail {
            background: white;
            color: #FE9C03;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-detail:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .trip-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .feature-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            color: #555;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: white;
            border-color: #FE9C03;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 156, 3, 0.1);
        }

        .feature-item i {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #FE9C03, #ff8c00);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(254, 156, 3, 0.3);
        }

        .feature-text {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .price-bottom {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
            border: 2px solid #FE9C03 !important;
            box-shadow: none !important;
            transform: translateY(-3px);
        }

        /* ========== de SECTION STYLES ========== */

        /* de Section */
        .de {
            background: white;
        }

        .de-content {
            text-align: center;
            margin-bottom: 50px;
        }

        /* Package Recommendations */
        .packages {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            width: 100%;
            margin: 0;
        }

        .packages h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #333;
        }

        .packages h2 span {
            color: #FE9C03;
        }

        .package-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
        }

        .package-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            border: 1px solid rgba(254, 156, 3, 0.1);
            display: flex;
            flex-direction: column;
            height: 450px;
            min-height: 450px;
        }

        .package-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(254, 156, 3, 0.15);
            border-color: rgba(254, 156, 3, 0.3);
        }

        .package-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .package-card:nth-child(1) .package-image {
            background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.3));
        }

        .package-card:nth-child(2) .package-image {
            background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.3));
        }

        .package-card:nth-child(3) .package-image {
            background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.3));
        }

        .decorative-img {
            position: absolute;
            width: 280px;
            height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .decorative-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .decorative-img:nth-child(1) {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(2deg);
        }

        .decorative-img:nth-child(2) {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(2deg);
        }

        .decorative-img:nth-child(3) {
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%) rotate(2deg);
        }

        .package-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            padding: 5px 10px;
            border-radius: 14px;
            font-size: 0.8rem;
            font-weight: bold;
            color: #FE9C03;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .package-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .package-content h3 {
            font-size: 1.4rem;
            margin-bottom: 12px;
            color: #333;
            font-weight: 700;
        }

        .package-content p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .package-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 14px;
            margin-top: 10px;
            margin-top: auto;
        }

        .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #FE9C03;
        }

        .per-person {
            font-size: 0.75rem;
            color: #666;
        }

        .package-btn {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .package-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(254, 156, 3, 0.3);
            background: linear-gradient(135deg, #FFC100, #FFD700);
        }

        /* ========== PAYMENT MODAL STYLES ========== */

        .payment-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease;
            overflow-y: auto;
        }

        .payment-modal-content {
            background-color: white;
            margin: 20px auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            animation: slideUp 0.3s ease;
            max-height: calc(100vh - 40px);
            overflow-y: auto;
        }

        .payment-modal-header {
            background: linear-gradient(135deg, #FE9C03, #ff8c00);
            color: white;
            padding: 25px;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .payment-modal-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .payment-close {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .payment-close:hover {
            opacity: 0.7;
        }

        .payment-modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #FE9C03;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            transition: border-color 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #FE9C03;
        }

        .number-input-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            transition: border-color 0.3s ease;
            position: relative;
            height: 48px;
        }

        .number-input-wrapper:focus-within {
            border-color: #FE9C03;
        }

        .number-btn-left,
        .number-btn-right {
            background: transparent;
            border: none;
            padding: 12px;
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 100%;
            border-radius: 6px;
        }

        .number-btn-left {
            margin-left: 4px;
        }

        .number-btn-right {
            margin-right: 4px;
        }

        .number-btn-left:hover,
        .number-btn-right:hover {
            background: #FE9C03;
            color: white;
        }

        .number-btn-left:disabled,
        .number-btn-right:disabled {
            background: transparent;
            color: #ccc;
            cursor: not-allowed;
        }

        .number-display {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            height: 100%;
            cursor: pointer;
        }

        .number-input-manual {
            position: absolute;
            width: 100%;
            height: 100%;
            border: none;
            background: transparent;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            outline: none;
            opacity: 0;
            z-index: 3;
        }

        .number-input-manual::-webkit-outer-spin-button,
        .number-input-manual::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .number-input-manual[type=number] {
            -moz-appearance: textfield;
        }

        .number-input-manual.active {
            opacity: 1;
            background: white;
        }

        .number-value {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            z-index: 2;
            margin-right: 5px;
        }

        .number-unit {
            font-size: 14px;
            color: #666;
            z-index: 2;
        }

        .number-placeholder {
            position: absolute;
            font-size: 14px;
            color: #999;
            opacity: 0.6;
            pointer-events: none;
            z-index: 1;
        }

        /* Payment Details Styling */
        .payment-details {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .payment-info h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .bank-card, .ewallet-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .bank-card:hover, .ewallet-card:hover {
            border-color: #FE9C03;
            box-shadow: 0 4px 12px rgba(254, 156, 3, 0.1);
        }

        .bank-logo, .ewallet-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #FE9C03;
            font-size: 18px;
        }

        .bank-details, .ewallet-details {
            margin-bottom: 15px;
        }

        .bank-details p, .ewallet-details p {
            margin: 8px 0;
            color: #555;
        }

        .account-number, .ewallet-number {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            color: #333;
            background: #f0f0f0;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .copy-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #FE9C03;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: #e8890b;
            transform: translateY(-1px);
        }

        .transfer-note {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 6px;
            padding: 12px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .transfer-note i {
            color: #1976d2;
            margin-top: 2px;
        }

        .transfer-note p {
            margin: 0;
            color: #1565c0;
            font-size: 14px;
        }

        /* Upload Section Styling */
        .upload-section {
            margin-top: 20px;
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .upload-area:hover {
            border-color: #FE9C03;
            background: #fff8f0;
        }

        .upload-area.dragover {
            border-color: #FE9C03;
            background: #fff8f0;
            transform: scale(1.02);
        }

        .upload-content i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 15px;
        }

        .upload-content p {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }

        .upload-content span {
            font-size: 12px;
            color: #999;
        }

        .upload-preview {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .upload-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 2px solid #e0e0e0;
        }

        .preview-info {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .preview-info p {
            margin: 0;
            font-weight: 500;
            color: #333;
        }

        .remove-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #c82333;
            transform: scale(1.1);
        }

        .required {
            color: #dc3545;
            font-weight: bold;
        }

        .upload-error {
            margin-top: 10px;
            padding: 10px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            color: #721c24;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .upload-error i {
            color: #dc3545;
        }

        /* Success Modal */
        .success-modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease;
        }

        .success-modal-content {
            background-color: white;
            margin: 0;
            padding: 25px;
            border-radius: 15px;
            width: 50%;
            max-width: 400px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: slideInDown 0.3s ease;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
        }

        .success-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .success-message {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .success-contact {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .success-contact h4 {
            color: #333;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .success-contact p {
            margin: 5px 0;
            color: #555;
        }

        .btn-close-success {
            background: #FE9C03;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-close-success:hover {
            background: #e8890b;
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Destinasi Section Styling - Carousel */
        .destinasi-section {
            padding: 50px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            overflow: hidden;
        }

        .destinasi-content {
            text-align: center;
            margin-bottom: 40px;
        }

        .destinasi-carousel {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .carousel-container {
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-slide {
            min-width: 100%;
            position: relative;
            height: 400px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: end;
            justify-content: center;
        }

        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);
        }

        .slide-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 30px 15px;
            max-width: 450px;
        }

        .slide-content h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 12px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .slide-content p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .slide-features {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .slide-features span {
            background: rgba(254, 156, 3, 0.9);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .slide-features span i {
            font-size: 0.8rem;
        }

        /* Carousel Navigation */
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #333;
            transition: all 0.3s ease;
            z-index: 3;
            backdrop-filter: blur(10px);
        }

        .carousel-nav:hover {
            background: #FE9C03;
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-prev {
            left: -70px;
        }

        .carousel-next {
            right: -70px;
        }

        /* Carousel Indicators */
        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .indicator.active {
            background: #FE9C03;
            transform: scale(1.2);
        }

        .indicator:hover {
            background: #ff8c00;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .destinasi-section {
                padding: 40px 0;
            }

            .destinasi-carousel {
                padding: 0 10px;
            }

            .carousel-slide {
                height: 300px;
            }

            .slide-content h3 {
                font-size: 2rem;
            }

            .slide-content p {
                font-size: 1rem;
            }

            .slide-features {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .carousel-nav {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .carousel-prev {
                left: -50px;
            }

            .carousel-next {
                right: -50px;
            }

            .destinasi-grid {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 0 20px;
            }

            .destinasi-card {
                padding: 20px;
                gap: 15px;
                flex-direction: column;
                text-align: center;
            }

            .destinasi-icon {
                width: 50px;
                height: 50px;
            }

            .destinasi-icon i {
                font-size: 20px;
            }

            .destinasi-info h3 {
                font-size: 16px;
            }

            .destinasi-features {
                justify-content: center;
                gap: 8px;
            }
        }

        .payment-summary, .booking-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 1px solid #e0e0e0;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 1.2rem;
            color: #FE9C03;
            border-top: 2px solid #e0e0e0;
            padding-top: 15px;
            margin-top: 15px;
        }

        .btn-booking {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(254, 156, 3, 0.3);
        }

        .btn-booking:hover {
            background: linear-gradient(135deg, #e8890b, #e8890b);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(254, 156, 3, 0.4);
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        /* Confirmation Modal Styles */
        .confirmation-modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .confirmation-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 400px;
            width: 85%;
        }

        .confirmation-icon {
            margin-bottom: 20px;
        }

        .check-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .check-icon i {
            font-size: 30px;
            color: white;
        }

        .confirmation-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 12px;
        }

        .confirmation-message {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .booking-details {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #e0e0e0;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .detail-item:last-child {
            border-bottom: none;
            font-weight: bold;
            color: #FE9C03;
            font-size: 18px;
        }

        .detail-label {
            color: #666;
            font-size: 14px;
        }

        .detail-value {
            color: #333;
            font-weight: 500;
        }

        .confirmation-contact {
            background: #e8f5e8;
            border: 1px solid #c3e6c3;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .confirmation-contact h4 {
            color: #155724;
            font-size: 14px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .confirmation-contact p {
            color: #155724;
            font-size: 12px;
            margin: 6px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .confirmation-contact i {
            width: 16px;
            text-align: center;
            color: #28a745;
        }

        .btn-close-confirmation {
            background: #FE9C03;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(254, 156, 3, 0.3);
        }

        /* Info Card Styles */
        .info-card {
            background: linear-gradient(135deg, #e3f2fd 0%, #f0f8ff 100%);
            border: 1px solid #bbdefb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);
        }

        .info-card i {
            color: #1976d2;
            font-size: 20px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .info-card p {
            color: #1565c0;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            font-weight: 500;
        }

        .btn-close-confirmation:hover {
            background: #e8890b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(254, 156, 3, 0.4);
        }

        /* Facilities Section Styles */
        .facilities-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .facilities-content {
            text-align: center;
            margin-bottom: 60px;
        }

        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .facility-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid #f0f0f0;
        }

        .facility-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            border-color: #FE9C03;
        }

        .facility-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #FE9C03, #ff8c00);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(254, 156, 3, 0.3);
        }

        .facility-icon i {
            font-size: 24px;
            color: white;
        }

        .facility-info {
            flex: 1;
        }

        .facility-info h3 {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .facility-info p {
            color: #666;
            line-height: 1.5;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .facility-features {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .facility-features span {
            background: #f8f9fa;
            color: #555;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
            border: 1px solid #e0e0e0;
        }

        .facility-features span i {
            color: #FE9C03;
            font-size: 10px;
        }

        /* Responsive Design for Facilities */
        @media (max-width: 768px) {
            .facilities-section {
                padding: 60px 0;
            }

            .facilities-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 20px;
            }

            .facility-card {
                padding: 20px;
                gap: 15px;
                flex-direction: column;
                text-align: center;
            }

            .facility-icon {
                width: 50px;
                height: 50px;
            }

            .facility-icon i {
                font-size: 20px;
            }

            .facility-info h3 {
                font-size: 16px;
            }

            .facility-features {
                justify-content: center;
                gap: 8px;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .btn-pembayaran {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            color: black;
            padding: 12px 25px;
            border: 2px solid transparent;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            display: inline-block;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            font-size: 0.95rem;
        }

        .btn-pembayaran:hover {
            background: transparent !important;
            color: black !important;
            border: 2px solid #FE9C03 !important;
            box-shadow: none !important;
            transform: translateY(-3px);
        }

        /* Gallery */
        .gallery {
            padding: 80px 0;
            background: white;
        }

        .gallery h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #333;
        }

        .gallery h2 span {
            color: #FE9C03;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .gallery-item {
            height: 250px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));
            display: flex;
            align-items: flex-end;
            padding: 20px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-info {
            color: white;
        }

        .gallery-info h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .gallery-info p {
            font-size: 14px;
            color: #ccc;
        }

        .view-more {
            text-align: center;
        }

        .view-more a {
            color: #FE9C03;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border: 2px solid #FE9C03;
            padding: 12px 30px;
            border-radius: 25px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .view-more a:hover {
            background: #FE9C03;
            color: white;
        }

        /* Testimonials */
        .testimonials {
            padding: 80px 0;
            background: white;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #333;
        }

        .testimonials h2 span {
            color: #FE9C03;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background: white;
            padding: 50px 30px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
            margin-top: 40px;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .testimonial-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: url('https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80') center/cover;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .testimonial-card:nth-child(2) .testimonial-avatar {
            background: url('https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80') center/cover;
        }

        .testimonial-card:nth-child(3) .testimonial-avatar {
            background: url('https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80') center/cover;
        }

        .avatar-ring {
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 3px solid #FE9C03;
            border-radius: 50%;
            opacity: 0.6;
        }

        .testimonial-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 30px 0 15px;
        }

        .testimonial-text {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            font-style: italic;
        }

        .testimonial-rating {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .star {
            color: #FE9C03;
            font-size: 18px;
        }

        .star.empty {
            color: #ddd;
        }

        /* Why Choose Us */
        .why-choose {
            padding: 80px 0;
            background: white;
            scroll-margin-top: 100px;
        }

        .why-choose-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .why-choose-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .why-choose-title h2 .highlight {
            background: #FE9C03;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .why-choose .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .packages .container {
            max-width: 100%;
            width: 100%;
        }

        /* Benefits List - Two Column layout */
        .benefits-list-two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 30px;
            margin-top: 40px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .benefit-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            flex-shrink: 0;
        }

        .benefit-content {
            flex: 1;
        }

        .benefit-content h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 600;
        }

        .benefit-content p {
            color: #666;
            line-height: 1.6;
            font-size: 14px;
            margin: 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 80px;
        }

        .feature-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            transition: all 0.4s;
            border: 1px solid rgba(255, 107, 53, 0.1);
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: rgba(255, 107, 53, 0.3);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
        }

        .feature-card h4 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            flex-shrink: 0;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .bottom-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .bottom-feature {
            text-align: center;
            padding: 30px 20px;
            border-radius: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            transition: all 0.4s;
            border: 1px solid rgba(255, 107, 53, 0.1);
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .bottom-feature:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: rgba(255, 107, 53, 0.3);
        }

        .bottom-feature i {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            flex-shrink: 0;
        }

        .bottom-feature h5 {
            font-weight: bold;
            margin-bottom: 12px;
            color: #333;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .bottom-feature p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .features-grid,
        .bottom-features {
            max-width: 1200px;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 80px 0 40px;
            scroll-margin-top: 100px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 0px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
        }

        .footer-section h4 {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 25px;
            color: white;
            position: relative;
        }

        .footer-section h4::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border-radius: 2px;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: all 0.3s;
            position: relative;
            padding-left: 0;
        }

        .footer-section a:hover {
            color: #FE9C03;
            padding-left: 10px;
        }

        .footer-section p {
            color: #ccc;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .social-links {
            margin-top: 0px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .social-links h5 {
            margin-bottom: 20px;
            color: white;
            font-size: 1.1rem;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #333, #444);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .social-icons a:hover {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 30px;
            text-align: center;
            color: #ccc;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .search-box {
                width: 150px;
            }

            .search-box input {
                width: 100px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .section-title {
                font-size: 2rem;
            }
            
            .main-content {
                padding: 80px 0;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .price-card {
                padding: 30px 20px;
                max-width: 95%;
            }

            .price-header {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .trip-image-container {
                width: 100%;
                height: 200px;
            }

            .price-content {
                text-align: center;
            }

            .trip-title {
                font-size: 1.8rem;
            }

            .price-amount {
                font-size: 2.5rem;
            }

            .trip-features {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .feature-item {
                padding: 12px;
            }

            .feature-item i {
                width: 35px;
                height: 35px;
                font-size: 14px;
                margin: 30px auto 0;
            }

            .trip-image-container {
                width: 100%;
                height: 280px;
                margin: 20px;
                border-radius: 20px;
            }

            .price-content {
                text-align: center;
                padding: 30px 25px;
            }

            .price-bottom {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }

            .btn-primary {
                width: 100%;
            }

            .btn-pesan {
                padding: 12px 25px;
                font-size: 1rem;
            }
            
            .exploration-grid {
                grid-template-columns: 1fr;
            }
            
            .payment-modal-content {
                width: 95%;
                margin: 10px auto;
            }

            .feature-card {
                padding: 20px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .testimonials-grid,
            .why-features-grid,
            .bottom-features {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .footer-content {
                flex-direction: column;
                gap: 30px;
            }

            .footer-section {
                min-width: 100%;
                text-align: center;
            }

            .logout-modal-content {
                margin: 20px;
                padding: 25px;
                border-radius: 15px;
            }
            
            .logout-button-group {
                flex-direction: column;
                align-items: center;
            }
            
            .logout-btn {
                width: 100%;
                max-width: 200px;
            }

            .modal-content {
                width: 95%;
                margin: 10px auto;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 15px;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .btn-primary, .btn-secondary {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .container {
                padding: 0 15px;
            }

            .main-content {
                padding: 80px 0;
            }

            .price-content {
                padding: 25px 20px;
            }

            .trip-title {
                font-size: 1.5rem;
            }

            .btn-primary {
                padding: 12px 25px;
                font-size: 1rem;
            }

            .trip-image-container {
                height: 240px;
            }

            .footer {
                padding: 60px 0 30px;
            }

            .footer-content {
                gap: 25px;
            }

            .footer-section h4 {
                font-size: 1.2rem;
                margin-bottom: 20px;
            }

            .footer-section p,
            .footer-section a {
                font-size: 0.9rem;
            }

            .logout-modal-content {
                margin: 15px;
                padding: 20px;
                border-radius: 12px;
            }
            
            .logout-modal-content h3 {
                font-size: 1.4rem;
            }
            
            .logout-close {
                top: 15px;
                right: 20px;
                width: 28px;
                height: 28px;
                font-size: 18px;
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

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Custom Smooth Scroll behavior */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        /* Additional fix for anchor links */
        section[id] {
            scroll-margin-top: 100px;
        }

        /* Custom Scrollbar */
        .modal-content::-webkit-scrollbar,
        .payment-modal-content::-webkit-scrollbar {
            width: 6px;
        }

        .modal-content::-webkit-scrollbar-track,
        .payment-modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .modal-content::-webkit-scrollbar-thumb,
        .payment-modal-content::-webkit-scrollbar-thumb {
            background: #FE9C03;
            border-radius: 3px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover,
        .payment-modal-content::-webkit-scrollbar-thumb:hover {
            background: #e55a2b;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="#" class="logo">
                <img src="{{ asset('images/logo-mlaku.png') }}" alt="Logo MlakuBromo">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">Beranda</a>
                        @else
                            <a href="{{ route('home') }}">Beranda</a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="active">Paket Trip</a>
                        @else
                            <a href="{{ route('paket-trip') }}" class="active">Paket Trip</a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">Cara Pemesanan</a>
                        @else
                            <a href="{{ route('cara-pemesanan') }}">Cara Pemesanan</a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">Galeri</a>
                        @else
                            <a href="{{ route('galeri') }}">Galeri</a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">Kontak</a>
                        @else
                            <a href="{{ route('kontak') }}">Kontak</a>
                        @endif
                    </li>
                    </ul>
            </nav>
            <div class="nav-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Cari destinasi..." id="searchInput">
                        <i class="fas fa-search"></i>
                    </div>
    <form id="dailyBookingForm" method="POST" action="{{ route('pemesanan.store') }}" style="display:none;">
        @csrf
        <input type="hidden" name="paket" value="Daily Trip Bromo Sunrise">
        <input type="hidden" id="dailyPesertaHidden" name="peserta">
        <input type="hidden" id="dailyTanggalHidden" name="tanggal_keberangkatan">
        <input type="hidden" id="dailyTotalHidden" name="total">
        <input type="hidden" id="dailyTitikHidden" name="titik_penjemputan" value="default">
    </form>
                    @if(Auth::check())
                    <div class="profile-dropdown">
                        <button class="profile-btn" onclick="toggleProfileDropdown()">
                            <img src="{{ Auth::user()->avatar ?? asset('images/profil.png') }}" alt="Profile" class="profile-avatar">
                            <span class="profile-name">{{ Auth::user()->username ?? 'Profil' }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" id="profileDropdown">
                            @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                <i class="fas fa-gauge"></i>
                                Dashboard Admin
                            </a>
                            <hr class="dropdown-divider">
                            @else
                            <a href="{{ route('profil') }}" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                Profil Saya
                            </a>
                            <a href="{{ route('riwayatpesan') }}" class="dropdown-item">
                                <i class="fas fa-history"></i>
                                Riwayat Pemesanan
                            </a>
                            <a href="{{ route('riwayattesti') }}" class="dropdown-item">
                                <i class="fas fa-star"></i>
                                Riwayat Testimoni
                            </a>
                            <hr class="dropdown-divider">
                            @endif
                            <a href="#" class="dropdown-item" onclick="showLogoutModal()">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                    @else
                    <button class="login-btn" onclick="document.getElementById('loginModal').style.display='block'">Login</button>
                    @endif
                </div>
        </div>
    </header>

    <!-- Logout Form (Hidden) -->
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Logout Modal -->
    <div id="logoutModal" class="logout-modal">
        <div class="logout-modal-content">
            <span class="logout-close" onclick="closeLogoutModal()">&times;</span>
            
            <h3>Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar dari akun Anda?<br>
            Anda perlu login kembali untuk mengakses akun.</p>
            
            <div class="logout-button-group">
                <button class="logout-btn logout-btn-cancel" onclick="closeLogoutModal()">
                    Batal
                </button>
                <button class="logout-btn logout-btn-confirm" onclick="confirmLogout()">
                    Ya, Logout
                </button>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <form id="loginForm">
                <h3>Login</h3>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <p style="font-size: 14px; text-align: center;">Belum punya akun? <a href="#" onclick="switchToRegister()">Daftar</a></p>
            </form>
            <div id="loginError" style="color:red; text-align:center;"></div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('registerModal').style.display='none'">&times;</span>
            <form id="registerForm">
                <h3>Daftar</h3>
                <input type="text" name="username" placeholder="Nama Lengkap" required>
                <input type="text" name="ktp" placeholder="No. KTP" required>
                <input type="text" name="nomor_hp" placeholder="Nomor HP" required>
                <input type="text" name="asal" placeholder="Asal" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                <button type="submit">Daftar</button>
                <p style="font-size: 14px; text-align: center;">Sudah punya akun? <a href="#" onclick="switchToLogin()">Login</a></p>
            </form>
            <div id="registerError" style="color:red; text-align:center;"></div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero" id="hero" style="background-image: url('{{ asset("images/hero/gambarhero.png") }}'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="title-line">
                    <span class="highlight">Satu</span> Trip, <span class="highlight">Seribu</span> Cerita 
                </h1>
                <h1>Bersama <span class="highlight">MlakuBromo.ID</span></h1>
                <p>Dari satu trip, lahir ribuan kenangan indah. Jelajahi sekarang!</p>
                <div class="hero-buttons">
                    <a href="#paket" class="btn-primary">Jelajahi Paket Trip</a>
                    <a href="#kontak" class="btn-secondary">Kontak</a>
                </div>
            </div>

            <!-- <div class="hero-images">
                <div class="hero-image">
                    <img src="{{ asset('images/hero/h1.png') }}" class="hero-img" alt="Logo MlakuBromo">
                </div>     
                <div class="hero-image">
                    <img src="{{ asset('images/hero/h2.png') }}" class="hero-img" alt="Hero Image 2">
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/hero/h3.png') }}" class="hero-img" alt="Hero Image 3">
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/hero/h4.png') }}" class="hero-img" alt="Hero Image 4">
                </div>
            </div> -->
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Open Trip Section -->
    <section class="open-trip section" id="paket">
        <div class="container">
            <h2 class="section-title animate-on-scroll">Daily <span class="highlight">Trip</span> Bromo Sunrise</h2>
            <p class="section-subtitle animate-on-scroll">
            Temukan pesona Bromo dalam trip harian yang penuh keseruan. Sunrise spektakuler, kawah megah, hingga panorama alam indah siap menyambutmu.
            </p>

            <!-- <h3 class="section-title" style="margin-top: 60px;">Apa yang <span class="highlight">Dapat</span> Dapatkan?</h3>
            
            <div class="benefits-list-two-column">
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Sunrise Spektakuler</h4>
                        <p>Saksikan matahari terbit yang memukau dari puncak Penanjakan dengan pemandangan 360 derajat yang tak terlupakan.</p>
                    </div>
                </div>
                
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Spot Foto Instagramable</h4>
                        <p>Dapatkan foto-foto menakjubkan di berbagai spot ikonik seperti Kawah Bromo, Bukit Teletubbies, dan Savana Bromo.</p>
                    </div>
                </div>
                
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Guide Profesional</h4>
                        <p>Dipandu oleh guide lokal berpengalaman yang menguasai seluk-beluk Bromo dan siap membantu perjalanan Anda.</p>
                    </div>
                </div>
                
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Transportasi Nyaman</h4>
                        <p>Kendaraan yang terawat dan nyaman untuk perjalanan yang aman menuju berbagai destinasi di kawasan Bromo.</p>
                    </div>
                </div>
                
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Penginapan Strategis</h4>
                        <p>Menginap di lokasi strategis dekat area Bromo untuk memudahkan akses ke berbagai spot wisata utama.</p>
                    </div>
                </div>
                
                <div class="benefit-item animate-on-scroll">
                    <div class="benefit-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Makanan Lokal</h4>
                        <p>Nikmati cita rasa kuliner lokal khas Bromo yang lezat dan menghangatkan tubuh di cuaca dingin pegunungan.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing section" id="paket-harga">
            <h2 class="section-title animate-on-scroll">Harga <span class="highlight">Paket</span></h2>
            
            <div class="price-card animate-on-scroll">
                <div class="price-header">                    
                    <div class="trip-image-container">
                        <img src="{{ asset('images/packages/openpaket.png') }}" alt="Open Trip Bromo" class="trip-image">
                        <div class="trip-image-overlay"></div>
                    </div>

                    <div class="price-header-content">
                        <div class="price-badge">Open Trip | Private Trip</div>
                        <h3 class="trip-title">Daily <span class="highlight">Trip</span> Bromo Sunrise</h3>
                        <p class="trip-subtitle">Nikmati petualangan seru ke Bromo bersama traveler lain dengan harga terjangkau</p>
                    </div>
                    

                </div>
                
                <div class="price-content">
                    <!-- <div class="trip-features">
                        <div class="feature-item">
                            <i class="fas fa-car"></i>
                            <div class="feature-text">Transport Jeep Bromo & Driver</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-ticket-alt"></i>
                            <div class="feature-text">Tiket Masuk Bromo</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-mountain"></i>
                            <div class="feature-text">Spot Bromo Terbaik</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <div class="feature-text">Tour Guide Berpengalaman</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-camera"></i>
                            <div class="feature-text">Spot Foto Terbaik</div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <div class="feature-text">Asuransi Perjalanan</div>
                        </div>
                    </div> -->
                    
                    <div class="price-main">
                        <div>
                            <span class="price-amount">IDR 350.000</span>
                            <span class="price-per">/orang</span>
                        </div>
                        <button class="btn-detail" onclick="checkLoginAndOrder()">Pesan Sekarang!</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinasi Section -->
    <section class="destinasi-section" id="destinasi-daily">
        <div class="container">
            <div class="destinasi-content animate-on-scroll">
                <h2 class="section-title">Destinasi <span class="highlight">Daily Trip</span> Bromo Sunrise</h2>
                <p class="section-subtitle">
                    Nikmati pengalaman tak terlupakan dengan destinasi yang sudah dirancang khusus untuk memberikan Anda petualangan terbaik di Bromo dalam 1 hari.
                </p>
            </div>
            
            <div class="destinasi-carousel">
                <div class="carousel-container">
                    <div class="carousel-track" id="carouselTrack">
                        <!-- Slide 1: Sunrise Point -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/sunrise.jpg') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Sunrise Point Bromo</h3>
                                <p>Saksikan matahari terbit yang spektakuler dari puncak Penanjakan dengan pemandangan Gunung Bromo yang memukau.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-clock"></i> 04:00 WIB</span>
                                    <span><i class="fas fa-mountain"></i> 2.770 mdpl</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Pura Poten -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/pura.jpeg') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Kawah Bromo & Pura Poten</h3>
                                <p>Jelajahi kawah aktif Gunung Bromo dan kunjungi Pura Poten yang bersejarah di kaki gunung berapi.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-fire"></i> Kawah Aktif</span>
                                    <span><i class="fas fa-place-of-worship"></i> Pura Hindu</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Pasir Berbisik -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/pasir.JPG') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Pasir Berbisik</h3>
                                <p>Rasakan sensasi unik berjalan di hamparan pasir vulkanik yang mengeluarkan suara berbisik saat tertiup angin.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-wind"></i> Fenomena Alam</span>
                                    <span><i class="fas fa-camera"></i> Spot Foto</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4: Bukit Teletubbies -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/bukit.jpeg') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Bukit Teletubbies</h3>
                                <p>Nikmati pemandangan padang savana hijau yang luas seperti di film Teletubbies dengan udara sejuk pegunungan.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-leaf"></i> Savana</span>
                                    <span><i class="fas fa-thermometer-half"></i> Sejuk</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5: Batok -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/batok.jpg') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Gunung Batok</h3>
                                <p>Jelajahi gunung yang tidak aktif dengan pemandangan menakjubkan dan jalur pendakian yang menantang.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-mountain"></i> Gunung Mati</span>
                                    <span><i class="fas fa-hiking"></i> Trekking</span>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 6: Widodaren -->
                        <div class="carousel-slide" style="background-image: url('{{ asset('images/destinasiopen/widodaren.jpg') }}')">
                            <div class="slide-overlay"></div>
                            <div class="slide-content">
                                <h3>Widodaren</h3>
                                <p>Titik tertinggi untuk menyaksikan panorama lengkap Bromo dengan view 360 derajat yang menakjubkan.</p>
                                <div class="slide-features">
                                    <span><i class="fas fa-eye"></i> Panorama</span>
                                    <span><i class="fas fa-mountain"></i> 2.770 mdpl</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button class="carousel-nav carousel-prev" onclick="prevSlide()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-nav carousel-next" onclick="nextSlide()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button class="indicator active" onclick="currentSlide(1)"></button>
                    <button class="indicator" onclick="currentSlide(2)"></button>
                    <button class="indicator" onclick="currentSlide(3)"></button>
                    <button class="indicator" onclick="currentSlide(4)"></button>
                    <button class="indicator" onclick="currentSlide(5)"></button>
                    <button class="indicator" onclick="currentSlide(6)"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="facilities-section" id="fasilitas-daily">
        <div class="container">
            <div class="facilities-content animate-on-scroll">
                <h2 class="section-title">Fasilitas <span class="highlight">Daily Trip</span> Bromo Sunrise</h2>
                <p class="section-subtitle">
                    Nikmati fasilitas lengkap yang telah kami siapkan untuk kenyamanan perjalanan Anda
                </p>
            </div>
            
            <div class="facilities-grid">
                <div class="facility-card animate-on-scroll">
                    <div class="facility-icon">
                        <i class="fas fa-bus"></i>
                    </div>
                    <div class="facility-info">
                        <h3>Akomodasi transportasi</h3>
                        <p>Transportasi nyaman untuk perjalanan menuju dan dari lokasi wisata Bromo</p>
                        <div class="facility-features">
                            <span><i class="fas fa-bus"></i> Comfortable</span>
                            <span><i class="fas fa-route"></i> Door to Door</span>
                        </div>
                    </div>
                </div>

                <div class="facility-card animate-on-scroll">
                    <div class="facility-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="facility-info">
                        <h3>Jeep Bromo</h3>
                        <p>Kendaraan jeep khusus untuk menjelajahi medan Bromo yang menantang</p>
                        <div class="facility-features">
                            <span><i class="fas fa-mountain"></i> Off-road</span>
                            <span><i class="fas fa-shield-alt"></i> Aman</span>
                        </div>
                    </div>
                </div>

                <div class="facility-card animate-on-scroll">
                    <div class="facility-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="facility-info">
                        <h3>Tiket masuk</h3>
                        <p>Tiket masuk ke kawasan Taman Nasional Bromo Tengger Semeru</p>
                        <div class="facility-features">
                            <span><i class="fas fa-tree"></i> Taman Nasional</span>
                            <span><i class="fas fa-ticket-alt"></i> All Access</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

        </div>
    </main>

    <!-- Package Recommendations -->
    <section class="packages" id="paket">
        <div class="container animate-on-scroll">
            <h2>Rekomendasi <span>Paket Trip </span>Lainnya</h2>
            <div class="package-grid">  
                
                <div class="package-card animate-on-scroll">
                    <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                        <div class="decorative-img" >
                            <img src="{{ asset('images/packages/traveltrip.jpg') }}" alt="Bromo">
                        </div>
                    </div>
                    <div class="package-badge">Private Trip</div>
                    <div class="package-content">
                        <h3>Travel to Malang Bromo</h3>
                        <p>Kombinasi wisata Kota Malang dan Gunung Bromo. Jelajahi destinasi wisata Malang dilanjutkan dengan petualangan di Bromo yang menakjubkan.</p>
                        <div class="package-price">
                            <a href="javascript:void(0)" class="package-btn" onclick="checkLoginAndOrder()">Pesan Sekarang!</a>
                            <div class="price-info">
                                <div class="price">IDR 2.000.000</div>
                                <div class="per-person">/orang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="package-card animate-on-scroll">
                    <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                        <div class="decorative-img" >
                            <img src="{{ asset('images/packages/paketwna.jpg') }}" alt="Bromo">
                        </div>
                    </div>
                    <div class="package-badge">Private Trip</div>
                    <div class="package-content">
                        <h3>Paket Bromo Ijen WNA</h3>
                        <p>Paket wisata Malang Bromo khusus mancanegara. Eksplorasi kota Malang lalu nikmati sunrise dan petualangan seru di Gunung Bromo.</p>
                        <div class="package-price">
                            <a href="javascript:void(0)" class="package-btn" onclick="checkLoginAndOrder()">Pesan Sekarang!</a>
                            <div class="price-info">
                                <div class="price">IDR 2.000.000</div>
                                <div class="per-person">/orang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="package-card animate-on-scroll">
                    <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                        <div class="decorative-img" >
                            <img src="{{ asset('images/packages/opentripbromo.jpg') }}" alt="Bromo">
                        </div>
                    </div>
                    <div class="package-badge">Open Trip | Private Trip</div>
                    <div class="package-content">
                        <h3>Open Trip Bromo</h3>
                        <p>Nikmati sunrise spektakuler di Gunung Bromo dengan paket open trip yang hemat dan menyenangkan. Termasuk transportasi, penginapan, dan guide profesional.</p>
                        <div class="package-price">
                            <a href="{{ route('paket-trip') }}" class="package-btn">Pesan Sekarang!</a>
                            <div class="price-info">
                                <div class="price">IDR 350.000</div>
                                <div class="per-person">/orang</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div id="paymentModal" class="payment-modal">
        <div class="payment-modal-content">
            <div class="payment-modal-header">
                <h3 class="payment-modal-title">Booking Daily Trip Bromo Sunrise</h3>
                <span class="payment-close" onclick="closePaymentModal()">&times;</span>
            </div>
            <div class="payment-modal-body">
                <form id="bookingForm">
                    <div class="booking-info">
                        <div class="info-card">
                            <i class="fas fa-info-circle"></i>
                            <p>Silakan isi form booking di bawah ini. Setelah booking, kami akan menghubungi Anda untuk konfirmasi dan detail pembayaran.</p>
                        </div>
                        <div style="margin-top: 10px; margin-bottom: 10px; display: flex; flex-wrap: wrap; gap: 8px;">
                            <a href="#destinasi-daily" style="padding: 6px 12px; border-radius: 999px; border: 1px solid #FE9C03; font-size: 0.85rem; color: #FE9C03; text-decoration: none; background-color: #fff;">
                                Lihat Destinasi
                            </a>
                            <a href="#fasilitas-daily" style="padding: 6px 12px; border-radius: 999px; border: 1px solid #FE9C03; font-size: 0.85rem; color: #FE9C03; text-decoration: none; background-color: #fff;">
                                Lihat Fasilitas
                            </a>
                        </div>
                        <div style="margin-bottom: 12px; padding: 10px 12px; border-radius: 10px; background:#FFF7E6; border:1px solid #FE9C03; display:flex; align-items:flex-start; gap:8px;">
                            <div style="width:22px; height:22px; border-radius:50%; background:#FE9C03; display:flex; align-items:center; justify-content:center; color:#fff; flex-shrink:0;">
                                <i class="fas fa-map-marker-alt" style="font-size:12px;"></i>
                            </div>
                            <div style="font-size: 0.85rem; color: #333;">
                                <div style="font-weight:600; margin-bottom:2px;">Titik Kumpul</div>
                                <div>Perum Tunggul Ametung Inside Blok B1</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Jumlah Peserta</label>
                        <div class="number-input-wrapper">
                            <button type="button" class="number-btn-left" onclick="changeParticipants(-1)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="number-display" onclick="enableManualInput()">
                                <input type="number" class="number-input-manual" id="participantCount" value="1" min="1" max="50" onchange="updateTotal()" onblur="disableManualInput()" onkeypress="handleEnterKey(event)" required>
                                <span class="number-value" id="displayValue">1</span>
                                <span class="number-unit">orang</span>
                                <span class="number-placeholder">Pilih peserta</span>
                            </div>
                            <button type="button" class="number-btn-right" onclick="changeParticipants(1)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Tanggal Keberangkatan</label>
                        <input type="date" class="form-input" id="departureDate" required>
                    </div>

                    <div class="booking-summary">
                        <h4 style="margin-bottom: 15px; color: #333;">Ringkasan Booking</h4>
                        <div class="summary-item">
                            <span>Harga per orang</span>
                            <span>Rp 350.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Jumlah peserta</span>
                            <span id="totalParticipants">1 orang</span>
                        </div>
                        <div class="summary-item">
                            <span>Biaya admin</span>
                            <span>Rp 5.000</span>
                        </div>
                        <div class="summary-total">
                            <span>Estimasi Total</span>
                            <span id="totalPrice">Rp 355.000</span>
                        </div>
                    </div>
                    
                    <button type="button" class="btn-booking" onclick="submitBooking()" style="width: 100%; margin-bottom: 15px;">Submit Booking</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="confirmation-modal">
        <div class="confirmation-modal-content">
            <div class="confirmation-icon">
                <div class="check-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <h2 class="confirmation-title">Booking Sedang Diproses</h2>
            <p class="confirmation-message">
                Terima kasih! Booking Anda sedang dalam proses konfirmasi. Tim kami akan segera menghubungi Anda untuk detail pembayaran dan informasi lebih lanjut.
            </p>
            <div class="booking-details">
                <div class="detail-item">
                    <span class="detail-label">Jumlah Peserta:</span>
                    <span class="detail-value" id="confirmedParticipants">1 orang</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Tanggal Keberangkatan:</span>
                    <span class="detail-value" id="confirmedDate">-</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Estimasi Total:</span>
                    <span class="detail-value" id="confirmedTotal">Rp 355.000</span>
                </div>
            </div>
            <button class="btn-close-confirmation" onclick="closeConfirmationModal()">Tutup</button>
        </div>
    </div>

    <!-- Gallery -->
    <section class="gallery">
        <div class="container animate-on-scroll">
            <h2>Galeri <span>Tour </span>MlakuBromo.ID</h2>
            <div class="gallery-grid ">
                <div class="gallery-item animate-on-scroll">
                    <img src="{{ asset('images/gallery/bromosunrise.jpg') }}" alt="Bromo Sunrise">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Sunrise di Bromo</h4>
                            <p>Momen magis matahari terbit di Gunung Bromo</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-item animate-on-scroll">
                    <img src="{{ asset('images/gallery/kawahijen.jpg') }}" alt="Kawah Ijen">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Blue Fire Ijen</h4>
                            <p>Fenomena api biru yang menakjubkan di Kawah Ijen</p>
                        </div>
                    </div>
                </div>
                <div class="gallery-item animate-on-scroll">
                    <img src="{{ asset('images/gallery/tumpaksewu.jpg') }}" alt="Tumpak Sewu">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Tumpak Sewu</h4>
                            <p>Air terjun spektakuler dengan ketinggian 120 meter</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-more animate-on-scroll">
                <a href="{{ route('galeri') }}">Selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container animate-on-scroll">
            <h2>Apa <span>Kata </span>Mereka?</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card animate-on-scroll">
                    <div class="testimonial-avatar">
                        <div class="avatar-ring"></div>
                    </div>
                    <div class="testimonial-name">Sarah Jessica</div>
                    <div class="testimonial-text">Sangat puas dengan pelayanan MlakuBromo! Guide yang ramah, penginapan nyaman, dan yang terpenting pemandangan yang luar biasa indah. Highly recommended!</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                </div>
                
                <div class="testimonial-card animate-on-scroll">
                    <div class="testimonial-avatar">
                        <div class="avatar-ring"></div>
                    </div>
                    <div class="testimonial-name">Michael Johnson</div>
                    <div class="testimonial-text">Pengalaman yang tak terlupakan! Tim MlakuBromo sangat profesional dan membantu. Sunrise di Bromo benar-benar spektakuler. Terima kasih!</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star empty"></i>
                    </div>
                </div>
                
                <div class="testimonial-card animate-on-scroll">
                    <div class="testimonial-avatar">
                        <div class="avatar-ring"></div>
                    </div>
                    <div class="testimonial-name">Amanda Smith</div>
                    <div class="testimonial-text">Pelayanan excellent! Dari awal booking hingga selesai trip, semuanya berjalan lancar. Guide yang berpengalaman dan ramah. Pasti akan kembali lagi!</div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Why Choose Us -->
        <section class="why-choose" id="why-choose">
        <div class="container animate-on-scroll">
            <div class="why-choose-title animate-on-scroll">
                <h2>Mengapa <span class="highlight">Memilih</span> Kami ?</h2>
            </div>
            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Berpengalaman & Terpercaya</h4>
                    <p>Lebih dari 5 tahun pengalaman melayani ribuan wisatawan dengan tingkat kepuasan tinggi dan review positif.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Pemesanan Mudah & Cepat</h4>
                    <p>Sistem pemesanan online yang mudah dan respon cepat 24 jam. Booking dapat dilakukan kapan saja.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Lokasi</h4>
                    <p>Strategis berada di lokasi yang mudah dijangkau dengan akses langsung ke berbagai destinasi wisata.</p>
                </div>
            </div>
            <div class="bottom-features">
                <div class="bottom-feature animate-on-scroll">
                    <i class="fas fa-shipping-fast"></i>
                    <h5>Respon Cepat 24 Jam</h5>
                    <p>Tim kami siap memberikan respon dalam hitungan menit untuk semua pertanyaan dan kebutuhan Anda.</p>
                </div>
                <div class="bottom-feature animate-on-scroll">
                    <i class="fas fa-smile"></i>
                    <h5>Nyaman & Aman</h5>
                    <p>Armada berkualitas, asuransi perjalanan, dan tim berpengalaman menjamin kenyamanan dan keamanan trip Anda.</p>
                </div>
                <div class="bottom-feature animate-on-scroll">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h5>Harga Terjangkau</h5>
                    <p>Harga kompetitif dengan kualitas pelayanan terbaik. Dapatkan pengalaman premium dengan budget yang reasonable.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="kontak">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Tentang Kami</h4>
                    <p>MlakuBromo.ID adalah penyedia layanan wisata terpercaya yang menghadirkan pengalaman tak terlupakan di destinasi Bromo, Ijen, dan sekitarnya.</p>
                </div>
                <div class="footer-section">
                    <h4>Paket Trip</h4>
                    <a href="{{ route('opentrip') }}" onclick="scrollToPackages()">Open Trip Bromo</a>
                    <a href="{{ route('dailytrip') }}" onclick="scrollToPackages()">Daily Trip Bromo Sunrise</a>
                    <a href="{{ route('travelbromo') }}" onclick="scrollToPackages()">Travel to Malang Bromo</a>
                    <a href="{{ route('paketwna') }}" onclick="scrollToPackages()">Paket Bromo Ijen WNA</a>
                </div>
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <p><strong>TOUR PLANNER</strong></p>
                    <p>📞 +62 822-xxxx-xxxx</p>
                    <p>📧 mlakubromo@gmail.com</p>
                </div>
                <div class="footer-section">
                    <h4>Alamat</h4>
                    <p>Kantor pusat kami berlokasi strategis di Perum Tunggul Ametung B1 Singosari-Malang</p>
                    <p><strong>Jam Operasional:</strong><br>
                    Senin - Minggu: 24 Jam<br>
                    (Customer Service Online)</p>
                </div>
            </div>
            <div class="social-links">
                <h5>Social Media Kami</h5>
                <div class="social-icons">
                    <a href="#" onclick="openSocialMedia('tiktok')"><i class="fab fa-tiktok"></i></a>
                    <a href="#" onclick="openSocialMedia('instagram')"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright © 2024 Kelompok 10</p>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk menampilkan modal konfirmasi logout
        function showLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
        }

        // Fungsi untuk menutup modal logout
        function closeLogoutModal() {
            const modal = document.getElementById('logoutModal');
            const modalContent = modal.querySelector('.logout-modal-content');
            
            modal.style.opacity = '0';
            modalContent.style.transform = 'scale(0.7)';
            
            setTimeout(() => {
                modal.classList.remove('show');
                modal.style.display = 'none';
                modal.style.opacity = '';
                modalContent.style.transform = '';
            }, 300);
        }

        // Fungsi untuk konfirmasi logout
        async function confirmLogout() {
            try {
                const response = await fetch('{{ route("logout") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                if (response.ok) {
                    // Reload halaman saat ini, bukan redirect ke home
                    window.location.reload();
                } else {
                    console.error('Logout failed');
                    // Fallback: tetap reload jika ada masalah
                    window.location.reload();
                }
            } catch (error) {
                console.error('Logout error:', error);
                // Fallback: reload halaman
                window.location.reload();
            }
        }

        // Switch between login and register modals
        function switchToRegister() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'block';
        }

        function switchToLogin() {
            document.getElementById('registerModal').style.display = 'none';
            document.getElementById('loginModal').style.display = 'block';
        }

        // Payment Modal Functions
        function openPaymentModal() {
            document.getElementById('paymentModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Function to change participants count
        function changeParticipants(change) {
            const input = document.getElementById('participantCount');
            const displayValue = document.getElementById('displayValue');
            const placeholder = document.querySelector('.number-placeholder');
            
            let currentValue = parseInt(input.value) || 1;
            let newValue = currentValue + change;
            
            // Ensure value stays within bounds
            if (newValue < 1) newValue = 1;
            if (newValue > 50) newValue = 50;
            
            input.value = newValue;
            displayValue.textContent = newValue;
            
            // Show/hide placeholder based on value
            if (newValue > 0) {
                placeholder.style.opacity = '0';
            } else {
                placeholder.style.opacity = '0.6';
            }
            
            // Update button states
            const decreaseBtn = document.querySelector('.number-btn-left');
            const increaseBtn = document.querySelector('.number-btn-right');
            
            decreaseBtn.disabled = newValue <= 1;
            increaseBtn.disabled = newValue >= 50;
            
            updateTotal();
        }

        // Enable manual input
        function enableManualInput() {
            const input = document.getElementById('participantCount');
            const displayValue = document.getElementById('displayValue');
            const unitText = document.querySelector('.number-unit');
            const placeholder = document.querySelector('.number-placeholder');
            
            input.classList.add('active');
            displayValue.style.opacity = '0';
            unitText.style.opacity = '0';
            placeholder.style.opacity = '0';
            input.focus();
            input.select();
        }

        // Disable manual input
        function disableManualInput() {
            const input = document.getElementById('participantCount');
            const displayValue = document.getElementById('displayValue');
            const unitText = document.querySelector('.number-unit');
            const placeholder = document.querySelector('.number-placeholder');
            
            let newValue = parseInt(input.value) || 1;
            
            // Ensure value stays within bounds
            if (newValue < 1) newValue = 1;
            if (newValue > 50) newValue = 50;
            
            input.value = newValue;
            displayValue.textContent = newValue;
            
            input.classList.remove('active');
            displayValue.style.opacity = '1';
            unitText.style.opacity = '1';
            
            if (newValue > 0) {
                placeholder.style.opacity = '0';
            } else {
                placeholder.style.opacity = '0.6';
            }
            
            // Update button states
            const decreaseBtn = document.querySelector('.number-btn-left');
            const increaseBtn = document.querySelector('.number-btn-right');
            
            decreaseBtn.disabled = newValue <= 1;
            increaseBtn.disabled = newValue >= 50;
            
            updateTotal();
        }

        // Handle Enter key press
        function handleEnterKey(event) {
            if (event.key === 'Enter') {
                event.target.blur();
            }
        }

        // Update total calculation
        function updateTotal() {
            const participantCount = document.getElementById('participantCount').value;
            const pricePerPerson = 350000;
            const adminFee = 5000;
            
            if (participantCount) {
                const totalParticipants = parseInt(participantCount);
                const totalPrice = (pricePerPerson * totalParticipants) + adminFee;
                
                document.getElementById('totalParticipants').textContent = totalParticipants + ' orang';
                document.getElementById('totalPrice').textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            } else {
                document.getElementById('totalParticipants').textContent = '0 orang';
                document.getElementById('totalPrice').textContent = 'Rp 0';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial state
            changeParticipants(0);
        });

        // Show payment details based on selected method
        function showPaymentDetails() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const paymentDetails = document.getElementById('paymentDetails');
            const transferBankDetails = document.getElementById('transferBankDetails');
            const eWalletDetails = document.getElementById('eWalletDetails');
            const ewalletLogo = document.getElementById('ewalletLogo');
            const ewalletName = document.getElementById('ewalletName');
            const ewalletNumber = document.getElementById('ewalletNumber');

            // Hide all details first
            paymentDetails.style.display = 'none';
            transferBankDetails.style.display = 'none';
            eWalletDetails.style.display = 'none';

            if (paymentMethod) {
                paymentDetails.style.display = 'block';

                if (paymentMethod === 'transfer_bank') {
                    transferBankDetails.style.display = 'block';
                } else {
                    eWalletDetails.style.display = 'block';
                    
                    // Update e-wallet specific info
                    switch(paymentMethod) {
                        case 'shopee_pay':
                            ewalletLogo.innerHTML = '<i class="fas fa-shopping-bag"></i><span>ShopeePay</span>';
                            ewalletName.textContent = 'ShopeePay';
                            ewalletNumber.textContent = '0822-1234-5678';
                            break;
                        case 'ovo':
                            ewalletLogo.innerHTML = '<i class="fas fa-circle"></i><span>OVO</span>';
                            ewalletName.textContent = 'OVO';
                            ewalletNumber.textContent = '0822-1234-5678';
                            break;
                        case 'gopay':
                            ewalletLogo.innerHTML = '<i class="fas fa-motorcycle"></i><span>GoPay</span>';
                            ewalletName.textContent = 'GoPay';
                            ewalletNumber.textContent = '0822-1234-5678';
                            break;
                        case 'dana':
                            ewalletLogo.innerHTML = '<i class="fas fa-wallet"></i><span>DANA</span>';
                            ewalletName.textContent = 'DANA';
                            ewalletNumber.textContent = '0822-1234-5678';
                            break;
                    }
                }
            }
        }

        // Copy account number to clipboard
        function copyAccountNumber() {
            const accountNumber = document.querySelector('.account-number').textContent;
            navigator.clipboard.writeText(accountNumber).then(function() {
                const copyBtn = document.querySelector('.copy-btn');
                const originalText = copyBtn.innerHTML;
                copyBtn.innerHTML = '<i class="fas fa-check"></i> Tersalin';
                copyBtn.style.background = '#28a745';
                
                setTimeout(function() {
                    copyBtn.innerHTML = originalText;
                    copyBtn.style.background = '#FE9C03';
                }, 2000);
            });
        }

        // Copy e-wallet number to clipboard
        function copyEwalletNumber() {
            const ewalletNumber = document.querySelector('.ewallet-number').textContent;
            navigator.clipboard.writeText(ewalletNumber).then(function() {
                const copyBtn = document.querySelector('#eWalletDetails .copy-btn');
                const originalText = copyBtn.innerHTML;
                copyBtn.innerHTML = '<i class="fas fa-check"></i> Tersalin';
                copyBtn.style.background = '#28a745';
                
                setTimeout(function() {
                    copyBtn.innerHTML = originalText;
                    copyBtn.style.background = '#FE9C03';
                }, 2000);
            });
        }

        // Handle file upload
        function handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                // Check file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 5MB.');
                    return;
                }

                // Check file type
                if (!file.type.startsWith('image/')) {
                    alert('File harus berupa gambar (JPG, PNG, JPEG).');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const uploadContent = document.getElementById('uploadContent');
                    const uploadPreview = document.getElementById('uploadPreview');
                    const previewImage = document.getElementById('previewImage');
                    const fileName = document.getElementById('fileName');

                    uploadContent.style.display = 'none';
                    uploadPreview.style.display = 'flex';
                    previewImage.src = e.target.result;
                    fileName.textContent = file.name;
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove uploaded file
        function removeFile() {
            const uploadContent = document.getElementById('uploadContent');
            const uploadPreview = document.getElementById('uploadPreview');
            const proofUpload = document.getElementById('proofUpload');

            uploadContent.style.display = 'block';
            uploadPreview.style.display = 'none';
            proofUpload.value = '';
        }

        // Confirm payment function
        function confirmPayment() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const proofUpload = document.getElementById('proofUpload');
            const uploadError = document.getElementById('uploadError');
            
            // Hide previous error
            uploadError.style.display = 'none';
            
            // Validate payment method
            if (!paymentMethod) {
                alert('Silakan pilih metode pembayaran terlebih dahulu.');
                return;
            }
            
            // Validate file upload
            if (!proofUpload.files || proofUpload.files.length === 0) {
                uploadError.style.display = 'block';
                document.querySelector('.upload-area').scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
                return;
            }
            
            // Show success modal
            document.getElementById('successModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        // Close success modal and reset form
        function closeSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Reset form
            resetBookingForm();
            
            // Close payment modal
            document.getElementById('paymentModal').style.display = 'none';
        }
        
        // Reset booking form - hanya dipanggil setelah sukses konfirmasi
        function resetBookingForm() {
            // Reset participant count
            document.getElementById('participantCount').value = 1;
            document.getElementById('displayValue').textContent = 1;
            
            // Reset date
            document.querySelector('input[type="date"]').value = '';
            
            // Reset payment method
            document.getElementById('paymentMethod').value = '';
            document.getElementById('paymentDetails').style.display = 'none';
            
            // Reset file upload
            removeFile();
            
            // Update total
            updateTotal();
            
            // Reset button states
            const decreaseBtn = document.querySelector('.number-btn-left');
            const increaseBtn = document.querySelector('.number-btn-right');
            decreaseBtn.disabled = true;
            increaseBtn.disabled = false;
        }

        // Add drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.querySelector('.upload-area');
            
            if (uploadArea) {
                uploadArea.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    uploadArea.classList.add('dragover');
                });

                uploadArea.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    uploadArea.classList.remove('dragover');
                });

                uploadArea.addEventListener('drop', function(e) {
                    e.preventDefault();
                    uploadArea.classList.remove('dragover');
                    
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        document.getElementById('proofUpload').files = files;
                        handleFileUpload({ target: { files: files } });
                    }
                });
            }
        });

        // Close modals when clicking outside
        window.onclick = function(event) {
            const logoutModal = document.getElementById('logoutModal');
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            const paymentModal = document.getElementById('paymentModal');
            
            if (event.target === logoutModal) {
                closeLogoutModal();
            }
            if (event.target === loginModal) {
                loginModal.style.display = 'none';
            }
            if (event.target === registerModal) {
                registerModal.style.display = 'none';
            }
            if (event.target === paymentModal) {
                closePaymentModal();
            }
        }

        // Close modals with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const logoutModal = document.getElementById('logoutModal');
                if (logoutModal.classList.contains('show')) {
                    closeLogoutModal();
                }
                
                const loginModal = document.getElementById('loginModal');
                const registerModal = document.getElementById('registerModal');
                const paymentModal = document.getElementById('paymentModal');
                
                if (loginModal.style.display === 'block') {
                    loginModal.style.display = 'none';
                }
                if (registerModal.style.display === 'block') {
                    registerModal.style.display = 'none';
                }
                if (paymentModal.style.display === 'block') {
                    closePaymentModal();
                }
            }
        });

        // AJAX Login
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route("login") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: formData.get('email'),
                        password: formData.get('password')
                    })
                });

                const data = await response.json();
                if (data.success || response.ok) {
                    // Tutup modal dan reload halaman saat ini
                    document.getElementById('loginModal').style.display = 'none';
                    window.location.reload();
                } else {
                    document.getElementById('loginError').innerText = data.message || 'Login gagal';
                }
            } catch (error) {
                console.error('Login error:', error);
                document.getElementById('loginError').innerText = 'Terjadi kesalahan saat login';
            }
        });

        // AJAX Register
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route("register") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        username: formData.get('username'),
                        ktp: formData.get('ktp'),
                        nomor_hp: formData.get('nomor_hp'),
                        asal: formData.get('asal'),
                        email: formData.get('email'),
                        password: formData.get('password'),
                        password_confirmation: formData.get('password_confirmation')
                    })
                });

                const data = await response.json();
                if (data.success || response.ok) {
                    window.location.reload();
                } else {
                    let msg = data.message || 'Registrasi gagal';
                    if (data.errors) {
                        msg = Object.values(data.errors).flat().join('\n');
                    }
                    document.getElementById('registerError').innerText = msg;
                }
            } catch (error) {
                console.error('Register error:', error);
                document.getElementById('registerError').innerText = 'Terjadi kesalahan saat registrasi';
            }
        });

            // Toggle Profile Dropdown
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        const profileBtn = document.querySelector('.profile-btn');
        
        dropdown.classList.toggle('show');
        profileBtn.classList.toggle('active');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileDropdown = document.querySelector('.profile-dropdown');
        const dropdown = document.getElementById('profileDropdown');
        const profileBtn = document.querySelector('.profile-btn');
        
        if (profileDropdown && !profileDropdown.contains(event.target)) {
            dropdown.classList.remove('show');
            profileBtn.classList.remove('active');
        }
    });

    // Close dropdown with ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const dropdown = document.getElementById('profileDropdown');
            const profileBtn = document.querySelector('.profile-btn');
            
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
                profileBtn.classList.remove('active');
            }
        }
    });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            const heroSection = document.querySelector('.hero');
            
            if (heroSection) {
                const heroHeight = heroSection.offsetHeight;
                
                if (window.scrollY > heroHeight - 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }

            // Active state hanya untuk menu Paket Trip
            // const packagesSection = document.querySelector('.open-trip');
            const paketLink = document.querySelector('.nav-menu a[href="#paket"]');
            const headerHeight = document.querySelector('.header').offsetHeight;
            
            if (packagesSection && paketLink) {
                const sectionTop = packagesSection.offsetTop - headerHeight - 100;
                const sectionHeight = packagesSection.offsetHeight;
                
                // Hapus active dari semua menu
                document.querySelectorAll('.nav-menu a').forEach(link => {
                    link.classList.remove('active');
                });
                
                // Tambahkan active hanya pada menu Paket Trip jika sedang di section tersebut
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    paketLink.classList.add('active');
                }
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                
                if (target) {
                    const headerHeight = document.querySelector('.header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Click handler hanya untuk menu Paket Trip
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                // Hapus active dari semua menu
                document.querySelectorAll('.nav-menu a').forEach(l => l.classList.remove('active'));
                
                // Tambahkan active hanya jika yang diklik adalah menu Paket Trip
                if (this.getAttribute('href') === '#paket') {
                    this.classList.add('active');
                }
            });
        });

        // Search functionality
        (function(){
            const routes = {
                home: "{{ route('home') }}",
                kontak: "{{ route('kontak') }}",
                opentrip: "{{ route('opentrip') }}",
                dailytrip: "{{ route('dailytrip') }}",
                travelbromo: "{{ route('travelbromo') }}",
                paketwna: "{{ route('paketwna') }}"
            };

            function handleSearch(termRaw){
                const term = (termRaw || '').toString().toLowerCase().trim();
                if (!term) {
                    if (typeof scrollToPackages === 'function') {
                        scrollToPackages();
                    }
                    return;
                }
                const go = (url) => { window.location.href = url; };
                if (/(open\s*trip|opentrip|bromo(?!\s*ijen))/i.test(term)) return go(routes.opentrip);
                if (/(daily|sunrise|daily\s*trip)/i.test(term)) return go(routes.dailytrip);
                if (/(travel|malang|travel\s*bromo)/i.test(term)) return go(routes.travelbromo);
                if (/(wna|ijen|bromo\s*ijen|foreigner|mancanegara)/i.test(term)) return go(routes.paketwna);
                if (/(kontak|contact|hubungi)/i.test(term)) return go(routes.kontak);
                if (typeof scrollToPackages === 'function') {
                    scrollToPackages();
                } else {
                    go(routes.home);
                }
            }

            const input = document.getElementById('searchInput');
            if (input) {
                input.addEventListener('keypress', function(e){
                    if (e.key === 'Enter') {
                        handleSearch(this.value);
                    }
                });
            }
            const icon = document.querySelector('.search-box i.fas.fa-search');
            if (icon) {
                icon.style.cursor = 'pointer';
                icon.addEventListener('click', function(){
                    handleSearch(input ? input.value : '');
                });
            }
        })();

        // Social media links
        function openSocialMedia(platform) {
            const urls = {
                tiktok: 'https://tiktok.com/@mlakubromo',
                instagram: 'https://www.instagram.com/mlakubromo.id/',
            };
            
            if (urls[platform]) {
                window.open(urls[platform], '_blank');
            }
        }

        // Scroll to packages function
        function scrollToPackages() {
            const target = document.getElementById('paket');
            if (target) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Interactive hover effects for cards
        document.querySelectorAll('.package-card, .feature-card, .testimonial-card, .bottom-feature').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Check login status before allowing order
        function checkLoginAndOrder() {
            // Check if user is logged in by looking for user-specific elements
            const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
            
            if (isLoggedIn) {
                // User is logged in, proceed to payment modal
                openPaymentModal();
            } else {
                // User is not logged in, show login modal
                showLoginModal();
            }
        }

        // Show login modal
        function showLoginModal() {
            const modal = document.getElementById('loginModal');
            if (modal) {
                modal.style.display = 'block';
            }
        }

        // Handle booking form submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Kami akan segera menghubungi Anda untuk konfirmasi pembayaran.');
            closePaymentModal();
        });

        // Set minimum date to tomorrow when modal opens
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('departureDate');
            if (dateInput) {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1); // Next day minimum
                const tomorrowString = tomorrow.toISOString().split('T')[0];
                dateInput.setAttribute('min', tomorrowString);
            }
        });

        // Function to set minimum date when modal opens
        function openPaymentModal() {
            // Set minimum date to tomorrow (prevent same day booking)
            const dateInput = document.getElementById('departureDate');
            if (dateInput) {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 2);
                const tomorrowString = tomorrow.toISOString().split('T')[0];
                dateInput.setAttribute('min', tomorrowString);
                dateInput.value = ''; // Clear any previous value
            }
            
            document.getElementById('paymentModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Performance optimization: Lazy loading for images
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));

        // Submit booking function
        function submitBooking() {
            const participants = document.getElementById('participantCount').value;
            const date = document.getElementById('departureDate').value;
            if (!participants || !date) { alert('Mohon lengkapi semua data booking'); return; }
            const selectedDate = new Date(date);
            const today = new Date(); today.setHours(0,0,0,0); selectedDate.setHours(0,0,0,0);
            if (selectedDate <= today) { alert('Maaf, pemesanan tidak dapat dilakukan untuk hari ini. Silakan pilih tanggal minimal besok.'); return; }
            const pricePerPerson = 350000; const adminFee = 5000;
            const totalCalc = (parseInt(participants) * pricePerPerson) + adminFee;
            document.getElementById('dailyPesertaHidden').value = participants;
            document.getElementById('dailyTanggalHidden').value = date;
            document.getElementById('dailyTotalHidden').value = totalCalc;
            document.getElementById('dailyTitikHidden').value = 'Perum Tunggul Ametung Inside Blok B1';
            document.getElementById('dailyBookingForm').submit();
        }

        // Close confirmation modal
        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Carousel functionality
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.indicator');
        const totalSlides = slides.length;

        function showSlide(index) {
            const track = document.getElementById('carouselTrack');
            const slideWidth = slides[0].offsetWidth;
            
            // Update transform
            track.style.transform = `translateX(-${index * slideWidth}px)`;
            
            // Update indicators
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
            
            currentSlideIndex = index;
        }

        function nextSlide() {
            const nextIndex = (currentSlideIndex + 1) % totalSlides;
            showSlide(nextIndex);
        }

        function prevSlide() {
            const prevIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
            showSlide(prevIndex);
        }

        function currentSlide(index) {
            showSlide(index - 1);
        }

        // Auto-slide functionality
        function startAutoSlide() {
            setInterval(() => {
                nextSlide();
            }, 5000); // Change slide every 5 seconds
        }

        // Initialize carousel when page loads
        document.addEventListener('DOMContentLoaded', function() {
            showSlide(0);
            startAutoSlide();
            
            // Handle window resize
            window.addEventListener('resize', () => {
                showSlide(currentSlideIndex);
            });
        });
    </script>

                date.min = t.toISOString().split('T')[0];
            }
            window.dtChange = function(n){
                const el = document.getElementById('dtParticipants');
                let v = parseInt(el.value||1)+n; if(v<1) v=1; el.value=v; dtUpdateTotal();
            }
            window.dtUpdateTotal = function(){
                const v = parseInt(document.getElementById('dtParticipants').value||1);
                const total = (v*pricePerPerson)+adminFee;
                document.getElementById('dtTotalParticipants').textContent = v+" orang";
                document.getElementById('dtTotalLabel').textContent = 'Rp '+ total.toLocaleString('id-ID');
                document.getElementById('dtTotalHidden').value = total;
            }
            dtUpdateTotal();
            // Pastikan tombol CTA halaman membuka modal yang submit ke backend
            document.querySelectorAll('.btn-pesan').forEach(function(btn){
                btn.addEventListener('click', function(e){
                    e.preventDefault();
                    const modal = document.getElementById('simpleBookingDaily');
                    if(modal){ modal.style.display='flex'; }
                });
            });
        })();
    </script>
    @if(session('booking_success'))
    <script>
        (function(){
            const d = @json(session('booking_success'));
            try{
                const formatted = new Date(d.tanggal_keberangkatan).toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'});
                const totalStr = d.total ? ('Rp '+ Number(d.total).toLocaleString('id-ID')) : (document.getElementById('totalPrice')?document.getElementById('totalPrice').textContent:'');
                const pEl = document.getElementById('confirmedParticipants'); if(pEl) pEl.textContent = d.peserta + ' orang';
                const tEl = document.getElementById('confirmedDate'); if(tEl) tEl.textContent = formatted;
                const totEl = document.getElementById('confirmedTotal'); if(totEl) totEl.textContent = totalStr;
                const modal = document.getElementById('confirmationModal'); if(modal){ modal.style.display='block'; document.body.style.overflow='hidden'; }
            }catch(e){ /* ignore */ }
        })();
    </script>
    @endif
  </body>
  </html>