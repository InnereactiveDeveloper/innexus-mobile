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
function XMOB_scripts() {  
	wp_enqueue_script( 'innexus-mobile-script', plugin_dir_url( __FILE__ ) . 'js/script.js' , array('jquery'), null, true );
	wp_enqueue_style( 'innexus-mobile-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), null );
	
	//Check if we're on a new layout
	$layout_fa = wp_style_is('imc-fa');
	$layout_fa2 = wp_style_is('imc-fa2');
	
	//If the layout FA enqueues aren't present, add a CDN version of fontawesome for retroactive sites
	if($layout_fa != 1 and $layout_fa2 != 1) {
		wp_enqueue_style( 'innexus-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', null );
	}
}

function innexus_link_compare($target) {
  $url = site_url();
  $linkIcon = '<i class="fas fa-link"></i>';
  
  if(strpos($target, $url) === false) {
    $linkIcon = '<i class="fas fa-external-link-alt"></i>';
  }
  return $linkIcon;
}

function innexus_link_compare_string($target) {
  $url = site_url();
  $internalExternal = 'Internal';
  
  if(strpos($target, $url) === false) {
    $internalExternal = 'External';
  }
  return $internalExternal;
}

function XMOB_injection()
{
	//Useful References
	//https://codex.wordpress.org/Plugin_API/Action_Reference/wp_footer
	//https://www.advancedcustomfields.com/resources/get_field/
	
	//grab basic settings
	$display = get_field('display_options', 'option');
	$leftRight = get_field('left_right', 'option');
	$version = get_field('mobile_version', 'option');
	$level = get_field('free_or_premium', 'option');
	$sync = get_field('sync_or_static', 'option');
	$homeData = get_field('main_page_elements', 'option');
				
	//if display option is set to mobile or all…
	if( $display == 'display_mobile' || $display == 'display_all' ) {
  	//and the legacy version is selected
  	if($version == 'innexus_mobile') {
    	
    	//grab the location fields
    	$location_repeater = get_field('mobile_location', 'option');
    	
    	//if a row (location) exists…
  		if( !empty($location_repeater)) {
  		
  			//add a toggle button
  			echo "<div class='location-toggle $display $leftRight'><i class='fas fa-mobile-alt'></i><i class='fas fa-times'></i></div>";
  			
  			//outer container
  			echo "<div class='innexus-mobile $display $leftRight'>";
    	
      	//Loop through each location
  			foreach($location_repeater as $location) {
  				//create variables
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
          if( $phonetoggle == 'phone_number_on' ) {
            $count++;
  				}
  				
  				//check if texting toggle is on, count if it is
  				if( $texttoggle == 'text_number_on') {
            $count++;
  				}
  				
  				//check if email toggle is on, count if it is
  				if( $emailtoggle == 'email_on') {
            $count++;
  				}
  				
  				//check if appt toggle is on, count if it is and apply classes based on count
  				if($appttoggle == 'appt_on') {
            $count++;
            
            if ( $count == 1 ) {
    					$classes = 'appt_one';
  					}
  					
  					if ( $count == 2 ) {
    					$classes = 'appt_two';
  					}
  					
  					if ( $count == 3 ) {
    					$classes = 'appt_three';
  					}
  					
  					if ( $count == 4 ) {
    					$classes = 'appt_four';
  					}
  				} else {
    				//apply classes based on count
  					if ( $count == 1 ) {
    					$classes = 'one';
  					}
  					
  					if ( $count == 2 ) {
    					$classes = 'two';
  					}
  					
  					if ( $count == 3 ) {
    					$classes = 'three';
  					}
  				}
  				
  				//clean the numbers
  				$phone_clean = preg_replace('~[-._#,]~', '', $phone);
  				$text_clean = preg_replace('~[-._#,]~', '', $text);
  				
  				echo "<div class='location-container " . $classes . "'>";
  					echo "<p class='location-name'><strong>" . $name . "</strong></p>";
  					echo "<ul class='location-info'>";
  						
  						//Controls visibility of Phone Number
  						if( $phonetoggle == 'phone_number_on' ) {
  							echo "<li class='location-phone'><a href='tel:+1" . $phone_clean . "'>";
  								echo $phonei;
  								echo "<p>Call</p>";
  							echo "</a></li>";
  						}
  						
  						//Controls visibility of Texting Number
  						if( $texttoggle == 'text_number_on') {
  							echo "<li class='location-text'><a href='sms:" . $text_clean . "'>";
  								echo $texti;
  								echo "<p>Text</p>";
  							echo "</a></li>";
  						}
  						
  						//Controls visibility of Email
  						if( $emailtoggle == 'email_on') {
  							echo "<li class='location-email'><a href='mailto:" . $email . "'>";
  								echo $emaili;
  								echo "<p>Email</p>";
  							echo "</a></li>";
  						}
  						
  						//Controls visibility of Appointment Request
  						if( $appttoggle == 'appt_on') {
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
  	
  	//but if the chatbot version is selected
  	if($version == 'innexus_chatbot') {
  	
  		//grab the location fields
  		$location_repeater_chatbot = get_field('mobile_location_chatbot', 'option');
  		$global_location_repeater = get_field('office_information', 'option');
  		$intro = get_field('intro', 'option');
  		$linkIcon = '';
  		$extLinkIcon = '<i class="fas fa-external-link-alt"></i>';
  		$locationCount = count($location_repeater_chatbot);
  		$globalLocationNumber = count($global_location_repeater);
  		$formsOverride = get_field('patient_forms_override', 'options');
  		
  		//set the color classes
      ?>
      <style type="text/css">
      div.innexus-chatbot .chatbot-container div.chatbot-button.chatbot-button-background,
      div.innexus-chatbot .chatbot-container a.chatbot-button.chatbot-button-background {
          background-color: <?php the_field('buttons_color', 'option'); ?>;
          color: <?php the_field('buttons_text_color', 'option'); ?>;
      }
      
      div.innexus-chatbot .chatbot-container div.chatbot-button.chatbot-button-background:hover,
      div.innexus-chatbot .chatbot-container a.chatbot-button.chatbot-button-background:hover {
          background-color: <?php the_field('buttons_hover-color', 'option'); ?>;
          color: <?php the_field('buttons_hover-text-color', 'option'); ?>;
      }
      </style>
      <?php
  		  		  	
  		//if the plugin display option is *not* set to Off…
  		if($display != 'Off') {
    		
    		//display the icon by…
    		//if the free version is being used…		
    		if ($level == 'free') {
      		//grab the icon choice and/or grab a random choice.
      		$iconChoice = get_field('chatbot_icon_free', 'option');
      		$iconArray = get_field_object('chatbot_icon_free', 'option');
      		$iconArray = $iconArray['choices'];
      		$randIconIndex = array_rand($iconArray);
      		//otherwise, if the premium version is being used…
    		} elseif ($level == 'premium') {
      		//grab the icon choice and/or grab a random choice.
      		$iconChoice = get_field('chatbot_icon_premium', 'option');
      		$iconArray = get_field_object('chatbot_icon_premium', 'option');
      		$iconArray = $iconArray['choices'];
      		$randIconIndex = array_rand($iconArray);
    		}
    		
    		//if the icon choice is random…
    		if ($iconChoice == 'random') {
      		//and the array lands on random or male…
      		if ($randIconIndex == 'random' || $randIconIndex == 'male') {
        		//display the male icon.
        		$icon = XMOB_URL . '/mobile/img/m1.png';
        		//otherwise, display the female icon.
      		} elseif ($randIconIndex == 'custom' || $randIconIndex == 'female1') {
        		$icon = XMOB_URL . '/mobile/img/f1.png';
      		} elseif ($randIconIndex == 'female2') {
        		$icon = XMOB_URL . '/mobile/img/f2.png';
      		} else {
        		$icon = XMOB_URL . '/mobile/img/f2.png';
      		}
      		//or, if the female1 choise is used…
    		} elseif ($iconChoice == 'female1') {
      		//display the female1 icon.
        	$icon = XMOB_URL . '/mobile/img/f1.png';
        	//or, if the female2 choice is used…
        } elseif ($iconChoice == 'female2') {
        	//display the female2 icon.
          $icon = XMOB_URL . '/mobile/img/f2.png';
        	//or, if the male choise is used…
      	} elseif ($iconChoice == 'male') {
        	//display the male icon.
        	$icon = XMOB_URL . '/mobile/img/m1.png';
        	//or, if the custom upload option is used…
      	} elseif ($iconChoice == 'upload') {
        	//display the custom icon.
        	$iconUpload = get_field('icon_upload', 'option');
        	$icon = $iconUpload['url'];
      	}
      	  		
  			//add an open button
  			echo "<div class='chatbot-open $display $leftRight bounce innexus-chatbot-tracky' data-chatbotContext='Open Chat Bot, $leftRight'><img src='$icon' class='innexus-chatbot-tracky'  data-chatbotContext='Open, $leftRight' alt='chatbot icon'></div>";
  			
  			//card container
  			echo "<div class='innexus-chatbot $display $leftRight " .'locationCount'."$globalLocationNumber'>";
  			  //add a close button
  			  echo "<div class='chatbot-close $display $leftRight innexus-chatbot-tracky' data-chatbotContext='Close Chat Bot'><i class='fas fa-times innexus-chatbot-tracky' data-chatbotContext='Close Chat Bot'></i></div>";
  			  //add the image/icon
  			  echo "<div class='chatbot-icon $display $leftRight'><img src='$icon' alt='chatbot icon'></div>";
  			  
  			  //display the intro message and options
  			  echo "<div class='chatbot-container $display $leftRight'>";
  			    echo "<p class='chatbot-response'>$intro</p>";
  			    
  			    //grab defaults
  			    foreach($location_repeater_chatbot as $location) {
    			    $apptCopy = $location['appointment_request_button_copy'];
      			  $contactCopy = $location['contact_us_button_copy'];
      			  $formsCopy = $location['patient_forms_button_copy'];
      			  $hoursCopy = $location['office_hours_button_copy'];
  			    }
  			    
  			    //if there is more than one location
  			    if ($locationCount > 1) {
    			    
    			    echo "<div class='main_buttons-container'>";
      			    //show the buttons
      			    if(in_array('request_appointment', $homeData)) {
        			    echo "<div class='chatbot-button innexus-chatbot-tracky request_appointment chatbot-button-background innexus-chatbot-tracky' data-chatbotContext='Main -> Multi Appointment'>$apptCopy</div>";
        			  }
        			  if(in_array('contact_us', $homeData)) {
          			  echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background multi_contact_us' data-chatbotContext='Main -> Multi Contact'>$contactCopy</div>";
        			  }
        			  if(in_array('hours', $homeData)) {
          			  echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background multi_hours' id='hours' data-chatbotContext='Main -> Multi Hours'>$hoursCopy</div>";
        			  }
        			  if(in_array('online_patient_forms', $homeData)) {
          			  //if forms link override is not checked and site settings forms don't exist
                  if(empty($formsOverride) && empty(get_field('upload_patient_forms', 'option'))) {
                    //do nothing
                  } else {
                    //otherwise show the multi_forms button
                    echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background online_patient_forms' id='online_patient_forms' data-chatbotContext='Main -> Patient Forms'>$formsCopy</div>";
                  }
        			  }
              echo "</div>";
    			    
    			    //if showing appointment requests…
      			  if(in_array('request_appointment', $homeData)) {
                
        			  //when clicked, show the request_appointment page
        			  echo "<div class='chatbot-page request_appointment'>";
        			    //add a back button
        			    echo "<div class='chatbot-page-back innexus-chatbot-tracky request_appointment' data-chatbotContext='Multi Appointment -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Multi Appointment -> Back -> Main'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  //set a location counter
          			  $locationNumber = 0;
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  //set a button counter
          			  $buttonNumber = 0;
          			  
          			  //loop through each location
          			  foreach($location_repeater_chatbot as $location) {
            			  $name = $location['location_name_chatbot'];
          			    $apptLink = $location['appt_req_chatbot'];
          			    $linkIcon = innexus_link_compare($apptLink);
          			    $internalExternal = innexus_link_compare_string($apptLink);
          			    $locationNumber++;
                    
                    //if on the new layouts
                    if($global_location_repeater) {
                      //and there are locations left
                      if($locationNumber <= $globalLocationNumber && !empty($apptLink)) {
                        //add the button
                        echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Multi Appointment -> $name Appointment Button $internalExternal'>$name&nbsp;$linkIcon</a>";
                        $buttonNumber++;
                      } elseif($sync === 'static' && !empty($apptLink)) {
                        echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Multi Appointment -> $name Appointment Button $internalExternal'>$name&nbsp;$linkIcon</a>";
                        $buttonNumber++;
                      }
                    } else {
                      if(!empty($apptLink)) {
                        //otherwise, add the button
                        echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Multi Appointment -> $name Appointment Button $internalExternal'>$name&nbsp;$linkIcon</a>";
                        $buttonNumber++;
                      }
                    }
        			    }
        			    
        			    echo "</div>";
        			    
        			    //if more than five buttons have been added
        			    if($buttonNumber > 5) {
          			    //add the more options button
          			    echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background' data-chatbotContext='Multi Appointment -> More Options/Previous Options'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing contact us…
      			  if(in_array('contact_us', $homeData)) {
        			  $buttonCount = 0;
        			  $locationNumber = 0;
        			  
        			  //when clicked, show the contact_us page
        			  echo "<div class='chatbot-page multi_contact_us'>";
        			    echo "<div class='chatbot-page-back innexus-chatbot-tracky multi_contact_us' data-chatbotContext='Multi Contact -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Multi Contact -> Back -> Main'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  //loop through each location
          			  foreach($location_repeater_chatbot as $location) {
            			  //grab necessary fields
            			  $name = $location['location_name_chatbot'];
          			    $contactLink = $location['contact_us_chatbot'];
          			    $contactCopy = $location['contact_us_button_copy'];
          			    $emailHide = $location['hide_email'];
          			    $emailCopy = $location['hide_email_text'];
          			    $apptLink = $location['appt_req_chatbot'];
          			    $apptCopy = $location['appointment_request_button_copy'];
          			    $locationNumber++;
          			    $linkIcon = innexus_link_compare($contactLink);
          			    $output = '';
          			    
          			    //grab additional fields when using static option
          			    if($sync == 'static') {
            			    $address = $location['location_address'];
              			  $phone = $location['location_phone'];
              			  $email = $location['location_email'];
              			  
              			  $phone_clean = preg_replace('~[-._#,]~', '', $phone);
          			    }
          			    
          			    $output .= "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background contact_us' id='contact_us' data-location='location-".$locationNumber."' data-chatbotContext='Multi Contact -> $name'>$name</div>";
          			    
          			    //when clicked, show the contact_us info for that location
                    $output .= "<div class='chatbot-page contact_us' data-location='location-".$locationNumber."'>";
            			    $output .= "<div class='chatbot-page-back innexus-chatbot-tracky contact_us' data-chatbotContext='$name Contact -> Back -> Multi Contact'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='$name Contact -> Back -> Multi Contact'></i>&nbsp;Back</div>";
              			  $output .= "<p class='chatbot-response'>$name</p>";
              			  if($sync == 'static') {
                			  if(!empty($address)) {
                  			  $output .= $address;
                  			  $output .= "<br>";
                          $output .= "<br>";
                			  }
              			  } elseif($locationNumber <= $globalLocationNumber && !empty($name)) {
                			  $output .= do_shortcode('[address location='.$locationNumber.']');
              			  }
              			  if($sync == 'static') {
                			  if(!empty($phone_clean)) {
                  			  $output .= "<a href='tel:+1" . $phone_clean . "'><i class='fas fa-phone'></i>&nbsp;$phone</a>";
                          $output .= "<br>";
                			  }
              			  } elseif($locationNumber <= $globalLocationNumber && !empty($name)) {
                			  $output .= do_shortcode('[phone location='.$locationNumber.']');
                      }
                      if($sync == 'static') {
                        if(!empty($email)) {
                          if($emailHide == 'noHide') {
                            $output .= "<a href='mailto:" . $email . "'><i class='fas fa-envelope'></i>&nbsp;$email</a>";
                          } elseif($emailHide == 'hide') {
                            $output .= "<a href='mailto:" . $email . "'><i class='fas fa-envelope'></i>&nbsp;$emailCopy</a>";
                          }
                        }
              			  } elseif($locationNumber <= $globalLocationNumber && !empty($name)) {
                			  $output .= "<br>";
                			  if($emailHide == 'noHide') {
                  			  $output .= do_shortcode('[email location='.$locationNumber.']');
                			  } elseif($emailHide == 'hide') {
                  			  $output .= do_shortcode('[email location='.$locationNumber.' hide="'.$emailCopy.'"]');
                			  }
              			  }
              			  
              			  //if showing contact us link
              			  if(!empty($contactLink)) {
                			  $linkIcon = innexus_link_compare($contactLink);
                			  //show the contact us button
                			  $output .= "<a href='$contactLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='$name Contact -> Contact Button'>$contactCopy&nbsp;$linkIcon</a>";
              			  }
              			  
              			  //if showing appointment requests…
              			  if(in_array('request_appointment', $homeData)) {
                			  $linkIcon = innexus_link_compare($apptLink);
                			  $internalExternal = innexus_link_compare_string($apptLink);
                			  //show the appointment button
                			  if(!empty($apptLink)) {
                  			  $output .= "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background two' data-chatbotContext='$name Contact -> Appointment Button $internalExternal'>$apptCopy&nbsp;$linkIcon</a>";
                			  }
              			  }
              			  $output .= "</div>";
          			    
          			    //if on the new layouts
                    if($global_location_repeater) {              			  
            			    if($locationNumber <= $globalLocationNumber && !empty($name)) {
                			  echo $output;
                			  $buttonCount++;
            			    } elseif($sync === 'static' && !empty($name)) {
                        echo $output;
                        $buttonCount++;
                      }
            			    //or if not on a new layout
                    } else {
                      if(!empty($name)) {
                        echo $output;
                        $buttonCount++;
                      }
                    }
        			    }
        			    
        			    echo "</div>";
        			    
        			    if($buttonCount > 5) {
          			    echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background' data-chatbotContext='Multi Contact -> More Options/Previous Options'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing hours…
      			  if(in_array('hours', $homeData)) {
        			  $buttonCount = 0;
        			  $locationNumber = 0;
        			  
        			  //when clicked, show the multi_hours page
        			  echo "<div class='chatbot-page multi_hours'>";
        			    echo "<div class='chatbot-page-back innexus-chatbot-tracky multi_hours' data-chatbotContext='Multi Hours -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Multi Hours -> Back -> Main'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  //loop through each location
          			  foreach($location_repeater_chatbot as $location) {
            			  $name = $location['location_name_chatbot'];
            			  $apptLink = $location['appt_req_chatbot'];
            			  $hours = $location['location_hours'];
          			    $monday = $hours['monday'];
          			    $tuesday = $hours['tuesday'];
          			    $wednesday = $hours['wednesday'];
          			    $thursday = $hours['thursday'];
          			    $friday = $hours['friday'];
          			    $saturday = $hours['saturday'];
          			    $sunday = $hours['sunday'];
          			    $additionalInfo = $hours['additional_info'];
          			    
          			    $locationNumber++;
          			    $output = '';
          			    
          			    //show the button for each location
          			    $output .= "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background hours' id='hours' data-chatbotContext='Multi Hours -> $name' data-location='location-".$locationNumber."'>$name</div>";
                    
                    //when clicked, show the hours for that location
                    $output .= "<div class='chatbot-page hours' data-location='location-".$locationNumber."'>";
            			    $output .= "<div class='chatbot-page-back innexus-chatbot-tracky hours' data-chatbotContext='$name Hours -> Back -> Multi Hours'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='$name -> Back -> Multi Hours'></i>&nbsp;Back</div>";
              			  $output .= "<p class='chatbot-response'>$name Hours</p>";
              			  
              			  if($sync == 'static') {
                			  $output .= "<div id='hours' class='hours snippet'>";
            			  
                  			  //Monday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Monday</li>";
                      			$output .= "<li class='hour'>". $monday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//tuesday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Tuesday</li>";
                      			$output .= "<li class='hour'>". $tuesday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//wednesday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Wednesday</li>";
                      			$output .= "<li class='hour'>". $wednesday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//thursday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Thursday</li>";
                      			$output .= "<li class='hour'>". $thursday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//Friday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Friday</li>";
                      			$output .= "<li class='hour'>". $friday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//Saturday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Saturday</li>";
                      			$output .= "<li class='hour'>". $saturday ."</li>";
                      		$output .= "</ul>";
                      		
                      		//Sunday
                      		$output .= "<ul class='day'>";
                      			$output .= "<li class='day'>Monday</li>";
                      			$output .= "<li class='hour'>". $sunday ."</li>";
                      		$output .= "</ul>";
                    		
                    		$output .= "</div>";
                    		
                    		//Additional Notes below wrapper
                      	if(!empty($additionalInfo))
                      	{
                      		$output .= "<div class='hours-additional-notes'>";
                      			$output .= $additionalInfo;	
                      		$output .= "</div>";	
                      	}
              			  } elseif($locationNumber <= $globalLocationNumber && !empty($name)) {
                			  $output .= do_shortcode('[hours location='.$locationNumber.']');
              			  }
                			                			                			  
              			  //if showing appointment requests…
              			  if(in_array('request_appointment', $homeData)) {
                			  $linkIcon = innexus_link_compare($apptLink);
                			  $internalExternal = innexus_link_compare_string($apptLink);
                			  //show the appointment button
                        if(!empty($apptLink)) {
                  			  $output .= "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background two' data-chatbotContext='$name Hours -> Appointment Button $internalExternal'>$apptCopy&nbsp;$linkIcon</a>";
                			  }
              			  }
              			  
            			  $output .= "</div>";
                    
                    //if on a new layout
                    if($global_location_repeater) {
                      //show the button for each location
                      if($locationNumber <= $globalLocationNumber && !empty($name)) {
                        echo $output;
                        $buttonCount++;
                      } elseif($sync === 'static' && !empty($name)) {
                        echo $output;
                        $buttonCount++;
                      }
                      //if not on a new layout
                    } else {
                      if(!empty($name)) {
                        echo $output;
                        $buttonCount++;
                      }
                    }
        			    }
        			    
        			    echo "</div>";
        			    
        			    if($buttonCount > 5) {
          			    echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background' data-chatbotContext='Multi Hours -> More Options/Previous Options'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing online patient forms…
      			  if(in_array('online_patient_forms', $homeData)) {
        			  $formsCopy = $location['patient_forms_button_copy'];        			  
        			  
        			  //when clicked, show the multi_forms page
                echo "<div class='chatbot-page online_patient_forms'>";
                  echo "<div class='chatbot-page-back innexus-chatbot-tracky online_patient_forms' data-chatbotContext='Patient Forms -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Patient Forms -> Back -> Main'></i>&nbsp;Back</div>";
                  echo "<p class='chatbot-response'>Patient Forms</p>";
                  
                  echo "<div class='buttonsContainer outer'>";
                    echo "<div class='buttonsContainer inner'>";
                  
                    //if forms link override is checked
                    if(!empty($formsOverride)) {
                      //use those fields
                  		$forms = get_field('override_links', 'options');
                  		$formsCount = 0;
                  		
                  		//show patient forms
              			  foreach($forms as $form) {
                			  if(!empty($form['override_link']['url'])) {
                          $formLink = $form['override_link']['url'];
                        } else {
                          $formLink = '';
                        }
                			  $formCopy = $form['link_title'];          			  
                			  $linkIcon = innexus_link_compare($formLink);
                			  
                			  //show the patient form button
                        if(!empty($formLink)) {
                          $formsCount++;
                          echo "<a href='$formLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Patient Forms -> $formCopy $formsCount'>$formCopy&nbsp;$linkIcon</a>";
                        }
                        
                        //if more than 5 forms exist…
                			  /*
if($formsCount > 5) {
                  			  //show the more options button
                  			  echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background' data-chatbotContext='Patient Forms -> More Options/Previous Options'>More Options</div>";
                			  }
*/
              			  }
              			  //if pulling forms from site settings…
                		} elseif(empty($formsOverride) && !empty(get_field('upload_patient_forms', 'option'))) {
                  		//grab the categories
                  		$categories = get_field('upload_patient_forms', 'option');
                  		$formsCount = 0;
                  		
                  		//create an empty array for all forms
                  		$formsAll = array();
                  		
                  		//in each category…
                  		foreach($categories as $category) {
                    		//add any forms to the array
                    		$formsAll[] = $category['forms'];
                  		}
                  		
                  		//merge the forms arrays into one
                  		$forms = call_user_func_array('array_merge', $formsAll);
                  		                		
                  		//show patient forms
                  		//for each form…
              			  foreach($forms as $form) {
                			  $formLink = $form['form_upload'];
                        $onlineFormLink = $form['online_form_link'];
                        $formCopy = $form['form_title'];
                        
                        //if an online form link exists…
                        if(!empty($onlineFormLink)) {
                          //check the url and add the button
                          $linkIcon = innexus_link_compare($onlineFormLink);
                          $internalExternal = innexus_link_compare_string($onlineFormLink);
                          $formsCount++;
                          echo "<a href='$onlineFormLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Patient Forms -> $formCopy $formsCount $internalExternal'>$formCopy&nbsp;(Online)</a>";
                        }
                			  
                			  //if a pdf form link exists…
                			  if(!empty($formLink)) {
                  			  //check the url and add the button
                  			  $linkIcon = innexus_link_compare($formLink);
                  			  $internalExternal = innexus_link_compare_string($formLink);
                  			  $formsCount++;
                  			  echo "<a href='$formLink' target='_blank' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Patient Forms -> $formCopy $formsCount $internalExternal'>$formCopy&nbsp;(PDF)</a>";
                			  }
                			                			  
                			  //if more than 5 forms exist…
                			  /*
if($formsCount > 5) {
                  			  //show the more options button
                  			  echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background' data-chatbotContext='Patient Forms -> More Options/Previous Options'>More Options</div>";
                			  }
*/
              			  }
                		}
                		echo "</div>";
                  echo "</div>";
                echo "</div>";
      			  }
  			    }
  			    
  			    //otherwise, if there is only one location…
  			    if ($locationCount == 1) {    			    
    			    $name = $location['location_name_chatbot'];
    			    $apptLink = $location['appt_req_chatbot'];
              $apptCopy = $location['appointment_request_button_copy'];
              $contactLink = $location['contact_us_chatbot'];
      			  $contactCopy = $location['contact_us_button_copy'];
      			  $emailHide = $location['hide_email'];
          		$emailCopy = $location['hide_email_text'];
      			  $formsCopy = $location['patient_forms_button_copy'];
      			  $hoursCopy = $location['office_hours_button_copy'];
      			  
      			  echo "<div class='main_buttons-container'>";
      			    //show the buttons
      			    //if showing appointment requests…
        			  if(in_array('request_appointment', $homeData)) {
          			  $linkIcon = innexus_link_compare($apptLink);
          			  $internalExternal = innexus_link_compare_string($apptLink);
          			  
          			  //show the appointment button
          			  echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background innexus-chatbot-tracky' data-chatbotContext='Main -> Appointment Button $internalExternal'>$apptCopy&nbsp;$linkIcon</a>";
        			  }
        			  if(in_array('contact_us', $homeData)) {
          			  echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background contact_us' id='contact_us' data-chatbotContext='Main -> Single Contact'>$contactCopy</div>";
        			  }
        			  if(in_array('hours', $homeData)) {
          			  echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background hours' id='hours' data-chatbotContext='Main -> Single Hours'>$hoursCopy</div>";
        			  }
        			  if(in_array('online_patient_forms', $homeData)) {
          			  //if forms link override is not checked and site settings forms don't exist
                  if(empty($formsOverride) && empty(get_field('upload_patient_forms', 'option'))) {
                    //do nothing
                  } else {
                    //otherwise show the multi_forms button
                    echo "<div class='chatbot-button innexus-chatbot-tracky chatbot-button-background online_patient_forms' id='online_patient_forms' data-chatbotContext='Main -> Single Patient Forms'>$formsCopy</div>";
                  }
        			  }
              echo "</div>";
      			  
      			  //if showing contact us…
      			  if(in_array('contact_us', $homeData)) {
        			  $linkIcon = innexus_link_compare($contactLink);
        			  
        			  //grab additional fields when using static option
      			    if($sync == 'static') {
        			    $address = $location['location_address'];
          			  $phone = $location['location_phone'];
          			  $email = $location['location_email'];
          			  
          			  $phone_clean = preg_replace('~[-._#,]~', '', $phone);
      			    }
        			  
                //when clicked, show the contact_us for that location
                echo "<div class='chatbot-page contact_us'>";
        			    echo "<div class='chatbot-page-back innexus-chatbot-tracky contact_us' data-chatbotContext='Single Contact -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Single Contact -> Back -> Main'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>$name</p>";
          			  if($sync == 'static') {
            			  if(!empty($address)) {
              			  echo $address;
              			  echo "<br>";
              			  echo "<br>";
            			  }
          			  } else {
            			  echo do_shortcode('[address]');
          			  }
          			  if($sync == 'static') {
            			  if(!empty($phone_clean)) {
              			  echo "<a href='tel:+1" . $phone_clean . "'><i class='fas fa-phone'></i>&nbsp;$phone</a>";
                      echo "<br>";
            			  }
          			  } else {
            			  echo do_shortcode('[phone]');
                  }
                  if($sync == 'static') {
                    if(!empty($email)) {
                      if($emailHide == 'noHide') {
                        echo "<a href='mailto:" . $email . "'><i class='fas fa-envelope'></i>&nbsp;$email</a>";
                      } elseif($emailHide == 'hide') {
                        echo "<a href='mailto:" . $email . "'><i class='fas fa-envelope'></i>&nbsp;$emailCopy</a>";
                      }
                    }
          			  } else {
            			  echo "<br>";
            			  if($emailHide == 'noHide') {
              			  echo do_shortcode('[email]');
            			  } elseif($emailHide == 'hide') {
              			  echo do_shortcode('[email hide="'.$emailCopy.'"]');
            			  }
          			  }
          			  
          			  //show the contact us button            			  
          			  $linkIcon = innexus_link_compare($contactLink);
                  echo "<a href='$contactLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Single Contact Page -> Contact Button'>Contact Page&nbsp;$linkIcon</a>";
          			  
          			  //if showing appointment requests…
          			  if(in_array('request_appointment', $homeData)) {
            			  $linkIcon = innexus_link_compare($apptLink);
            			  $internalExternal = innexus_link_compare_string($apptLink);
            			  //show the appointment button
                    echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background two' data-chatbotContext='Single Contact Page -> Appointment Button $internalExternal'>$apptCopy&nbsp;$linkIcon</a>";
          			  }
        			  echo "</div>";
      			  }
      			  
      			  //if showing hours…
      			  if(in_array('hours', $homeData)) {
        			  $hours = $location['location_hours'];
      			    $monday = $hours['monday'];
      			    $tuesday = $hours['tuesday'];
      			    $wednesday = $hours['wednesday'];
      			    $thursday = $hours['thursday'];
      			    $friday = $hours['friday'];
      			    $saturday = $hours['saturday'];
      			    $sunday = $hours['sunday'];
      			    $additionalInfo = $hours['additional_info'];
        			  
        			  echo "<div class='chatbot-page hours'>";
        			    echo "<div class='chatbot-page-back innexus-chatbot-tracky hours' data-chatbotContext='Single Hours -> Back -> Main'><i class='fas innexus-chatbot-tracky fa-chevron-circle-left' data-chatbotContext='Single Hours -> Back -> Main'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Office Hours</p>";
          			  
          			  if($sync == 'static') {
            			  echo "<div id='hours' class='hours snippet'>";
            			  
            			  //Monday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Monday</li>";
                			echo "<li class='hour'>". $monday ."</li>";
                		echo "</ul>";
                		
                		//tuesday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Tuesday</li>";
                			echo "<li class='hour'>". $tuesday ."</li>";
                		echo "</ul>";
                		
                		//wednesday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Wednesday</li>";
                			echo "<li class='hour'>". $wednesday ."</li>";
                		echo "</ul>";
                		
                		//thursday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Thursday</li>";
                			echo "<li class='hour'>". $thursday ."</li>";
                		echo "</ul>";
                		
                		//Friday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Friday</li>";
                			echo "<li class='hour'>". $friday ."</li>";
                		echo "</ul>";
                		
                		//Saturday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Saturday</li>";
                			echo "<li class='hour'>". $saturday ."</li>";
                		echo "</ul>";
                		
                		//Sunday
                		echo "<ul class='day'>";
                			echo "<li class='day'>Monday</li>";
                			echo "<li class='hour'>". $sunday ."</li>";
                		echo "</ul>";
                		
                		echo "</div>";
                		
                		//Additional Notes below wrapper
                  	if(!empty($additionalInfo))
                  	{
                  		echo "<div class='hours-additional-notes'>";
                  			echo $additionalInfo;	
                  		echo "</div>";	
                  	}
          			  } else {
            			  echo do_shortcode('[hours]');
          			  }
          			  
          			  //if showing appointment requests…
          			  $linkIcon = innexus_link_compare($apptLink);
            			                			                			  
          			  //if showing appointment requests…
          			  if(in_array('request_appointment', $homeData)) {
            			  
            			  $linkIcon = innexus_link_compare($apptLink);
            			  $internalExternal = innexus_link_compare_string($apptLink);
            			  
            			  //show the appointment button
                    echo "<a href='$apptLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Single Hours -> Appointment Button $internalExternal'>$apptCopy&nbsp;$linkIcon</a>";
          			  }
        			  echo "</div>";
      			  }
      			  
      			  //if showing online patient forms…
      			  if(in_array('online_patient_forms', $homeData)) {
        			  $formsCopy = $location['patient_forms_button_copy'];
        			  $formsCount = 0;

        			  //when clicked, show the multi_forms page
                echo "<div class='chatbot-page online_patient_forms'>";
                  echo "<div class='chatbot-page-back innexus-chatbot-tracky online_patient_forms' data-chatbotContext='Single Patient Forms -> Back -> Main'><i class='fas fa-chevron-circle-left innexus-chatbot-tracky' data-chatbotContext='Single Patient Forms -> Back -> Main'></i>&nbsp;Back</div>";
                  echo "<p class='chatbot-response'>Patient Forms</p>";
                  
                  echo "<div class='buttonsContainer outer'>";
                    echo "<div class='buttonsContainer inner'>";
                  
                    if(!empty($formsOverride)) {
                  		$forms = get_field('override_links', 'options');
                  		
                  		//show patient forms
              			  foreach($forms as $form) {
                			  if(!empty($form['override_link']['url'])) {
                          $formLink = $form['override_link']['url'];
                        } else {
                          $formLink = '';
                        }
                			  $formCopy = $form['link_title'];          			  
                			  $linkIcon = innexus_link_compare($formLink);
                			  $internalExternal = innexus_link_compare_string($formLink);
                			  
                			  if(!empty($formLink)) {
                  			  //show the patient form button
                  			  $formsCount++;
                          echo "<a href='$formLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Single Patient Forms -> Form $internalExternal'>$formCopy&nbsp;$linkIcon</a>";
                			  }
              			  }
                		} elseif(empty($formsOverride) && !empty(get_field('upload_patient_forms', 'option'))) {
                  		//grab the categories
                  		$categories = get_field('upload_patient_forms', 'option');
                  		$formsCount = 0;
                  		
                  		//create an empty array for all forms
                  		$formsAll = array();
                  		
                  		//in each category…
                  		foreach($categories as $category) {
                    		//add any forms to the array
                    		$formsAll[] = $category['forms'];
                  		}
                  		
                  		//merge the forms arrays into one
                  		$forms = call_user_func_array('array_merge', $formsAll);
                  		                		
                  		//show patient forms
                  		//for each form…
              			  foreach($forms as $form) {
                			  $formLink = $form['form_upload'];
                        $onlineFormLink = $form['online_form_link'];
                        $formCopy = $form['form_title'];
                        
                        //if an online form link exists…
                        if(!empty($onlineFormLink)) {
                          //check the url and add the button
                          $linkIcon = innexus_link_compare($onlineFormLink);
                          $internalExternal = innexus_link_compare_string($onlineFormLink);
                          $formsCount++;
                          echo "<a href='$onlineFormLink' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Single Patient Forms -> $formCopy $formsCount $internalExternal'>$formCopy&nbsp;(Online)</a>";
                        }
                			  
                			  //if a pdf form link exists…
                			  if(!empty($formLink)) {
                  			  //check the url and add the button
                  			  $linkIcon = innexus_link_compare($formLink);
                  			  $internalExternal = innexus_link_compare_string($formLink);
                  			  $formsCount++;
                  			  echo "<a href='$formLink' target='_blank' class='chatbot-button innexus-chatbot-tracky chatbot-button-background' data-chatbotContext='Single Patient Forms -> $formCopy $formsCount $internalExternal'>$formCopy&nbsp;(PDF)</a>";
                			  }
              			  }
                		}
                  echo "</div>";
              		
              		//if more than 5 forms exist…
          			  /*
if($formsCount > 5) {
            			  //show the more options button
            			  echo "<div class='chatbot-button innexus-chatbot-tracky moreOptions chatbot-button-background'>More Options</div>";
          			  }
*/
              		echo "</div>";
                echo "</div>";
      			  }
  			    }
  			    
  			  echo "</div>";			    
  			echo "</div>";
  		
  		}
    }
	}
}

//Run
if( function_exists('acf_add_options_page') )
{
	add_action('wp_enqueue_scripts', 'XMOB_scripts', 9999);
	add_action( 'wp_footer', 'XMOB_injection' );
}