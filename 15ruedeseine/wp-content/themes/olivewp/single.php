<?php
/**
 * The template for displaying all single posts
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
    <div class="spice-container<?php echo esc_html(olivewp_container_width_single_post_layout());?>">
        <div class="spice-row">			
            <div class="<?php
            if ( is_active_sidebar( 'sidebar-1' ) ) { echo 'spice-col-2'; } else { echo 'spice-col-1'; } ?>">
            	<?php
                while (have_posts()): the_post();
                    get_template_part('template-parts/content', 'single');
                endwhile; 

                // Related Posts
                if(function_exists( 'olivewp_plus_activate' )):
                    if(get_theme_mod('olivewp_plus_enable_related_post', true ) === true ):
                        include(OLIVEWP_PLUGIN_DIR.'/inc/template-parts/related-posts.php');
                    endif;
                endif;

                // Author Details
                if (get_theme_mod('olivewp_enable_single_post_admin_details', true) === true):
                    do_action( 'olivewp_single_post_auth_detail' );
                endif;

                if (comments_open() || get_comments_number()) : comments_template();
                endif;
                ?>
            </div>
            <!-- Sidebar --> 
            <?php get_sidebar();?>
        </div>
    </div>
</section>
<?php
get_footer();