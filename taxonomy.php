<?php
get_header();
$taxonomy = get_queried_object()->taxonomy;
$term = get_queried_object()->term_id;
$childrens = get_term_children($term, $taxonomy);
$child_count = count($childrens);
rsort($childrens);
$counter = 0;
?>



<?php if($child_count!=0) : ?>
<?php 
    get_template_part('/template-parts/archives/archive','parent');
?>


<?php else :?>
<?php get_template_part('template-parts/archives/archive','child');?>
<?php endif;?>
<?php get_footer(); ?>