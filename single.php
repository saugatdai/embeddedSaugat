<?php get_header(); ?>
<section class="container">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="page-header">
			<?php get_search_form();?>
		</div>
		<h5><?php the_title();?></h5>
	<?php endwhile;?>
	<?php endif;?>
<?php

// $term = get_the_terms($post, 'faculty');
$type = get_post_type();
if ($type == 'lesson') {
    get_template_part('/template-parts/post/post', 'lesson');
} elseif ($type == 'project') {
    get_template_part('/template-parts/post/post', 'project');
} elseif ($type == 'post') {
    get_template_part('/template-parts/post/post', 'normal');
}
?>

</section>
<?php get_footer();?>
