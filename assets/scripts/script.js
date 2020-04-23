$(document).ready(function(){
  $(".button-collapse").sideNav();
  $(".dropdown-button1").dropdown({ hover: false });
  $(".dropdown-button2").dropdown({ hover: true });
  $('.slider').slider();
  $('.parallax').parallax();
  //for navbar

  $(document).scroll(function () {
        var y = $(this).scrollTop();
        var x = $("#container").position();
        if (y > x.top) {
            $('nav').fadeIn().css({"position":"fixed","top":"0","opacity":"1","z-index":"999999"});
        } else {
            $('nav').css({"position" : "fixed","opacity":"0.6","z-index":"9999"});
        }
  });


  $('.nav-item-dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

  $('.side-menu-nav-item-dropdown-button').dropdown({
      inDuration: 100,
      outDuration: 100,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter:0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );


});
