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
      $('.chatbot-open').removeClass('bounce');
      $('.chatbot-close').addClass('active');
    })
    
    //when the close button is clicked…
    $('.chatbot-close').click(function() {
      
      //remove the active class on the button and plugin container
      $('.innexus-chatbot').removeClass('active');
      $('.chatbot-open').removeClass('active');
      $('.chatbot-close').removeClass('active');
      $('.chatbot-container').removeClass('grow');
      $('.chatbot-page.contact_us').removeClass('active');
      $('.chatbot-page.multi_contact_us').removeClass('active');
      $('.chatbot-page.request_appointment').removeClass('active');
      $('.chatbot-page.hours').removeClass('active');
      $('.chatbot-page.multi_hours').removeClass('active');
      $('.chatbot-page.online_patient_forms').removeClass('active');
    })
  }
  
  //if the chatbot hours button exists…
  if ( $('.chatbot-button.hours').length ) {
    
    //when the hours button is clicked…
    $('.chatbot-button.hours').click(function() {
      
      if($('.chatbot-page.hours').length > 1)
      {
        var location_target = $(this).data('location');
        
        //add the active class on the hours shortcode
        $('.chatbot-page.hours[data-location="'+location_target+'"]').addClass('active');
        $('.chatbot-container').addClass('grow');
      }
      else
      {
        //add the active class on the hours shortcode
        $('.chatbot-page.hours').addClass('active');
        $('.chatbot-container').addClass('grow');
      }
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.hours').click(function() {
      
      //remove the active class on the hours shortcode
      $('.chatbot-page.hours').removeClass('active');
      $('.chatbot-container').removeClass('grow');
    })
  }
  
  //if the chatbot multi_hours button exists…
  if ( $('.chatbot-button.multi_hours').length ) {
    
    //when the multi_hours button is clicked…
    $('.chatbot-button.multi_hours').click(function() {
      
      //add the active class on the multi_hours container
      $('.chatbot-page.multi_hours').addClass('active');
    });
    
    //when the back button is clicked…
    $('.chatbot-page-back.multi_hours').click(function() {
      
      //remove the active class on the multi_hours container
      $('.chatbot-page.multi_hours').removeClass('active');
    });
    
    if($('.chatbot-page.multi_hours .chatbot-button.moreOptions').length) {
      $('.chatbot-page.multi_hours .chatbot-button.moreOptions').click(function() {
        $('.chatbot-page.multi_hours .buttonsContainer').toggleClass('showMore');
      })
      
      $('.chatbot-page.multi_hours .chatbot-button.moreOptions').toggle(function() {
        $(this).text('Previous Options');
      }, function() {
        $(this).text('More Options');
      })
    }
  }
  
  //if the chatbot multi_contact_us button exists…
  if ( $('.chatbot-button.multi_contact_us').length ) {
    
    //when the multi_contact_us button is clicked…
    $('.chatbot-button.multi_contact_us').click(function() {
      
      //add the active class on the multi_contact_us container
      $('.chatbot-page.multi_contact_us').addClass('active');
    });
    
    //when the back button is clicked…
    $('.chatbot-page-back.multi_contact_us').click(function() {
      
      //remove the active class on the multi_contact_us container
      $('.chatbot-page.multi_contact_us').removeClass('active');
    });
    
    if($('.chatbot-page.multi_contact_us .chatbot-button.moreOptions').length) {
      $('.chatbot-page.multi_contact_us .chatbot-button.moreOptions').click(function() {
        $('.chatbot-page.multi_contact_us .buttonsContainer').toggleClass('showMore');
      })
      
      $('.chatbot-page.multi_contact_us .chatbot-button.moreOptions').toggle(function() {
        $(this).text('Previous Options');
      }, function() {
        $(this).text('More Options');
      })
    }
  }
  
  //if the chatbot contact_us button exists…
  if ( $('.chatbot-button.contact_us').length ) {
    
    //when the contact_us button is clicked…
    $('.chatbot-button.contact_us').click(function() {
      
      if($('.chatbot-page.contact_us').length > 1)
      {
        var location_target = $(this).data('location');
        
        //add the active class on the hours shortcode
        $('.chatbot-page.contact_us[data-location="'+location_target+'"]').addClass('active');
        $('.chatbot-container').addClass('grow');
      } else {
        //add the active class on the contact_us container
        $('.chatbot-page.contact_us').addClass('active');
        $('.chatbot-container').addClass('grow');
      }
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.contact_us').click(function() {
      
      //remove the active class on the contact_us container
      $('.chatbot-page.contact_us').removeClass('active');
      $('.chatbot-container').removeClass('grow');
    })
  }
  
  //if the chatbot request_appointment button exists…
  if ( $('.chatbot-button.request_appointment').length ) {
    
    //when the request_appointment button is clicked…
    $('.chatbot-button.request_appointment').click(function() {
      
      //add the active class on the request_appointment container
      $('.chatbot-page.request_appointment').addClass('active');
    })
    
    if($('.chatbot-page.request_appointment .chatbot-button.moreOptions').length) {
      $('.chatbot-page.request_appointment .chatbot-button.moreOptions').click(function() {
        $('.chatbot-page.request_appointment .buttonsContainer').toggleClass('showMore');
      })
      
      $('.chatbot-page.request_appointment .chatbot-button.moreOptions').toggle(function() {
        $(this).text('Previous Options');
      }, function() {
        $(this).text('More Options');
      })
    }
    
    //when the back button is clicked…
    $('.chatbot-page-back.request_appointment').click(function() {
      
      //remove the active class on the request_appointment container
      $('.chatbot-page.request_appointment').removeClass('active');
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
    
    if($('.chatbot-page.online_patient_forms .chatbot-button.moreOptions').length) {
      $('.chatbot-page.online_patient_forms .chatbot-button.moreOptions').click(function() {
        $('.chatbot-page.online_patient_forms .buttonsContainer').toggleClass('showMore');
      })
      
      $('.chatbot-page.online_patient_forms .chatbot-button.moreOptions').toggle(function() {
        $(this).text('Previous Options');
      }, function() {
        $(this).text('More Options');
      })
    }
  }
  
  //if the chatbot location button exists… REMOVE?
  /*
if ( $('.chatbot-button.location').length ) {
    
    //when the location button is clicked…
    $('.chatbot-button.location').click(function() {
      
      //add the active class on the location container
      $('.chatbot-page.location').addClass('active');
    })
    
    //when the back button is clicked…
    $('.chatbot-page-back.location').click(function() {
      
      //remove the active class on the location container
      $('.chatbot-page.location').removeClass('active');
    })
  }
*/
  
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
