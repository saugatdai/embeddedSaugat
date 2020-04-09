<?php

// awesome semantic comment

	function better_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		}

		?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
			<div class="row">
				<div class="col m1 s12">
				<?php echo get_avatar( $comment, 65); ?>
			</div>
			<div class="col m11 s12" role="complementary">
				<h5 class="txt-primary display-name">
					<?php comment_author(); ?>
				</h5>
				<time class="txt-warning" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <?php comment_time() ?></time>
				<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
			</div>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="row">
					<div>
						<p class="italic txt-danger italic-text">This comment is awaiting moderation.</p>
					</div>
				</div>	
			<?php endif; ?>
			<div class="row" itemprop="text">
				<div class="col s12">
					<?php comment_text() ?>
					<div>
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				</div>
			</div>
		<?php }

	// end of awesome semantic comment

	function better_comment_close() {
		echo '</article>';
}

wp_list_comments('callback=better_comment&end-callback=better_comment_close&style=ol'); ?>




