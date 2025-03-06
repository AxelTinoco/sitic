document.addEventListener('DOMContentLoaded', function() {
  const readMoreLinks = document.querySelectorAll('.post-principal .post-content a.more-link');
  
  readMoreLinks.forEach(function(link) {
    
    link.textContent = 'Leer más';
  });
});