<?php
/**
 * Template Name: Full Width Page
 *
*/

get_header();
if ( ! function_exists( 'olivewp_plus_activate' ) ) {
        do_action( 'olivewp_breadcrumbs_hook' );
}
else {
    do_action( 'olivewp_plus_breadcrumbs_hook' );
}
?>
<section class="page-section-full bg-default" id="content">
    <?php the_post();
    if(has_post_thumbnail()) {
        if ( is_single() ) { ?>
            <figure class="post-thumbnail">
                <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>                  
            </figure>
        <?php }
        else { ?>
            <figure class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" >
                    <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
                </a>                
            </figure>
        <?php }
    }
    the_content(); ?>
</section>
<?php
get_footer();