<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package noa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'noa' ); ?></a>
	
<header id="masthead" class="site-header" style="background-image: url( <?php echo esc_url(get_header_image()); ?> );">

		<?php get_search_form(); ?>

		<div class="site-branding">

			<?php the_custom_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
			<?php
		
			$noa_description = get_bloginfo( 'description', 'display' );
			if ( $noa_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html($noa_description); /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation">
			<a href="#" class="menu-toggle" ></a>
			<div class="search-button"></div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'container'		=> ''
				
			) );
			?>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
