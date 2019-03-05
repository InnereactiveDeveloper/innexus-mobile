<?php
/**
 * Innexus Module - Mobile
 *
 * Innexus Mobile Assets
 *
 * @since   1.0.0
 * @package XMOB
 */

//Enqueue scripts and styles.
function XMOB_scripts() 
{  
  wp_enqueue_script( 'innexus-mobile-script', plugin_dir_url( __FILE__ ) . 'js/script.js' , array('jquery'), null, true );
	wp_enqueue_style( 'innexus-mobile-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), null );
}

function XMOB_injection()
{
	//Useful References
	//https://codex.wordpress.org/Plugin_API/Action_Reference/wp_footer
	//https://www.advancedcustomfields.com/resources/get_field/
	
	//grab the on/off field
	$toggle = get_field('enabledisable', 'option');
			
  //if the plugin is toggled on and device is mobile…
	if( $toggle == 'toggle_on' && (wp_is_mobile() )) {
  	  	
    //if a row (location) exists…
  	if( have_rows('mobile_location')) {
    
      //grab the location field
      $location_repeater = get_field('mobile_location', 'option');
      
      //add a toggle button
      echo "<div class='location-toggle'><i class='fas fa-mobile-alt'></i><i class='fas fa-times'></i></div>";
      
      //outer container
      echo "<div class='innexus-mobile'>";
            
        //Loop thorough each location
        foreach($location_repeater as $location)
        {
          //variables
          $name = $location['location_name'];
          $phone = $location['phone_number'];
          $phonei = $location['phone_icon'];
          $text = $location['text_number'];
          $texti = $location['text_icon'];
          $email = $location['email_address'];
          $emaili = $location['email_icon'];
          $phonetoggle = $location['toggle_phone_number'];
          $texttoggle = $location['toggle_text_number'];
          $emailtoggle = $location['toggle_email'];
          
          //clean the numbers
          $phone_clean = preg_replace('~[-._#,]~', '', $phone);
          $text_clean = preg_replace('~[-._#,]~', '', $text);
          
          //inner containers and location name
          echo "<div class='location-container'>";
            echo "<p class='location-name'><strong>" . $name . "</strong></p>";
            echo "<ul class='location-info'>";
            	
            	//Controls visibility of Phone Number
              if( $phonetoggle == 'phone_number_on' ) {
                echo "<a href='tel:+1" . $phone_clean . "' class='location-phone'>";
                  echo $phonei;
                  echo "<p>Call</p>";
                echo "</a>";
              }
              
              //Controls visibility of Texting Number
              if( $texttoggle == 'text_number_on') {
                echo "<a href='sms:" . $text_clean . "' class='location-text'>";
                  echo $texti;
                  echo "<p>Text</p>";
                echo "</a>";
              }
              
              //Controls visibility of Email
              if( $emailtoggle == 'email_on') {
                echo "<a href='mailto:" . $email . "' class='location-email'>";
                  echo $emaili;
                  echo "<p>Email</p>";
                echo "</a>";
              }
              
            echo "</ul>";
          echo "</div>";
          
        }    
            
      echo "</div>";
  
  	}
	}
}

//run
if( function_exists('acf_add_options_page') )
{
  add_action('wp_enqueue_scripts', 'XMOB_scripts');
  add_action( 'wp_footer', 'XMOB_injection' );
}