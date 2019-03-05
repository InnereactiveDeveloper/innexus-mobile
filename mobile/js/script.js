//Innexus Mobile Scripts
jQuery(document).ready(function($)
{
  
  if ( $('.innexus-mobile').length ) {
    $('.location-toggle').click(function() {
      $('.innexus-mobile').toggleClass('active');
      $('.location-toggle').toggleClass('active');
    })
  }
  
  if ( $('.innexus-mobile').outerHeight() >= 420 ) {
    $('.innexus-mobile').addClass('shadow');
  }

});
