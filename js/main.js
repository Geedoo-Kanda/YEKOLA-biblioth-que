!(function ($) {
  AOS.init({
    easing: ' ease-in-out-quart'
  });
  //gere le click sur le bouton click 
  $('.retour-btn').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  //je passe une condition pour afficher le header si le scroll est superieur a 100
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
        $('.retour-btn').fadeIn();
    } else {                      
        $('.retour-btn').fadeOut();
    }
});
})(jQuery);

