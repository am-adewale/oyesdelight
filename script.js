document.addEventListener('DOMContentLoaded', function() {
    // Mobile Navigation Toggle
    const toggleNav = document.querySelector('.toggle-nav');
    const navLinks = document.querySelector('.nav-links');
    
    toggleNav.addEventListener('click', function() {
      this.classList.toggle('active');
      navLinks.classList.toggle('active');
      document.body.classList.toggle('no-scroll');
    });
  
    // Smooth Scrolling for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Close mobile menu if open
        if (navLinks.classList.contains('active')) {
          toggleNav.classList.remove('active');
          navLinks.classList.remove('active');
          document.body.classList.remove('no-scroll');
        }
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  
    // Animate elements when they come into view
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.category-item, blockquote, .section-title');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (elementPosition < screenPosition) {
          element.style.animation = 'fadeInUp 0.8s ease-out forwards';
        }
      });
    };
  
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on page load
  
    // Add hover effect to category items
    const categoryItems = document.querySelectorAll('.category-item');
    categoryItems.forEach(item => {
      item.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
        this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.15)';
      });
      
      item.addEventListener('mouseleave', function() {
        this.style.transform = '';
        this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
      });
    });
  });