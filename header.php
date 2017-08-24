<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package oxane
 */
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'oxane' ); ?></a>
    <?php get_template_part('modules/header/head'); ?>
	<div id="social-search">
		<div class="container">
            <?php get_template_part('modules/header/social', 'fa'); ?>
            <?php get_template_part('modules/header/searchform', 'top'); ?>
		</div>
	</div>
    <?php get_template_part('modules/header/masthead'); ?>

	<?php if( class_exists('rt_slider') ) {
			 rt_slider::render('framework/featured-components/slider', 'nivo' );
		} ?>

	<div class="mega-container">
		<?php get_template_part('/framework/featured-components/slider', 'postthumb' ); ?>
		<?php get_template_part('/framework/featured-components/featured', 'posts' ); ?>
	
		<div id="content" class="site-content container">