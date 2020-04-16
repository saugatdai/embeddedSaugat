<?php /* Template Name: Testimonials */ ?>
<?php get_header(); ?>
<section class="container">
<?php


global $post;
$args = [
    'post_type' => 'testimonial',
    'order_by' => 'date',
    'order' => 'DESC',
];
$myposts = get_posts($args);
$post_count = count($myposts);

// Pagination
//
// **************************
$page_operator = ! empty($_GET['cpage']) ? (int) $_GET['cpage'] : 1;
$total = $post_count; // total items in array
$limit = 12; // per page
$totalPages = ceil($total / $limit); // calculate total pages
$page_operator = max($page_operator, 1); // get 1 page when $_GET['cpage'] <= 0
$page_operator = min($page_operator, $totalPages); // get last page when $_GET&#91;'cpage'&#93; > $totalPages
$offset = ($page_operator - 1) * $limit;
if ($offset < 0)
    $offset = 0;
    // **************************
    //
    // Pagination
    //
    // **************************
    // offset array
    $myposts = array_slice($myposts, $offset, $limit);
?>
	<h5 class="page-header">My Projects</h5>
	<?php get_search_form();?>
	<div class="row">
		<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<div class="col m4">
				<div class="card small">
					<div class="card-image waves-effect waves-block waves-red">
						<img class="activator image-responsive"
							src="<?php echo get_the_post_thumbnail_url();?>">
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4"><?php the_title();?><i
							class="material-icons right">more_vert</i> </span>
						<p>
							Price : <span class="txt-primary"><?php the_field('price');?> /-</span><br />
							<span class="grey-text"><?php echo get_the_date();?></span>
						</p>
					</div>
					<div class="card-reveal red white-text">
						<span class="card-title txt-info"><?php the_title();?><i
							class="material-icons right">close</i> </span>
						<p><?php the_excerpt();?></p>
						<br /> <a href="<?php the_permalink();?>" class='txt-success'>Read
							More</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
	</div>
	<?php 
	// Show pagination here
	if($totalPages > 1){
	    $arr_params = array ('cpage' => '%#%');
	    $customPagHTML     =  '<ul class="pagination center-align">'.paginate_links( array(
	        'base' => add_query_arg( $arr_params ),
	        'format' => '',
	        'prev_text' => __('<i class="material-icons">chevron_left</i>'),
	        'next_text' => __('<i class="material-icons">chevron_right</i>'),
	        'total' => $totalPages,
	        'current' => $page_operator,
	        'before_page_number'=>'<li class="waves-effect">',
	        'after_page_number'=>'</li>'
	    )).'</ul>';
	    echo $customPagHTML;
	}
	?>
</section>
<?php get_footer();?>