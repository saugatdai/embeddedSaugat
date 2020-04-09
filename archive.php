<?php get_header(); ?>
<section class="container courses">
<?php

$obj = get_queried_object();
$category = $obj->category_nicename;

global $post;
$args = [
    'post_type' => 'post',
    'category_name' => $category,
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
	<h5 class="page-header"><?php echo substr(get_the_archive_title(),10);?></h5>
	<?php get_search_form();?>
	<div class="row">
		<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<div class="col m4">
			<div class="card small">
				<div class="card-image">
					<a href="<?php echo get_the_permalink(); ?>"><img
						src="<?php echo get_the_post_thumbnail_url();?>"
						class="responsive-img"></a>
						<?php
    $date = date("d M Y", strtotime(get_the_date()));
    $day = substr($date, 0, 2);
    $month = substr($date, 3, 3);
    $comments_count = wp_count_comments(get_the_id());
    $comments = $comments_count->approved;
    ?>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col s4 blog-info">
							<div
								class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $day;?></div>
							<div
								class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $month;?></div>
							<div
								class="blog-panel-row info txt-danger halfincreasetext center-align">
								<i class="material-icons">mode_comment</i><?php echo $comments; ?>
										</div>
						</div>
						<div class="col s8">
							<a href="<?php echo get_the_permalink();?>"> <span
								class="halfincreasetext txt-primary"><?php echo get_the_title();?></span></a>
							<p><?php echo get_the_excerpt();?></p>
						</div>
					</div>
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