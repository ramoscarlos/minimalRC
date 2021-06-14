<!DOCTYPE html>

<html lang="<?php language_attributes(); ?>">

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php if ( is_single() ) { ?> <?php } ?><?php wp_title(':',true,right); ?></title>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<?php wp_head(); ?>
</head>
<body class="<?php echo pathinfo(get_page_template_slug(), PATHINFO_FILENAME); ?>">
	<div class="header">
		<nav class="level navbar-minimal-touch is-mobile is-hidden-desktop">
			<div class="level-item has-text-centered">
				<div>
					<a href="/">
						<p class="heading">Home</p>
					</a>
				</div>
			</div>
			<div class="level-item has-text-centered">
				<div>
					<a href="/cursos/">
						<p class="heading">Cursos</p>
					</a>
				</div>
			</div>
			<div class="level-item has-text-centered">
				<div>
					<a href="/libros/">
						<p class="heading">Libros</p>
					</a>
				</div>
			</div>
			<div class="level-item has-text-centered">
				<div>
					<a href="/letrista-sublime/">
						<p class="heading">Proyectos</p>
					</a>
				</div>
			</div>
			<div class="level-item has-text-centered">
				<a href="/blog/">
						<p class="heading">Blog</p>
					</a>
			</div>
			<div class="level-item has-text-centered">
				<a href="/acerca-de/">
						<p class="heading">Acerca de</p>
					</a>
			</div>
		</nav>
	</div>