<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Micro CMS | Do Something Great</title>
	<link rel='shortcut icon' href='<?php echo SITE_URL; ?>/assets/favicon.ico'>
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/style.css"></head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
<body>

<nav id="site-navigation" role="navigation" class="row row-center">
	<div class="column">
		<h1>
			<a href="<?php echo SITE_URL; ?>/index.php"></a>
		</h1>
		<ul class="main-menu column clearfix">
			<li><a href="<?php echo SITE_URL; ?>/index.php">Blog</a></li>
			<?php if (is_logged_in()):?>
				<li><a href="<?php echo SITE_URL; ?>/?logout=true"><i class="fas fa-unlock-alt"></i>Logout</a></li>
				<li><a href="<?php echo SITE_URL; ?>/admin"><i class="fas fa-cogs"></i>Administración</a></li>

			<?php else :?>
				<li><a href="<?php echo SITE_URL; ?>/login.php"><i class="fas fa-unlock-alt"></i>Login</a></li>
			<?php endif;?>
		</ul>
	</div>
</nav>

<div id="content" >
