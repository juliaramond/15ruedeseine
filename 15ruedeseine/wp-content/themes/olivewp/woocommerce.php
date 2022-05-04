<?php
/**
* The template for displaying woocommerce products
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
global $woocommerce; ?>

<section class="page-section-space blog bg-default" id="content">
    <div class="spice-container<?php echo esc_html(olivewp_container_width_page_layout());?>">
        <div class="spice-row">	
            <div class="spice-col-<?php echo (!is_active_sidebar('woocommerce') ? '1' : '2' ); ?>">
                <?php woocommerce_content(); ?>
            </div>	
            <?php
            if (is_active_sidebar('woocommerce')) {
                get_sidebar('woocommerce');
            }
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>