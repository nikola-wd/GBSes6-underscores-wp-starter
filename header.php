<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/touch.png" rel="apple-touch-icon-precomposed">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_template_part( 'template-parts/main-menu', 'none' ); ?>

	<main class="main-content">
