<?php
get_header();
?>
<div class="container">
	<h5 class="page-header">Your Search Results</h5>
	<?php get_search_form();?>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="row valign-wrapper">
			<?php $term = get_the_terms($post,'faculty');?>
        	<div class="col s2">
					<?php
        $postType = get_post_type_object(get_post_type());
        $postname;
        if ($postType) {
            $postname = $postType->labels->singular_name;
        }
        ?>
        			<a href="<?php the_permalink();?>">
      				<?php if($postname == 'Project'||$postname=='Testimonial'||$postname=='Post') : ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>"
				class="responsive-img" alt="" />
					<?php else : ?>
					<img src="<?php echo z_taxonomy_image_url($term[0]->term_id);?>"
				alt="" class="responsive-img">
					<?php endif;?>
					</a>
		</div>
		<div class="col s10">
			<h5>
				<a href="<?php the_permalink(); ?>" class="txt-primary"><?php the_title(); ?></a>
			</h5>
			<p><?php  the_excerpt(); ?></p>
		</div>
	</div>
            <?php endwhile; ?>
            <?php else : ?>
            <?php _e('sorry, nothing found for your search query. Please try again');?>
			<?php endif;?>
</div>



<?php get_footer(); ?>