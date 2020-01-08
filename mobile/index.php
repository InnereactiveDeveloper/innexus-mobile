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
	
	//Check if we're on a new layout
	$layout_fa = wp_style_is('imc-fa');
	$layout_fa2 = wp_style_is('imc-fa2');
	
	//If the layout FA enqueues aren't present, add a CDN version of fontawesome for retroactive sites
	if($layout_fa != 1 and $layout_fa2 != 1)
	{
		wp_enqueue_style( 'innexus-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array('imc-style'), null );
	}
	
}

function XMOB_injection()
{
	//Useful References
	//https://codex.wordpress.org/Plugin_API/Action_Reference/wp_footer
	//https://www.advancedcustomfields.com/resources/get_field/
	
	//grab the on/off field
	$display = get_field('display_options', 'option');
	$leftRight = get_field('left_right', 'option');
	$version = get_field('mobile_version', 'option');
	$level = get_field('free_or_premium', 'option');
	$sync = get_field('sync_or_static', 'option');
	$homeData = get_field('main_page_elements', 'option');
				
	//if display option is set to mobile or all…
	if( $display == 'display_mobile' || $display == 'display_all' ) 
	{
		//grab the location fields
		$location_repeater = get_field('mobile_location', 'option');
		$appointment_request_link_repeater = get_field('appointment_request_link_repeater', 'option');
		  	
		//if the plugin display option is *not* set to Off…
		if($display != 'Off')
		{
		
			//add an open button
			echo "<div class='location-open $display $leftRight'><img src='http://staging.getinnexus.com/chrissandbox/wp-content/uploads/2020/01/chatbot_f.png' alt='chatbot icon'></div>";
			
			//card container
			echo "<div class='innexus-mobile $display $leftRight'>";
			  //add a close button
			  echo "<div class='location-close $display $leftRight'><i class='fas fa-times'></i></div>";
			  //add the image/icon
			  echo "<div class='location-chatbot $display $leftRight'><img src='http://staging.getinnexus.com/chrissandbox/wp-content/uploads/2020/01/chatbot_f.png' alt='chatbot icon'></div>";
			  
			  //display the first question and options
			  echo "<div class='chatbot-container $display $leftRight'>";
			    echo "<p class='chatbot-response'>What can I help you do today?</p>";
			    
			    //if showing appointment requests…
  			  if(in_array('request_appointment', $homeData)) {
    			  
    			  //show the appointment button
    			  echo "<a href='#' class='chatbot-button'>Request an Appointment</a>";
  			  }
  			  
  			  //if showing contact us…
  			  if(in_array('contact_us', $homeData)) {
    			  
    			  //show the contact us button
    			  echo "<a href='#' class='chatbot-button'>Contact Your Office</a>";
  			  }
  			  
  			  //if showing online patient forms…
  			  if(in_array('online_patient_forms', $homeData)) {
    			  
    			  //show the appointment button
    			  echo "<a href='#' class='chatbot-button'>Find Patient Forms</a>";
  			  }
  			  
  			  //if showing hours…
  			  if(in_array('hours', $homeData)) {
    			  
    			  //show the appointment button
    			  echo "<a href='#' class='chatbot-button'>View Your Hours</a>";
  			  }
  			  
  			  //if showing Location…
  			  if(in_array('practice_location', $homeData)) {
    			  
    			  //show the appointment button
    			  echo "<a href='#' class='chatbot-button'>Find Your Location</a>";
  			  }
  			  
  			  //if showing more options…
  			  if(in_array('more_options', $homeData)) {
    			  
    			  //show the appointment button
    			  echo "<a href='#' class='chatbot-button'>More Options</a>";
  			  }
			  echo "</div>";
			    
				//Loop through each location
/*
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
          $appt = $location['appt_req'];
          $appti = $location['appt_icon'];
          $phonetoggle = $location['toggle_phone_number'];
          $texttoggle = $location['toggle_text_number'];
          $emailtoggle = $location['toggle_email'];
          $appttoggle = $location['toggle_appt'];
          $count = 0;
          $classes = '';
          
          //check if phone toggle is on, count if it is
          if( $phonetoggle == 'phone_number_on' ) 
					{
            $count++;
					}
					
					//check if texting toggle is on, count if it is
					if( $texttoggle == 'text_number_on') 
					{
            $count++;
					}
					
					//check if email toggle is on, count if it is
					if( $emailtoggle == 'email_on') 
					{
            $count++;
					}
					
					//check if appt toggle is on, count if it is and apply classes based on count
					if($appttoggle == 'appt_on') 
					{
            $count++;
            
            if ( $count == 1 ) 
            {
    					$classes = 'appt_one';
  					}
  					
  					if ( $count == 2 ) 
  					{
    					$classes = 'appt_two';
  					}
  					
  					if ( $count == 3 ) 
  					{
    					$classes = 'appt_three';
  					}
  					
  					if ( $count == 4 ) 
  					{
    					$classes = 'appt_four';
  					}
					} 
					else
					//apply classes based on count
					{
  					if ( $count == 1 ) 
  					{
    					$classes = 'one';
  					}
  					
  					if ( $count == 2 ) 
  					{
    					$classes = 'two';
  					}
  					
  					if ( $count == 3 ) 
  					{
    					$classes = 'three';
  					}
					}
					
					//clean the numbers
					$phone_clean = preg_replace('~[-._#,]~', '', $phone);
					$text_clean = preg_replace('~[-._#,]~', '', $text);
					
					//inner containers and location name
					echo "<div class='location-container " . $classes . "'>";
						echo "<p class='location-name'><strong>" . $name . "</strong></p>";
						echo "<ul class='location-info'>";
							
							//Controls visibility of Phone Number
							if( $phonetoggle == 'phone_number_on' ) 
							{
								echo "<li class='location-phone'><a href='tel:+1" . $phone_clean . "'>";
									echo $phonei;
									echo "<p>Call</p>";
								echo "</a></li>";
							}
							
							//Controls visibility of Texting Number
							if( $texttoggle == 'text_number_on') 
							{
								echo "<li class='location-text'><a href='sms:" . $text_clean . "'>";
									echo $texti;
									echo "<p>Text</p>";
								echo "</a></li>";
							}
							
							//Controls visibility of Email
							if( $emailtoggle == 'email_on') 
							{
								echo "<li class='location-email'><a href='mailto:" . $email . "'>";
									echo $emaili;
									echo "<p>Email</p>";
								echo "</a></li>";
							}
							
							//Controls visibility of Appointment Request
							if( $appttoggle == 'appt_on') 
							{
								echo "<li class='location-appt'><a href='" . $appt . "'>";
									echo $appti;
									echo "<p>Appointments</p>";
								echo "</a></li>";
							}
						  
						echo "</ul>";
					echo "</div>";
				  
				}
*/    
			    
			echo "</div>";
		
		}
	}
}

//Run
if( function_exists('acf_add_options_page') )
{
	add_action('wp_enqueue_scripts', 'XMOB_scripts', 9999);
	add_action( 'wp_footer', 'XMOB_injection' );
}