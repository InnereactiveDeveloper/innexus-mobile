<?php
/**
 * Innexus Module - Mobile
 *
 * Innexus Mobile Fields and Settings
 *
 * @since   1.0.0
 * @package XMOB
 */

//Options Page
if( function_exists('acf_add_options_page') )
{
    
    //Add Option Page for ACF use
    $option_page1 = acf_add_options_page(array(
        'page_title'     => 'Innexus Mobile',
        'menu_title'     => 'Innexus Mobile',
        'menu_slug'     => 'innexus-mobile',
        'icon_url' 		=> 'dashicons-smartphone',
        'capability'     => 'edit_posts',
        'redirect'     => false
    ));
}

//Plugin Fields
if( function_exists('acf_add_local_field_group') ):

$iconm1 = XMOB_URL . '/mobile/img/m1.png';
$iconf1 = XMOB_URL . '/mobile/img/f1.png';
$iconf2 = XMOB_URL . '/mobile/img/f2.png';
$iconRandom = XMOB_URL . '/mobile/img/random.png';

acf_add_local_field_group(array(
	'key' => 'group_5c6d9982b2c6a',
	'title' => 'Innexus Mobile',
	'fields' => array(
		array(
			'key' => 'field_5ef3aa3b8643d',
			'label' => 'Basic Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5c6da14070634',
			'label' => 'Display Options',
			'name' => 'display_options',
			'type' => 'button_group',
			'instructions' => 'Choose which screen sizes to show on.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'display_off' => 'Off',
				'display_mobile' => 'Mobile',
				'display_all' => 'All Screens',
			),
			'allow_null' => 0,
			'default_value' => 'Off',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5c6da14900675',
			'label' => 'Display on Left/Right of Screen',
			'name' => 'left_right',
			'type' => 'button_group',
			'instructions' => 'Displays on left or right of screen.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_mobile',
					),
				),
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_all',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'place_left' => 'Left',
				'place_right' => 'Right',
			),
			'allow_null' => 0,
			'default_value' => 'Right',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e160546f8fde',
			'label' => 'Version',
			'name' => 'mobile_version',
			'type' => 'button_group',
			'instructions' => 'Choose between the legacy Innexus Mobile or Innexus Chat Bot versions.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_mobile',
					),
				),
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_all',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'innexus_mobile' => 'Innexus Mobile',
				'innexus_chatbot' => 'Innexus Chatbot',
			),
			'allow_null' => 0,
			'default_value' => 'innexus_mobile',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e16056cf8fdf',
			'label' => 'Free or Premium?',
			'name' => 'free_or_premium',
			'type' => 'button_group',
			'instructions' => 'Choose between Free or Premium features.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'free' => 'Free',
				'premium' => 'Premium',
			),
			'allow_null' => 0,
			'default_value' => 'free',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e16067a39ba6',
			'label' => 'Sync or Static',
			'name' => 'sync_or_static',
			'type' => 'button_group',
			'instructions' => 'Sync office information from Innexus Site Settings page or input all info manually via Static. <strong>Static is required for old layouts.</strong>',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'sync' => 'Sync',
				'static' => 'Static',
			),
			'allow_null' => 0,
			'default_value' => 'static',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e1605abf8fe0',
			'label' => 'Main Page Elements',
			'name' => 'main_page_elements',
			'type' => 'checkbox',
			'instructions' => 'Choose which options to show within the chat bot.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'request_appointment' => 'Request Appointment',
				'contact_us' => 'Contact Us',
				'hours' => 'Hours',
				'online_patient_forms' => 'Online Patient Forms',
			),
			'allow_custom' => 0,
			'default_value' => array(
				0 => 'request_appointment',
				1 => 'contact_us',
				2 => 'hours',
				3 => 'online_patient_forms',
			),
			'layout' => 'vertical',
			'toggle' => 1,
			'return_format' => 'value',
			'save_custom' => 0,
		),
		array(
			'key' => 'field_5ef3ab577872c',
			'label' => 'Visual Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e62b92773e94',
			'label' => 'Buttons Color',
			'name' => 'buttons_color',
			'type' => 'color_picker',
			'instructions' => 'Choose the background color for the buttons.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#666666',
		),
		array(
			'key' => 'field_5ef3aef788db2',
			'label' => 'Buttons Text Color',
			'name' => 'buttons_text_color',
			'type' => 'color_picker',
			'instructions' => 'Choose the text color for the buttons.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#f8f8f8',
		),
		array(
			'key' => 'field_5e7b6279c6eae',
			'label' => 'Buttons Hover Color',
			'name' => 'buttons_hover-color',
			'type' => 'color_picker',
			'instructions' => 'Choose the background color of buttons when hovered.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#555555',
		),
		array(
			'key' => 'field_5ef3af1788db3',
			'label' => 'Buttons Hover Text Color',
			'name' => 'buttons_hover-text-color',
			'type' => 'color_picker',
			'instructions' => 'Choose the background color of buttons text when hovered.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#f8f8f8',
		),
		array(
			'key' => 'field_5e62772a63f5e',
			'label' => 'Icon',
			'name' => 'chatbot_icon_free',
			'type' => 'button_group',
			'instructions' => 'Select an icon, or choose to randomly show one of the default icons.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
					array(
						'field' => 'field_5e16056cf8fdf',
						'operator' => '==',
						'value' => 'free',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'random' => '<img src="'.$iconRandom.'" style="width: 72px;height: auto;" />',
				'female1' => '<img src="'.$iconf1.'" style="width: 72px;height: auto;" />',
				'female2' => '<img src="'.$iconf2.'" style="width: 72px;height: auto;" />',
				'male' => '<img src="'.$iconm1.'" style="width: 72px;height: auto;" />',
			),
			'allow_null' => 0,
			'default_value' => 'random',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e9f3b1001f0d',
			'label' => 'Premium Icon',
			'name' => 'chatbot_icon_premium',
			'type' => 'button_group',
			'instructions' => 'Select an icon, choose to randomly show one of the default icons, or upload a custom icon.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
					array(
						'field' => 'field_5e16056cf8fdf',
						'operator' => '==',
						'value' => 'premium',
					),
				),
			),
			'wrapper' => array(
				'width' => '75',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'random' => '<img src="'.$iconRandom.'" style="width: 72px;height: auto;" />',
				'female1' => '<img src="'.$iconf1.'" style="width: 72px;height: auto;" />',
				'female2' => '<img src="'.$iconf2.'" style="width: 72px;height: auto;" />',
				'male' => '<img src="'.$iconm1.'" style="width: 72px;height: auto;" />',
				'upload' => '<span style="position:relative;top:21px;">Custom Icon<br>Upload</span>',
			),
			'allow_null' => 0,
			'default_value' => 'random',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_5e6279b701418',
			'label' => 'Icon Upload',
			'name' => 'icon_upload',
			'type' => 'image',
			'instructions' => 'Please upload your icon. A square crop is required, and the image must be no larger than 512 x 512px.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e16056cf8fdf',
						'operator' => '==',
						'value' => 'premium',
					),
					array(
						'field' => 'field_5e9f3b1001f0d',
						'operator' => '!=empty',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => 512,
			'max_height' => 512,
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5ef3ab847872d',
			'label' => 'Patient Forms',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
					array(
						'field' => 'field_5e1605abf8fe0',
						'operator' => '==',
						'value' => 'online_patient_forms',
					),
				),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e6260c54ba6c',
			'label' => 'Patient Forms Override',
			'name' => 'patient_forms_override',
			'type' => 'checkbox',
			'instructions' => 'If you are using an external link, rather than PDF forms, or you are on an old site/layout, use this.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e1605abf8fe0',
						'operator' => '==',
						'value' => 'online_patient_forms',
					),
				),
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'true' => 'Link Override',
			),
			'allow_custom' => 0,
			'default_value' => array(
				0 => 'true',
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
			'save_custom' => 0,
		),
		array(
			'key' => 'field_5e6261754ba6e',
			'label' => 'Override Links',
			'name' => 'override_links',
			'type' => 'repeater',
			'instructions' => 'Place your patient forms links here.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e6260c54ba6c',
						'operator' => '==',
						'value' => 'true',
					),
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5e6261454ba6d',
					'label' => 'Override Link',
					'name' => 'override_link',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
				array(
					'key' => 'field_5e6261c44ba70',
					'label' => 'Link Title',
					'name' => 'link_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '66',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Patient Forms',
					'placeholder' => 'Patient Forms',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5ef3ab9a7872e',
			'label' => 'Office Information & Copy',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '!=',
						'value' => 'display_off',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e557d3feaae5',
			'label' => 'Intro',
			'name' => 'intro',
			'type' => 'text',
			'instructions' => 'Set chat bot welcome message here.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'How can we help you today?',
			'placeholder' => 'How can we help you today?',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f3ede28d09fb',
			'label' => 'Scroll Text',
			'name' => 'pf_scroll_text',
			'type' => 'text',
			'instructions' => 'Controls the copy that shows when scrolling is needed. A character limit is set to ensure consistent styling.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
					array(
						'field' => 'field_5e1605abf8fe0',
						'operator' => '==',
						'value' => 'online_patient_forms',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Scroll for more options.',
			'placeholder' => 'Scroll for more options.',
			'prepend' => '',
			'append' => '',
			'maxlength' => 30,
		),
		array(
			'key' => 'field_5ef3ad4a2d81c',
			'label' => 'On new layouts, ensure number and order of locations matches those found within Site Settings.',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'message' => '<strong>For best output on all layouts, filling in each field is recommended.</strong>',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5c6da57d665fd',
			'label' => 'Location',
			'name' => 'mobile_location',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_mobile',
					),
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_mobile',
					),
				),
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_all',
					),
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_mobile',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5c6da6e087a10',
			'min' => 1,
			'max' => 0,
			'layout' => 'row',
			'button_label' => 'Add Location',
			'sub_fields' => array(
				array(
					'key' => 'field_5c6da6e087a10',
					'label' => 'Location Name',
					'name' => 'location_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Location Name',
					'prepend' => '',
					'append' => '',
					'maxlength' => 50,
				),
				array(
					'key' => 'field_5c6da89808522',
					'label' => 'Enable/Disable Phone Number',
					'name' => 'toggle_phone_number',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'phone_number_off' => 'Off',
						'phone_number_on' => 'On',
					),
					'allow_null' => 0,
					'default_value' => 'Off',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5c6da8f308523',
					'label' => 'Enable/Disable Text Number',
					'name' => 'toggle_text_number',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'text_number_off' => 'Off',
						'text_number_on' => 'On',
					),
					'allow_null' => 0,
					'default_value' => 'Off',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5c6da91808524',
					'label' => 'Enable/Disable Email',
					'name' => 'toggle_email',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'email_off' => 'Off',
						'email_on' => 'On',
					),
					'allow_null' => 0,
					'default_value' => 'Off',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5cc9e61d5b0d9',
					'label' => 'Enable/Disable Appointment Link',
					'name' => 'toggle_appt',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'appt_off' => 'Off',
						'appt_on' => 'On',
					),
					'allow_null' => 0,
					'default_value' => 'Off',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5c6da70887a11',
					'label' => 'Phone Number',
					'name' => 'phone_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da89808522',
								'operator' => '==',
								'value' => 'phone_number_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '#',
					'prepend' => '',
					'append' => '',
					'maxlength' => 15,
				),
				array(
					'key' => 'field_5c6da78787a12',
					'label' => 'Phone Icon',
					'name' => 'phone_icon',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da89808522',
								'operator' => '==',
								'value' => 'phone_number_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '<i class="fas fa-phone"></i>',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5c6da7d387a13',
					'label' => 'Text Number',
					'name' => 'text_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da8f308523',
								'operator' => '==',
								'value' => 'text_number_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '#',
					'prepend' => '',
					'append' => '',
					'maxlength' => 15,
				),
				array(
					'key' => 'field_5c6da7ed87a14',
					'label' => 'Text Icon',
					'name' => 'text_icon',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da8f308523',
								'operator' => '==',
								'value' => 'text_number_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '<i class="fas fa-sms"></i>',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5c6da81087a15',
					'label' => 'Email Address',
					'name' => 'email_address',
					'type' => 'email',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da91808524',
								'operator' => '==',
								'value' => 'email_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'example@email.com',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_5c6da83387a16',
					'label' => 'Email Icon',
					'name' => 'email_icon',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da91808524',
								'operator' => '==',
								'value' => 'email_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '<i class="fas fa-envelope"></i>',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5cc9e6785b0db',
					'label' => 'Appointment Request',
					'name' => 'appt_req',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5cc9e61d5b0d9',
								'operator' => '==',
								'value' => 'appt_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
				),
				array(
					'key' => 'field_5cc9e6b75b0dc',
					'label' => 'Appointment Icon',
					'name' => 'appt_icon',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5cc9e61d5b0d9',
								'operator' => '==',
								'value' => 'appt_on',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '<i class="fas fa-calendar"></i>',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5e557f6b33b39',
			'label' => 'Location Chatbot',
			'name' => 'mobile_location_chatbot',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_mobile',
					),
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
				array(
					array(
						'field' => 'field_5c6da14070634',
						'operator' => '==',
						'value' => 'display_all',
					),
					array(
						'field' => 'field_5e160546f8fde',
						'operator' => '==',
						'value' => 'innexus_chatbot',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e557f6b33b3a',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Location',
			'sub_fields' => array(
				array(
					'key' => 'field_5e557f6b33b3a',
					'label' => 'Location Name',
					'name' => 'location_name_chatbot',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Our Office',
					'placeholder' => 'Location Name',
					'prepend' => '',
					'append' => '',
					'maxlength' => 50,
				),
				array(
					'key' => 'field_5eab341139b8b',
					'label' => 'Location Address',
					'name' => 'location_address',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
							array(
								'field' => 'field_5e16067a39ba6',
								'operator' => '==',
								'value' => 'static',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '1111 Sunset Dr.<br>Suite 1<br>Sunset, MI 55555',
					'maxlength' => '',
					'rows' => 6,
					'new_lines' => '',
				),
				array(
					'key' => 'field_5e557f6b33b45',
					'label' => 'Appointment Request Link',
					'name' => 'appt_req_chatbot',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'request_appointment',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
				),
				array(
					'key' => 'field_5e5582d96c373',
					'label' => 'Appointment Request Button Copy',
					'name' => 'appointment_request_button_copy',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'request_appointment',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Request an Appointment',
					'placeholder' => 'Request an Appointment',
					'prepend' => '',
					'append' => '',
					'maxlength' => 25,
				),
				array(
					'key' => 'field_5eab347b39b8d',
					'label' => 'Location Phone',
					'name' => 'location_phone',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
							array(
								'field' => 'field_5e16067a39ba6',
								'operator' => '==',
								'value' => 'static',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '888-888-8888',
					'prepend' => '',
					'append' => '',
					'maxlength' => 12,
				),
				array(
					'key' => 'field_5eab34d839b8e',
					'label' => 'Location Email',
					'name' => 'location_email',
					'type' => 'email',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
							array(
								'field' => 'field_5e16067a39ba6',
								'operator' => '==',
								'value' => 'static',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'example@email.com',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_5f3ed45ec28e7',
					'label' => 'Hide Email',
					'name' => 'hide_email',
					'type' => 'button_group',
					'instructions' => 'If you would prefer to hide the email address check this box.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'noHide' => 'Don\'t Hide',
						'hide' => 'Hide',
					),
					'allow_null' => 0,
					'default_value' => 'noHide',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5f3ed4e0c28e8',
					'label' => 'Hide Email Text',
					'name' => 'hide_email_text',
					'type' => 'text',
					'instructions' => 'Text to replace email',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Email Us',
					'placeholder' => 'Email Us',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e5584bfa4655',
					'label' => 'Contact Us Link',
					'name' => 'contact_us_chatbot',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'contact_us',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
				),
				array(
					'key' => 'field_5e558504a4656',
					'label' => 'Contact Us Button Copy',
					'name' => 'contact_us_button_copy',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'contact_us',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Contact Us',
					'placeholder' => 'Contact Us',
					'prepend' => '',
					'append' => '',
					'maxlength' => 25,
				),
				array(
					'key' => 'field_5e558a6f6d70c',
					'label' => 'Office Hours Button Copy',
					'name' => 'office_hours_button_copy',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'hours',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'View Office Hours',
					'placeholder' => 'View Office Hours',
					'prepend' => '',
					'append' => '',
					'maxlength' => 25,
				),
				array(
					'key' => 'field_5e55866b67350',
					'label' => 'Patient Forms Button Copy',
					'name' => 'patient_forms_button_copy',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e1605abf8fe0',
								'operator' => '==',
								'value' => 'online_patient_forms',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Online Patient Forms',
					'placeholder' => 'Online Patient Forms',
					'prepend' => '',
					'append' => '',
					'maxlength' => 25,
				),
				array(
					'key' => 'field_5ef4a74ae7f08',
					'label' => 'Hours',
					'name' => 'location_hours',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5c6da14070634',
								'operator' => '!=',
								'value' => 'display_off',
							),
							array(
								'field' => 'field_5e160546f8fde',
								'operator' => '==',
								'value' => 'innexus_chatbot',
							),
							array(
								'field' => 'field_5e16067a39ba6',
								'operator' => '==',
								'value' => 'static',
							),
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5ef4a764e7f09',
							'label' => 'Monday',
							'name' => 'monday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a795e7f0a',
							'label' => 'Tuesday',
							'name' => 'tuesday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a79de7f0b',
							'label' => 'Wednesday',
							'name' => 'wednesday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a7a8e7f0c',
							'label' => 'Thursday',
							'name' => 'thursday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a7b2e7f0d',
							'label' => 'Friday',
							'name' => 'friday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a7b9e7f0e',
							'label' => 'Saturday',
							'name' => 'saturday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a7c0e7f0f',
							'label' => 'Sunday',
							'name' => 'sunday',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '8:00am - 5:00pm',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5ef4a7cae7f10',
							'label' => 'Additional Info',
							'name' => 'additional_info',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '100',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'current_user',
				'operator' => '==',
				'value' => 'logged_in',
			),
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'innexus-mobile',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;