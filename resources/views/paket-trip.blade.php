<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Trip - MlakuBromo.ID</title>
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
            color: black !important;
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

        /* Form Buttons */
        /* .modal-content button[type="submit"] {
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
        } */

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

        
        /* Main Content - Fixed scroll offset */
        .main-content {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            /* Add scroll margin to all sections */
            scroll-margin-top: 100px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 70px;
            /* Add scroll margin */
            scroll-margin-top: 100px;
        }

        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #333;
        }

        .section-title h2 .highlight {
            background: #FE9C03;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .section-title p .highlight {
            background: #FE9C03;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Package Cards */
        .packages-section {
            scroll-margin-top: 100px;
            /* padding: 80px 0; */
        }

        .packages-section h2 {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 50px;
            color: #333;
            padding-top: 30px;
        }

        .packages-section h2 .highlight {
            background: #FE9C03;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .packages-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 70px;
            max-width: 1300px;
            margin: 0 auto 60px;
        }

        .package-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            position: relative;
            width: 480px;
        }

        .package-details {
            margin: 15px 0;
        }

        .package-details .facilities,
        .package-details .destinations {
            margin-bottom: 15px;
        }

        .package-details h4 {
            font-size: 14px;
            font-weight: 600;
            color: #ff6b35;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .package-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .package-details li {
            font-size: 12px;
            color: #666;
            padding: 2px 0;
            padding-left: 15px;
            position: relative;
        }

        .package-details li:before {
            content: "•";
            color: #ff6b35;
            position: absolute;
            left: 0;
        }

        .package-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.15);
            border-color: rgba(255, 107, 53, 0.4);
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

        .package-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
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

        .package-decorative-images {
            position: absolute;
            width: 70px;
            height: 70px;
            transform: rotate(15deg);
            opacity: 0.8;
            z-index: 1;
        }

        .decorative-img {
            position: absolute;
            width: 280px;
            height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            /* opacity: 0.7; */
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

        /* .decorative-img:nth-child(4) {
            bottom: 50px;
            right: 120px;
            transform: rotate(-15deg);
        } */

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
        }

        .package-content h3 {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            line-height: 1.4;
        }

        .package-content p {
            color: #555;
            margin-bottom: 16px;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .package-features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 16px;
            font-size: 0.8rem;
        }

        .package-features span {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
            background: #f1f3f5;
            padding: 4px 8px;
            border-radius: 10px;
        }

        .package-features i {
            color: #FE9C03;
            font-size: 0.75rem;
        }

        .package-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 14px;
            margin-top: 10px;
        }

        .price {
            font-size: 1.4rem;
            font-weight: bold;
            color: #FE9C03;
        }

        .per-person {
            font-size: 0.75rem;
            color: #666;
        }

        .btn-package {
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .btn-package:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }


        /* Gallery */
        .gallery {
            padding: 100px 0;
            background: #f8f9fa;
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
            /* Add scroll margin */
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

            .packages-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .testimonial-grid{
                grid-template-columns: 1fr;
            }

            .why-choose{
                scroll-margin-top: 80px;
            }

            .why-choose .container{
                padding: 0 20px;
            }

            .features-grid,
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

            .section-title h2 {
                font-size: 2.2rem;
            }

            .package-features {
                flex-direction: column;
                gap: 10px;
            }

            /* Adjust scroll margin for mobile */
            .main-content,
            .packages-section,
            .gallery-section,
            .testimonials,
            .why-choose,
            .footer {
                scroll-margin-top: 80px;
            }

            .gallery-section .gallery-grid,
            .testimonials .container,
            .why-choose .container,
            .footer .container {
                padding: 0 20px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
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

            .gallery-section, .testimonials, .why-choose {
                padding: 80px 0;
            }

            .gallery-section {
                padding: 80px 0;
            }
            
            .gallery-grid {
                gap: 15px;
                padding: 0 15px;
            }
            
            .gallery-item {
                height: 220px;
            }
            
            .gallery-title h2 {
                font-size: 2rem;
            }

            /* Further adjust scroll margin for small mobile */
            .main-content,
            .packages-section,
            .gallery-section,
            .testimonials,
            .why-choose,
            .footer {
                scroll-margin-top: 70px;
            }

            /* Footer responsive improvements for small screens */
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
            
            .gallery-section .gallery-grid,
            .testimonials .container,
            .why-choose .container,
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
    </style>
</head>
<body>
    <!-- Loading Screen
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div> -->

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
                                <a href="{{ route('admin.paket-trip') }}" class="active">Paket Trip</a>
                            @else
                                <a href="{{ route('paket-trip') }}" class="active">Paket Trip</a>
                            @endif
                        </li>
                        <li>
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ route('admin.cara-pemesanan') }}">Cara Pemesanan</a>
                            @else
                                <a href="{{ route('cara-pemesanan') }}">Cara Pemesanan</a>
                            @endif
                        </li>
                        <li>
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ route('admin.galery.admin') }}">Galeri</a>
                            @else
                                <a href="{{ route('galeri') }}">Galeri</a>
                            @endif
                        </li>
                        <li>
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <a href="{{ route('admin.kontak') }}">Kontak</a>
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
            <!-- Paket Trip Section -->
            <div class="section-title animate-on-scroll">
                <h2>Apa Itu <span class="highlight">Paket</span> Trip?</h2>
                <p>Temukan petualangan seru dan tak terlupakan melalui paket wisata eksklusif dari mlakubromo.id! Mulai dari keindahan sunrise Bromo, pesona biru Kawah Ijen, hingga megahnya Air Terjun Tumpak Sewu. Semua kami kemas dalam perjalanan yang nyaman, aman, dan penuh pengalaman berkesan.</p>
                <p><span class="highlight">Pilih paket impianmu sekarang dan mulai petualangan serumu!</span></p>
            </div>

            <div class="packages-section" id="paket">
                <h2>Pilihan <span class="highlight">Paket</span> Trip</h2>

                <div class="packages-grid packages-top"> 
                    <!-- Open Trip Bromo -->
                    <div class="package-card animate-on-scroll">
                        <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                            <div class="decorative-img" >
                                <img src="{{ asset('images/packages/opentripbromo.jpg') }}" alt="Bromo">
                            </div>
                            <div class="package-badge">Open Trip | Private Trip</div>
                        </div>
                        <div class="package-content">
                            <h3>Open Trip Bromo</h3>
                            <div class="package-details">
                                <div class="facilities">
                                    <h4><i class="fas fa-check-circle"></i> Fasilitas</h4>
                                    <ul>
                                        <li>Penjemputan Malang (Pulang Pergi)</li>
                                        <li>JEEP Bromo</li>
                                        <li>Driver, BBM, Parkir</li>
                                        <li>Tiket Masuk Bromo</li>
                                    </ul>
                                </div>
                                <div class="destinations">
                                    <h4><i class="fas fa-map-marker-alt"></i> Destinasi</h4>
                                    <ul>
                                        <li>Sunrise Point</li>
                                        <li>Widodaren & G Batok</li>
                                        <li>Kawah Bromo & Pura Poten</li>
                                        <li>Pasir Berbisik</li>
                                        <li>Savana Bukit Teletubbies</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-features">
                                <span><i class="fas fa-clock"></i> 1 Hari</span>
                                <span><i class="fas fa-users"></i> Max. 40 orang</span>
                            </div>
                            <div class="package-price">
                                <span class="price">IDR 350.000<span class="per-person">/orang</span></span>
                                <button class="btn-package" onclick="window.location.href='{{ route('opentrip') }}'">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Daily Trip Bromo Sunrise -->
                    <div class="package-card animate-on-scroll">
                        <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                        <div class="decorative-img" >
                                <img src="{{ asset('images/packages/dailytrip.jpg') }}" alt="Bromo">
                            </div>
                            <div class="package-badge">Open Trip | Private Trip</div>
                        </div>
                        <div class="package-content">
                            <h3>Daily Trip Bromo Sunrise</h3>
                            <div class="package-details">
                                <div class="facilities">
                                    <h4><i class="fas fa-check-circle"></i> Fasilitas</h4>
                                    <ul>
                                        <li>Akomodasi Transportasi</li>
                                        <li>JEEP Bromo</li>
                                        <li>Tiket Masuk Bromo</li>
                                    </ul>
                                </div>
                                <div class="destinations">
                                    <h4><i class="fas fa-map-marker-alt"></i> Destinasi</h4>
                                    <ul>
                                        <li>Sunrise Point</li>
                                        <li>Widodaren & G Batok</li>
                                        <li>Kawah Bromo & Pura Poten</li>
                                        <li>Pasir Berbisik</li>
                                        <li>Savana Bukit Teletubbies</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-features">
                                <span><i class="fas fa-clock"></i> 1 Hari</span>
                                <span><i class="fas fa-users"></i> Max. 40 Orang</span>
                            </div>
                            <div class="package-price">
                                <span class="price">IDR 350.000<span class="per-person">/orang</span></span>
                                <button class="btn-package" onclick="window.location.href='{{ route('dailytrip') }}'">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second row - 2 packages -->
                <div class="packages-grid packages-bottom">
                    <!-- Travel to Malang Bromo -->
                    <div class="package-card animate-on-scroll">
                        <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                            <div class="decorative-img" >
                                <img src="{{ asset('images/packages/traveltrip.jpg') }}" alt="Bromo">
                            </div>
                            <div class="package-badge">Private Trip</div>
                        </div>
                        <div class="package-content">
                            <h3>Travel to Malang Bromo 3D2N</h3>
                            <div class="package-details">
                                <div class="facilities">
                                        <h4><i class="fas fa-check-circle"></i> Fasilitas</h4>
                                        <ul>
                                            <li>Tiket masuk tempat wisata</li>
                                            <li>Transport city car</li>
                                            <li>Jeep Bromo</li>
                                            <li>2 malam stay di hotel bintang 3.</li>
                                            <li>Welcome Snack and drink</li>
                                        </ul>
                                    </div>
                                <div class="destinations">
                                    <h4><i class="fas fa-map-marker-alt"></i> Destinasi</h4>
                                    <ul>
                                        <li>Gunung Bromo</li>
                                        <li>Petik Apel</li>
                                        <li>Jatim Park 2</li>
                                        <li>Museum Angkut</li>
                                        <li>Eco Green Park</li>
                                        <li>Coban Rondo</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-features">
                                <span><i class="fas fa-clock"></i> 3 Hari 2 Malam</span>
                                <span><i class="fas fa-users"></i> Max. 40 orang</span>
                            </div>
                            <div class="package-price">
                                <span class="price">IDR 2.000.000<span class="per-person">/orang</span></span>
                                <button class="btn-package" onclick="window.location.href='{{ route('travelbromo') }}'">Detail</button>
                            </div>
                        </div>
                    </div>

                    <!-- Paket Bromo Ijen WNA -->
                    <div class="package-card animate-on-scroll">
                        <div class="package-image" style="background-image: url('{{ asset('images/packages/backdot.png') }}'); background-size: cover; background-position: center;">
                            <div class="decorative-img" >
                                <img src="{{ asset('images/packages/paketwna.jpg') }}" alt="Bromo">
                            </div>
                            <div class="package-badge">Private Trip</div>
                        </div>
                        <div class="package-content">
                            <h3>Paket Bromo Ijen WNA</h3>
                            <div class="package-details">
                                <div class="facilities">
                                    <h4><i class="fas fa-check-circle"></i> Fasilitas</h4>
                                    <ul>
                                        <li>Penjemputan Malang</li>
                                        <li>Jeep Bromo</li>
                                        <li>Tiket Bromo</li>
                                        <li>Tiket Kawah Ijen</li>
                                        <li>Local guide</li>
                                        <li>Finish drop Ketapang / hotel Banyuwangi</li>
                                    </ul>
                                </div>
                                <div class="destinations">
                                    <h4><i class="fas fa-map-marker-alt"></i> Destinasi</h4>
                                    <ul>
                                        <li>Sunrise Point</li>
                                        <li>Widodaren & G Batok</li>
                                        <li>Kawah Bromo & Pura Poten</li>
                                        <li>Pasir Berbisik</li>
                                        <li>Savana Bukit Teletubbies</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="package-features">
                                <span><i class="fas fa-clock"></i> 2 Hari 1 Malam</span>
                                <span><i class="fas fa-users"></i> Max. 40 orang</span>
                            </div>
                            <div class="package-price">
                                <span class="price">IDR 2.000.000<span class="per-person">/orang</span></span>
                                <button class="btn-package" onclick="window.location.href='{{ route('paketwna') }}'">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
                            <!-- <a href="#" onclick="openSocialMedia('twitter')"><i class="fab fa-twitter"></i></a>
                            <a href="#" onclick="openSocialMedia('youtube')"><i class="fab fa-youtube"></i></a> -->
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

        // Tutup modal dengan tombol ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const logoutModal = document.getElementById('logoutModal');
                if (logoutModal.classList.contains('show')) {
                    closeLogoutModal();
                }
                
                const loginModal = document.getElementById('loginModal');
                const registerModal = document.getElementById('registerModal');
                if (loginModal.style.display === 'block') {
                    loginModal.style.display = 'none';
                }
                if (registerModal.style.display === 'block') {
                    registerModal.style.display = 'none';
                }
            }
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
                document.getElementById('registerError').innerText = data.message || 'Registrasi gagal';
            }
        } catch (error) {
            console.error('Register error:', error);
            document.getElementById('registerError').innerText = 'Terjadi kesalahan saat registrasi';
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

        // Improved smooth scrolling for navigation links with offset
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

            // Animasi untuk cards Why Choose Us - lebih sensitive
    const whyChooseObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const cards = entry.target.querySelectorAll('.feature-card, .bottom-feature');
                cards.forEach(card => {
                    card.classList.add('animate-card');
                });
            }
        });
    }, {
        threshold: 0.1,  // Lebih sensitive, trigger saat 10% terlihat
        rootMargin: '0px 0px -100px 0px'  // Trigger lebih awal
    });

    // Observe Why Choose Us section
    const whyChooseSection = document.querySelector('.why-choose');
    if (whyChooseSection) {
        whyChooseObserver.observe(whyChooseSection);
    }

        // Package booking functionality
        function bookPackage(packageName) {
            // Bisa simpan data trip ke session storage atau localStorage dulu
            localStorage.setItem('selectedTrip', tripName);
            // Redirect ke opentrip

            window.location.href = "{{ route('opentrip') }}";

            alert(`Terima kasih! Anda akan diarahkan untuk booking ${packageName}. Silakan hubungi WhatsApp kami untuk pemesanan.`);
            window.open('https://wa.me/6282xxxxxxxx?text=Halo, saya ingin booking ' + packageName, '_blank');
        }

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
                tiktok: 'https://www.tiktok.com/@mlakubromo.id?_t=ZS-8zBeoxu4IHY&_r=1',
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

        // Add click event to search button
        document.querySelector('.search-btn').addEventListener('click', function() {
            const searchInput = document.getElementById('searchInput');
            const searchTerm = searchInput.value;
            if (searchTerm) {
                alert(`Mencari paket trip: ${searchTerm}`);
            } else {
                scrollToPackages();
            }
        });

        // Add newsletter subscription (if needed)
        function subscribeNewsletter(email) {
            if (email && email.includes('@')) {
                alert('Terima kasih telah berlangganan newsletter MlakuBromo!');
            } else {
                alert('Silakan masukkan email yang valid.');
            }
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
    </script>
</body>
</html>