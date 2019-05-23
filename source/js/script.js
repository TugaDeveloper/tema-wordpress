/*Suporte para o button para voltar ao topo*/

jQuery(function () {
  var $buttonTop = jQuery('.button-top');

  $buttonTop.on('click', function () {
    jQuery('html, body').animate({
      scrollTop: 0,
    }, 200);
  });
});