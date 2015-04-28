<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta viewport ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons  ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon.ico">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPad-icon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPadRetina-icon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPhone-icon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPhoneRetina-icon.png">

	<?php // Pingback y RSS  ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed suscription" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed suscription" href="<?php bloginfo('atom_url'); ?>" />

	
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<header class="top">
	<div class="header-container">
		<h2 id="logo">
			<a href="<?php echo home_url(); ?>">Complejo El Olivar</a>
		</h2>

		<?php // Menu principal ?>
		
		<nav class="mainNav">
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'main-menu',
					'container' => false
				) 
			); ?>
		</nav>
	

		<?php // Menu principal ?>
		
		<nav class="mobileNav">
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'mobile-menu'
				) 
			); ?>
		</nav>



	</div>
</header>
	






<?php get_site_url(); ?>






