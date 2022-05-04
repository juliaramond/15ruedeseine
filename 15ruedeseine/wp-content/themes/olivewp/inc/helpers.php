<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package OliveWP Theme
 */

/*
-------------------------------------------------------------------------------
 Table of contents 
-------------------------------------------------------------------------------*/

	# Header
	# Preloader
	# Scroll to Top
	# Enqueue file for customizer preview
	# Blog Content
	# Blog Excerpt
	# Single Post Author Details
	# Wide and Boxed Layout
	# Container Width, Logo Width & After menu Button
	# Footer Section
	# Comment Reply Box
	# Page Navigation
	# Added skip link focus
	# Container Width for Page Layout
	# Container Width for Post Layout
	# Container Width for Single Post Layout

/*
-------------------------------------------------------------------------------
 Header
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'olivewp_header_template' ) ) {

	function olivewp_header_template() {

		get_template_part( 'partials/header/layout' );

	}
	add_action( 'olivewp_header', 'olivewp_header_template' );
}

/*
-------------------------------------------------------------------------------
 Preloader
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'olivewp_preloader_feature' ) ) {

	function olivewp_preloader_feature() {
		if(get_theme_mod('preloader_enable',false)==true):?>
			<div id="preloader1" class="olivewp-loader">
		        <div class="olivewp-preloader-cube">
			        <div class="olivewp-cube1 olivewp-cube"></div>
			        <div class="olivewp-cube2 olivewp-cube"></div>
			        <div class="olivewp-cube4 olivewp-cube"></div>
			        <div class="olivewp-cube3 olivewp-cube"></div>
		    	</div> 
		    </div>
		  <?php endif;
	}
	add_action('olivewp_preloader','olivewp_preloader_feature');

}

/*
-------------------------------------------------------------------------------
 Scroll to Top
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'olivewp_scroll_to_top' ) ) {

	function olivewp_scroll_to_top() {
		$scrolltotop_enable = get_theme_mod('scrolltotop_setting_enable', true);
    	if ($scrolltotop_enable == true) { ?>
        	<div class="scroll-up custom right"><a href="#totop"><i class="fa fa-arrow-up"></i></a></div>
    	<?php }
	}
	add_action('olivewp_scrolltotop','olivewp_scroll_to_top');

}

/*
-------------------------------------------------------------------------------
 Enqueue file for customizer preview
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'olivewp_customizer_preview' ) ) {

	function olivewp_customizer_preview() {
		wp_enqueue_script( 'olivewp-customizer-preview-js', OLIVEWP_TEMPLATE_DIR_URI .'/inc/customizer/controls/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
	}
	add_action('customize_preview_init','olivewp_customizer_preview');

}

/*
-------------------------------------------------------------------------------
 Blog Content
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_post_content')) :

	function olivewp_post_content() {
        $blog_content 	= get_theme_mod('olivewp_blog_content', 'excerpt');
        $excerpt_length = get_theme_mod('olivewp_blog_content_length', 30);

        if ('excerpt' == $blog_content) {
        	$excerpt = olivewp_post_excerpt(absint($excerpt_length));
            if (!empty($excerpt)) :
                echo wp_kses_post(wpautop($excerpt));
			 endif;
        } 
        else {
            the_content();  
        }
    }
    add_action('olivewp_post_content_data','olivewp_post_content');

endif;


/*
-------------------------------------------------------------------------------
 Blog Excerpt
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_post_excerpt')) :

	function olivewp_post_excerpt($length = 0, $post_obj = null) {
        global $post;
        if (is_null($post_obj)) {
            $post_obj = $post;
        }

        $length = absint($length);
        if (0 === $length) {
            return;
        }
        $source_content = $post_obj->post_content;
        if (!empty($post_obj->post_excerpt)) {
            $source_content = $post_obj->post_excerpt;
        }
        $source_content = preg_replace('`\[[^\]]*\]`', '', $source_content);
        $trimmed_content = wp_trim_words($source_content, $length, '&hellip;');
        return $trimmed_content;
    }
    add_action('olivewp_post_excerpt_data','olivewp_post_excerpt');

endif;


/*
-------------------------------------------------------------------------------
 Blog Excerpt
-------------------------------------------------------------------------------*/
function olivewp_get_author_name($post) {

    $user_id = $post->post_author;
    if (empty($user_id)) {
        return;
    }
    $user_info = get_userdata($user_id);
    echo esc_html($user_info->display_name);
}


/*
-------------------------------------------------------------------------------
 Single Post Author Details
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_single_post_auth')) :

	function olivewp_single_post_auth() {
		global $post;
        if( !is_attachment() ): ?>
		   <article class="blog-author">
				<figure class="avatar">
			         <?php echo get_avatar( $post->post_author ); ?>
			   	</figure>
			   	<div class="blog-author-info">
					<h5 class="post-by"><?php esc_html_e( 'Written by:' , 'olivewp'  );?></h5>
			      	<h4 class="name"><?php olivewp_get_author_name( $post );?></h4>
			      	<?php
			      	$olivewp_user_data = get_user_meta( $post->post_author );
					$olivewp_user_description = $olivewp_user_data['description'][0]; 
			      	if($olivewp_user_description != '') : ?>
				      	<p class="mb-2">
				            <?php echo wp_kses_post($olivewp_user_description); ?>
			         	</p>
		         	<?php endif; ?>
			      	<p>
		      			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-default ml-1"><?php esc_html_e('View All Posts','olivewp' );?> <i class="fa fa-long-arrow-right pl-2"></i></a>
		      		</p>
			   	</div>
		   </article>
		<?php endif;
    }
    add_action('olivewp_single_post_auth_detail','olivewp_single_post_auth');

endif;


/*
-------------------------------------------------------------------------------
 Wide and Boxed Layout
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_theme_layout')) :

	function olivewp_theme_layout() {
		$olivewp_theme_layout = get_theme_mod('olivewp_layout_style', 'wide');
	    if ($olivewp_theme_layout == "boxed") {
	        $olivewp_layout_type = "boxed";
	    } 
	    else {
	        $olivewp_layout_type = "wide";
	    }?>
	    <body <?php body_class($olivewp_layout_type); ?>>
	<?php }
	add_action('olivewp_wide_boxed_layout','olivewp_theme_layout');

endif;


/*
-------------------------------------------------------------------------------
 Container Width, Logo Width & After menu Button
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_logo_container_width_menu_btn')) :

	function olivewp_logo_container_width_menu_btn() { 
		if ( ! function_exists( 'olivewp_plus_activate' ) ) { ?>
			<style>
				.page-section-space .spice-container, .section-space .spice-container {
					width: <?php echo intval( get_theme_mod('container_width','1200') );?>px;
					max-width: 100%;
				}
			</style>
		<?php } ?>
		<style>
			.custom-logo {
				width: <?php echo intval( get_theme_mod('olivewp_logo_length',235) );?>px; 
				height: auto;
			}
			body .spice.spice-custom .header-button a { 
				-webkit-border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;
				border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;
			}
		</style>
	<?php }
	add_action('wp_head','olivewp_logo_container_width_menu_btn');

endif;



/*
-------------------------------------------------------------------------------
 Footer Section
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_footer_widget_section')) :

	function olivewp_footer_widget_section() {
	    ?>
	    <footer class="site-footer bg-default bg-footer-lite">
	    	<?php

	    	 do_action('spice_sticky_footer');?>
			<div class="spice-container">	
				<?php if(is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4')): 
                 	get_template_part('partials/footer/footer-sidebar');
	            endif;?>  	
			</div>
			<?php if(get_theme_mod('footer_copyright_enable',true)==true): ?>
				<div class="site-info">
					<div class="spice-container">
						<div class="spice-row">
							<div class="spice-col-1 text-center">
								<?php $olivewp_footer_copyright = get_theme_mod('footer_copyright','<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: OliveWP by <a href="https://olivewp.org" rel="nofollow">olivewp.org</a>', 'olivewp' ).'</p>'); 
									echo wp_kses_post($olivewp_footer_copyright);
								?>
							</div>   
						</div>
					</div>
				</div>
			<?php endif;  do_action('spice_cookies'); ?>
		</footer>
	<?php }
	add_action('olivewp_footer_widgets', 'olivewp_footer_widget_section');

endif;



/*
-------------------------------------------------------------------------------
 Footer Widget Layout
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_footer_layout')) :

	function olivewp_footer_layout($layout) {

		if( $layout == 2 ) {
			$class = 'spice-col-3';
		}
		elseif( $layout == 3 ) {
			$class = 'spice-col-4';
		}
		else {
			$class = 'spice-col-5';
		}
		for($i=1; $i<=$layout; $i++)
		{
			echo '<div class="' . $class . '">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}

	}

endif;


/*
-------------------------------------------------------------------------------
 Comment Reply Box
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_comment_box')) :

	function olivewp_comment_box($comment, $args, $depth) { ?>

		<div class="comment-box">
			<span class="pull-left-comment">
			   <?php echo get_avatar($comment, 100, null, 'comments user', array('class' => array('img-fluid comment-img'))); ?>
			</span>
			<div class="comment-body">
				<div class="comment-detail">
				 	<h5 class="comment-detail-title"><?php esc_html(comment_author()); ?>
				 		<time class="comment-date"><?php 
				 			/* translators: %1$s: comment date and %2$s: comment time */
				 			printf(esc_html__('%1$s  %2$s', 'olivewp' ), esc_html(get_comment_date()), esc_html(get_comment_time())); ?></time>
				 	</h5>
				 	<?php comment_text(); ?>
					<div class="reply">
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?> 
				    </div>
				</div>       
			</div>      
		</div>

	<?php }

endif;


/*
-------------------------------------------------------------------------------
 Page Navigation
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_custom_navigation')) :

    function olivewp_custom_navigation() {
    	 
    	 	the_posts_pagination(array(
                'prev_text'	=> 	__( 'Previous', 'olivewp' ),
    			'next_text' => 	__( 'Next', 'olivewp' )
            ));
    }
    add_action('olivewp_page_navigation', 'olivewp_custom_navigation');

endif;



/*
-------------------------------------------------------------------------------
 Added skip link focus
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_skip_link_fn')) :

	function olivewp_skip_link_fn() { ?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
	<?php
	}
	add_action( 'wp_print_footer_scripts', 'olivewp_skip_link_fn' );

endif;



/*
-------------------------------------------------------------------------------
 Container Width for Page Layout
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_container_width_page_layout')) :

	function olivewp_container_width_page_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;


/*
-------------------------------------------------------------------------------
 Container Width for Post Layout
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_container_width_post_layout')) :

	function olivewp_container_width_post_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;


/*
-------------------------------------------------------------------------------
 Container Width for Single Post Layout
-------------------------------------------------------------------------------*/
if (!function_exists('olivewp_container_width_single_post_layout')) :

	function olivewp_container_width_single_post_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;