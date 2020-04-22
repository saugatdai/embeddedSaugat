<section class="wideBackground">
	<div class="container">
		<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<h3 class="white-text center-align"><?php the_title();?></h3>
		<div class="white-text center-align"><?php the_content();?></div>
		<?php endwhile; ?>	
		<?php endif;?>	
	</div>
</section>
<?php get_search_form(); ?>
<?php
// query for recent courses
$postcount = 0;
$arr = [
    'taxonomy' => 'faculty',
    'hide_empty' => true,
    'orderby' => 'term_id',
    'order' => 'DESC',
    'number' => '2',
    'hierarchical' => false
];
// Two term objects are in this array
$terms = get_terms($arr);
$blogs = [];
// query for two life blogs
// WP_Query arguments
$args = array(
    'post_type' => array(
        'post'
    ),
    'order' => 'DESC',
    'orderby' => 'date',
    'category_name' => 'life-blog',
    'posts_per_page' => '2'
);

// The Query
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $blogs['life-blog' . $postcount]['link'] = get_permalink();
        $blogs['life-blog' . $postcount]['image'] = get_the_post_thumbnail_url(null, 'large');
        $blogs['life-blog' . $postcount]['title'] = get_the_title();
        $blogs['life-blog' . $postcount]['excerpt'] = get_the_excerpt();
        // separating the dates
        $date = date("d M Y", strtotime(get_the_date()));
        $blogs['life-blog' . $postcount]['date'] = substr($date, 0, 2);
        $blogs['life-blog' . $postcount]['month'] = substr($date, 3, 3);
        // getting post ID
        $comments_count = wp_count_comments(get_the_id());
        $blogs['life-blog' . $postcount]['comments'] = $comments_count->approved;
        
        ++ $postcount;
    }
}

$postcount = 0;

$args = array(
    'post_type' => array(
        'post'
    ),
    'order' => 'DESC',
    'orderby' => 'date',
    'category_name' => 'technical-blog',
    'posts_per_page' => '2'
);

// The Query
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $blogs['technical-blog' . $postcount]['link'] = get_permalink();
        $blogs['technical-blog' . $postcount]['image'] = get_the_post_thumbnail_url();
        $blogs['technical-blog' . $postcount]['title'] = get_the_title();
        $blogs['technical-blog' . $postcount]['excerpt'] = get_the_excerpt();
        // separating the dates
        $date = date("d M Y", strtotime(get_the_date()));
        $blogs['technical-blog' . $postcount]['date'] = substr($date, 0, 2);
        $blogs['technical-blog' . $postcount]['month'] = substr($date, 3, 3);
        // getting post ID
        $comments_count = wp_count_comments(get_the_id());
        $blogs['technical-blog' . $postcount]['comments'] = $comments_count->approved;
        
        ++ $postcount;
    }
}
?>


<section class="container courses">
	<div class="row">
		<div class="col m4 hide-on-small-only">
			<h5>Recent Courses</h5>
			<div class="card-panel grey lighten-5 z-depth-1">
				<div
					class="card-content halfincreasetext txt-primary breathe grey lighten-2">
						<?php echo $terms[0]->name;?></div>
				<div class="row valign-wrapper">
					<div class="col s4">
						<img src="<?php echo z_taxonomy_image_url($terms[0]->term_id);?>"
							alt="" class="responsive-img">
					</div>
					<div class="col s8">
						<div class="courseContent">
							<span class="black-text"> <?php echo $terms [0]->description; ?></span>
						</div>
						<a class="waves-effect waves-light btn danger"
							href="<?php echo get_category_link($terms[0]->term_id); ?>">View
							All</a>
					</div>
				</div>
				<div class="card-content breathe grey lighten-2 stickToBottom">
					Author : <a href="<?php bloginfo('url');?>" class="txt-danger">Saugat
						Sigdel</a>
				</div>
			</div>
		</div>
		<div class="col m8 hide-on-small-only blogs">
			<h5>Recent Blogs</h5>
			<div class="row">
				<div class="col m6">
					<div class="card small">
						<div class="card-image">
							<a href="<?php echo $blogs['life-blog0']['link'];?>"><img
								src="<?php echo $blogs['life-blog0']['image'];?>"
								class="responsive-img"></a>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col m4 blog-info">
									<div
										class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['life-blog0']['date'];?></div>
									<div
										class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['life-blog0']['month'];?></div>
									<div
										class="blog-panel-row info txt-danger halfincreasetext center-align">
										<i class="material-icons">mode_comment</i><?php echo $blogs['life-blog0']['comments']; ?>
										</div>
								</div>
								<div class="col m8">
									<a href="<?php echo $blogs['life-blog0']['link'];?>"><span
										class="halfincreasetext txt-primary"><?php echo $blogs['life-blog0']['title'];?></span></a>
									<p><?php echo $blogs['life-blog0']['excerpt'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col m6">
					<div class="card small">
						<div class="card-image">
							<a href="<?php echo $blogs['life-blog1']['link'];?>"><img
								src="<?php echo $blogs['life-blog1']['image'];?>"
								class="responsive-img"></a>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col m4 blog-info">
									<div
										class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['life-blog1']['date'];?></div>
									<div
										class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['life-blog1']['month'];?></div>
									<div
										class="blog-panel-row info txt-danger halfincreasetext center-align">
										<i class="material-icons">mode_comment</i><?php echo $blogs['life-blog1']['comments']; ?>
										</div>
								</div>
								<div class="col m8">
									<a href="<?php echo $blogs['life-blog1']['link'];?>"> <span
										class="halfincreasetext txt-primary"><?php echo $blogs['life-blog1']['title'];?></span></a>
									<p><?php echo $blogs['life-blog1']['excerpt'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col m4 hide-on-small-only">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div
					class="card-content halfincreasetext txt-primary breathe grey lighten-2">
						<?php echo $terms[1]->name;?></div>
				<div class="row valign-wrapper">
					<div class="col s4">
						<img src="<?php echo z_taxonomy_image_url($terms[1]->term_id);?>"
							alt="" class="responsive-img">
					</div>
					<div class="col s8">
						<div class="courseContent">
							<span class="black-text"> <?php echo $terms [1]->description; ?></span>
						</div>
						<a class="waves-effect waves-light btn danger"
							href="<?php echo get_category_link($terms[1]->term_id); ?>">View
							All</a>
					</div>
				</div>
				<div class="card-content breathe grey lighten-2 stickToBottom">
					Author : <a href="<?php bloginfo('url');?>" class="txt-danger">Saugat
						Sigdel</a>
				</div>
			</div>
		</div>
		<div class="col m8 hide-on-small-only blogs">
			<div class="row">
				<div class="col m6">
					<div class="card small">
						<div class="card-image">
							<a href="<?php echo $blogs['technical-blog0']['link'];?>"><img
								src="<?php echo $blogs['technical-blog0']['image'];?>"
								class="responsive-img"></a>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col m4 blog-info">
									<div
										class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['technical-blog0']['date'];?></div>
									<div
										class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['technical-blog0']['month'];?></div>
									<div
										class="blog-panel-row info txt-danger halfincreasetext center-align">
										<i class="material-icons">mode_comment</i><?php echo $blogs['technical-blog0']['comments']; ?>
										</div>
								</div>
								<div class="col m8">
									<a href="<?php echo $blogs['technical-blog0']['link'];?>"> <span
										class="halfincreasetext txt-primary"><?php echo $blogs['technical-blog0']['title'];?></span></a>
									<p><?php echo $blogs['technical-blog0']['excerpt'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col m6">
					<div class="card small">
						<div class="card-image">
							<a href="<?php echo $blogs['technical-blog1']['link'];?>"><img
								src="<?php echo $blogs['technical-blog1']['image'];?>"
								class="responsive-img"></a>
						</div>
						<div class="card-content">
							<div class="row">
								<div class="col m4 blog-info">
									<div
										class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['technical-blog1']['date'];?></div>
									<div
										class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['technical-blog1']['month'];?></div>
									<div
										class="blog-panel-row info txt-danger halfincreasetext center-align">
										<i class="material-icons">mode_comment</i><?php echo $blogs['technical-blog1']['comments']; ?>
										</div>
								</div>
								<div class="col m8">
									<a href="<?php echo $blogs['technical-blog1']['link'];?>"> <span
										class="halfincreasetext txt-primary"><?php echo $blogs['technical-blog1']['title'];?></span></a>
									<p><?php echo $blogs['technical-blog1']['excerpt'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row show-on-small-only hide-on-med-and-up">
		<div class="col s12">
			<h5>Recent Courses</h5>
			<div class="card-panel grey lighten-5 z-depth-1">
				<div
					class="card-content halfincreasetext txt-primary breathe grey lighten-2">
						<?php echo $terms[0]->name; ?></div>
				<div class="row valign-wrapper">
					<div class="col s4">
						<img src="<?php echo z_taxonomy_image_url($terms[0]->term_id);?>"
							alt="" class="responsive-img">
						<!-- notice the "circle" class -->
					</div>
					<div class="col s8">
						<div class="courseContent">
							<span class="black-text"> <?php echo $terms[0]->description;?></span>
						</div>
						<a class="waves-effect waves-light btn danger"
							href="<?php echo get_category_link($terms[0]->term_id); ?>">View
							All</a>
					</div>
				</div>
				<div class="card-content breathe grey lighten-2 stickToBottom">
					Author :<a href="<?php bloginfo('url');?>" class="txt-danger">
						Saugat Sigdel</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row show-on-small-only hide-on-med-and-up">
		<div class="col s12">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div
					class="card-content halfincreasetext txt-primary breathe grey lighten-2">
						<?php echo $terms[1]->name; ?></div>
				<div class="row valign-wrapper">
					<div class="col s4">
						<img src="<?php echo z_taxonomy_image_url($terms[1]->term_id);?>"
							alt="" class="responsive-img">
						<!-- notice the "circle" class -->
					</div>
					<div class="col s8">
						<div class="courseContent">
							<span class="black-text"> <?php echo $terms[1]->description;?></span>
						</div>
						<a class="waves-effect waves-light btn danger"
							href="<?php echo get_category_link($terms[1]->term_id); ?>">View
							All</a>
					</div>
				</div>
				<div class="card-content breathe grey lighten-2 stickToBottom">
					Author :<a href="<?php bloginfo('url');?>" class="txt-danger">
						Saugat Sigdel</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row show-on-small-only hide-on-med-and-up">
		<div class="col s12">
			<h5>Recent Blogs</h5>
			<div class="card small">
				<div class="card-image">
					<a href="<?php echo $blogs['life-blog0']['link'];?>"><img
						src="<?php echo $blogs['life-blog0']['image'];?>"
						class="responsive-img"></a>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col s4 blog-info">
							<div
								class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['life-blog0']['date'];?></div>
							<div
								class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['life-blog0']['month'];?></div>
							<div
								class="blog-panel-row info txt-danger halfincreasetext center-align">
								<i class="material-icons">mode_comment</i><?php echo $blogs['life-blog0']['comments'];?>
								</div>
						</div>
						<div class="col s8">
							<a href="<?php echo $blogs['life-blog0']['link'];?>"> <span
								class="halfincreasetext txt-primary"><?php echo $blogs['life-blog0']['title'];?></span></a>
							<p><?php echo $blogs['life-blog0']['excerpt'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row show-on-small-only hide-on-med-and-up">
		<div class="col s12">
			<div class="card small">
				<div class="card-image">
					<a href="<?php echo $blogs['technical-blog0']['link'];?>"><img
						src="<?php echo $blogs['technical-blog0']['image'];?>"
						class="responsive-img"></a>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col s4 blog-info">
							<div
								class="blog-panel-row primary white-text halfincreasetext center-align"><?php echo $blogs['technical-blog0']['date'];?></div>
							<div
								class="blog-panel-row danger white-text halfincreasetext center-align"><?php echo $blogs['technical-blog0']['month'];?></div>
							<div
								class="blog-panel-row info txt-danger halfincreasetext center-align">
								<i class="material-icons">mode_comment</i><?php echo $blogs['technical-blog0']['comments'];?>
								</div>
						</div>
						<div class="col s8">
							<a href="<?php echo $blogs['technical-blog0']['link'];?>"> <span
								class="halfincreasetext txt-primary"><?php echo $blogs['technical-blog0']['title'];?></span></a>
							<p><?php echo $blogs['technical-blog0']['excerpt'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php

$args = array(
    'post_type' => array(
        'project'
    ),
    'order' => 'ASC',
    'orderby' => 'date',
    'posts_per_page' => '3'
);
$query = new WP_Query($args);
?>

<section class="products primary">
	<div class="container">
		<h5 class="white-text">New Projects and Updates</h5>
		<div class="row hide-on-small-only">
		<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
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
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
<?php

$args = array(
    'post_type' => array(
        'project'
    ),
    'order' => 'ASC',
    'orderby' => 'date',
    'posts_per_page' => '2'
);
$query = new WP_Query($args);
?>
		<div class="row show-on-small-only hide-on-med-and-up">
		<?php if($query->have_posts()) : while($query->have_posts()): $query->the_post(); ?>
			<div class="col s12">
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
			<?php endwhile;?>
			<?php endif;?>
		</div>
	</div>
</section>






<style>
.wideBackground {
	background-image: url('<?php echo ' '.get_background_image();?>');
	margin-top: -7px;
}
</style>