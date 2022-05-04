<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
                        include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/content.php' );
                    }
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;

            // pagination
            if ( ! function_exists( 'olivewp_plus_activate' ) ) {
                do_action('olivewp_page_navigation');
            }
            else {
                do_action('olivewp_plus_page_navigation');
            }
            ?>
        </div>
        <!-- Sidebar -->   
        <?php get_sidebar();?>
    </div>
</section>  
<?php
get_footer();