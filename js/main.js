jQuery(document).ready(function ($){
  // welcome rotating texts
  $("#welcome .rotating").Morphext({
    animation: "flipInX",
    separator: ",",
    speed: 3000
  });

  // Back to top button
$(window).scroll(function () {

  if ($(this).scrollTop() > 100) {
    $('.back-to-top').fadeIn('slow');
  } else {
    $('.back-to-top').fadeOut('slow');
  }

});

$('.back-to-top').click(function () {
  $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
  return false;
});
})