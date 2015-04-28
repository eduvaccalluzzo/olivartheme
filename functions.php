<?php

/* Encolamos estilos y scrips
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_set_styles_js() {
		
		// Hoja estilo principal
	    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	    wp_enqueue_style( 'magnific-style', get_bloginfo('template_directory'). '/css/magnific-popup.css');


	    if ( !is_admin() ){
	    	// LLamamos a jQuery
    		wp_deregister_script('jquery');
			wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false, '1.11.1', true);
			wp_enqueue_script('jquery');

	    	// Insertamos plugin Magnific Popup
			wp_register_script( 'magnific-popup',  get_bloginfo('template_directory') . '/js/libs/jquery.magnific-popup.min.js', false, null, true);
			wp_enqueue_script('magnific-popup');			

	    	// Insertamos script Principal
			wp_register_script( 'main-script',  get_bloginfo('template_directory') . '/js/main.js', false, null, true);
			wp_enqueue_script('main-script');
	    }

	}

	add_action( 'wp_enqueue_scripts', 'byadr_set_styles_js' );




/* Setup inicial
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_theme_setup(){
		// Compatibilidad HTML5 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
		// Post Thumbnails
		add_theme_support( 'post-thumbnails' ); 

		// Custom Header
		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/images/bghome.jpg',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => true,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		// Content Width
		if ( ! isset( $content_width ) ) {
			$content_width = 960;
		}


		// Excerpt
		add_post_type_support( 'page', 'excerpt' );

	}

	add_action( 'after_setup_theme', 'byadr_theme_setup' );




/* Menus
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_register_menus() {

	    register_nav_menus(
		    array(
		      'main-menu'	=>	__( 'Main Menu', 'byadr' ),
		      'footer-menu'	=>	__( 'Footer Menu', 'byadr' ),
		      'social-menu'	=>	__( 'Social Menu', 'byadr' ),
		      'mobile-menu'	=>	__( 'Mobile Menu', 'byadr' )
		    )
		);

	}

	add_action( 'init', 'byadr_register_menus' );




/* Widget Area
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_widgets_areas(){
		
		register_sidebar( 
			array(
				'id'            => 'footer-widget',
				'name'          => __('Widget Footer','byadr'),
				'description'   => __('Esta es la descripción del Widget','byadr'),
		        'class'         => '',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>' 
			) 
		);

	}

	add_action( 'widgets_init', 'byadr_widgets_areas' );




/* Shortcodes
–––––––––––––––––––––––––––––––––––––––––––––––––– */

 // Accordion slider [slide titulo=""]
	
	add_shortcode( 'slide' , 'byadr_shortcode_accordion' );

	function byadr_shortcode_accordion($attr, $content){

		$slide_title = $attr['titulo'];
		
		$html = '<dl class="acordeon">';

		$html .= '<dt><h4>' . $slide_title . '</h4></dt>';

		$html .= '<dd>' . $content . '</dd>';

		$html .= '</dl>';

		return $html;

	}




// Columnas empresariales 
add_shortcode('colblock', 'byadr_bloquecolumnas_shortcode' );


function byadr_bloquecolumnas_shortcode($attr, $content){
	$content = apply_filters('the_content', $content );

	return '<div class="colblock clearfix">' . $content . '</div>';

}


add_shortcode('col', 'byadr_columnas_shortcode' );


function byadr_columnas_shortcode($attr, $content){
	$content = apply_filters('the_content', $content );

	 	return '<div class="col">' . $content . '</div>';


}




// Grilla Clientes 
add_shortcode('clientes', 'byadr_clientes_shortcode' );


function byadr_clientes_shortcode($attr, $content){


	if($attr['web']){
		$web = $attr['web'];
	}

	if($attr['tablet']){
		$tablet = $attr['tablet'];
	}

	if($attr['movil']){
		$movil = $attr['movil'];
	}

	// Query para web

	$argWeb = array (
		'post_type' => 'clientes',
		'posts_per_page' => $web ,
		'orderby' => 'rand',
	);

	$queryclientweb = new WP_Query( $argWeb );

	if ($queryclientweb->have_posts() ) :

		$clientes = '<section class="grilla-clientes grilla-web"><div class="clearfix">';

	while ($queryclientweb->have_posts() ) : $queryclientweb->the_post();
		$thumbclientesweb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full');

		$clientes .= '<div class="column eight">
					<div class="img-clientes"><img src="'. $thumbclientesweb[0] . '"></div></div>';
	endwhile;

		$clientes .= '</div></section>';

	endif;

		$clientes .= wp_reset_query();
	//return $clientesWeb . wp_reset_query();

	
	// Query para tablet

	$argtablet = array (
		'post_type' => 'clientes',
		'posts_per_page' => $tablet ,
		'orderby' => 'rand',
	);

	$queryclienttablet = new WP_Query( $argtablet );

	if ($queryclienttablet->have_posts() ) :

		$clientes .= '<section class="grilla-clientes grilla-tablet"><div class="clearfix">';

	while ($queryclienttablet->have_posts() ) : $queryclienttablet->the_post();
		$thumbclientestablet = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full');

		$clientes .= '<div class="column eight">
					<div class="img-clientes"><img src="'. $thumbclientestablet[0] . '"></div></div>';
	endwhile;

		$clientes .= '</div></section>';

	endif;

		$clientes .= wp_reset_query();
	//return $clientestablet . wp_reset_query();


	// Query para movil

	$argmovil = array (
		'post_type' => 'clientes',
		'posts_per_page' => $movil ,
		'orderby' => 'rand',
	);

	$queryclientmovil = new WP_Query( $argmovil );

	if ($queryclientmovil->have_posts() ) :

		$clientes .= '<section class="grilla-clientes grilla-movil"><div class="clearfix">';

	while ($queryclientmovil->have_posts() ) : $queryclientmovil->the_post();
		$thumbclientesmovil = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full');

		$clientes .= '<div class="column eight">
					<div class="img-clientes"><img src="'. $thumbclientesmovil[0] . '"></div></div>';
	endwhile;

		$clientes .= '</div></section>';

	endif;
		$clientes .= wp_reset_query();

	return $clientes;


/*







	$arg = array (
		'post_type' => 'clientes',
		'posts_per_page' => 16,
		'orderby' => 'rand',
	);


	$queryclient = new WP_Query( $arg );

	if ($queryclient->have_posts() ) :

		$clientes = '<section class="grilla-clientes"><div class="clearfix">';

	while ($queryclient->have_posts() ) : $queryclient->the_post();
		$thumbclientes = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full');

		$clientes .= '<div class="column eight">
					<div class="img-clientes"><img src="'. $thumbclientes[0] . '"></div></div>';
	endwhile;

		$clientes .= '</div></section>';

	endif;

	return $clientes . wp_reset_query();




*/

}






































