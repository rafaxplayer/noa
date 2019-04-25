<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package noa
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function noa_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'noa_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function noa_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'noa_pingback_header' );


/**
 * Add pagination 
 */
if ( ! function_exists( 'noa_pagination' ) ) :

 function noa_pagination(){
	
 	if( get_theme_mod('noa_pagination_type','next-prev') === 'next-prev'){

		the_posts_navigation(array(
		   'prev_text'                  => esc_html__( 'Old','noa'),
		   'next_text'                  => esc_html__( 'New','noa' ),
		   'screen_reader_text' => esc_html__( 'Post navigation','noa' ),
		   
	   ) );
   
   }else{
   
	   the_posts_pagination( array(
		   'prev_text'          => '<i class="fa fa-angle-left"></i> ' . esc_html__( 'Previous', 'noa' ),
		   'next_text'          => esc_html__( 'Next', 'noa' ) . ' <i class="fa fa-angle-right"></i>',
		   'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'noa' ) . ' </span>',
	   ) );
   } 
 }
endif;

if(! function_exists('noa_branding_animation')):

	function noa_branding_animation(){
		$outputh='';
		
			$outputh .= 'animated ';
			$outputh .= get_theme_mod('noa_branding_css_animations','None');
		
		return $outputh;
	}

endif;

if(! function_exists('noa_branding_css_animations')):

	function noa_branding_css_animations(){
		$css_animations = array(
			''	 		 => esc_html__('None (Default)','noa'),
			'fadeIn'	 => 'Fade In',
			'fadeInDown' => 'Fade In Down',
			'fadeInUp'	 =>'Fade In Up',
			'fadeInLeft' =>'Fade In Left',
			'fadeInRight' =>'Fade In Right',
		);
		
		return $css_animations;
	}

endif;

if( !function_exists('noa_breadcrumbs') ):
 
    function noa_breadcrumbs(){
		if (is_front_page() || is_home()){return;}
 
        if(get_theme_mod('noa_breadcrumbs',true)):
            
            $separator= ' / ';
            $blogname = get_option( 'page_for_posts' )==0 ? 'Blog': get_the_title(get_option( 'page_for_posts' ));
            $bloglink = get_option( 'page_for_posts' )==0 ? esc_url( home_url( '/' ) ) : get_permalink( get_option( 'page_for_posts' ) );
            echo '<div id="noa_breadcrumbs">';
            printf('<a href="%1$s" >%2$s</a>%3$s',home_url(),get_bloginfo('name'), $separator);
            if (!is_home()){
                /* no es el blog index.php*/
               
                if (is_category() || is_single()) {
                    /* Es category.php o es single.php por lo tanto estan dentro del blog */
                    $categories = get_the_category('');
                    
                    printf('<a href="%1$s">%2$s</a>%3$s',$bloglink,$blogname,$separator);
                    printf('<a href="%1$s" >%2$s</a>',esc_url(get_category_link($categories[0]->term_id)),esc_html($categories[0]->cat_name));
                    
                    if (is_single()) {
 
                        /* Es solo single.php , imprimimos el titulo del post y el separador*/
                        the_title($separator,'');
                    }
                } elseif (is_page()) {
                    /* Es page.php , imprimimos el nombre de la pagina*/
                    the_title();
                }
            }else{
                /* Es el blog index.php, imprimimos el inicio con el nombre del blog*/
               
                printf('<a href="%1$s" >%2$s</a>',$bloglink,$blogname);
            }
            echo '</div>';
        endif;
    }
 
    add_action( 'noa_action_breadcrumbs','noa_breadcrumbs');
endif;

