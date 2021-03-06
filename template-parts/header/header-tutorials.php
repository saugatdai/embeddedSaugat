<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <?php wp_head() ?>
  <title><?php wp_title();?></title>
</head>
<body>
	<header id="container">
		<nav class="grey lighten-4">
			<div class="nav-wrapper transparent">
				<a href="<?php bloginfo('url');?>" class="brand-logo left grey-text"><?php bloginfo('name')?></a>
				<a href="#" data-activates="mobile-demo"
					class="right show-on-small-only grey-text hide-on-med-and-up button-collapse"><i
					class="material-icons">menu</i></a>

            <?php
            
            $args = [
                'menu' => 'menu2',
                'menu_class' => 'right hide-on-small-only',
                'menu_id' => '',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'fallback_cb' => false,
                'depth' => 0,
                'walker' => new Materialize_Walker_Nav_Menu(),
                'theme_location' => 'main-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ];
            wp_nav_menu($args);
            
            $args = [
                'menu' => 'menu1',
                'menu_class' => 'side-nav',
                'menu_id' => 'mobile-demo',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'fallback_cb' => false,
                'depth' => 0,
                'walker' => new Materialize_Walker_Nav_Menu(),
                'theme_location' => 'main-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ];
            wp_nav_menu($args);
            
            ?>

          </div>
		</nav>
		<?php

$taxonomy = get_queried_object()->taxonomy;
$term = get_queried_object()->term_id;
$childrens = get_term_children($term, $taxonomy);
$child_count = count($childrens);
?>
<?php if($child_count != 0):?>
		<img
			src="<?php echo z_taxonomy_image_url(get_queried_object()->term_id);?>"
			class="responsive-img tutorials" alt='tutorials' />

<?php endif;?>
	</header>
	<div class="page-header">
		<?php get_search_form(); ?>
	</div>
