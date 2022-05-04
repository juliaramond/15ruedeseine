<?php
/**
 * Template part for displaying single post content
 *
 * @package OliveWP Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> >
	<!-- Post Featured Image -->
	<?php if(has_post_thumbnail()): ?>
		<figure class="post-thumbnail">
			<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>					
		</figure>
	<?php endif; ?>
	
	<div class="post-content">

        <!-- Entry Meta --> 
        <?php 
        if(get_theme_mod('olivewp_enable_single_post_date',true) || get_theme_mod('olivewp_enable_single_post_category',true) || get_theme_mod('olivewp_enable_single_post_comment',true)): ?>

			<div class="entry-meta">	

				<!-- Post Date -->
				<?php if(get_theme_mod('olivewp_enable_single_post_date',true)==true): ?>	
					<span class="date">
						<i class="far fa-clock"></i>
						<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','olivewp'); ?>">
						   <time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
						</a>
					</span>
				<?php endif; ?>

				<!-- Post Category -->
				<?php if(get_theme_mod('olivewp_enable_single_post_category',true)==true):
					if ( has_category() ) :
						echo '<span class="cat-links"><i class="far fa-folder-open"></i>'; 
						the_category( ', ' );
						echo '</span>';
					endif; 
				endif; ?>

				<!-- Post Comments -->
				<?php 
				if(get_theme_mod('olivewp_enable_single_post_comment',true)==true): ?>
					<span class="comments-link">
						<i class="far fa-comment-alt"></i>
			     		<a href="<?php the_permalink(); ?>#respond" alt="<?php esc_attr_e('Comments','olivewp'); ?>">
			     			<?php echo esc_html(get_comments_number()); ?>&nbsp;<?php echo esc_html__('Comments','olivewp'); ?>
				     	</a>
			     	</span>
				<?php endif; ?>
			</div>
			<div class="spice-seprator"></div>
		<?php endif;?>

		<!-- Post Title -->
		<header class="entry-header">
			<h3 class="entry-title">
				<?php the_title();?>
			</h3>                                                  
		</header>

		<!-- Post Content -->
		<div class="entry-content">
			<?php the_content();
			wp_link_pages( ); ?> 
		</div>
		<?php if(get_theme_mod('olivewp_enable_single_post_tag',true)==true):
			if(has_tag()): ?>
				<div class="spice-seprator"></div>
				<div class="footer-meta entry-meta">
					<span class="tag-links"><?php the_tags('',' ');?></span>
				</div>
			<?php endif;
		endif; ?>
	</div>
</article>