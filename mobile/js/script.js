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
      $('.chatbot-page.hours').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.hours').click(function() {
      
      //remove the active class on the hours shortcode
      $('.chatbot-page.hours').removeClass('active');
    })
  }
  
  //if the chatbot request_appointment button exists…
  if ( $('.chatbot-button.request_appointment').length ) {
    
    //when the request_appointment button is clicked…
    $('.chatbot-button.request_appointment').click(function() {
      
      //add the active class on the request_appointment container
      $('.chatbot-page.request_appointment').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.request_appointment').click(function() {
      
      //remove the active class on the request_appointment container
      $('.chatbot-page.request_appointment').removeClass('active');
    })
  }
  
  //if the chatbot contact_us button exists…
  if ( $('.chatbot-button.contact_us').length ) {
    
    //when the contact_us button is clicked…
    $('.chatbot-button.contact_us').click(function() {
      
      //add the active class on the contact_us container
      $('.chatbot-page.contact_us').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.contact_us').click(function() {
      
      //remove the active class on the contact_us container
      $('.chatbot-page.contact_us').removeClass('active');
    })
  }
  
  //if the chatbot online_patient_forms button exists…
  if ( $('.chatbot-button.online_patient_forms').length ) {
    
    //when the online_patient_forms button is clicked…
    $('.chatbot-button.online_patient_forms').click(function() {
      
      //add the active class on the online_patient_forms container
      $('.chatbot-page.online_patient_forms').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.online_patient_forms').click(function() {
      
      //remove the active class on the online_patient_forms container
      $('.chatbot-page.online_patient_forms').removeClass('active');
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
