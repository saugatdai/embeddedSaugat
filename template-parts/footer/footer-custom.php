<?php wp_footer(); ?>
<?php if(is_single()) : ?>
<div class="container">
	<div class="row">
		<div class="col s12">
			<?php
    
$comment_args = array(
        'title_reply' => 'Got Something To Say:',
        
        'fields' => apply_filters('comment_form_default_fields', array(
            
            'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Your Good Name <span class="txt-danger halfincreasetext">*</span>') . '</label> ' . ($req ? '<span>*</span>' : '') . 
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
            
            'email' => '<p class="comment-form-email">' . 
            '<label for="email">' . __('Your Email Please <span class="txt-danger halfincreasetext">*</span>') . '</label> ' . 
            ($req ? '<span>*</span>' : '') . 
            '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />' . '</p>',
            
            'url' => ''
        )),
        
        'comment_field' => '<p>' . 
        '<label for="comment">' . __('Let us know what you have to say: <span class="txt-danger halfincreasetext">*</span>') . '</label>' . 
        '<textarea id="comment" class="materialize-textarea" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . 
        '</p>',
        
        'comment_notes_after' => '',
        'class_submit' => 'btn waves-effect waves-light danger'
    
    );
    
    comment_form($comment_args);
    ?>
    <section class="comment-container">
    	<?php comments_template(); ?>
    </section>

<?php endif; ?>




</div>
	</div>
</div>
<footer class="page-footer">
	<div class="row">
		<div class="col m3 hide-on-small-only">
			<h5 class="white-text">My Info</h5>
			<p>Name : Saugat Sigdel</p>
			<p>Address : Homeless but lives in rent @KTM</p>
			<p>Bachelor : B.E Electronics &amp; Communication Engineering,
				Purvanchal University</p>
			<p>Masters : M.Sc Information System Engineering, Purvanchal
				University</p>
			<p>Status : Single With Big Heart</p>
		</div>
		<div class="col m6 s12">
			<h5 class="white-text">Testimonials</h5>
			<ul>
        <?php
        
        $args = [
            'post_type' => [
                'testimonial'
            ],
            'order_by' => 'date',
            'order' => 'Desc',
            'posts_per_page' => '3'
        ];
        $query = new Wp_Query($args);
        ?>
        <?php if($query->have_posts()): while($query->have_posts()): $query->the_post();?>
          <li>
					<div class="row">
						<div class="col m3 s3">
							<img src="<?php echo get_the_post_thumbnail_url();?>"
								class='responsive-img testimonial-image' />
						</div>
						<div class="col m9 s9">
							<span class="halfincreasetext"><?php the_field('testimonial_by');?></span><br />
							<span class='designation txt-danger'><?php the_field('designation');?></span><br />
							<span><?php echo get_the_content();?></span>
						</div>
					</div>
				</li>
          <?php endwhile; ?>
          <?php endif; ?>
        </ul>
		</div>
		<div class="col m3 s12">
			<h5>My Skills</h5>
			WEB 60%
			<div class="progress white">
				<div class="determinate" style="width: 60%"></div>
			</div>
			Electronics 65%
			<div class="progress white">
				<div class="determinate" style="width: 65%"></div>
			</div>
			Embedded Systems 80%
			<div class="progress white">
				<div class="determinate" style="width: 80%"></div>
			</div>
			Java 60%
			<div class="progress white">
				<div class="determinate" style="width: 60%"></div>
			</div>
			Entertainment 100%
			<div class="progress white">
				<div class="determinate red darken-2" style="width: 100%"></div>
			</div>

		</div>
	</div>
</footer>
</body>
</html>
