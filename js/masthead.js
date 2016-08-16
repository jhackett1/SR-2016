jQuery(document).ready(function() {

// Search

    jQuery(".search-button").click(function(){
      jQuery("#overlay").addClass("on");
      jQuery("#search-modal").addClass("on");
    });

// Menu

    jQuery("#burger").click(function(){
      jQuery("#overlay").addClass("on");
      jQuery("#menu-panel").addClass("on");
    });

    jQuery("#overlay").click(function(){
      jQuery("#menu-panel").removeClass("on");
      jQuery("#overlay").removeClass("on");
      jQuery("#search-modal").removeClass("on");
    });

    jQuery(".fa-times").click(function(){
      jQuery("#menu-panel").removeClass("on");
      jQuery("#overlay").removeClass("on");
      jQuery("#search-modal").removeClass("on");
    });




  });
