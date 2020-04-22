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
			<li class="collection-header white-text center-align primary"><h6><?php echo "Projects";?></h6></li>
<?php
$args = [
    'post_type' => 'project',
    'order_by' => 'date',
    'order' => 'DESC'
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
?>
</ul>
	</div>
</div>