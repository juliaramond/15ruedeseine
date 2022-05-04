<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
    <div class="spice-container<?php echo esc_html(olivewp_container_width_page_layout());?>">
        <div class="spice-row">	
            <?php
            if (class_exists('WooCommerce')) {

                if (is_account_page() || is_cart() || is_checkout()) {
                    echo '<div class="spice-col-' . (!is_active_sidebar("woocommerce") ? "1" : "2" ) . '">';
                } 
                else {
                    echo '<div class="spice-col-' . (!is_active_sidebar("sidebar-1") ? "1" : "2" ) . '">';
                }
            } 
            else {
                echo '<div class="spice-col-' . (!is_active_sidebar("sidebar-1") ? "1" : "2" ) . '">';
            }
            if (class_exists('WooCommerce')) {
                if (is_account_page() || is_cart() || is_checkout()) {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                } 
                else {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                }
            } 
            else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile;
            }
            ?>
        </div>	
        <?php 
        if (class_exists('WooCommerce')) {
            if (is_account_page() || is_cart() || is_checkout()) {
                get_sidebar('woocommerce');
            } 
            else {
                get_sidebar();
            }
        } 
        else {
            get_sidebar();
        } ?>
    </div>
</section>
<?php
get_footer();