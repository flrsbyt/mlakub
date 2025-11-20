<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - MlakuBromo.ID </title>
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
            display: none; /* will be set to flex when opened */
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-content {
            background: #f8f9fa;
            padding: 30px;
            margin: 0 auto;
            width: 100%;
            max-width: 420px;
            border-radius: 20px;
            position: relative;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-content h3 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.9rem;
            font-weight: 800;
            color: #333;
        }

        /* Thank you modal enhancements */
        #thankYouModal .modal-content {
            text-align: center;
            padding: 32px 28px;
            transform: translateY(10px) scale(0.97);
            opacity: 0;
            animation: popupIn 220ms ease-out forwards;
        }

        #thankYouModal .success-emoji {
            font-size: 40px;
            line-height: 1;
            margin-bottom: 8px;
        }

        #thankYouModal p {
            color: #555;
            margin-top: 8px;
            margin-bottom: 18px;
        }

        @keyframes popupIn {
            0% { opacity: 0; transform: translateY(10px) scale(0.97); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
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

        .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
        }

        /* Contact Cards */
        .contact-cards {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        }

        .contact-card {
        background: white;
        border-radius: 15px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1px solid rgba(254, 156, 3, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
        }

        .contact-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(254, 156, 3, 0.02), rgba(255, 193, 0, 0.02));
        opacity: 0;
        transition: opacity 0.3s ease;
        }

        .contact-card:hover::before {
        opacity: 1;
        }

        .contact-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
        border-color: rgba(254, 156, 3, 0.3);
        }

        /* Contact Icon */
        .contact-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #FE9C03, #FFC100);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: white;
        box-shadow: 0 10px 30px rgba(254, 156, 3, 0.3);
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
        }

        .contact-card:hover .contact-icon {
        transform: scale(1.1);
        box-shadow: 0 15px 40px rgba(254, 156, 3, 0.4);
        }

        .contact-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
        position: relative;
        z-index: 2;
        }

        .contact-info {
        color: #666;
        font-size: 1rem;
        font-weight: 500;
        position: relative;
        z-index: 2;
        }

        /* Testimonial Form */
        .testimonial-form {
        background: white;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(254, 156, 3, 0.1);
        position: sticky;
        top: 120px;
        }

        .form-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
        }

        .form-title .highlight {
        color: #FE9C03;
        }

        .form-group {
        margin-bottom: 25px;
        }

        .form-input {
        width: 100%;
        padding: 18px 25px;
        border: 2px solid #f0f0f0;
        border-radius: 20px;
        background: #f8f9fa;
        font-size: 1rem;
        color: #333;
        font-family: inherit;
        transition: all 0.3s ease;
        }

        .form-input:focus {
        outline: none;
        border-color: #FE9C03;
        background: white;
        box-shadow: 0 0 0 3px rgba(254, 156, 3, 0.1);
        transform: translateY(-2px);
        }

        .form-textarea {
        height: 120px;
        resize: vertical;
        font-family: inherit;
        }

        .submit-btn {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #FE9C03, #FFC100);
        border: none;
        border-radius: 20px;
        color: black;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(254, 156, 3, 0.3);
        }

        .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(254, 156, 3, 0.4);
        }

        /* Map Section */
        .map-container {
            background: white;
            border-radius: 25px;
            padding: 25px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(254, 156, 3, 0.1);
            height: 400px;
            overflow: hidden;
            margin-bottom: 40px;
            max-width: 950px; /* Batasi lebar maksimal */
            margin-left: auto;  /* Center horizontal */
            margin-right: auto; /* Center horizontal */
        }

        .map-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin: 60px 0 25px;
        }

        .map-title .highlight {
        color: #FE9C03;
        }

        .map-frame {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Success Message */
        .success-message {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        padding: 18px 25px;
        border-radius: 15px;
        margin-bottom: 25px;
        text-align: center;
        display: none;
        animation: slideIn 0.5s ease;
        font-weight: 500;
        }

        @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
            /* padding: 100px 0; */
            background: white;
            /* Add scroll margin */
            scroll-margin-top: 100px;
        }

        .why-choose-title {
            text-align: center;
            margin-bottom: 60px;
            /* Add padding top */
            padding-top: 20px;
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 35px;
            margin-bottom: 60px;
        }

        .feature-card {
            text-align: center;
            padding: 40px 25px;
            border-radius: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            transition: all 0.4s;
            border: 1px solid rgba(255, 107, 53, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border-color: rgba(255, 107, 53, 0.3);
        }

        .feature-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #FE9C03, #FFC100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }

        .feature-card h4 {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.7;
        }

        .bottom-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 35px;
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

        .bottom-feature h5 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            font-size: 1.2rem;
        }

        .bottom-feature p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
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
                                <a href="{{ route('admin.dashboard') }}">Paket Trip</a>
                            @else
                                <a href="{{ route('paket-trip') }}">Paket Trip</a>
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
            <h2>Kontak <span>Kami</span></h2>
            <p>Hubungi kami untuk informasi paket wisata atau konsultasi gratis.</p>
        </div>
    </section>

    <div class="contact-wrapper">
    <!-- Contact Cards -->
    <div class="contact-cards ">
        <div class="contact-card animate-on-scroll" onclick="openWhatsApp()">
        <div class="contact-icon">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div class="contact-title">WhatsApp</div>
        <div class="contact-info">+62 822-3478-4950</div>
        </div>

        <div class="contact-card animate-on-scroll" onclick="openInstagram()">
        <div class="contact-icon">
            <i class="fab fa-instagram"></i>
        </div>
        <div class="contact-title">Instagram</div>
        <div class="contact-info">@mlakubromo.id</div>
        </div>

        <div class="contact-card animate-on-scroll" onclick="openEmail()">
        <div class="contact-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="contact-title">Email</div>
        <div class="contact-info">info@mlakubromo.id</div>
        </div>

        <div class="contact-card animate-on-scroll" onclick="openFacebook()">
        <div class="contact-icon">
            <i class="fab fa-facebook-f"></i>
        </div>
        <div class="contact-title">Facebook</div>
        <div class="contact-info">MlakuBromo.ID</div>
        </div>
    </div>

    <!-- Testimonial Form -->
    <div class="testimonial-form animate-on-scroll">
        <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i>
        Terima kasih! Testimoni Anda telah berhasil dikirim.
        </div>

        <h3 class="form-title  animate-on-scroll">
        Kirim <span class="highlight">Testimoni</span>
        </h3>

        <form id="testimonialForm">
        <div class="form-group">
            <input type="text" class="form-input" name="nama" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
            <input type="email" class="form-input" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input type="number" class="form-input" name="rating" placeholder="Rating (1-5 bintang)" min="1" max="5" required>
        </div>

        <div class="form-group">
            <textarea class="form-input form-textarea" name="keterangan" placeholder="Ceritakan pengalaman Anda bersama MlakuBromo..." required></textarea>
        </div>

        <button type="submit" class="submit-btn">Kirim Testimoni</button>
        </form>
    </div>

    </div>

    <!-- Modal Terima Kasih Testimoni -->
    <div id="thankYouModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeThankYouModal()">&times;</span>
            <div class="success-emoji">🎉</div>
            <h3>Terima kasih!</h3>
            <p>Testimoni Anda telah berhasil dikirim. Kami sangat menghargai masukan Anda.</p>
            <button class="modallogin-btn" onclick="closeThankYouModal()" style="margin-top:6px; width:auto; padding:12px 20px">Tutup</button>
        </div>
    </div>

    <!-- Map Section -->
    <h3 class="map-title  animate-on-scroll">
    Lokasi <span class="highlight">Kantor</span> Kami
    </h3>

    <div class="map-container  animate-on-scroll">
    <iframe class="map-frame"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5547234537!2d113.2293!3d-7.9424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629b8ef7b1525%3A0x9c14b29e3c6a4c8c!2sBromo%20Tengger%20Semeru%20National%20Park!5e0!3m2!1sen!2sid!4v1690000000000!5m2!1sen!2sid"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </div>
    </div>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container  animate-on-scroll">
            <h2>Apa <span>Kata Mereka?</span></h2>
            <div class="testimonial-grid">
                <div class="testimonial-card  animate-on-scroll">
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
                
                <div class="testimonial-card  animate-on-scroll">
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
                
                <div class="testimonial-card  animate-on-scroll">
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
        if (data.success || response.ok) {
            // Tutup modal dan reload halaman saat ini
            document.getElementById('loginModal').style.display = 'none';
            window.location.reload();
        } else {
            document.getElementById('loginError').innerText = data.message || 'Login gagal';
        }
    });

    // Submit Testimonial - show Thank You modal
    (function(){
        const form = document.getElementById('testimonialForm');
        if (!form) return;
        form.addEventListener('submit', function(e){
            e.preventDefault();
            // Require login before allowing testimonial submission
            const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
            if (isLoggedIn) {
                // TODO: Integrate with backend when endpoint is ready
                // For now, show thank you modal and reset form
                openThankYouModal();
                form.reset();
            } else {
                showLoginModal();
            }
        });

        window.openThankYouModal = function(){
            const modal = document.getElementById('thankYouModal');
            if (modal) modal.style.display = 'flex';
        }
        window.closeThankYouModal = function(){
            const modal = document.getElementById('thankYouModal');
            if (modal) modal.style.display = 'none';
        }
    })();

    // Show login modal (reused by testimonial submit guard)
    function showLoginModal() {
        const modal = document.getElementById('loginModal');
        if (modal) {
            modal.style.display = 'block';
        }
    }

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
        const thankYouModal = document.getElementById('thankYouModal');
        
        if (event.target === logoutModal) {
            closeLogoutModal();
        }
        if (event.target === loginModal) {
            loginModal.style.display = 'none';
        }
        if (event.target === registerModal) {
            registerModal.style.display = 'none';
        }
        if (event.target === thankYouModal) {
            closeThankYouModal();
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
            const thankYouModal = document.getElementById('thankYouModal');
            if (loginModal.style.display === 'block') {
                loginModal.style.display = 'none';
            }
            if (registerModal.style.display === 'block') {
                registerModal.style.display = 'none';
            }
            if (thankYouModal && thankYouModal.style.display === 'block') {
                closeThankYouModal();
            }
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

    // Interactive hover effects for cards
    document.querySelectorAll('.package-card, .feature-card, .testimonial-card, .bottom-feature').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

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

</script>
</body>
</html>