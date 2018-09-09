jQuery(window).scroll(function() {
    // checks if window is scrolled more than 500px, adds/removes solid class
    if(jQuery(this).scrollTop() > 100) { 
        jQuery('.navbar').addClass('solid');
    } else {
        jQuery('.navbar').removeClass('solid');
    }
  });

jQuery( document ).ready(function() {
    jQuery( ".contact-message" ).click(function() {

        var el = jQuery(this).parent();
        var elOffset = el.offset().top;
        var elHeight = el.height();
        var windowHeight = jQuery(window).height();
        var offset;
      
        if (elHeight < windowHeight) {
          offset = elOffset - ((windowHeight / 2) - (elHeight / 2));
        }
        else {
          offset = elOffset;
        }
        var speed = 700;
        jQuery('html, body').animate({scrollTop:offset}, speed);

        jQuery(this).next().slideToggle( "slow", function() {
            // Animation complete.
          });
      });

      jQuery(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        center: true,
        items: 1,
        height: 423
    });
});