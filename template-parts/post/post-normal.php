<div class="row">
	<div class="col m9 push-m3 s12">
		<div class="center-align">
			<img class='responsive-img'
				src="<?php echo get_the_post_thumbnail_url() ;?>" />
		</div>
		<?php the_content();?>
	</div>
	<div class="col m3 pull-m9 s12">
		<ul class="collection with-header">
			<li class="collection-header white-text center-align primary"><h6><?php echo "Life Blogs";?></h6></li>
<?php
$cats = get_the_category();
$args = [
    'post_type' => 'post',
    'order_by' => 'date',
    'order' => 'Desc',
    'category_name' => $cats[0]->slug
];
$query = new Wp_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        echo "<a href='" . get_the_permalink() . "' class='collection-item";
        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (get_the_permalink() == $url) {
            echo " active";
        }
        echo "'>" . get_the_title() . "</a>";
    }
}
wp_reset_postdata();
?>
</ul>
	</div>
</div>