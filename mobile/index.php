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

function innexus_link_compare($target)
{
  $url = site_url();
  $linkIcon = '<i class="fas fa-link"></i>';
  //pre(strpos($target, $url));
  
  if(strpos($target, $url) === false) 
  {
    $linkIcon = '<i class="fas fa-external-link-alt"></i>';
  }
  
  return $linkIcon;
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
	//$buttonColor = get_field('buttons_color', 'option');
	$homeData = get_field('main_page_elements', 'option');
	$items = count($homeData);
				
	//if display option is set to mobile or all…
	if( $display == 'display_mobile' || $display == 'display_all' ) 
	{
  	//and the basic version is selected
  	if($version == 'innexus_mobile') {
    	
    	//grab the location fields
    	$location_repeater = get_field('mobile_location', 'option');
    	
    	//Loop through each location
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
				echo "<div class='location-toggle $display $leftRight'><i class='fas fa-mobile-alt'></i><i class='fas fa-times'></i></div>";
				
				echo "<div class='innexus-mobile $display $leftRight'>";
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
  		$formsOverride = get_field('patient_forms_override', 'options');
  		
  		$globalLocationNumber = 0;
  		
  		//set the color classes
      ?>
      <style type="text/css">
      .button-background {
          background-color: <?php the_field('buttons_color', 'option'); ?>;
      }
      
      .button-background:hover {
          background-color: <?php the_field('buttons_hover-color', 'option'); ?>;
      }
      </style>
      <?php
  		
  		foreach($global_location_repeater as $global_location) {
    		$globalLocationNumber++;
  		}
  		  		  	
  		//if the plugin display option is *not* set to Off…
  		if($display != 'Off')
  		{
    		
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
        		$icon =  XMOB_URL . '/mobile/img/m1.png';
        		//otherwise, display the female icon.
      		} elseif ($randIconIndex == 'custom' || $randIconIndex == 'female1') {
        		$icon =  XMOB_URL . '/mobile/img/f1.png';
      		} elseif ($randIconIndex == 'female2') {
        		$icon =  XMOB_URL . '/mobile/img/f2.png';
      		} else {
        		$icon =  XMOB_URL . '/mobile/img/f2.png';
      		}
      		//or, if the female1 choise is used…
    		} elseif ($iconChoice == 'female1') {
      		//display the female1 icon.
        	$icon =  XMOB_URL . '/mobile/img/f1.png';
        	//or, if the female2 choice is used…
        } elseif ($iconChoice == 'female2') {
        	//display the female2 icon.
          $icon =  XMOB_URL . '/mobile/img/f2.png';
        	//or, if the male choise is used…
      	} elseif ($iconChoice == 'male') {
        	//display the male icon.
        	$icon =  XMOB_URL . '/mobile/img/m1.png';
        	//or, if the custom upload option is used…
      	} elseif ($iconChoice == 'upload') {
        	//display the custom icon.
        	$iconUpload = get_field('icon_upload', 'option');
        	$icon = $iconUpload['url'];
      	}
      	  		
  			//add an open button
  			echo "<div class='chatbot-open $display $leftRight bounce'><img src='$icon' alt='chatbot icon'></div>";
  			
  			//card container
  			
  			echo "<div class='innexus-chatbot $display $leftRight " .'locationCount'."$globalLocationNumber'>";
  			  //add a close button
  			  echo "<div class='chatbot-close $display $leftRight'><i class='fas fa-times'></i></div>";
  			  //add the image/icon
  			  echo "<div class='chatbot-icon $display $leftRight'><img src='$icon' alt='chatbot icon'></div>";
  			  
  			  //display the first question and options
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
    			    
    			    //if showing appointment requests…
      			  if(in_array('request_appointment', $homeData)) {
        			  
        			  //show the appointment button
        			  echo "<div class='chatbot-button request_appointment button-background'>$apptCopy</div>";
        			  //when clicked, show the request_appointment page
        			  echo "<div class='chatbot-page request_appointment'>";
        			    echo "<div class='chatbot-page-back request_appointment'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  $locationNumber = 0;
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  $buttonNumber = 0;
          			  
          			  //loop through each location
          			  foreach($location_repeater_chatbot as $location) {
            			  $name = $location['location_name_chatbot'];
          			    $apptLink = $location['appt_req_chatbot'];
          			    $linkIcon = innexus_link_compare($apptLink);
          			    $locationNumber++;
                    
                    //show the button for each location
                    if($locationNumber <= $globalLocationNumber && !empty($apptLink))
                    {
                      echo "<a href='$apptLink' class='chatbot-button button-background'>$name&nbsp;$linkIcon</a>";
                      $buttonNumber++;
                    }
                    
        			    }
        			    
        			    echo "</div>";
        			    
        			    if($buttonNumber > 5) {
          			    echo "<div class='chatbot-button moreOptions button-background'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing contact us…
      			  if(in_array('contact_us', $homeData)) {
        			  
        			  //show the contact us button
        			  echo "<div class='chatbot-button button-background multi_contact_us'>$contactCopy</div>";
        			  //when clicked, show the contact_us page
        			  echo "<div class='chatbot-page multi_contact_us'>";
        			    echo "<div class='chatbot-page-back multi_contact_us'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  //loop through each location
          			  $locationNumber = 0;
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  foreach($location_repeater_chatbot as $location) {
            			  $name = $location['location_name_chatbot'];
          			    $contactLink = $location['contact_us_chatbot'];
          			    $contactCopy = $location['contact_us_button_copy'];
          			    $apptLink = $location['appt_req_chatbot'];
          			    $apptCopy = $location['appointment_request_button_copy'];
          			    $locationNumber++;
          			    $linkIcon = innexus_link_compare($contactLink);
          			    
          			    if($sync == 'static') {
            			    $address = $location['location_address'];
              			  $phone = $location['location_phone'];
              			  $email = $location['location_email'];
              			  
              			  $phone_clean = preg_replace('~[-._#,]~', '', $phone);
          			    }
          			    
          			    //show the button for each location
          			    if($locationNumber <= $globalLocationNumber && !empty($name)) {
            			    echo "<div class='chatbot-button button-background contact_us' id='contact_us' data-location='location-".$locationNumber."'>$name</div>";
          			    }
          			    
                    //when clicked, show the contact_us for that location
                    echo "<div class='chatbot-page contact_us' data-location='location-".$locationNumber."'>";
            			    echo "<div class='chatbot-page-back contact_us'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
              			  echo "<p class='chatbot-response'>$name</p>";
              			  if($sync == 'static') {
                			  echo $address;
                			  echo "<br>";
                			  echo "<br>";
              			  } else {
                			  echo do_shortcode('[address location='.$locationNumber.']');
              			  }
              			  if($sync == 'static') {
                			  echo "<a href='tel:+1" . $phone_clean . "'><i class='fas fa-phone'></i>&nbsp;$phone</a>";
                			  echo "<br>";
              			  } else {
                			  echo do_shortcode('[phone location='.$locationNumber.']');
                      }
                      if($sync == 'static') {
                        echo "<a href='mailto:" . $email . "'><i class='fas fa-envelope'></i>&nbsp;$email</a>";
              			  } else {
                			  echo "<br>";
                        echo do_shortcode('[email location='.$locationNumber.']');
              			  }
              			  
              			  //show the contact us button
              			  //if showing appointment requests…
              			  $linkIcon = innexus_link_compare($apptLink);
                			  
              			  //show the appointment button
              			  $linkIcon = innexus_link_compare($contactLink);
              			  
              			  if(!empty($contactLink)) {
                			  echo "<a href='$contactLink' class='chatbot-button button-background'>$contactCopy&nbsp;$linkIcon</a>";
              			  } else {
                			  //do nothing
              			  }
              			  
              			  //if showing appointment requests…
              			  if(in_array('request_appointment', $homeData)) {
                			  
                			  $linkIcon = innexus_link_compare($apptLink);
                			  
                			  //show the appointment button
                			  if(!empty($apptLink)) {
                  			  echo "<a href='$apptLink' class='chatbot-button button-background two'>$apptCopy&nbsp;$linkIcon</a>";
                			  } else {
                  			  //do nothing
                			  }
              			  }
            			  echo "</div>";
        			    }
        			    
        			    echo "</div>";
        			    
        			    if($globalLocationNumber > 5) {
          			    echo "<div class='chatbot-button moreOptions button-background'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing hours…
      			  if(in_array('hours', $homeData)) {
        			  
        			  //show the multi_hours button
        			  echo "<div class='chatbot-button button-background multi_hours' id='hours'>$hoursCopy</div>";
        			  //when clicked, show the multi_hours page
        			  echo "<div class='chatbot-page multi_hours'>";
        			    echo "<div class='chatbot-page-back multi_hours'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Choose a Location</p>";
          			  
          			  //loop through each location
          			  $locationNumber = 0;
          			  
          			  echo "<div class='buttonsContainer'>";
          			  
          			  foreach($location_repeater_chatbot as $location) {
            			  $name = $location['location_name_chatbot'];
            			  $apptLink = $location['appt_req_chatbot'];
          			    $locationNumber++;
                    
                    //show the button for each location
                    if($locationNumber <= $globalLocationNumber && !empty($name)) {
                      echo "<div class='chatbot-button button-background hours' id='hours' data-location='location-".$locationNumber."'>$name</div>";
                    }
                    
                    //when clicked, show the hours for that location
                    echo "<div class='chatbot-page hours' data-location='location-".$locationNumber."'>";
            			    echo "<div class='chatbot-page-back hours'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
              			  echo "<p class='chatbot-response'>$name Hours</p>";
              			  echo do_shortcode('[hours location='.$locationNumber.']');
              			  
              			  //if showing appointment requests…
              			  $linkIcon = innexus_link_compare($apptLink);
                			                			                			  
              			  //if showing appointment requests…
              			  if(in_array('request_appointment', $homeData)) {
                			  
                			  $linkIcon = innexus_link_compare($apptLink);
                			  
                			  //show the appointment button
                        if(!empty($apptLink)) {
                  			  echo "<a href='$apptLink' class='chatbot-button button-background two'>$apptCopy&nbsp;$linkIcon</a>";
                			  } else {
                  			  //do nothing
                			  }
              			  }
            			  echo "</div>";
        			    }
        			    
        			    echo "</div>";
        			    
        			    if($globalLocationNumber > 5) {
          			    echo "<div class='chatbot-button moreOptions button-background'>More Options</div>";
        			    }
        			    
        			  echo "</div>";
      			  }
      			  
      			  //if showing online patient forms…
      			  if(in_array('online_patient_forms', $homeData)) {
        			  $formsCopy = $location['patient_forms_button_copy'];
        			  //$linkIcon = innexus_link_compare($formsLink);
        			  
        			  //show the multi_forms button
        			  echo "<div class='chatbot-button button-background online_patient_forms' id='online_patient_forms'>$formsCopy</div>";
        			  //echo "<a href='$formsLink' class='chatbot-button button-background'>$formsCopy&nbsp;$linkIcon</a>";
        			  //when clicked, show the multi_forms page
                echo "<div class='chatbot-page online_patient_forms'>";
                  echo "<div class='chatbot-page-back online_patient_forms'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
                  echo "<p class='chatbot-response'>Patient Forms</p>";
                  
                  echo "<div class='buttonsContainer'>";
                  
                  if($formsOverride == true) {
                		$forms = get_field('override_links', 'options');
                		$formsCount = 0;
                		
                		//show patient forms
            			  foreach($forms as $form) {
              			  $formLink = $form['override_link']['url'];
              			  $formCopy = $form['link_title'];          			  
              			  $linkIcon = innexus_link_compare($formLink);
              			  
              			  //show the patient form button
                      echo "<a href='$formLink' class='chatbot-button button-background'>$formCopy&nbsp;$linkIcon</a>";
                      $formsCount++;
                      
                      //if more than 5 forms exist…
              			  if($formsCount > 5) {
                			  //show the more options button
                			  echo "<div class='chatbot-button moreOptions button-background'>More Options</div>";
              			  }
            			  }
            			  //if pulling forms from site settings…
              		} elseif($formsOverride == false && !empty(get_field('upload_patient_forms', 'option'))) {
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
                      if($onlineFormLink != false) {
                        //check the url and add the button
                        $linkIcon = innexus_link_compare($onlineFormLink);
                        echo "<a href='$onlineFormLink' class='chatbot-button button-background'>$formCopy&nbsp;(Online)</a>";
                        $formsCount++;
                      }
              			  
              			  //if a pdf form link exists…
              			  if($formLink != false) {
                			  //check the url and add the button
                			  $linkIcon = innexus_link_compare($formLink);
                			  echo "<a href='$formLink' class='chatbot-button button-background'>$formCopy&nbsp;(PDF)</a>";
                			  $formsCount++;
              			  }
              			                			  
              			  //if more than 5 forms exist…
              			  if($formsCount > 5) {
                			  //show the more options button
                			  echo "<div class='chatbot-button moreOptions button-background'>More Options</div>";
              			  }
            			  }
              		} else {
	              		//@TODO
	              		//Output patient center link?
              		}
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
      			  //$formsLink = $location['patient_forms'];
      			  $formsCopy = $location['patient_forms_button_copy'];
      			  //$hours = $location['patient_forms_chatbot'];
      			  $hoursCopy = $location['office_hours_button_copy'];
    			    
    			    //if showing appointment requests…
      			  if(in_array('request_appointment', $homeData)) {
        			  $linkIcon = innexus_link_compare($apptLink);
        			  
        			  //show the appointment button
        			  echo "<a href='$apptLink' class='chatbot-button button-background'>$apptCopy&nbsp;$linkIcon</a>";
      			  }
      			  
      			  //if showing contact us…
      			  if(in_array('contact_us', $homeData)) {
        			  $linkIcon = innexus_link_compare($contactLink);
        			  
        			  //show the contact us button
        			  echo "<div class='chatbot-button button-background contact_us' id='contact_us'>$contactCopy</div>";
                //when clicked, show the contact_us for that location
                echo "<div class='chatbot-page contact_us'>";
        			    echo "<div class='chatbot-page-back contact_us'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>$name</p>";
          			  echo do_shortcode('[address]');
          			  echo do_shortcode('[phone]');
          			  echo '<br>';
          			  echo do_shortcode('[email]');
          			  
          			  //show the contact us button
          			  //if showing appointment requests…
          			  $linkIcon = innexus_link_compare($apptLink);
            			  
          			  //show the appointment button
          			  $linkIcon = innexus_link_compare($contactLink);
          			  
                  echo "<a href='$contactLink' class='chatbot-button button-background'>Contact Page&nbsp;$linkIcon</a>";
          			  
          			  //if showing appointment requests…
          			  if(in_array('request_appointment', $homeData)) {
            			  
            			  $linkIcon = innexus_link_compare($apptLink);
            			  
            			  //show the appointment button
                    echo "<a href='$apptLink' class='chatbot-button button-background two'>$apptCopy&nbsp;$linkIcon</a>";
          			  }
        			  echo "</div>";
      			  }
      			  
      			  //if showing hours…
      			  if(in_array('hours', $homeData)) {
        			  
        			  //show the appointment button
        			  echo "<div class='chatbot-button button-background hours' id='hours'>$hoursCopy</div>";
        			  echo "<div class='chatbot-page hours'>";
        			    echo "<div class='chatbot-page-back hours'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
          			  echo "<p class='chatbot-response'>Office Hours</p>";
          			  echo do_shortcode('[hours]');
          			  
          			  //if showing appointment requests…
          			  $linkIcon = innexus_link_compare($apptLink);
            			                			                			  
          			  //if showing appointment requests…
          			  if(in_array('request_appointment', $homeData)) {
            			  
            			  $linkIcon = innexus_link_compare($apptLink);
            			  
            			  //show the appointment button
                    echo "<a href='$apptLink' class='chatbot-button button-background'>$apptCopy&nbsp;$linkIcon</a>";
          			  }
        			  echo "</div>";
      			  }
      			  
      			  //if showing online patient forms…
      			  if(in_array('online_patient_forms', $homeData)) {
        			  $formsCopy = $location['patient_forms_button_copy'];
        			  //$linkIcon = innexus_link_compare($formsLink);
        			  
        			  //show the multi_forms button
        			  echo "<div class='chatbot-button button-background online_patient_forms' id='online_patient_forms'>$formsCopy</div>";
        			  //echo "<a href='$formsLink' class='chatbot-button button-background'>$formsCopy&nbsp;$linkIcon</a>";
        			  //when clicked, show the multi_forms page
                echo "<div class='chatbot-page online_patient_forms'>";
                  echo "<div class='chatbot-page-back online_patient_forms'><i class='fas fa-chevron-circle-left'></i>&nbsp;Back</div>";
                  echo "<p class='chatbot-response'>Patient Forms</p>";
                  
                  if($formsOverride == true) {
                		$forms = get_field('override_links', 'options');
                		
                		//show patient forms
            			  foreach($forms as $form) {
              			  $formLink = $form['override_link']['url'];
              			  $formCopy = $form['link_title'];          			  
              			  $linkIcon = innexus_link_compare($formLink);
              			  
              			  //show the patient form button
                      echo "<a href='$formLink' class='chatbot-button button-background'>$formCopy&nbsp;$linkIcon</a>";
            			  }
              		} else {
                		$forms = get_field('upload_patient_forms', 'option');
                		
                		//show patient forms
            			  foreach($forms as $form) {
              			  $formLink = $form['upload']['url'];
              			  $formCopy = $form['form_title'];          			  
              			  $linkIcon = innexus_link_compare($formLink);
              			  
              			  //show the patient form button
                      echo "<a href='$formLink' class='chatbot-button button-background'>$formCopy&nbsp;$linkIcon</a>";
            			  }
              		}
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