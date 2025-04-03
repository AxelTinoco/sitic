document.addEventListener('DOMContentLoaded', function() {
  const readMoreLinks = document.querySelectorAll('.post-principal .post-content a.more-link');
  
  readMoreLinks.forEach(function(link) {
    
    link.textContent = 'Leer más';
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const readMoreLinks = document.querySelectorAll('.post-content a.more-link');
  
  readMoreLinks.forEach(function(link) {
    
    link.textContent = 'Conoce más';
  });
});

jQuery(document).ready(function($) {
  $('.post-meta').contents().each(function() {
    if (this.nodeType === 3 && this.textContent.includes('|')) {
      $(this).remove();
    }
  });
});

jQuery(document).ready(function($) {
  // Selecciona todos los artículos del blog
  $('.et_pb_post').each(function() {
    // Obtiene referencias a los elementos relevantes
    var postMeta = $(this).find('.post-meta');
    var entryTitle = $(this).find('h2.entry-title');
    
    // Mueve el post-meta antes del h2.entry-title
    if (postMeta.length && entryTitle.length) {
      postMeta.insertBefore(entryTitle);
    }
  });
});