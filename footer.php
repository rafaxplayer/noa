<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package noa
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="button-up"></div>
		<div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="widgets-content">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="widgets-content">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="widgets-content">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php endif; ?>
			
		</div>

		<!-- Social icons -->
		<div class="social">
			<?php if( !empty(get_theme_mod('noa_instagram_url','') )): ?>
				<a href="<?php echo esc_url(get_theme_mod('noa_instagram_url','')); ?>" target="_blank">
					<span class="instagram" ></span>
				</a>
			<?php endif; ?>

			<?php if( !empty(get_theme_mod('noa_pinterest_url','') )): ?>
				<a href="<?php echo esc_url(get_theme_mod('noa_pinterest_url','')); ?>" target="_blank">
					<span class="pinterest" ></span>
				</a>
			<?php endif; ?>

			<?php if( !empty(get_theme_mod('noa_facebook_url','') )): ?>
				<a href="<?php echo esc_url(get_theme_mod('noa_facebook_url','')); ?>" target="_blank">
					<span class="facebook" ></span>
				</a>
			<?php endif; ?>


			<?php if( !empty(get_theme_mod('noa_twitter_url','') )): ?>
				<a href="<?php echo esc_url(get_theme_mod('noa_twitter_url','')); ?>" target="_blank">
					<span class="twitter" ></span>
				</a>
			<?php endif; ?>

			<?php if( !empty(get_theme_mod('noa_linkedin_url','') )): ?>
				<a href="<?php echo esc_url(get_theme_mod('noa_linkedin_url','')); ?>" target="_blank">
					<span class="linkedin" ></span>
				</a>
			<?php endif; ?>

			<?php if( !empty(get_theme_mod('noa_whatsapp_number','') )): ?>
			<a href="https://api.whatsapp.com/send?phone=<?php echo get_theme_mod('noa_whatsapp_number',''); ?>" target="_blank">
				<span class="whatsapp" ></span>
			</a>
			<?php endif; ?>
		</div>
		<div class="site-info">
			
				<?php printf( '&copy; %1$s %2$s', date('Y') , get_bloginfo( 'name' ) ); ?>
			
			<span class="sep"> | </span>
				<?php 
					printf( __( 'Theme: Noa by <a href="%1$s">rafax</a>.', 'noa' ), 'https://juanrafaelsimarro.com/' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
