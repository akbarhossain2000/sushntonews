<?php
/**
*	Plugin Name: Custom Video Post
**/

/*===== Video Custom Type =====*/
class custom_video_post_type_loaded {
	
	function __construct() {
	
		add_action('restrict_manage_posts', array(__CLASS__, 'restrict_video_by_video_category'));
		add_action('init', array(__CLASS__, 'register_video_post_type'));
		add_action('init', array(__CLASS__, 'video_category_taxonomy'));
		add_filter('manage_video_post_posts_columns', array(__CLASS__, 'add_video_category_column_to_video_list'));
		add_action('manage_posts_custom_column', array(__CLASS__, 'show_video_categories_column_for_video_list'),10,2);
	}
	
	function restrict_video_by_video_category() {
		global $typenow;
		global $wp_query;
		if ($typenow=='video_post') {
			$taxonomy = 'video_category';
			$video_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' =>  __("All {$video_taxonomy->label}"),
				'taxonomy'        =>  $taxonomy,
				'name'            =>  'video_category',
				'orderby'         =>  'name',
				'selected'        =>  $wp_query->query['term'],
				'hierarchical'    =>  true,
				'depth'           =>  3,
				'show_count'      =>  true, // Show # video in parens
				'hide_empty'      =>  false, // Don't show video_category w/o video
			));
		}
	}

	
	function register_video_post_type() {
		register_post_type('video_post', array(
			'label'		=> __('Video', 'ss_text'),
			'public'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'	=> true,
			'query_var' => true,
			'has_archive'	=> true,
			'rewrite'	=> array( 'slug' => 'video' ),
			'capability_type'	=> 'post',
			'hierarchical'	=> false,
			'taxonomies'  	=> array('post_tag'),
			'supports'	=> array('title', 'editor', 'author', 'comments'),
		));
	}


	
	function video_category_taxonomy() {
		register_taxonomy('video_category', array('video_post'), array(
			'label'		=> __('Video Category', 'ss_text'),
			'public'	=> true,
			'hierarchical'	=> true,
			'show_ui'	=> true,
			'query_var'	=> true,
		));
	}


	
	function add_video_category_column_to_video_list( $posts_columns ) {
		if (!isset($posts_columns['author'])) {
			$new_posts_columns = $posts_columns;
		} else {
			$new_posts_columns = array();
			$index = 0;
			foreach($posts_columns as $key => $posts_column) {
				if ($key=='author') {
				$new_posts_columns['video_categories'] = null;
				}
				$new_posts_columns[$key] = $posts_column;
			}
		}
		$new_posts_columns['video_categories'] = 'Categories';
		return $new_posts_columns;
	}

	
	function show_video_categories_column_for_video_list( $column_id,$post_id ) {
		global $typenow;
		if ($typenow=='video_post') {
			$taxonomy = 'video_category';
			switch ($column_id) {
			case 'video_categories':
				$video_categories = get_the_terms($post_id,$taxonomy);
				if (is_array($video_categories)) {
					foreach($video_categories as $key => $vcategory) {
						$edit_link = get_term_link($vcategory,$taxonomy);
						$video_categories[$key] = '<a href="'.$edit_link.'">' . $vcategory->name . '</a>';
					}
					echo implode(' | ',$video_categories);
				}
				break;
			}
		}
	}
		
}

$object = new custom_video_post_type_loaded('__construct');


/*===== Gallery Custom Type =====*/
class custom_gallery_post_type_loaded {
	
	function __construct() {
	
		add_action('restrict_manage_posts', array(__CLASS__, 'restrict_gallery_by_gallery_category'));
		add_action('init', array(__CLASS__, 'register_gallery_post_type'));
		add_action('init', array(__CLASS__, 'gallery_category_taxonomy'));
		add_filter('manage_gallery_post_posts_columns', array(__CLASS__, 'add_gallery_category_column_to_gallery_list'));
		add_action('manage_posts_custom_column', array(__CLASS__, 'show_gallery_categories_column_for_gallery_list'),10,2);
	}
	
	function restrict_gallery_by_gallery_category() {
		global $typenow;
		global $wp_query;
		if ($typenow=='gallery_post') {
			$taxonomy = 'gallery_category';
			$video_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' =>  __("All {$video_taxonomy->label}"),
				'taxonomy'        =>  $taxonomy,
				'name'            =>  'gallery_category',
				'orderby'         =>  'name',
				'selected'        =>  $wp_query->query['term'],
				'hierarchical'    =>  true,
				'depth'           =>  3,
				'show_count'      =>  true, // Show # video in parens
				'hide_empty'      =>  false, // Don't show gallery_category w/o video
			));
		}
	}

	
	function register_gallery_post_type() {
		register_post_type('gallery_post', array(
			'label'		=> __('Gallery', 'ss_text'),
			'public'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'	=> true,
			'query_var' => true,
			'has_archive'	=> true,
			'rewrite'	=> array( 'slug' => 'gallery' ),
			'capability_type'	=> 'post',
			'hierarchical'	=> false,
			'taxonomies'  	=> array('post_tag'),
			'supports'	=> array('title', 'editor', 'thumbnail', 'author', 'comments'),
		));
	}


	
	function gallery_category_taxonomy() {
		register_taxonomy('gallery_category', array('gallery_post'), array(
			'label'		=> __('Gallery Category', 'ss_text'),
			'public'	=> true,
			'hierarchical'	=> true,
			'show_ui'	=> true,
			'query_var'	=> true,
		));
	}


	
	function add_gallery_category_column_to_gallery_list( $posts_columns ) {
		if (!isset($posts_columns['author'])) {
			$new_posts_columns = $posts_columns;
		} else {
			$new_posts_columns = array();
			$index = 0;
			foreach($posts_columns as $key => $posts_column) {
				if ($key=='author') {
				$new_posts_columns['gallery_categories'] = null;
				}
				$new_posts_columns[$key] = $posts_column;
			}
		}
		$new_posts_columns['gallery_categories'] = 'Categories';
		return $new_posts_columns;
	}

	
	function show_gallery_categories_column_for_gallery_list( $column_id,$post_id ) {
		global $typenow;
		if ($typenow=='gallery_post') {
			$taxonomy = 'gallery_category';
			switch ($column_id) {
			case 'gallery_categories':
				$gallery_categories = get_the_terms($post_id,$taxonomy);
				if (is_array($gallery_categories)) {
					foreach($gallery_categories as $key => $gcategory) {
						$edit_link = get_term_link($gcategory,$taxonomy);
						$gallery_categories[$key] = '<a href="'.$edit_link.'">' . $gcategory->name . '</a>';
					}
					echo implode(' | ',$gallery_categories);
				}
				break;
			}
		}
	}
		
}
$gallery = new custom_gallery_post_type_loaded('__construct');


/*===== Main Slider Custom Type =====*/
class custom_slider_post_type_loaded {
	
	function custom_slider_register() {
		
		register_post_type('slider_post', array(
			'label'				=> __('Main Slider', 'ss_text'),
			'description'		=> __('slider Image uploaded must be ( 1140X300 ) size. ', 'ss_text'),
			'public'			=> false,
			'capability_type'	=> 'post',
			'show_ui'			=> true,
			'supports'			=> array('title', 'thumbnail'),
		));
		
	}
	
}
add_action('init', array('custom_slider_post_type_loaded', 'custom_slider_register'));




