
  jQuery(document).ready(function() {

    jQuery(function() {
      jQuery('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
          var target = jQuery(this.hash);
          target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            jQuery('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });


    var navpos = jQuery('#watch').offset();
      jQuery(window).bind('scroll', function() {
        if (jQuery(window).scrollTop() > navpos.top) {
          jQuery('#logo').addClass('enlarge');
         }
         else {
          jQuery('#logo').removeClass('enlarge');
         }
      });














  });
