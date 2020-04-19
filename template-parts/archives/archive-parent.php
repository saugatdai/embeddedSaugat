<!-- Pre pagination task goes here -->
<?php
$taxonomy = get_queried_object()->taxonomy;
$term = get_queried_object()->term_id;
$childrens = get_term_children($term, $taxonomy);
$child_count = count($childrens);
rsort($childrens);
?>

<?php
    
    // Pagination
    //
    // **************************
    $page_operator = ! empty($_GET['cpage']) ? (int) $_GET['cpage'] : 1;
    $total = $child_count; // total items in array
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
    $childrens = array_slice($childrens, $offset, $limit);
    ?>




<section class="container courses">
	<div class="row">
	<?php for($i = 0; $i < count($childrens); $i++) : $term = get_term_by('id', $childrens[$i], $taxonomy);?>
		<div class="col s12 m4">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div
					class="card-content halfincreasetext txt-primary breathe grey lighten-2">
						<?php echo $term->name;?></div>
				<div class="row valign-wrapper">
					<div class="col s5">
						<img src="<?php echo z_taxonomy_image_url($term->term_id);?>"
							alt="" class="responsive-img">
					</div>
					<div class="col s7">
						<div class="courseContent">
							<span class="black-text"> <?php echo $term->description; ?></span>
						</div>
						<a class="waves-effect waves-light btn danger"
							href="<?php echo get_category_link($term->term_id); ?>">View All</a>
					</div>
				</div>
				<div class="card-content breathe grey lighten-2 stickToBottom">
					Author : <a href="<?php bloginfo('url');?>" class="txt-danger">Saugat
						Sigdel</a>
				</div>
			</div>
		</div>
<?php endfor;?>
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