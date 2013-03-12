<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title(''); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/html5shiv.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/respond.min.js"></script>
<![endif]-->
<?php $typefaces = get_field('typography', 'options'); if ($typefaces == 'Sans-serif') { echo "<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>"; } elseif ($typefaces == 'Serif') { echo "<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic' rel='stylesheet' type='text/css'>";} else { echo "<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>"; } ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="row">
			<div class="large-12 columns">
				<h1><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
				<nav class="main-nav" role="navigation">
					<?php create_main_nav(); ?>
				</nav>
			</div>
		</div>
	</header>