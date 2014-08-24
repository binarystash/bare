<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>

		<div id="main" class="outer">

			<div id="header" class="outer">
				<div class="inner">
					<div class="unreset">
						<h1><?php echo bloginfo("name") ?></h1>
					</div>
					<?php
						wp_nav_menu( array(
							'theme_location'=>'primary',
							'menu_id'=>'nav'
						));
					?>
					<div class="clearfix"></div>
				</div>
			</div>

			<?php if ( !is_home() ) : ?>

				<div id="inner-page" class="outer">
					<div class="inner">

			<?php endif ?>