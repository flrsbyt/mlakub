<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }
  
  function toggleDropdown(element) {
    const dropdownMenu = element.nextElementSibling;
    const arrow = element.querySelector('.dropdown-arrow');
    
    dropdownMenu.classList.toggle('open');
    arrow.classList.toggle('rotated');
    
    // Close other dropdowns
    const allDropdowns = document.querySelectorAll('.dropdown-menu');
    const allArrows = document.querySelectorAll('.dropdown-arrow');
    
    allDropdowns.forEach((dropdown, index) => {
      if (dropdown !== dropdownMenu) {
        dropdown.classList.remove('open');
        allArrows[index].classList.remove('rotated');
      }
    });
  }
  
  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.querySelector('.toggle-btn');
    
    if (window.innerWidth <= 768) {
      if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
        sidebar.classList.remove('open');
      }
    }
  });
  
  // Handle menu item clicks
  document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item:not(.dropdown-toggle)');
    const submenuItems = document.querySelectorAll('.submenu-item');
    
    // Handle main menu items
    menuItems.forEach(item => {
      item.addEventListener('click', function(e) {
        if (this.getAttribute('href') === '#') {
          e.preventDefault();
        }
        
        // Remove active class from all menu items
        menuItems.forEach(mi => mi.classList.remove('active'));
        submenuItems.forEach(si => si.classList.remove('active'));
        
        // Add active class to clicked item
        this.classList.add('active');
        
        // Close sidebar on mobile after selection
        if (window.innerWidth <= 768) {
          document.getElementById('sidebar').classList.remove('open');
        }
      });
    });
    
    // Handle submenu items
    submenuItems.forEach(item => {
      item.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all items
        menuItems.forEach(mi => mi.classList.remove('active'));
        submenuItems.forEach(si => si.classList.remove('active'));
        
        // Add active class to clicked submenu item
        this.classList.add('active');
        
        // Close sidebar on mobile after selection
        if (window.innerWidth <= 768) {
          document.getElementById('sidebar').classList.remove('open');
        }
      });
    });
  });
</script>
