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
	
	$layout_fa = wp_script_is('imc-fa');
	$layout_fa2 = wp_script_is('imc-fa2');
	
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
				
	//if display option is set to mobile or all…
	if( $display == 'display_mobile' || $display == 'display_all' ) 
	{
		//grab the location field
		$location_repeater = get_field('mobile_location', 'option');
		  	
		//if a row (location) exists…
		if( !empty($location_repeater))
		{
		
			//add a toggle button
			echo "<div class='location-toggle $display'><i class='fas fa-mobile-alt'></i><i class='fas fa-times'></i></div>";
			
			//outer container
			echo "<div class='innexus-mobile $display'>";
			    
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
							if( $phonetoggle == 'phone_number_on' ) 
							{
								echo "<a href='tel:+1" . $phone_clean . "' class='location-phone'>";
									echo $phonei;
									echo "<p>Call</p>";
								echo "</a>";
							}
							
							//Controls visibility of Texting Number
							if( $texttoggle == 'text_number_on') 
							{
								echo "<a href='sms:" . $text_clean . "' class='location-text'>";
									echo $texti;
									echo "<p>Text</p>";
								echo "</a>";
							}
							
							//Controls visibility of Email
							if( $emailtoggle == 'email_on') 
							{
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