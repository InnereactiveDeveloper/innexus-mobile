//Innexus Mobile Scripts
jQuery(document).ready(function($)
{
  //if the mobile plugin exists…
  if ( $('.innexus-mobile').length ) {
    
    //when the toggle button is click…
    $('.location-toggle').click(function() {
      
      //toggle the active class on the button and plugin container
      $('.innexus-mobile').toggleClass('active');
      $('.location-toggle').toggleClass('active');
    })
  }
  
  //if the height of the container is equal to or greater than 420px…
  if ( $('.innexus-mobile').outerHeight() >= 420 ) {
    
    //add the shadow class to the container
    $('.innexus-mobile').addClass('shadow');
  }
});
