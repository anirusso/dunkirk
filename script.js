$(document).ready(function() {
  $(".navbar a, footer a[href='#page'], a[href='#contact']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function() {

        window.location.hash = hash;
      });
    }
  });

  $(window).scroll(function() {
    $(".slideanim").each(function() {
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("slide");
      }
    });
  });
});

//close hamburger nav on click
$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
