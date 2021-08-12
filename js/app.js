$(document).ready(function(){


$('.service_slider').slick({
  centerMode: true,
  centerPadding: '60px',
  prevArrow:".prev-btn",
  nextArrow:".next-btn",
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        prevArrow: false,
        nextArrow:false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
		

});