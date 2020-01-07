//Innexus Mobile Scripts
jQuery(document).ready(function($)
{
  //if the mobile plugin exists…
  if ( $('.innexus-mobile').length ) {
    
    //when the open button is clicked…
    $('.location-open').click(function() {
      
      //add the active class on the button and plugin container
      $('.innexus-mobile').addClass('active');
      $('.location-open').addClass('active');
      $('.location-close').addClass('active');
    })
    
    //when the close button is clicked…
    $('.location-close').click(function() {
      
      //add the active class on the button and plugin container
      $('.innexus-mobile').removeClass('active');
      $('.location-open').removeClass('active');
      $('.location-close').removeClass('active');
    })
  }
  
  //if the height of the container is equal to or greater than 420px…
/*
  if ( $('.innexus-mobile').outerHeight() >= 420 ) {
    
    //add the shadow class to the container
    $('.innexus-mobile').addClass('shadow');
  }
*/
});
