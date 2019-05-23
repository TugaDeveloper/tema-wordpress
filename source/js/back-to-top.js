/*Este Script faz com que o button no canto inferior direito tenha uma transição mais
agradável ao fazer o scroll até à parte de cima da página*/

jQuery( document ).ready(function($){
    var offset = 100,
        speed = 250,
        duration = 200,
        scrollButton = $('#button-top');
    
    $( window ).scroll( function() {
      if ( $( this ).scrollTop() < offset) {
        scrollButton.fadeOut( duration );
      } else {
        scrollButton.fadeIn( duration );
      }
    });
    
    scrollButton.on( 'click', function(e){
      e.preventDefault();
      $( 'html, body' ).animate({
        scrollTop: 1
      }, speed);
    });
  });

  jQuery(function () {
    var $buttonTop = jQuery('.button-top');
  
    $buttonTop.on('click', function () {
      jQuery('html, body').animate({
        scrollTop: 0,
      }, 400);
    });
  });

