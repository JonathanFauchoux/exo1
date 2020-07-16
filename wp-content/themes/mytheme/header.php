<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!--<title><?php bloginfo('name'); ?> - <?php the_title(); ?></title>-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if(function_exists('wp_body_open')):
		wp_body_open();
	endif; 
	?>
	<div class="page container content">
		<header class="hero is-dark">
			
			<div class="hero-body">
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/assets/logo-cepegra.jpg" alt="logo du site"></div>
			<div class="title-grp">

			<h1 class="title"><?php bloginfo('name'); ?></h1>
				<h2 class="slogan title"><?php bloginfo('description'); ?></h2>
			</div>
                
			</div>
			
			<nav class="nav">
				
				<?php
				$args = array(
					"theme_location" => "nav",
					"container" => "ul",
					"menu_class" => "navbar-brand",
					'add_li_class'  => 'navbar-item',
					'depth' => "1"
				);
				wp_nav_menu($args); ?>
			</nav>
		</header>