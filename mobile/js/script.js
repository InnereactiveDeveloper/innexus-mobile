//Innexus Mobile Scripts
jQuery(document).ready(function($)
{
  
  if ( $('.innexus-mobile').length ) {
    $('.location-toggle').click(function() {
      $('.innexus-mobile').toggleClass('active');
    })
  }

});
