/*Script para fazer scroll suave*/

window.scroll({
    top: 2500, 
    left: 0, 
    behavior: 'smooth'
  });
  
  window.scrollBy({ 
    top: 100, // pode ser negativo
    bottom: 100,
    left: 0, 
    behavior: 'smooth' 
  });
  
  
  document.querySelector('.hello').scrollIntoView({ 
    behavior: 'smooth' 
  });

  function currentYPosition() {
    // Firefox, Chrome, Opera, Safari, outros browsers chromium
    if (self.pageYOffset) return self.pageYOffset;
    // IE 6
    if (document.documentElement && document.documentElement.scrollTop)
        return document.documentElement.scrollTop;
    // IE 6/7/8
    if (document.body.scrollTop) return document.body.scrollTop;
    return 0;
}


function elmYPosition(eID) {
    var elm = document.getElementById(eID);
    var y = elm.offsetTop;
    var node = elm;
    while (node.offsetParent && node.offsetParent != document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    } return y;
}


function smoothScroll(eID) {
    var startY = currentYPosition();
    var stopY = elmYPosition(eID);
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    if (distance < 100) {
        scrollTo(0, stopY); return;
    }
    var speed = Math.round(distance / 100);
    if (speed >= 20) speed = 20;
    var step = Math.round(distance / 25);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    if (stopY > startY) {
        for ( var i=startY; i<stopY; i+=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; if (leapY > stopY) leapY = stopY; timer++;
        } return;
    }
    for ( var i=startY; i>stopY; i-=step ) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
    }
}