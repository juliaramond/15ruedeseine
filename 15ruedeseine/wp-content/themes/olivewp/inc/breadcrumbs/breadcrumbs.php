<?php
/**
 * theme breadcurmbs section
 *
 * @package OliveWP Theme
*/
if (!function_exists('olivewp_breadcrumbs')):

	function olivewp_breadcrumbs() { ?>

		<section class="page-title-section" <?php if( get_header_image() ){ ?> style="background:#17212c url('<?php header_image(); ?>'); background-size: cover;" <?php } ?> >
			<div class="breadcrumb-overlay"></div>
			<div class="spice-container">
				<div class="spice-row">
					<div class="spice-col-3">
					  	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					  	if (is_home() || is_front_page()) { 
			            	if( get_option('show_on_front') =='page') {
			                	if(is_front_page()) { ?>
			                		<div class="page-title php8">
										<h1><?php echo esc_html(get_the_title( get_option('page_on_front', true) )); ?></h1>
									</div>
			                	<?php }
			                	elseif(is_home()) { ?>
			                        <div class="page-title">
			                            <h1><?php echo esc_html(get_the_title( get_option('page_for_posts', true) )); ?></h1>
			                        </div>          
			                    <?php
			                    }
			                }
			                else if(get_option('show_on_front')=='posts') { ?>
			                    <div class="page-title">
			                        <h1><?php echo wp_kses_post(get_theme_mod('blog_page_title_option', __('Home', 'olivewp' ))); ?></h1>
			                    </div>
			            	<?php
			            	} 
			            }
			            else { ?>
			            	<div class="page-title">
			            		<?php if (is_search()){
			            			 echo '<h1>'. get_search_query() .'</h1>';
			                    }
			                    else if(is_404()) {
			                        echo '<h1>'. esc_html__('Error 404','olivewp' ) .'</h1>';  
			                    }
			                    else if(is_category()) {
			                        echo '<h1>'. ( esc_html__('Category:&nbsp;','olivewp' ).single_cat_title( '', false ) ) .'</h1>';   
			                    }
			                    else if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) { 
			                        if ( class_exists( 'WooCommerce' ) ) {
			                            if(is_shop()) { ?>
			                            	<h1><?php woocommerce_page_title(); ?></h1>
			                            <?php }   
									}
									// For spice portfolio plugin
									if(class_exists('Spice_Portfolio')) {
										if(get_the_taxonomies('','sp_portfolio_categories') && !is_shop() ) {
											echo '<h1>'. ( esc_html__('Category:&nbsp;','olivewp' ).single_cat_title( '', false ) ) .'</h1>';
										}
									}
			                    }
			                    else if( is_tag() ) {
			                        echo '<h1>'. ( esc_html__('Tag:&nbsp;','olivewp' ) .single_tag_title( '', false ) ) .'</h1>';
			                    }
			                    else if(is_archive()) {   
			                    	the_archive_title( '<h1>', '</h1>' );
			                    }
			                    else { ?>
			                		<h1><?php the_title(''); ?></h1>
			            		<?php }
			                ?>
			                </div>
			            <?php }
						?>
					</div>
					<?php
			        if ( function_exists('yoast_breadcrumb') ) {
			            $seo_bread_title = get_option('wpseo_titles');
			            if($seo_bread_title['breadcrumbs-enable'] == true) {
			            	echo '<div class="spice-col-3">';
			                echo '<ul class="page-breadcrumb">';
			                echo '<li>';
			                $breadcrumbs = yoast_breadcrumb("","",false);
			                echo wp_kses_post($breadcrumbs);
			                echo '</li></ul></div>';
			            }   
			        }?>
			    </div>
			</div>
		</section>
	<?php
	}

	add_action('olivewp_breadcrumbs_hook','olivewp_breadcrumbs');

endif;