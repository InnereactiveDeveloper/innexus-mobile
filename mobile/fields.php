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
        'capability'     => 'edit_posts',
        'redirect'     => false
    ));
}

//Plugin Fields
if( function_exists('acf_add_local_field_group') )
{
acf_add_local_field_group(array(
	'key' => 'group_5c6d9982b2c6a',
	'title' => 'Innexus Mobile',
	'fields' => array(
		array(
			'key' => 'field_5c6da14070634',
			'label' => 'Enable/Disable',
			'name' => 'enabledisable',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'toggle_on' => 'On',
				'toggle_off' => 'Off',
			),
			'allow_null' => 0,
			'default_value' => 'Off',
			'layout' => 'horizontal',
			'return_format' => 'value',
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
						'value' => 'toggle_on',
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
						'width' => '33',
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
						'width' => '33',
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
						'width' => '33',
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
};