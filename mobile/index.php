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
	$layout_fa = wp_script_is('imc-fa');
	$layout_fa2 = wp_script_is('imc-fa2');
	
	//If the layout FA enqueues aren't present, add a CDN version of fontawesome for retroactive sites
	if($layout_fa == false and $layout_fa2 == false)
	{
		wp_enqueue_style( 'innexus-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), null );
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
				
	//if display option is set to mobile or all…
	if( $display == 'display_mobile' || $display == 'display_all' ) 
	{
		//grab the location field
		$location_repeater = get_field('mobile_location', 'option');
		  	
		//if a row (location) exists…
		if( !empty($location_repeater))
		{
		
			//add a toggle button
			echo "<div class='location-toggle $display $leftRight'><i class='fas fa-mobile-alt'></i><i class='fas fa-times'></i></div>";
			
			//outer container
			echo "<div class='innexus-mobile $display $leftRight'>";
			    
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