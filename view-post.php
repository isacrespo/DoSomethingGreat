<?php require('init.php'); ?>
<?php

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
else {
	redirect_to('index.php');
}

$all_posts= get_all_posts();
$post_found=false;
if (isset ($id)) {
	$post_found=get_post($id);
	if ($post_found) {
			$all_posts=[$post_found];
	}
}
?>
<?php require('templates/header.php');?>
	<div class="posts">
		<?php foreach ($all_posts as $post) { ?>
			<article class="post">
				<header>
					<h2 class="post-title"><?php echo $post['title']; ?></h2>
				</header>
				<div class="post-content">
  			     <?php echo $post['content']; ?>
				</div>
				<footer>
					<span class="post-date">
						Publicada en:
						<?php echo strftime('%d %b %Y',strtotime($post['published_on'])); ?>
					</span>
				</footer>
			</article> <?php
		} ?>
	</div>
	<?php require('templates/footer.php'); ?>
