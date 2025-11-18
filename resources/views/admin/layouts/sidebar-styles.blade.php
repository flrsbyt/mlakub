<style>
  /* ===== CSS UNTUK SIDEBAR ===== */
  .sidebar {
    height: 100vh;
    width: 280px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #ffffff;
    padding: 20px 0;
    color: #333;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border-right: 1px solid #e9ecef;
    overflow-y: auto;
  }
  
  .sidebar-header {
    text-align: center;
    padding: 0 20px 30px;
    border-bottom: 1px solid #e9ecef;
    margin-bottom: 20px;
  }
  
  .sidebar .logo {
    background: linear-gradient(135deg, #ff6b35, #f7931e);
    color: white;
    padding: 12px 20px;
    border-radius: 25px;
    display: inline-block;
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 15px;
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    letter-spacing: 1px;
    transition: transform 0.3s ease;
  }
  
  .sidebar .logo:hover {
    transform: scale(1.05);
  }
  
  .sidebar h2 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
  }
  
  .sidebar .subtitle {
    font-size: 14px;
    color: #6c757d;
    font-weight: 300;
  }
  
  .menu-section {
    margin-bottom: 20px;
  }
  
  .menu-title {
    padding: 0 20px 10px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #6c757d;
  }
  
  .sidebar a {
    display: flex;
    align-items: center;
    color: #333;
    padding: 15px 20px;
    text-decoration: none;
    font-size: 15px;
    transition: all 0.3s ease;
    /* remove left accent border to avoid orange vertical line */
    border-left: none;
    position: relative;
    justify-content: space-between;
  }
  
  .sidebar a:hover {
    background: rgba(255, 107, 53, 0.1);
    color: #ff6b35;
  }
  
  .sidebar a.active {
    background: rgba(255, 107, 53, 0.15);
    color: #ff6b35;
    font-weight: 600;
    /* ensure no left border showing */
    border-left: none;
  }
  
  .menu-item-content {
    display: flex;
    align-items: center;
    flex: 1;
  }
  
  .menu-icon {
    width: 20px;
    height: 20px;
    margin-right: 15px;
    flex-shrink: 0;
    text-align: center;
    font-size: 16px;
  }
  
  .dropdown-arrow {
    font-size: 12px;
    transition: transform 0.3s ease;
    color: #6c757d;
  }
  
  .dropdown-arrow.rotated {
    transform: rotate(90deg);
  }
  
  .dropdown-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    background: #f8f9fa;
  }
  
  .dropdown-menu.open {
    max-height: 300px;
  }
  
  .dropdown-menu a {
    padding: 12px 20px 12px 60px;
    font-size: 14px;
    border-left: none;
    background: transparent;
  }
  
  .dropdown-menu a:hover {
    background: rgba(255, 107, 53, 0.08);
    color: #ff6b35;
  }
  
  .dropdown-menu a.active {
    background: rgba(255, 107, 53, 0.12);
    color: #ff6b35;
    font-weight: 500;
  }
  
  .toggle-btn {
    display: none;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1000;
    background: #ff6b35;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 18px;
    box-shadow: 0 2px 10px rgba(255, 107, 53, 0.3);
  }
  
  .toggle-btn:hover {
    background: #f7931e;
  }
  
  /* ===== CSS UNTUK RESPONSIVE ===== */
  @media (max-width: 768px) {
    .sidebar {
      width: 0;
      padding: 0;
      overflow: hidden;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 999;
    }
    
    .sidebar.open {
      width: 280px;
      padding: 20px 0;
      overflow-y: auto;
    }
    
    .toggle-btn {
      display: block;
    }
  }
  
  /* Main content area */
  .main-content {
    margin-left: 280px;
    padding: 80px 20px 20px 20px;
    transition: margin-left 0.3s ease;
    min-height: 100vh;
    background-color: #f8f9fa;
    position: relative;
    left: 0;
  }
  
  @media (max-width: 768px) {
    .main-content {
      margin-left: 0;
      padding: 80px 20px 20px 20px;
      position: relative;
      left: 0;
    }
  }
</style>
