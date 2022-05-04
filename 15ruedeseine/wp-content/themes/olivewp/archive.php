<?php
/**
 * The template for displaying archive pages
 *
 * @package OliveWP Theme
 */

get_header();
if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        do_action( 'olivewp_breadcrumbs_hook' );
}
else {
    do_action( 'olivewp_plus_breadcrumbs_hook' );
}
?>

<section class="page-section-space blog bg-default" id="content">
    <div class="spice-container<?php echo esc_html(olivewp_container_width_post_layout());?>">
        <div class="spice-row">
            <?php
            if ( is_active_sidebar( 'sidebar-1' ) ):        
                echo '<div class="spice-col-2">';
            else:
                echo '<div class="spice-col-1">';   
            endif; 

            if (have_posts()): 
                while (have_posts()): the_post();
                    if(! function_exists( 'olivewp_plus_activate' ) ) {
                        get_template_part( 'template-parts/content');
                    }
                    else {
                        include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/content.php');
                    }
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;

            // pagination
            do_action('olivewp_page_navigation');
            ?>		
            </div>	
            <?php get_sidebar();?>
        </div>
    </div>
</section> 

<?php
get_footer();