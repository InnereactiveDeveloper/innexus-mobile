//Innexus Mobile Scripts
jQuery(document).ready(function($)
{
  //if the chatbot plugin exists…
  if ( $('.innexus-chatbot').length ) {
    
    //when the open button is clicked…
    $('.chatbot-open').click(function() {
      
      //add the active class on the button and plugin container
      $('.innexus-chatbot').addClass('active');
      $('.chatbot-open').addClass('active');
      $('.chatbot-close').addClass('active');
    })
    
    //when the close button is clicked…
    $('.chatbot-close').click(function() {
      
      //remove the active class on the button and plugin container
      $('.innexus-chatbot').removeClass('active');
      $('.chatbot-open').removeClass('active');
      $('.chatbot-close').removeClass('active');
    })
  }
  
  //if the chatbot hours button exists…
  if ( $('.chatbot-button.hours').length ) {
    
    //when the hours button is clicked…
    $('.chatbot-button.hours').click(function() {
      
      //add the active class on the hours shortcode
      $('.chatbot-hours').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-hours-back').click(function() {
      
      //remove the active class on the hours shortcode
      $('.chatbot-hours').removeClass('active');
    })
  }
  
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
