<?php

if( !function_exists( 'sushanto_sinha_setup' ) ) {
	
	function sushanto_sinha_setup() {
		
		load_theme_textdomain('ss_text', get_template_directory_uri().'/laguages');
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );
		
		add_image_size('slider-image', 1140, 300, true);
		add_image_size('hcat-big-image', 555, 536, true);
		add_image_size('hcat-small-image', 263, 253, true);
		add_image_size('pgallery-slider', 848, 536, true);
		add_image_size('pgallery-thumb', 130, 125, true);
		
		
		register_nav_menus(array(
			'theme_main_menu'	=> __('Main Menu', 'ss_text'),
		));
		
	}
	
}
add_action( 'after_setup_theme', 'sushanto_sinha_setup' );


if(file_exists(dirname(__FILE__).'/include/nav_walker.php')) {
	require_once(dirname(__FILE__).'/include/nav_walker.php');
}

if( !function_exists( 'enqueue_style_and_scripts' ) ) {
	
	function enqueue_style_and_scripts() {
		
		wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
		wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
		wp_register_style('cs-select', get_template_directory_uri().'/css/cs-select.css');
		wp_register_style('animate', get_template_directory_uri().'/css/animate.css');
		wp_register_style('nanoscroller', get_template_directory_uri().'/css/nanoscroller.css');
		wp_register_style('carousel', get_template_directory_uri().'/css/owl.carousel.css');
		wp_register_style('flexslider', get_template_directory_uri().'/css/flexslider.css');
		wp_register_style('mstyle', get_template_directory_uri().'/css/style.css');
		wp_register_style('presets', get_template_directory_uri().'/css/presets/preset1.css');
		wp_register_style('smain', get_template_directory_uri().'/style.css');
		wp_register_style('responsive', get_template_directory_uri().'/css/responsive.css');
		
		
		wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), true);
		wp_register_script('smoothscroll', get_template_directory_uri().'/js/smoothscroll.js', array('jquery'), true);
		wp_register_script('classie', get_template_directory_uri().'/js/classie.js', array('jquery'), true);
		wp_register_script('selectFx', get_template_directory_uri().'/js/selectFx.js', array('jquery'), true);
		wp_register_script('nanoscroller', get_template_directory_uri().'/js/jquery.nanoscroller.js', array('jquery'), true);
		wp_register_script('carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), true);
		wp_register_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), true);
		wp_register_script('sticky', get_template_directory_uri().'/js/jquery.sticky.js', array('jquery'), true);
		wp_register_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), true);
		wp_register_script('switcher', get_template_directory_uri().'/js/switcher.js', array('jquery'), true);
		
		
		wp_enqueue_style(array('bootstrap', 'font-awesome', 'cs-select', 'animate', 'nanoscroller', 'carousel', 'flexslider', 'mstyle', 'presets', 'smain', 'responsive'));
		wp_enqueue_script(array('jquery', 'bootstrap', 'smoothscroll', 'classie', 'selectFx', 'nanoscroller', 'carousel', 'flexslider', 'sticky', 'main', 'switcher'));
		
		
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_style_and_scripts' );



$inc_path	= dirname(__FILE__).'/inc_lib/';
if( file_exists($inc_path.'ReduxCore/framework.php') ){
	require_once($inc_path.'ReduxCore/framework.php');
}
if( file_exists($inc_path.'sample/theme_config.php') ){
	require_once($inc_path.'sample/theme_config.php');
}

/*==== Custom Post Type ====*/

if( file_exists( dirname(__FILE__).'/include/include-custom_type_post.php' ) ) {
	require_once( dirname(__FILE__).'/include/include-custom_type_post.php' );
}

/*==== Custom Meta Box ====*/

if( file_exists( dirname(__FILE__).'/include/include-custom_meta_box.php' ) ) {
	require_once( dirname(__FILE__).'/include/include-custom_meta_box.php' );
}

if( file_exists( dirname(__FILE__).'/include/content-comment_view.php' ) ) {
	require_once( dirname(__FILE__).'/include/content-comment_view.php' );
}


function crunchify_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' );
