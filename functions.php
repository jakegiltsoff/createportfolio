<?php
/*
Author: Jake Giltsoff
URL: htp://createportfol.io
*/


// Include create.php
// ------------------------------------------------------------

require_once('assets/create.php'); // Do not remove


// Add image sizes
// ------------------------------------------------------------

add_image_size( 'create-featured-900', 900, 450, true );
add_image_size( 'create-profile-600', 600, 600, true );
add_image_size( 'create-thumb-600', 600, 500, true );
add_image_size( 'create-half-450', 450, 450, true );


// Add Portfolio custom post type
// ------------------------------------------------------------

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio' ),
				'add_new' => _x('Add New', 'Portfolio Item'),
				'add_new_item' => __('Add New Portfolio Item'),
				'edit_item' => __('Edit Portfolio Item'),
				'new_item' => __('New Portfolio Item'),
				'view_item' => __('View Portfolio Item'),
				'search_items' => __('Search Portfolio Items'),
				'not_found' => __('Nothing found'),
				'not_found_in_trash' => __('Nothing found in Trash')
			),
		'public' => true,
		'has_archive' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'hierarchical' => true
		)
	);
}


// ACF Lite 
// ------------------------------------------------------------

require_once('acf/acf-lite.php');

function my_acf_settings( $options )
{
	$options['activation_codes']['repeater'] = 'QJF7-L4IX-UCNP-RF2W'; 
	$options['activation_codes']['options_page'] = 'OPN8-FA4J-Y2LW-81LS'; 
	$options['options_page']['title'] = 'Options';
	$options['options_page']['pages'] = array('Theme Options', 'Home Page', 'About Page');
		
	return $options;
}
add_filter('acf_settings', 'my_acf_settings');

register_field_group(array (
	'id' => '513775199b18b',
	'title' => 'Blog Post',
	'fields' => 
	array (
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
				'order_no' => 0,
			),
		),
		'allorany' => 'all',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => 
		array (
			0 => 'excerpt',
			1 => 'custom_fields',
			2 => 'discussion',
			3 => 'comments',
			4 => 'format',
			5 => 'categories',
			6 => 'tags',
			7 => 'send-trackbacks',
		),
	),
	'menu_order' => 0,
));
register_field_group(array (
	'id' => '513775199ba56',
	'title' => 'Edit from Options menu',
	'fields' => 
	array (
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'create-about.php',
				'order_no' => 0,
			),
			1 => 
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'create-blog.php',
				'order_no' => 1,
			),
			2 => 
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'create-portfolio.php',
				'order_no' => 2,
			),
		),
		'allorany' => 'any',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => 
		array (
			0 => 'the_content',
			1 => 'excerpt',
			2 => 'discussion',
			3 => 'comments',
			4 => 'revisions',
			5 => 'slug',
			6 => 'author',
			7 => 'format',
			8 => 'featured_image',
			9 => 'categories',
			10 => 'tags',
			11 => 'send-trackbacks',
		),
	),
	'menu_order' => 0,
));
register_field_group(array (
	'id' => '513775199c445',
	'title' => 'Edit the About Page',
	'fields' => 
	array (
		0 => 
		array (
			'key' => 'field_61',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'order_no' => 0,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
		),
		1 => 
		array (
			'key' => 'field_63',
			'label' => 'Header text or image',
			'name' => 'header_about',
			'type' => 'radio',
			'order_no' => 1,
			'instructions' => 'Choose if you would like text or an image in your About Page header. This is a good place to have a great big picture of yourself or get across your personality. (Hint: you can mix it up and have text on the homepage and an image on the about page or vice versa. Both the same is cool too...)',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'choices' => 
			array (
				'Text' => 'Text',
				'Image' => 'Image',
			),
			'default_value' => '',
			'layout' => 'horizontal',
		),
		2 => 
		array (
			'key' => 'field_64',
			'label' => 'Header text',
			'name' => 'header_text_about',
			'type' => 'textarea',
			'order_no' => 2,
			'instructions' => 'Add text to the header area.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 1,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		3 => 
		array (
			'key' => 'field_65',
			'label' => 'Header image',
			'name' => 'header_image_about',
			'type' => 'image',
			'order_no' => 3,
			'instructions' => 'Add an image to the header area. Recommended size: 900px × 450px (It will be cropped to this if larger and it will look weird if it\'s smaller, don\'t do that).',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 1,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Image',
					),
				),
				'allorany' => 'all',
			),
			'save_format' => 'id',
			'preview_size' => 'thumbnail',
		),
		4 => 
		array (
			'key' => 'field_62',
			'label' => 'General',
			'name' => '',
			'type' => 'tab',
			'order_no' => 4,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
						'value' => '',
					),
				),
				'allorany' => 'all',
			),
		),
		5 => 
		array (
			'key' => 'field_71',
			'label' => 'Picture of you',
			'name' => 'picture_of_you',
			'type' => 'image',
			'order_no' => 5,
			'instructions' => 'Add an image of yourself. This isn\'t myspace, no need to pout, just a nice photograph of you to show you are indeed a real person is recommended. Recommended size: 600px × 600px (It will be cropped to this if larger and it will look weird if it\'s smaller, don\'t do that).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'save_format' => 'id',
			'preview_size' => 'thumbnail',
		),
		6 => 
		array (
			'key' => 'field_66',
			'label' => 'About',
			'name' => 'about',
			'type' => 'textarea',
			'order_no' => 6,
			'instructions' => 'Add information about yourself. This is a great place to show off your skills and knowledge. Also to show that you are a real person and that you\'re not a dick.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		7 => 
		array (
			'key' => 'field_67',
			'label' => 'Education',
			'name' => 'education',
			'type' => 'textarea',
			'order_no' => 7,
			'instructions' => '(Optional) Add some information about your education. School, College, University etc. Don\'t go too far back, potential employers more than likely don\'t care about that.',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		8 => 
		array (
			'key' => 'field_68',
			'label' => 'Contact',
			'name' => 'contact_about',
			'type' => 'textarea',
			'order_no' => 8,
			'instructions' => 'Time to sell yourself and what you want to be doing. Let potential employers know how best to contact you and why they should!',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_63',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-about-page',
				'order_no' => 0,
			),
		),
		'allorany' => 'all',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => 
		array (
			0 => 'the_content',
			1 => 'excerpt',
			2 => 'discussion',
			3 => 'comments',
			4 => 'revisions',
			5 => 'author',
			6 => 'format',
			7 => 'featured_image',
			8 => 'categories',
			9 => 'tags',
			10 => 'send-trackbacks',
		),
	),
	'menu_order' => 0,
));
register_field_group(array (
	'id' => '51377519a09a4',
	'title' => 'Edit the Home Page',
	'fields' => 
	array (
		0 => 
		array (
			'key' => 'field_13',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'order_no' => 0,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
		),
		1 => 
		array (
			'key' => 'field_5',
			'label' => 'Header text or image',
			'name' => 'header',
			'type' => 'radio',
			'order_no' => 1,
			'instructions' => 'Choose if you would like text or an image in your homepage header. This is a good place to show off your creative skills or get across your personality.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'choices' => 
			array (
				'Text' => 'Text',
				'Image' => 'Image',
			),
			'default_value' => '',
			'layout' => 'horizontal',
		),
		2 => 
		array (
			'key' => 'field_6',
			'label' => 'Header text',
			'name' => 'header_text',
			'type' => 'textarea',
			'order_no' => 2,
			'instructions' => 'Add text to the header area.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 1,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		3 => 
		array (
			'key' => 'field_7',
			'label' => 'Header image',
			'name' => 'header_image',
			'type' => 'image',
			'order_no' => 3,
			'instructions' => 'Add an image to the header area. Recommended size: 900px × 450px (It will be cropped to this if larger and it will look weird if it\'s smaller, don\'t do that).',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 1,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Image',
					),
				),
				'allorany' => 'all',
			),
			'save_format' => 'id',
			'preview_size' => 'thumbnail',
		),
		4 => 
		array (
			'key' => 'field_14',
			'label' => 'General',
			'name' => '',
			'type' => 'tab',
			'order_no' => 4,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
		),
		5 => 
		array (
			'key' => 'field_8',
			'label' => 'Number of columns',
			'name' => 'number_of_columns',
			'type' => 'radio',
			'order_no' => 5,
			'instructions' => 'Choose the number of columns of images you would like to show on the homepage. Hint: If you have a multiple of three projects use 3 columns, if a multiple of 4 then have 4. Recommended maximum number of projects for 3 columns is 9 and for 4 columns is 12 – remember a portfolio is just supposed to be your best work, but I wont tell you what to do, I\'m not your mum. The page will work best with full rows, so I recommend either having 3, 4, 6, 8, 9 or 12 projects and choosing the columns accordingly.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'choices' => 
			array (
				3 => 3,
				4 => 4,
			),
			'default_value' => '',
			'layout' => 'horizontal',
		),
		6 => 
		array (
			'key' => 'field_9',
			'label' => 'About',
			'name' => 'about_mini',
			'type' => 'textarea',
			'order_no' => 6,
			'instructions' => 'Add a small amount of info about yourself. You can go into more detail on the About page. Recommended number of words: ~ 50–60.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		7 => 
		array (
			'key' => 'field_10',
			'label' => 'Contact',
			'name' => 'contact',
			'type' => 'textarea',
			'order_no' => 7,
			'instructions' => 'Add a small amount about how you would prefer people to get in contact with you. Again, you can go into more detail on the About page. Recommended number of words: ~ 30.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_5',
						'operator' => '==',
						'value' => 'Text',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-home-page',
				'order_no' => 0,
			),
		),
		'allorany' => 'all',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => 
		array (
		),
	),
	'menu_order' => 0,
));
register_field_group(array (
	'id' => '51377519a36ce',
	'title' => 'Edit Theme Options',
	'fields' => 
	array (
		0 => 
		array (
			'key' => 'field_48',
			'label' => 'General',
			'name' => 'general',
			'type' => 'tab',
			'order_no' => 0,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
		),
		1 => 
		array (
			'key' => 'field_69',
			'label' => 'Email address',
			'name' => 'email_address',
			'type' => 'text',
			'order_no' => 2,
			'instructions' => 'Add your email address here. This will be used across the site as your contact email. (Tip: now is a good time to update your email if it\'s still fairyprincess4eva@hotmail.com. Use something more professional, it\'s the little things).',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		2 => 
		array (
			'key' => 'field_3',
			'label' => 'Theme skin',
			'name' => 'theme_skin',
			'type' => 'radio',
			'order_no' => 2,
			'instructions' => 'Choose one of the colour schemes for the theme. Yea, they have silly names, choose which one suits you best.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'choices' => 
			array (
				'hipster' => 'Hipster',
				'monotone' => 'Monotone',
				'fruit-salad' => 'Fruit salad',
				'atlantis' => 'Atlantis',
			),
			'default_value' => '',
			'layout' => 'horizontal',
		),
		3 => 
		array (
			'key' => 'field_4',
			'label' => 'Typography',
			'name' => 'typography',
			'type' => 'radio',
			'order_no' => 4,
			'instructions' => 'The theme comes with two typographic variants, Sans-serif and Serif. Choose which you prefer.',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'choices' => 
			array (
				'Sans-serif' => 'Sans-serif',
				'Serif' => 'Serif',
			),
			'default_value' => '',
			'layout' => 'horizontal',
		),
		4 => 
		array (
			'key' => 'field_49',
			'label' => 'Social Links',
			'name' => '',
			'type' => 'tab',
			'order_no' => 6,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
		),
		5 => 
		array (
			'key' => 'field_50',
			'label' => 'Facebook link',
			'name' => 'facebook_link',
			'type' => 'text',
			'order_no' => 7,
			'instructions' => 'Add a link to your Facebook profile or page (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		6 => 
		array (
			'key' => 'field_51',
			'label' => 'Twitter link',
			'name' => 'twitter_link',
			'type' => 'text',
			'order_no' => 8,
			'instructions' => 'Add a link to your Twitter profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		7 => 
		array (
			'key' => 'field_52',
			'label' => 'Google+ link',
			'name' => 'google+_link',
			'type' => 'text',
			'order_no' => 9,
			'instructions' => 'Add a link to your Google+ profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		8 => 
		array (
			'key' => 'field_55',
			'label' => 'LinkedIn link',
			'name' => 'linkedin_link',
			'type' => 'text',
			'order_no' => 10,
			'instructions' => 'Add a link to your LinkedIn profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		9 => 
		array (
			'key' => 'field_53',
			'label' => 'Flickr link',
			'name' => 'flickr_link',
			'type' => 'text',
			'order_no' => 11,
			'instructions' => 'Add a link to your Flickr profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		10 => 
		array (
			'key' => 'field_54',
			'label' => 'Dribbble link',
			'name' => 'dribbble_link',
			'type' => 'text',
			'order_no' => 12,
			'instructions' => 'Add a link to your Dribbble profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		11 => 
		array (
			'key' => 'field_56',
			'label' => 'Tumblr link',
			'name' => 'tumblr_link',
			'type' => 'text',
			'order_no' => 13,
			'instructions' => 'Add a link to your Tumblr page (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		12 => 
		array (
			'key' => 'field_57',
			'label' => 'Vimeo link',
			'name' => 'vimeo_link',
			'type' => 'text',
			'order_no' => 14,
			'instructions' => 'Add a link to your Vimeo page (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		13 => 
		array (
			'key' => 'field_58',
			'label' => 'DeviantArt link',
			'name' => 'deviantart_link',
			'type' => 'text',
			'order_no' => 15,
			'instructions' => 'Add a link to your DeviantArt profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		14 => 
		array (
			'key' => 'field_59',
			'label' => 'Zerply link',
			'name' => 'zerply_link',
			'type' => 'text',
			'order_no' => 16,
			'instructions' => 'Add a link to your Zerply page (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		15 => 
		array (
			'key' => 'field_60',
			'label' => 'Instagram link',
			'name' => 'instagram_link',
			'type' => 'text',
			'order_no' => 17,
			'instructions' => 'Add a link to your Instagram profile (optional).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'field_3',
						'operator' => '==',
						'value' => 'Light',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
				'order_no' => 0,
			),
		),
		'allorany' => 'all',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => 
		array (
		),
	),
	'menu_order' => 0,
));
register_field_group(array (
	'id' => '51377519a85e9',
	'title' => 'Portfolio Item',
	'fields' => 
	array (
		0 => 
		array (
			'key' => 'field_35',
			'label' => 'Thumbnail',
			'name' => 'thumbnail',
			'type' => 'image',
			'order_no' => 0,
			'instructions' => 'Add an image for the project to the homepage. This is probably the first people will see of the project so make it good! (no pressure). Recommended size: 600px × 500px (It will be cropped to this if larger and it will look weird if it\'s smaller, don\'t do that).',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'save_format' => 'id',
			'preview_size' => 'thumbnail',
		),
		1 => 
		array (
			'key' => 'field_36',
			'label' => 'Featured image',
			'name' => 'featured_image',
			'type' => 'image',
			'order_no' => 1,
			'instructions' => 'Add the main image for the project. This is shown at the top of the single page for the portfolio item. This can be the same as the thumbnail if you want (but bigger). Recommended size: 900px × 450px (It will be cropped to this if larger and it will look weird if it\'s smaller, so again, don\'t do that).',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'save_format' => 'id',
			'preview_size' => 'medium',
		),
		2 => 
		array (
			'key' => 'field_31',
			'label' => 'Information',
			'name' => 'information',
			'type' => 'textarea',
			'order_no' => 2,
			'instructions' => 'Add some information about the project. Additional optional info can be added below if you like. Recommended number of words: 100+',
			'required' => 1,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'br',
		),
		3 => 
		array (
			'key' => 'field_41',
			'label' => 'Date',
			'name' => 'date',
			'type' => 'text',
			'order_no' => 3,
			'instructions' => 'Add when you worked on the project. Choose your own format and stick to it. (i.e. February 2013)',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		4 => 
		array (
			'key' => 'field_42',
			'label' => 'Client',
			'name' => 'client',
			'type' => 'text',
			'order_no' => 4,
			'instructions' => 'Who did you work for? (Hint: you can put University Project or Self)',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		5 => 
		array (
			'key' => 'field_43',
			'label' => 'Skills',
			'name' => 'skills',
			'type' => 'repeater',
			'order_no' => 5,
			'instructions' => 'Add in what skills you used. (i.e. Web Design, Still Life Photography, Painting etc)',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'sub_fields' => 
			array (
				'field_44' => 
				array (
					'label' => 'Skill',
					'name' => 'skill',
					'type' => 'text',
					'instructions' => '',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'html',
					'order_no' => 0,
					'key' => 'field_44',
				),
			),
			'row_min' => 1,
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Add Skill',
		),
		6 => 
		array (
			'key' => 'field_45',
			'label' => 'Tools',
			'name' => 'tools',
			'type' => 'repeater',
			'order_no' => 6,
			'instructions' => 'Add in what tools you used. (i.e. Photoshop, Illustrator, Canon 5D mkIII etc)',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'sub_fields' => 
			array (
				'field_46' => 
				array (
					'label' => 'Tool',
					'name' => 'tool',
					'type' => 'text',
					'instructions' => '',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'html',
					'order_no' => 0,
					'key' => 'field_46',
				),
			),
			'row_min' => 1,
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Add Tool',
		),
		7 => 
		array (
			'key' => 'field_47',
			'label' => 'Link',
			'name' => 'link',
			'type' => 'text',
			'order_no' => 7,
			'instructions' => 'Is the project live online somewhere? Link to it.',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'formatting' => 'html',
		),
		8 => 
		array (
			'key' => 'field_37',
			'label' => 'Additional images',
			'name' => 'additional_images',
			'type' => 'repeater',
			'order_no' => 8,
			'instructions' => 'Here you can add in additional images. You have two options here, either full width or half width with two side by side. These then stack one after the other so have as many as you like and feel free to mix and match between full and half width images. Recommended size for full: 900px × 450px, and for half: 450px × 450px (You know the drill).',
			'required' => 0,
			'conditional_logic' => 
			array (
				'status' => 0,
				'rules' => 
				array (
					0 => 
					array (
						'field' => 'null',
						'operator' => '==',
					),
				),
				'allorany' => 'all',
			),
			'sub_fields' => 
			array (
				'field_38' => 
				array (
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Just this one for full width',
					'column_width' => '',
					'save_format' => 'id',
					'preview_size' => 'thumbnail',
					'order_no' => 0,
					'key' => 'field_38',
				),
				'field_39' => 
				array (
					'label' => 'Image 2',
					'name' => 'image_2',
					'type' => 'image',
					'instructions' => 'Add image here too for both to be half width',
					'column_width' => '',
					'save_format' => 'id',
					'preview_size' => 'thumbnail',
					'order_no' => 1,
					'key' => 'field_39',
				),
			),
			'row_min' => 1,
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Add Image row',
		),
	),
	'location' => 
	array (
		'rules' => 
		array (
			0 => 
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolio',
				'order_no' => 0,
			),
		),
		'allorany' => 'all',
	),
	'options' => 
	array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => 
		array (
			0 => 'the_content',
			1 => 'excerpt',
			2 => 'discussion',
			3 => 'comments',
			4 => 'revisions',
			5 => 'author',
			6 => 'format',
			7 => 'featured_image',
			8 => 'categories',
			9 => 'tags',
			10 => 'send-trackbacks',
		),
	),
	'menu_order' => 0,
));


// Add classes to blog links
// ------------------------------------------------------------

function next_link_add_class($str_a){
  $str_a = str_replace('href=', 'class="previous-post" href=', $str_a);
  return $str_a;
}
add_filter('next_post_link', 'next_link_add_class');

function previous_link_add_class($str_b){
	$str_b = str_replace('href=', 'class="next-post" href=', $str_b);
	return $str_b;
}
add_filter('previous_post_link', 'previous_link_add_class');

function older_posts_link_attributes() {
	return 'class="older-posts"';
}
add_filter('next_posts_link_attributes', 'older_posts_link_attributes');

function newer_posts_link_attributes() {
	return 'class="newer-posts"';
}
add_filter('previous_posts_link_attributes', 'newer_posts_link_attributes');


// Disable default dashboard widgets
// ------------------------------------------------------------

function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');         
	remove_meta_box('dashboard_primary', 'dashboard', 'core');       
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       
}

add_action('admin_menu', 'disable_default_dashboard_widgets');


// Add theme skin and typography body classes
// ------------------------------------------------------------

add_filter('body_class','my_class_names');
function my_class_names($classes) {
	$str1 = get_field('theme_skin', 'options'); $str1 = strtolower($str1); 
	$str2 = get_field('typography', 'options'); $str2 = strtolower($str2);
	$classes[] = $str1;
	$classes[] = $str2;
	return $classes;
}


// Sort out the classes on the nav menu for portfolio cpt pages
// ------------------------------------------------------------

function remove_parent_classes($class) {
	$classes = array(
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor',
		'current-menu-item'
	);
	return ( !in_array($class, $classes) );
}

function add_class_to_wp_nav_menu($classes) {
	if ( 'portfolio' == get_post_type() ) {
		$classes = array_filter($classes, "remove_parent_classes");
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

function add_page_type_to_menu($classes, $item) {
	if($item->object == 'page'){
		$template_name = get_post_meta( $item->object_id, '_wp_page_template', true );
		$new_class =str_replace(".php","",$template_name);
		array_push($classes, $new_class);
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_page_type_to_menu', 10, 2 );

?>