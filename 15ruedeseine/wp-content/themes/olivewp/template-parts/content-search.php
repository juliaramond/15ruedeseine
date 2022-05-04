<?php
/**
 * Template part for displaying results in search pages
 *
 * @package OliveWP Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> >
	<!-- Post Featured Image -->
	<?php if(has_post_thumbnail()): ?>
		<figure class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" >
				<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
			</a>					
		</figure>
	<?php endif; ?>
	
	<div class="post-content">

        <!-- Entry Meta --> 
		<div class="entry-meta">	
			<!-- Post Date -->	
			<span class="date">	
				<i class="far fa-clock"></i>
				<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','olivewp'); ?>">
				   <time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
				</a>
			</span>

			<!-- Post Category -->
			<?php if ( has_category() ) :
				echo '<span class="cat-links"><i class="far fa-folder-open"></i>'; 
				the_category( ', ' );
				echo '</span>';
			endif; ?>

			<!-- Post Comment -->
			<span class="comments-link">
				<i class="far fa-comment-alt"></i>
	     		<a href="<?php the_permalink(); ?>#respond" alt="<?php esc_attr_e('Comments','olivewp'); ?>">
	     			<?php echo esc_html(get_comments_number()); ?>&nbsp;<?php echo esc_html__('Comments','olivewp'); ?>
		     	</a>
	     	</span>
		</div>
		
		<!-- Post Title -->
		<header class="entry-header">
			<h3 class="entry-title">
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h3>                                                  
		</header>

		<!-- Post Content -->
		<div class="entry-content">
			<?php do_action( 'olivewp_post_content_data' );?>
			<div class="spice-seprator"></div>
			<div class="footer-meta entry-meta">
				<i class="far fa-user"></i>
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><span class="author"><?php echo esc_html(get_the_author());?></span></a>
			</div>
			<?php $olivewp_button_show_hide=get_theme_mod('olivewp_blog_content','excerpt');
			if($olivewp_button_show_hide=="excerpt")
			{	?>
				<a href="<?php echo esc_url(get_the_permalink());?>" class="more-link"><?php esc_html_e('Read More','olivewp');?><i class="fas fa-chevron-right"></i></a>
			<?php } ?>
		</div>
	</div>
</article>
