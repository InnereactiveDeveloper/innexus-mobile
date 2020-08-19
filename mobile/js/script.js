//Innexus Mobile Scripts
jQuery(document).ready(function($)
{  
  //if the chatbot plugin exists…
  if ( $('.innexus-chatbot').length ) {
    
    //class functions
    //function to add active class
    function addActive(a) {
      $(a).addClass('active');
    }
    
    //function to remove active class
    function removeActive(a) {
      $(a).removeClass('active');
    }
    
    //function to add grow class
    function addGrow(a) {
      $(a).addClass('grow');
    }
    
    //function to remove grow class
    function removeGrow(a) {
      $(a).removeClass('grow');
    }
    
    //function to add bounce class
    function addBounce(a) {
      $(a).addClass('bounce');
    }
    
    //function to remove bounce class
    function removeBounce(a) {
      $(a).removeClass('bounce');
    }
    
    /* OPEN CLOSE START */
    //when the open button is clicked…
    $('.chatbot-open').click(function() {
      
      //add the active class on the button and plugin container
      addActive('.innexus-chatbot, .chatbot-open, .chatbot-close');
      
      //remove the bounce effect
      removeBounce('.chatbot-open');
    })
    
    //when the close button is clicked…
    $('.chatbot-close').click(function() {
      
      //close the chatbot
      removeActive('.innexus-chatbot, .chatbot-open, .chatbot-close');
      
      //reset all pages - comment out next two lines if not desired
      removeActive('.chatbot-page.contact_us, .chatbot-page.multi_contact_us, .chatbot-page.request_appointment, .chatbot-page.hours, .chatbot-page.multi_hours, .chatbot-page.online_patient_forms');
      removeGrow('.chatbot-container');
    })
    /* OPEN CLOSE END */
    
    /* HOURS START */
    //when the hours button is clicked…
    $('.chatbot-button.hours').click(function() {
      
      if($('.chatbot-page.hours').length > 1)
      {
        var location_target = $(this).data('location');
        
        //add the active class on the hours shortcode
        addActive('.chatbot-page.hours[data-location="'+location_target+'"]');
        addGrow('.chatbot-container');
      }
      else
      {
        //add the active class on the hours shortcode
        addActive('.chatbot-page.hours');
        addGrow('.chatbot-container');
      }
    })
    
    //when the hours back button is clicked…
    $('.chatbot-page-back.hours').click(function() {
      
      //remove the active class on the hours shortcode
      removeActive('.chatbot-page.hours');
      removeGrow('.chatbot-container');
    })
    
    //when the multi_hours button is clicked…
    $('.chatbot-button.multi_hours').click(function() {
      
      //add the active class on the multi_hours container
      addActive('.chatbot-page.multi_hours');
    });
    
    //when the multi_hours back button is clicked…
    $('.chatbot-page-back.multi_hours').click(function() {
      
      //remove the active class on the multi_hours container
      removeActive('.chatbot-page.multi_hours');
    });
    
    //if the multi_hours more options button is present
    if($('.chatbot-page.multi_hours .chatbot-button.moreOptions').length) {
      //and it is clicked
      $('.chatbot-page.multi_hours .chatbot-button.moreOptions').click(function() {
        //toggle the showMore class
        $('.chatbot-page.multi_hours .buttonsContainer').toggleClass('showMore');
        
        //when toggled, change the text of the button
        if($(this).text() == 'More Options') {
          $(this).text('Previous Options');
        } else {
          $(this).text('More Options');
        }
      })
    }
    /* HOURS END */
    
    /* CONTACT START */
    //when the contact_us button is clicked…
    $('.chatbot-button.contact_us').click(function() {
      
      if($('.chatbot-page.contact_us').length > 1)
      {
        var location_target = $(this).data('location');
        
        //add the active class on the hours shortcode
        addActive('.chatbot-page.contact_us[data-location="'+location_target+'"]');
        addGrow('.chatbot-container');
      } else {
        //add the active class on the contact_us container
        addActive('.chatbot-page.contact_us');
        addGrow('.chatbot-container');
      }
    })
    
    //when the contact_us back button is clicked…
    $('.chatbot-page-back.contact_us').click(function() {
      
      //remove the active class on the contact_us container
      removeActive('.chatbot-page.contact_us');
      removeGrow('.chatbot-container');
    })
    
    //when the multi_contact_us button is clicked…
    $('.chatbot-button.multi_contact_us').click(function() {
      
      //add the active class on the multi_contact_us container
      addActive('.chatbot-page.multi_contact_us');
    });
    
    //when the multi_contact_us back button is clicked…
    $('.chatbot-page-back.multi_contact_us').click(function() {
      
      //remove the active class on the multi_contact_us container
      removeActive('.chatbot-page.multi_contact_us');
    });
    
    //if the multi_contact_us more options button is present
    if($('.chatbot-page.multi_contact_us .chatbot-button.moreOptions').length) {
      //and it is clicked
      $('.chatbot-page.multi_contact_us .chatbot-button.moreOptions').click(function() {
        //toggle the showMore class
        $('.chatbot-page.multi_contact_us .buttonsContainer').toggleClass('showMore');
        
        //when toggled, change the text of the button
        if($(this).text() == 'More Options') {
          $(this).text('Previous Options');
        } else {
          $(this).text('More Options');
        }
      })
    }
    /* CONTACT END */
    
    /* APPOINTMENTS START */
    //when the request_appointment button is clicked…
    $('.chatbot-button.request_appointment').click(function() {
      
      //add the active class on the request_appointment container
      addActive('.chatbot-page.request_appointment');
    })
    
    //if the request_appointment more options button is present
    if($('.chatbot-page.request_appointment .chatbot-button.moreOptions').length) {
      //and it is clicked
      $('.chatbot-page.request_appointment .chatbot-button.moreOptions').click(function() {
        //toggle the showMore class
        $('.chatbot-page.request_appointment .buttonsContainer').toggleClass('showMore');
        
        //when toggled, change the text of the button
        if($(this).text() == 'More Options') {
          $(this).text('Previous Options');
        } else {
          $(this).text('More Options');
        }
      })
    }
    
    //when the request_appointment back button is clicked…
    $('.chatbot-page-back.request_appointment').click(function() {
      
      //remove the active class on the request_appointment container
      removeActive('.chatbot-page.request_appointment');
    })
    /* APPOINTMENTS END */
    
    /* PATIENT FORMS START */
    //when the online_patient_forms button is clicked…
    $('.chatbot-button.online_patient_forms').click(function() {
      
      //add the active class on the online_patient_forms container
      addActive('.chatbot-page.online_patient_forms');
    })
    
    //when the online_patient_forms back button is clicked…
    $('.chatbot-page-back.online_patient_forms').click(function() {
      
      //remove the active class on the online_patient_forms container
      removeActive('.chatbot-page.online_patient_forms');
    })
    
    //if the inner container is taller than 220px…
    if($('.chatbot-page.online_patient_forms .buttonsContainer.inner').length) {
      $height = $('.chatbot-page.online_patient_forms .buttonsContainer.inner').outerHeight();
      
      if($height > 220) {
        //add the scroll class and text
        $('.chatbot-page.online_patient_forms .chatbot-response').addClass('scroll');
        $('.chatbot-page.online_patient_forms .buttonsContainer.outer').addClass('scroll');
        $('.chatbot-page.online_patient_forms .buttonsContainer.inner').addClass('scroll');
        $('.chatbot-page.online_patient_forms .chatbot-response').append('<br><sub>Scroll for More</sub>');
      }
    }
    
    //if the online_patient_forms more options button is present
    if($('.chatbot-page.online_patient_forms .chatbot-button.moreOptions').length) {
      //and is clicked
      $('.chatbot-page.online_patient_forms .chatbot-button.moreOptions').click(function() {
        //toggle the showMore class
        $('.chatbot-page.online_patient_forms .buttonsContainer').toggleClass('showMore');
        
        //when toggled, change the text of the button
        if($(this).text() == 'More Options') {
          $(this).text('Previous Options');
        } else {
          $(this).text('More Options');
        }
      })
    }
    
    
    /* PATIENT FORMS END */
  }
  
  /* FOR LEGACY MOBILE VERSION */    
  //if the mobile plugin exists…
  if ( $('.innexus-mobile').length ) {
    
    //when the toggle button is click…
    $('.location-toggle').click(function() {
      
      //toggle the active class on the button and plugin container
      $('.innexus-mobile').toggleClass('active');
      $('.location-toggle').toggleClass('active');
    })
    
    //if the height of the container is equal to or greater than 420px…
    if ( $('.innexus-mobile').outerHeight() >= 420 ) {
      
      //add the shadow class to the container
      $('.innexus-mobile').addClass('shadow');
    }
  }
});
