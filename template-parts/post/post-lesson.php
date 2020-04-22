<?php $term = get_the_terms($post, 'faculty');?>
<div class="row">
	<div class="col m9 push-m3 s12">
		<?php the_content();?>
	</div>
	<div class="col m3 pull-m9 s12">
		<ul class="collection with-header">
			 <li class="collection-header white-text center-align primary"><h6><?php echo $term[0]->name;?></h6></li>
<?php
$args = array(
    'post_type' => 'lesson',
    'sort_by' => 'date',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => $term[0]->taxonomy,
            'field' => 'slug',
            'terms' => $term[0]->slug
        )
    )
);
$chapter = '';
$query = new Wp_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        if ($chapter != get_field('chapter')) {
            $chapter = get_field('chapter');
            echo "<li class='collection-item danger'>$chapter</li>";
        } 
            echo "<a href='".get_the_permalink()."' class='collection-item";
            $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if(get_the_permalink() == $url){
                echo " active";
            }
            echo "'>".get_the_title()."</a>";
    }
    wp_reset_postdata();
} else {
    echo "no query found";
}
?>
	</ul>
	</div>
</div>