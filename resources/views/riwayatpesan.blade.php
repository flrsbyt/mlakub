<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - MlakuBromo.ID</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.8), rgba(247, 147, 30, 0.8)),
            url('{{ asset("images/hero-background.jpg") }}');
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
            text-shadow: 4px 4px 6px rgba(0,0,0,0.3);
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
            /* background: linear-gradient(135deg, #fff, #ffcd3c); */
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

        .nav-menu a.active {
            color: #FE9C03;
            font-weight: bold;
        }

        .nav-menu a.active::after {
            width: 100%;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
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
            font-weight: bold;
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
            color: black !important;
            border: 2px solid #FE9C03 !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(254, 156, 3, 0.3);
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

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        /* Responsive */
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
            .nav-container {
                padding: 0 15px;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
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

        .modallogin-btn {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            width: 100%;
            margin: 20px 0 15px 0;
            padding: 15px;
            border: 2px solid transparent;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            color: black;
            cursor: pointer;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .modallogin-btn:hover {
            background: transparent !important;
            color: black !important;
            border: 2px solid #FE9C03 !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-content {
                margin: 3% 20px;
                padding: 25px;
                max-height: 95vh;
                border-radius: 15px;
            }
            
            .modal-content h3 {
                font-size: 1.6rem;
                margin-bottom: 25px;
            }
            
            .close {
                top: 15px;
                right: 20px;
                width: 28px;
                height: 28px;
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                margin: 2% 15px;
                padding: 20px;
                max-height: 96vh;
                border-radius: 12px;
            }
            
            .modal-content h3 {
                font-size: 1.4rem;
                margin-bottom: 20px;
            }
            
            .modal-content input {
                padding: 12px 15px;
                margin: 12px 0;
                border-radius: 12px;
            }
            
            .password-container input {
                padding-right: 45px;
            }
            
            .password-toggle {
                right: 12px;
                font-size: 14px;
            }
            
            .modal-content button[type="submit"] {
                padding: 12px;
                font-size: 15px;
                border-radius: 12px;
            }
            
            .close {
                top: 12px;
                right: 15px;
                width: 26px;
                height: 26px;
                font-size: 16px;
            }
        }

        /* Custom Scrollbar */
        .modal-content::-webkit-scrollbar {
            width: 6px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #FE9C03;
            border-radius: 3px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #e55a2b;
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

        /* Responsive */
        @media (max-width: 768px) {
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
        }

        @media (max-width: 480px) {
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

        /* About Section */
        .about {
            padding: 80px 0;
            background: white;
            text-align: center;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .about h2 span {
            color: #FE9C03;
        }

        .about p {
            font-size: 18px;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .profile-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px;
        }

        .profile-header-card {
            background: #fff;
            border-radius: 25px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 40px;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        .profile-header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #ff8c00, #ffa500);
        }

        .profile-header-content {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .profile-avatar-section {
            flex-shrink: 0;
        }

        .profile-avatar-compact {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ff8c00;
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.2);
        }

        .profile-form-grid {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
        }

        .form-field label {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-field input {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 14px;
            color: #333;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .form-field input:focus {
            outline: none;
            border-color: #ff8c00;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
        }

        .form-field input[readonly] {
            background: #f8f9fa;
            cursor: default;
        }

        .phone-input {
            position: relative;
            display: flex;
            align-items: center;
        }

        .country-code {
            position: absolute;
            left: 15px;
            color: #666;
            font-size: 14px;
            z-index: 1;
            background: #f8f9fa;
            padding: 0 5px;
        }

        .phone-input input {
            padding-left: 50px;
        }

        .profile-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-end;
        }

        .edit-btn, .cancel-btn {
            padding: 10px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            min-width: 120px;
        }

        .edit-btn {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .cancel-btn {
            background: #6c757d;
            color: white;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        .cancel-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-header-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 25px;
            }

            .profile-form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
                width: 100%;
            }

            .profile-actions {
                align-items: center;
                width: 100%;
            }

            .edit-btn, .cancel-btn {
                width: 100%;
                max-width: 200px;
            }

            .profile-header-card {
                padding: 25px 20px;
            }

            .profile-avatar-compact {
                width: 80px;
                height: 80px;
            }
        }

        .profile-title {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .profile-title .highlight {
            color: #ff8c00;
        }

        .profile-subtitle {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .profile-card {
            background: #fff;
            border-radius: 25px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.08);
            padding: 50px;
            margin-bottom: 80px;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #ff8c00, #ffa500);
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .tab {
            padding: 12px 25px;
            border: none;
            background: #f0f0f0;
            color: #666;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .tab.active {
            background: #ff8c00;
            color: white;
        }

        .sort-dropdown {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sort-dropdown select {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: white;
            color: #666;
        }

        .bookings-table {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .table-header-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
        }

        .table-header-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            gap: 0;
        }

        .table-header-cell {
            background: #fafafa;
            color: #333;
            padding: 18px 15px;
            text-align: center;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.3px;
            border-right: 1px solid #e5e5e5;
        }

        .table-header-cell:last-child {
            border-right: none;
        }

        .table-row-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
        }

        .table-data-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            gap: 0;
        }

        .table-data-cell {
            padding: 18px 15px;
            vertical-align: middle;
            font-size: 14px;
            color: #333;
            border-right: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
        }

        .table-data-cell:last-child {
            border-right: none;
        }

        .table-row-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: none; /* jangan paksa uppercase */
        }

        /* Warna badge disamakan dengan riwayat testimoni: flat + stroke tipis */
        .status-aktif {
            background: #fff3cd;
            color: #ff8c00;
            border: 1px solid #ffeaa7;
        }

        .status-selesai {
            background: #e6f3ff;
            color: #0066cc;
            border: 1px solid #cde0ff;
        }

        .status-pending {
            background: #fff3cd;
            color: #ff8c00;
            border: 1px solid #ffeaa7;
        }

        .status-payment {
            background: #e6f3ff;
            color: #0066cc;
            border: 1px solid #cde0ff;
        }

        .detail-btn {
            background: #ff8c00;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .detail-btn:hover {
            background: #e67c00;
        }

        .detail-btn i {
            font-size: 14px;
        }

        .selected-row {
            border: 2px solid #007bff !important;
            background: rgba(0, 123, 255, 0.05);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-btn.active {
            background: #ff8c00;
            color: white;
        }

        .page-btn:not(.active) {
            background: #f0f0f0;
            color: #666;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
            overflow: hidden;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            padding: 25px 30px;
            position: relative;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .close:hover {
            transform: translateY(-50%) rotate(90deg);
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff8c00;
            box-shadow: 0 0 0 3px rgba(255, 140, 0, 0.1);
        }

        .avatar-section {
            text-align: center;
            margin-bottom: 25px;
        }

        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ff8c00;
            margin-bottom: 15px;
        }

        .avatar-upload {
            display: none;
        }

        .avatar-btn {
            background: #f0f0f0;
            color: #666;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .avatar-btn:hover {
            background: #e0e0e0;
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn-cancel {
            padding: 12px 25px;
            border: 2px solid #ddd;
            background: white;
            color: #666;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            border-color: #bbb;
            color: #555;
        }

        .btn-save {
            padding: 12px 25px;
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.3);
        }

        /* Detail Modal Styles */
        .detail-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        .detail-modal-content {
            background: white;
            margin: 3% auto;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.4s ease-out;
        }

        .detail-modal-header {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            padding: 25px 30px;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .detail-modal-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .detail-close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .detail-close:hover {
            transform: translateY(-50%) rotate(90deg);
        }

        .detail-modal-body {
            padding: 30px;
        }

        /* Status Info Container */
        .status-info-container {
            text-align: center;
        }

        .status-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: white;
        }

        .payment-icon {
            background: linear-gradient(135deg, #17a2b8, #007bff);
        }

        .status-info-container h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 22px;
        }

        .status-info-container p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* Order Summary */
        .order-summary {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin: 25px 0;
            text-align: left;
        }

        .order-summary h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
            border-bottom: 2px solid #ff8c00;
            padding-bottom: 8px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-item.total {
            font-weight: bold;
            font-size: 16px;
            color: #ff8c00;
            border-top: 2px solid #ff8c00;
            padding-top: 12px;
            margin-top: 10px;
        }

        /* Contact Info */
        .contact-info {
            text-align: center;
            margin-top: 25px;
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #25d366;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .whatsapp-btn:hover {
            background: #128c7e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        /* Payment Methods */
        .payment-methods {
            margin: 25px 0;
        }

        .payment-methods h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: #ff8c00;
            background: rgba(255, 140, 0, 0.05);
        }

        .payment-option.selected {
            border-color: #ff8c00;
            background: rgba(255, 140, 0, 0.1);
        }

        .payment-option i:first-child {
            font-size: 20px;
            color: #666;
            width: 25px;
        }

        .payment-option span {
            flex: 1;
            font-weight: 500;
            color: #333;
        }

        .payment-option i:last-child {
            color: #999;
        }

        /* Payment Details */
        .payment-details {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid #e9ecef;
        }

        .bank-info {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .bank-info h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .account-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .account-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .account-item span:first-child {
            color: #666;
            font-weight: 500;
        }

        .account-item span:last-child {
            color: #333;
            font-weight: 600;
        }

        /* Upload Section */
        .upload-section h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: #ff8c00;
            background: rgba(255, 140, 0, 0.05);
        }

        .upload-area i {
            font-size: 32px;
            color: #999;
            margin-bottom: 10px;
        }

        .upload-area p {
            color: #666;
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .upload-area small {
            color: #999;
        }

        .upload-preview {
            margin-top: 15px;
            text-align: center;
        }

        .upload-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Payment Actions */
        .payment-actions {
            text-align: center;
            margin-top: 25px;
        }

        .submit-payment-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .submit-payment-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        }

        /* Ticket Container */
        .ticket-container {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            overflow: hidden;
        }

        .ticket-header {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ticket-logo img {
            height: 40px;
        }

        .ticket-info h3 {
            margin: 0;
            font-size: 20px;
        }

        .ticket-info p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        .ticket-details {
            padding: 25px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .detail-col h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
            border-bottom: 2px solid #ff8c00;
            padding-bottom: 8px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item .label {
            color: #666;
            font-weight: 500;
        }

        .info-item .value {
            color: #333;
            font-weight: 600;
        }

        .info-item .value.success {
            color: #28a745;
        }

        /* Ticket QR */
        .ticket-qr {
            text-align: center;
            padding: 25px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .qr-code {
            width: 100px;
            height: 100px;
            border: 2px solid #ddd;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background: white;
        }

        .qr-code i {
            font-size: 40px;
            color: #666;
        }

        .ticket-qr p {
            color: #666;
            margin: 0;
        }

        /* Ticket Footer */
        .ticket-footer {
            padding: 20px 25px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-footer .contact-info {
            text-align: left;
        }

        .ticket-footer .contact-info p {
            margin: 2px 0;
            font-size: 12px;
            color: #666;
        }

        .ticket-actions {
            display: flex;
            gap: 10px;
        }

        .download-btn, .share-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .download-btn {
            background: #007bff;
            color: white;
        }

        .download-btn:hover {
            background: #0056b3;
            transform: translateY(-1px);
        }

        .share-btn {
            background: #28a745;
            color: white;
        }

        .share-btn:hover {
            background: #1e7e34;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .detail-modal-content {
                margin: 5% auto;
                width: 95%;
            }

            .detail-modal-body {
                padding: 20px;
            }

            .detail-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .ticket-footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .ticket-actions {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .profile-card {
                padding: 30px 25px;
                margin-bottom: 30px;
            }

            .profile-info {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
            }

            .profile-details h3 {
                font-size: 24px;
            }

            .profile-contact {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }

            .edit-profile-btn {
                align-self: center;
                width: 100%;
                max-width: 200px;
            }

            .tabs {
                flex-wrap: wrap;
            }

            .sort-dropdown {
                margin-left: 0;
                margin-top: 15px;
            }

            .bookings-table {
                overflow-x: auto;
            }

            .modal-content {
                margin: 10% auto;
                width: 95%;
            }

            .table-header-row,
            .table-data-row {
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                gap: 5px;
            }

            .table-header-cell,
            .table-data-cell {
                padding: 12px 8px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: 25px 20px;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
            }

            .profile-details h3 {
                font-size: 22px;
            }

            .table-header-row,
            .table-data-row {
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                gap: 3px;
            }

            .table-header-cell,
            .table-data-cell {
                padding: 10px 5px;
                font-size: 11px;
            }

            .user-info {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }

            .user-avatar {
                width: 25px;
                height: 25px;
            }
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 80px 0 40px;
            scroll-margin-top: 100px;
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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
            .footer-content {
                flex-direction: column;
                gap: 30px;
            }

            .footer-section {
                min-width: 100%;
                text-align: center;
            }

            .features-grid,
            .bottom-features {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .why-choose{
                scroll-margin-top: 80px;
            }

            .why-choose .container{
                padding: 0 20px;
            }
        }

        @media (max-width: 480px) {
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
            
            .footer .container {
                padding: 0 15px;
            }

            .why-choose {
                padding: 80px 0;
            }

            .why-choose {
                scroll-margin-top: 70px;
            }

            .why-choose .container {
                padding: 0 15px;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .process-steps {
                flex-direction: column;
                gap: 100px;
            }

            .process-steps::before {
                display: none;
            }

            .testimonial-grid, .features-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
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

        /* Custom Smooth Scroll behavior */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        /* Additional fix for anchor links */
        section[id] {
            scroll-margin-top: 100px;
        }

        /* Responsive scroll padding */
        @media (max-width: 768px) {
            html {
                scroll-padding-top: 80px;
            }
            
            section[id] {
                scroll-margin-top: 80px;
            }
        }

        @media (max-width: 480px) {
            html {
                scroll-padding-top: 70px;
            }
            
            section[id] {
                scroll-margin-top: 70px;
            }
        }

        /* Detail Modal Styles */
        .detail-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .detail-modal-content {
            background: white;
            margin: 2% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 700px;
            max-height: 90vh;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .detail-modal-header {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            padding: 25px 30px;
            position: relative;
            flex-shrink: 0;
        }

        .detail-modal-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .detail-close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .detail-close:hover {
            transform: translateY(-50%) rotate(90deg);
        }

        .detail-modal-body {
            padding: 30px;
            overflow-y: auto;
            flex: 1;
        }

        .receipt-container {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e0e0e0;
        }

        .receipt-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .receipt-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .receipt-subtitle {
            color: #666;
            font-size: 14px;
        }

        .receipt-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-section h4 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .info-section p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }

        .receipt-items {
            margin-bottom: 25px;
        }

        .receipt-items h4 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-name {
            color: #333;
            font-weight: 500;
        }

        .item-price {
            color: #666;
            font-weight: 600;
        }

        .receipt-total {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            border: 2px solid #ff8c00;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .total-row:last-child {
            margin-bottom: 0;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
            font-weight: 700;
            font-size: 18px;
            color: #333;
        }

        .total-label {
            color: #666;
        }

        .total-amount {
            color: #333;
            font-weight: 600;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .receipt-footer p {
            color: #666;
            font-size: 12px;
            margin: 5px 0;
        }

        /* Testimonial Modal Styles */
        .testimonial-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .testimonial-modal-content {
            background: white;
            margin: 2% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .testimonial-modal-header {
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            color: white;
            padding: 25px 30px;
            position: relative;
            flex-shrink: 0;
        }

        .testimonial-modal-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .testimonial-close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .testimonial-close:hover {
            transform: translateY(-50%) rotate(90deg);
        }

        .testimonial-modal-body {
            padding: 30px;
            overflow-y: auto;
            flex: 1;
        }

        .testimonial-container {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
        }

        .testimonial-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e0e0e0;
        }

        .testimonial-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #ff8c00, #ffa500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .testimonial-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .testimonial-subtitle {
            color: #666;
            font-size: 14px;
        }

        .testimonial-content {
            margin-bottom: 25px;
        }

        .testimonial-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .stars {
            color: #ffc107;
            font-size: 20px;
        }

        .testimonial-text {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #ff8c00;
            font-style: italic;
            color: #333;
            line-height: 1.6;
        }

        .testimonial-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .meta-section h4 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .meta-section p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
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
                        <li><a href="{{ route('home') }}" >Beranda</a></li>
                        <li><a href="{{ route('paket-trip') }}" >Paket Trip</a></li>
                        <li><a href="{{ route('cara-pemesanan') }}" >Cara Pemesanan</a></li>
                        <li><a href="{{ route('galeri') }}" >Galeri</a></li>
                        <li><a href="{{ route('kontak') }}" >Kontak</a></li>
                    </ul>
                </nav>
                <div class="nav-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Cari destinasi..." id="searchInput">
                        <i class="fas fa-search"></i>
                    </div>
                    @if(Auth::check())
                    <div class="profile-dropdown">
                        <button class="profile-btn" onclick="toggleProfileDropdown()">
                            <img src="{{ Auth::user()->avatar ?? asset('images/profil.png') }}" alt="Profile" class="profile-avatar">
                            <span class="profile-name">{{ Auth::user()->username ?? 'Profil' }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" id="profileDropdown">
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

        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        <!-- ========== Modal Login ========== -->
        <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <form id="loginForm">
            @csrf
            <h3>Login</h3>
            <input type="email" name="email" placeholder="Email" required>
            <div class="password-container">
                <input type="password" name="password" placeholder="Password" required id="loginPassword">
                <span class="password-toggle" onclick="togglePasswordSimple('loginPassword')">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <button type="submit" class="modallogin-btn">Login</button>
            <p style="font-size: 14px; text-align: center;">Belum punya akun? <a href="#" onclick="switchToRegister()" >Daftar</a></p>
            </form>
            <div id="loginError" style="color:red; text-align:center;"></div>
        </div>
        </div>

        <!-- ========== Modal Register ========== -->
        <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('registerModal').style.display='none'">&times;</span>
            <form id="registerForm">
            <form id="registerForm">
        @csrf
        <h3>Daftar</h3>
        <input type="text" name="username" placeholder="Nama Lengkap" required>
        <input type="text" name="ktp" placeholder="No. KTP" required>
        <input type="text" name="nomor_hp" placeholder="Nomor HP" required>
        <input type="text" name="asal" placeholder="Asal" required>
        <input type="email" name="email" placeholder="Email" required>
        <div class="password-container">
            <input type="password" name="password" placeholder="Password" required id="registerPassword">
            <span class="password-toggle" onclick="togglePassword('registerPassword', this)">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <div class="password-container">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required id="confirmPassword">
            <span class="password-toggle" onclick="togglePassword('confirmPassword', this)">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <button type="submit" class="modallogin-btn">Daftar</button>
        <p style="font-size: 14px; text-align: center;">Sudah punya akun? <a href="#" onclick="switchToLogin()">Login</a></p>
        </form>
        <div id="registerError" style="color:red; text-align:center;"></div>
        </div>
        </div>

    <!-- Hero Section -->
    <section class="hero" id="hero" style="background-image: url('{{ asset("images/hero/gambarhero.png") }}'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <div class="hero-text ">
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

    <div class="container"> 
    <!-- About Section -->
    <section class="about">
        <div class="container animate-on-scroll">
            <h2>Riwayat <span>Pemesanan</span></h2>
            <p>Pantau daftar perjalanan yang pernah Anda pesan lengkap dengan informasi jadwal, tujuan, dan statusnya, sehingga memudahkan Anda untuk mengingat kembali setiap detail pengalaman perjalanan.</p>
        </div>
    </section>

    <div class="profile-section">
        <!-- Tabs and Table -->
        <div class="profile-card">
            <div class="tabs">
                <!-- <h3 style="margin: 0; color: #333; font-size: 24px;">Riwayat Pemesanan</h3> -->
                <div class="sort-dropdown">
                    <span>Terbaru</span>
                    <select>
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>Harga Tertinggi</option>
                        <option>Harga Terendah</option>
                    </select>
                </div>
            </div>

            <div class="bookings-table">
                <!-- Header Card -->
                <div class="table-header-card">
                    <div class="table-header-row">
                        <div class="table-header-cell">Nama</div>
                        <div class="table-header-cell">Paket & Tanggal</div>
                        <div class="table-header-cell">Jumlah Orang</div>
                        <div class="table-header-cell">Titik Penjemputan</div>
                        <div class="table-header-cell">Total</div>
                        <div class="table-header-cell">Metode Pembayaran</div>
                        <div class="table-header-cell">Status</div>
                        <div class="table-header-cell">Detail</div>
                    </div>
                </div>

                <!-- Data Row Cards dari database -->
                @forelse($pemesanan ?? [] as $row)
                    @php
                        // Mapping teks status untuk user
                        $statusText = [
                            'menunggu' => 'Menunggu Konfirmasi',
                            'dikonfirmasi' => 'Menunggu Pembayaran', // sudah dikonfirmasi admin, user belum bayar
                            'selesai' => 'Selesai',
                            'dibatalkan' => 'Dibatalkan',
                        ];
                        // Mapping kelas badge (warna)
                        // Untuk dikonfirmasi (menunggu pembayaran) kita pakai style yang sama dengan menunggu
                        $badgeClass = 'status-pending';
                        if ($row->status === 'selesai') $badgeClass = 'status-selesai';
                        elseif ($row->status === 'dibatalkan') $badgeClass = 'status-cancelled';

                        // Titik penjemputan / titik kumpul
                        $defaultMeetingPoint = 'Perum Tunggul Ametung Inside Blok B1';
                        $lowerPaket = strtolower($row->paket);
                        if (str_contains($lowerPaket, 'daily trip') || str_contains($lowerPaket, 'travel to malang')) {
                            $displayTitik = $defaultMeetingPoint;
                        } else {
                            $displayTitik = $row->titik_penjemputan ?? '-';
                        }
                    @endphp
                    <div class="table-row-card">
                        <div class="table-data-row">
                            <div class="table-data-cell">
                                <div class="user-info">
                                    <img src="{{ asset('images/profile.png') }}" alt="{{ auth()->user()->username ?? 'User' }}" class="user-avatar">
                                    <span class="user-name">{{ auth()->user()->username ?? '-' }}</span>
                                </div>
                            </div>
                            <div class="table-data-cell">
                                <div style="font-weight: 600; line-height: 1.2;">
                                    {{ $row->paket }}<br>
                                    <span style="font-size: 12px; color: #666; display: inline-block; margin-top: 2px;">
                                        {{ \Carbon\Carbon::parse($row->tanggal_keberangkatan)->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="table-data-cell">{{ $row->peserta }} Orang</div>
                            <div class="table-data-cell">{{ $displayTitik }}</div>
                            <div class="table-data-cell">{{ number_format($row->total,0,',','.') }}</div>
                            <div class="table-data-cell">{{ $row->metode_pembayaran ?? '-' }}</div>
                            <div class="table-data-cell">
                                <span class="status-badge {{ $badgeClass }}">
                                    {{ $statusText[$row->status] ?? ucfirst($row->status) }}
                                </span>
                            </div>
                            <div class="table-data-cell">
                                <button class="detail-btn"
                                        onclick="openDetailModal(this)"
                                        data-id="{{ $row->id }}"
                                        data-paket="{{ $row->paket }}"
                                        data-tanggal="{{ \Carbon\Carbon::parse($row->tanggal_keberangkatan)->format('d/m/Y') }}"
                                        data-peserta="{{ $row->peserta }}"
                                        data-total="{{ number_format($row->total,0,',','.') }}"
                                        data-status="{{ $statusText[$row->status] ?? ucfirst($row->status) }}"
                                        data-status-raw="{{ $row->status }}"
                                        data-titik="{{ $displayTitik }}"
                                        data-metode="{{ $row->metode_pembayaran ?? '-' }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="table-row-card">
                        <div class="table-data-row">
                            <div class="table-data-cell" style="text-align:center; width:100%;" colspan="8">
                                Belum ada pemesanan.
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="detail-modal">
        <div class="detail-modal-content">
            <div class="detail-modal-header">
                <h2>Detail Pemesanan</h2>
                <span class="detail-close" onclick="closeDetailModal()">&times;</span>
            </div>
            <div class="detail-modal-body">
                <div class="receipt-container">
                    <div class="receipt-header">
                        <div class="receipt-logo">MLB</div>
                        <h3 class="receipt-title">MlakuBromo.ID</h3>
                        <p class="receipt-subtitle">Bukti Pemesanan</p>
                    </div>
                    
                    <div class="receipt-info">
                        <div class="info-section">
                            <h4>Informasi Pelanggan</h4>
                            <p><strong>Nama:</strong> {{ auth()->user()->username ?? '-' }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email ?? '-' }}</p>
                            <p><strong>No. HP:</strong> +62 {{ auth()->user()->nomor_hp ?? '-' }}</p>
                        </div>
                        <div class="info-section">
                            <h4>Detail Pemesanan</h4>
                            <p><strong>Tanggal:</strong> <span id="detailTanggal">-</span></p>
                            <p><strong>Status:</strong> <span id="detailStatus" class="status-badge">-</span></p>
                            <p><strong>Titik Penjemputan:</strong> <span id="detailTitik">-</span></p>
                            <p><strong>Metode Pembayaran:</strong> <span id="detailMetode">-</span></p>
                        </div>
                    </div>
                    
                    <div class="receipt-items">
                        <h4>Detail Paket</h4>
                        <div class="item-row">
                            <span class="item-name" id="detailPaket">-</span>
                            <span class="item-price" id="detailHargaSatuan">-</span>
                        </div>
                        <div class="item-row">
                            <span class="item-name">Jumlah Orang: <span id="detailPeserta">-</span></span>
                            <span class="item-price" id="detailKaliPeserta">x -</span>
                        </div>
                    </div>
                    
                    <div class="receipt-total">
                        <div class="total-row">
                            <span class="total-label">Subtotal:</span>
                            <span class="total-amount" id="detailSubtotal">-</span>
                        </div>
                        <div class="total-row">
                            <span class="total-label">Pajak:</span>
                            <span class="total-amount">Rp 0</span>
                        </div>
                        <div class="total-row">
                            <span class="total-label">Total:</span>
                            <span class="total-amount" id="detailTotal">-</span>
                        </div>
                    </div>
                    
                    <div class="receipt-footer">
                        <p><strong>Metode Pembayaran:</strong> Dana</p>
                        <p><strong>Tanggal Pembayaran:</strong> 28/07/2025</p>
                        <p>Terima kasih telah memilih MlakuBromo.ID</p>
                        <p>Selamat menikmati perjalanan Anda!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Menunggu Konfirmasi -->
    <div id="pendingModal" class="detail-modal">
        <div class="detail-modal-content">
            <div class="detail-modal-header">
                <h2>Menunggu Konfirmasi</h2>
                <span class="detail-close" onclick="closePendingModal()">&times;</span>
            </div>
            <div class="detail-modal-body">
                <div class="status-info-container">
                    <div class="status-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Pemesanan Sedang Diproses</h3>
                    <p>Pemesanan Anda sedang menunggu konfirmasi dari admin. Kami akan segera memproses dan menghubungi Anda dalam waktu 1x24 jam.</p>
                    
                    <div class="order-summary">
                        <h4>Detail Pemesanan</h4>
                        <div class="summary-item">
                            <span>Paket:</span>
                            <span>Open Trip Bromo</span>
                        </div>
                        <div class="summary-item">
                            <span>Tanggal:</span>
                            <span>15/10/2025</span>
                        </div>
                        <div class="summary-item">
                            <span>Jumlah Orang:</span>
                            <span>2 Orang</span>
                        </div>
                        <div class="summary-item">
                            <span>Total Harga:</span>
                            <span>Rp 700.000</span>
                        </div>
                    </div>
                    
                    <!-- <div class="contact-info">
                        <p><strong>Butuh bantuan?</strong></p>
                        <a href="https://wa.me/6282143788855" class="whatsapp-btn" target="_blank">
                            <i class="fab fa-whatsapp"></i> Hubungi Admin
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Menunggu Pembayaran -->
    <div id="paymentModal" class="detail-modal">
        <div class="detail-modal-content">
            <div class="detail-modal-header">
                <h2>Menunggu Pembayaran</h2>
                <span class="detail-close" onclick="closePaymentModal()">&times;</span>
            </div>
            <div class="detail-modal-body">
                <form id="paymentForm" class="payment-container" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="metode_pembayaran" id="metodePembayaranInput" value="">
                    <div class="payment-status">
                        <div class="status-icon payment-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Silakan Lakukan Pembayaran</h3>
                        <p>Pemesanan Anda telah dikonfirmasi. Silakan pilih metode pembayaran dan lakukan pembayaran untuk menyelesaikan booking.</p>
                    </div>
                    
                    <div class="order-summary">
                        <h4>Detail Pemesanan</h4>
                        <div class="summary-item">
                            <span>Paket:</span>
                            <span id="payPaket">-</span>
                        </div>
                        <div class="summary-item">
                            <span>Tanggal:</span>
                            <span id="payTanggal">-</span>
                        </div>
                        <div class="summary-item">
                            <span>Jumlah Orang:</span>
                            <span id="payPeserta">- Orang</span>
                        </div>
                        <div class="summary-item">
                            <span>Titik Penjemputan:</span>
                            <span id="payTitik">-</span>
                        </div>
                        <div class="summary-item total">
                            <span>Total Pembayaran:</span>
                            <span id="payTotal">Rp -</span>
                        </div>
                    </div>
                    
                    <div class="payment-methods">
                        <h4>Pilih Metode Pembayaran</h4>
                        <div class="payment-options">
                            <div class="payment-option" onclick="selectPaymentMethod('bca')">
                                <i class="fas fa-university"></i>
                                <span>Bank BCA</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="payment-option" onclick="selectPaymentMethod('mandiri')">
                                <i class="fas fa-university"></i>
                                <span>Bank Mandiri</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="payment-option" onclick="selectPaymentMethod('dana')">
                                <i class="fas fa-wallet"></i>
                                <span>Dana</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="payment-option" onclick="selectPaymentMethod('gopay')">
                                <i class="fas fa-mobile-alt"></i>
                                <span>GoPay</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Details (Hidden by default) -->
                    <div id="paymentDetails" class="payment-details" style="display: none;">
                        <div class="bank-info">
                            <h4>Informasi Rekening</h4>
                            <div class="account-info">
                                <div class="account-item">
                                    <span>Bank:</span>
                                    <span id="bankName">-</span>
                                </div>
                                <div class="account-item">
                                    <span>No. Rekening:</span>
                                    <span id="accountNumber">-</span>
                                </div>
                                <div class="account-item">
                                    <span>Atas Nama:</span>
                                    <span>MlakuBromo.ID</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="upload-section">
                            <h4>Upload Bukti Pembayaran</h4>
                            <div class="upload-area" onclick="document.getElementById('paymentProof').click()">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Klik untuk upload bukti pembayaran</p>
                                <small>Format: JPG, PNG, PDF (Max 5MB)</small>
                            </div>
                            <input type="file" id="paymentProof" accept="image/*,.pdf" style="display: none;" onchange="handleFileUpload(this)">
                            <div id="uploadPreview" class="upload-preview" style="display: none;"></div>
                        </div>
                        
                        <div class="payment-actions">
                            <button type="button" class="submit-payment-btn" onclick="submitPayment()">
                                <i class="fas fa-check"></i> Konfirmasi Pembayaran
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Aktif (Nota) -->
    <div id="activeModal" class="detail-modal">
        <div class="detail-modal-content">
            <div class="detail-modal-header">
                <h2>Tiket Perjalanan</h2>
                <span class="detail-close" onclick="closeActiveModal()">&times;</span>
            </div>
            <div class="detail-modal-body">
                <div class="ticket-container">
                    <div class="ticket-header">
                        <div class="ticket-logo">
                            <img src="{{ asset('images/logo-mlaku.png') }}" alt="MlakuBromo" style="height: 40px;">
                        </div>
                        <div class="ticket-info">
                            <h3>MlakuBromo.ID</h3>
                            <p>E-Ticket Perjalanan</p>
                        </div>
                        <div class="ticket-status">
                            <span class="status-badge status-aktif">Aktif</span>
                        </div>
                    </div>
                    
                    <div class="ticket-details">
                        <div class="detail-row">
                            <div class="detail-col">
                                <h4>Informasi Perjalanan</h4>
                                <div class="info-item">
                                    <span class="label">Paket:</span>
                                    <span class="value">Travel Bromo</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Tanggal:</span>
                                    <span class="value">12/09/2025</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Jumlah Peserta:</span>
                                    <span class="value">2 Orang</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Meeting Point:</span>
                                    <span class="value">Stasiun Malang</span>
                                </div>
                            </div>
                            <div class="detail-col">
                                <h4>Informasi Pembayaran</h4>
                                <div class="info-item">
                                    <span class="label">ID Booking:</span>
                                    <span class="value">#MLB-2024-003</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Total Bayar:</span>
                                    <span class="value">Rp 2.000.000</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Metode:</span>
                                    <span class="value">Bank BCA</span>
                                </div>
                                <div class="info-item">
                                    <span class="label">Status:</span>
                                    <span class="value success">LUNAS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ticket-qr">
                        <div class="qr-code">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <p>Tunjukkan QR Code ini kepada guide</p>
                    </div>
                    
                    <div class="ticket-footer">
                        <div class="contact-info">
                            <p><strong>Kontak Darurat:</strong></p>
                            <p>📞 +62 822-xxxx-xxxx</p>
                            <p>📧 mlakubromo@gmail.com</p>
                        </div>
                        <div class="ticket-actions">
                            <button class="download-btn" onclick="downloadTicket()">
                                <i class="fas fa-download"></i> Download PDF
                            </button>
                            <button class="share-btn" onclick="shareTicket()">
                                <i class="fas fa-share"></i> Bagikan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <!-- <a href="#" onclick="openSocialMedia('twitter')"><i class="fab fa-twitter"></i></a>
                    <a href="#" onclick="openSocialMedia('youtube')"><i class="fab fa-youtube"></i></a> -->
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright  2024 Kelompok 10</p>
            </div>
        </div>
    </footer>

    <script>
        function openDetailModal(button) {
            var id = button.getAttribute('data-id');
            var paket = button.getAttribute('data-paket');
            var tanggal = button.getAttribute('data-tanggal');
            var peserta = button.getAttribute('data-peserta');
            var total = button.getAttribute('data-total');
            var status = button.getAttribute('data-status');
            var statusRaw = button.getAttribute('data-status-raw');
            var titik = button.getAttribute('data-titik');
            var metode = button.getAttribute('data-metode');

            if (statusRaw === 'dikonfirmasi') {
                // Set action form pembayaran untuk pemesanan ini
                var form = document.getElementById('paymentForm');
                form.action = "{{ url('/pemesanan') }}/" + id + "/konfirmasi-pembayaran";

                // Reset pilihan metode sebelumnya
                document.getElementById('metodePembayaranInput').value = '';

                // Buka modal pembayaran
                document.getElementById('payPaket').textContent = paket;
                document.getElementById('payTanggal').textContent = tanggal;
                document.getElementById('payPeserta').textContent = peserta + ' Orang';
                document.getElementById('payTitik').textContent = titik;
                document.getElementById('payTotal').textContent = 'Rp ' + total;

                document.getElementById('paymentModal').style.display = 'block';
            } else {
                // Buka modal detail biasa (termasuk saat status selesai)
                document.getElementById('detailPaket').textContent = paket;
                document.getElementById('detailTanggal').textContent = tanggal;
                document.getElementById('detailPeserta').textContent = peserta;
                document.getElementById('detailKaliPeserta').textContent = 'x ' + peserta;
                document.getElementById('detailSubtotal').textContent = 'Rp ' + total;
                document.getElementById('detailTotal').textContent = 'Rp ' + total;
                document.getElementById('detailStatus').textContent = status;
                document.getElementById('detailTitik').textContent = titik;
                document.getElementById('detailMetode').textContent = metode;

                document.getElementById('detailModal').style.display = 'block';
            }
        }

        function closeDetailModal() {
            document.getElementById('detailModal').style.display = 'none';
        }
    </script>
<script>

        // Pagination functionality
        document.querySelectorAll('.page-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        function showOrderDetail(orderId, status) {
            switch(status) {
                case 'pending':
                    document.getElementById('pendingModal').style.display = 'block';
                    break;
                case 'payment':
                    document.getElementById('paymentModal').style.display = 'block';
                    break;
                case 'active':
                    document.getElementById('activeModal').style.display = 'block';
                    break;
                case 'completed':
                default:
                    document.getElementById('detailModal').style.display = 'block';
                    break;
            }
            document.body.style.overflow = 'hidden';
        }

        // Modal functions for different statuses
        function closePendingModal() {
            document.getElementById('pendingModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function closeActiveModal() {
            document.getElementById('activeModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Payment method selection
        function selectPaymentMethod(method) {
            // Remove selected class from all options
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked option
            event.target.closest('.payment-option').classList.add('selected');
            
            // Show payment details
            const paymentDetails = document.getElementById('paymentDetails');
            const bankName = document.getElementById('bankName');
            const accountNumber = document.getElementById('accountNumber');
            const metodeInput = document.getElementById('metodePembayaranInput');
            
            paymentDetails.style.display = 'block';
            
            switch(method) {
                case 'bca':
                    bankName.textContent = 'Bank BCA';
                    accountNumber.textContent = '1234567890';
                    metodeInput.value = 'Bank BCA';
                    break;
                case 'mandiri':
                    bankName.textContent = 'Bank Mandiri';
                    accountNumber.textContent = '9876543210';
                    metodeInput.value = 'Bank Mandiri';
                    break;
                case 'dana':
                    bankName.textContent = 'Dana';
                    accountNumber.textContent = '082143788855';
                    metodeInput.value = 'Dana';
                    break;
                case 'gopay':
                    bankName.textContent = 'GoPay';
                    accountNumber.textContent = '082143788855';
                    metodeInput.value = 'GoPay';
                    break;
            }
        }

        // File upload handler
        function handleFileUpload(input) {
            const file = input.files[0];
            const preview = document.getElementById('uploadPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Payment Proof">
                        <p>File: ${file.name}</p>
                    `;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        // Submit payment
        function submitPayment() {
            const metodeInput = document.getElementById('metodePembayaranInput');
            if (!metodeInput.value) {
                alert('Silakan pilih metode pembayaran terlebih dahulu');
                return;
            }
            
            // Submit form ke backend untuk menyimpan metode_pembayaran
            document.getElementById('paymentForm').submit();
        }

        // Ticket actions
        function downloadTicket() {
            alert('Fitur download tiket akan segera tersedia');
        }

        function shareTicket() {
            if (navigator.share) {
                navigator.share({
                    title: 'Tiket MlakuBromo.ID',
                    text: 'Tiket perjalanan saya ke Bromo',
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link tiket berhasil disalin ke clipboard');
                });
            }
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const pendingModal = document.getElementById('pendingModal');
            const paymentModal = document.getElementById('paymentModal');
            const activeModal = document.getElementById('activeModal');
            const detailModal = document.getElementById('detailModal');
            
            if (event.target === pendingModal) {
                closePendingModal();
            }
            if (event.target === paymentModal) {
                closePaymentModal();
            }
            if (event.target === activeModal) {
                closeActiveModal();
            }
            if (event.target === detailModal) {
                closeModal();
            }
        }

        function closeDetailModal() {
            document.getElementById('detailModal').style.display = 'none';
            document.body.style.overflow = 'auto';
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
        
    function switchToRegister() {
        document.getElementById('loginModal').style.display = 'none';
        document.getElementById('registerModal').style.display = 'block';
    }

    function switchToLogin() {
        document.getElementById('registerModal').style.display = 'none';
        document.getElementById('loginModal').style.display = 'block';
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
        }
    }

    // AJAX Login
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const csrfToken = formData.get('_token');

        const response = await fetch('{{ route("login") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();
        if (data.success) {
            window.location.href = '{{ route("home") }}';
        } else {
            document.getElementById('loginError').innerText = data.message || 'Login gagal';
        }
    });

    // AJAX Register
    document.getElementById('registerForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const csrfToken = formData.get('_token');

        const response = await fetch('{{ route("register") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();
        if (data.success) {
            window.location.href = '{{ route("home") }}';
        } else {
            let msg = data.message || 'Registrasi gagal';
            if (data.errors) {
                msg = Object.values(data.errors).flat().join('\n');
            }
            document.getElementById('registerError').innerText = msg;
        }
    });

    function togglePassword(inputId, toggleElement) {
        const passwordInput = document.getElementById(inputId);
        const icon = toggleElement.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            passwordInput.type = 'password';
            icon.className = 'fas fa-eye';
        }
    }

    function togglePasswordSimple(inputId) {
        const input = document.getElementById(inputId);
        
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }

    // Fungsi untuk menampilkan modal konfirmasi logout
    function showLogoutModal() {
        const modal = document.getElementById('logoutModal');
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
    }

    // Fungsi untuk menutup modal
    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const modalContent = modal.querySelector('.logout-modal-content');
        
        // Animasi keluar
        modal.style.opacity = '0';
        modalContent.style.transform = 'scale(0.7)';
        
        // Hapus class show dan sembunyikan modal setelah animasi selesai
        setTimeout(() => {
            modal.classList.remove('show');
            modal.style.display = 'none';
            // Reset untuk animasi berikutnya
            modal.style.opacity = '';
            modalContent.style.transform = '';
        }, 300);
    }

    // Fungsi untuk konfirmasi logout
    function confirmLogout() {
        // Submit form logout
        document.getElementById('logoutForm').submit();
    }

    // Tutup modal jika klik di luar area modal
    window.onclick = function(event) {
        const logoutModal = document.getElementById('logoutModal');
        const loginModal = document.getElementById('loginModal');
        const registerModal = document.getElementById('registerModal');
        
        if (event.target === logoutModal) {
            closeLogoutModal();
        }
        if (event.target === loginModal) {
            loginModal.style.display = 'none';
        }
        if (event.target === registerModal) {
            registerModal.style.display = 'none';
        }
    }

    // Profile Dropdown Toggle Function
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('show');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.profile-dropdown')) {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown) {
                dropdown.classList.remove('show');
            }
        }
    });

    // Tutup modal dengan tombol ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const logoutModal = document.getElementById('logoutModal');
            if (logoutModal.classList.contains('show')) {
                closeLogoutModal();
            }
            
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            const detailModal = document.getElementById('detailModal');
            
            if (loginModal.style.display === 'block') {
                loginModal.style.display = 'none';
            }
            if (registerModal.style.display === 'block') {
                registerModal.style.display = 'none';
            }
            if (detailModal.style.display === 'block') {
                closeDetailModal();
            }

            // Close profile dropdown with ESC
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown) {
                dropdown.classList.remove('show');
            }
        }
    });

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

    // Header scroll effect dan active state untuk Paket Trip saja
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        const heroSection = document.querySelector('.hero');
        
        if (heroSection) {
            const heroHeight = heroSection.offsetHeight;
            
            // Check if scrolled past hero section
            if (window.scrollY > heroHeight - 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        // Active state hanya untuk menu Paket Trip
        const packagesSection = document.querySelector('.packages-section');
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
            facebook: 'https://facebook.com/mlakubromo',
            instagram: 'https://www.instagram.com/mlakubromo.id/',
            // twitter: 'https://twitter.com/mlakubromo',
            // youtube: 'https://youtube.com/mlakubromo'
        };
        
        if (urls[platform]) {
            window.open(urls[platform], '_blank');
        }
    }

    // Improved scroll to packages function
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

</script>
</body>
</html>