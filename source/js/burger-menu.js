/*Este script é para o menu burger para dispositivos móveis*/
 
jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e){
        jQuery('.menu.main ul').slideToogle(500);

        e.preventDefault();
    });
});

jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e) {
      jQuery(this).toggleClass('active');
      jQuery('.menu ul').toggleClass('active');

      e.preventDefault();
    });
  });

  