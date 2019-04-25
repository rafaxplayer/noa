<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package noa
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

		if(is_search()):?>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'noa' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<?php
		endif;
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;?>

			<div id="posts-container">
				
				<?php while ( have_posts() ) :?>

					
					<?php 
						the_post();

						get_template_part( 'template-parts/content', get_post_type());?>

					

				<?php endwhile;?>
			</div>
			
			<?php 
				noa_pagination();
				
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
