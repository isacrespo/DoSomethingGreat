<?php require('init.php'); ?>
<?php

if (isset($_GET['delete-post'])) {
	$id=$_GET['delete-post'];
	if (! check_hash('delete-post-'.$id, $_GET['hash'])) {
		die('Hackeando, no?');
	}
	delete_post($id);
	redirect_to('index.php');
}
$all_posts= get_all_posts();
$post_found=false;
if (isset ($_GET['view'])) { //isset = si esto existe
	$post_found=get_post($_GET['view']);
	if ($post_found) {
			$all_posts=[$post_found];
	}
}
elseif (isset($_GET['favs'])) {
	$all_posts=get_post_favs();
}

?>
<?php require('templates/header.php'); ?>
	<div class="posts">
		<?php foreach ($all_posts as $post) { ?>
			<article class="post">
				<header>
					<h2 class="post-title"><a href="<?php echo SITE_URL . '/view-post.php?id=' . $post['id'] ?>"><?php echo $post['title']; ?></a></h2>
				</header>
				<div class="post-excerpt">
					<?php if (isset($post['excerpt'])): ?>
						<?php echo $post['excerpt']; ?>
					<?php else : ?>
						<?php echo 'No se ha encontrado extracto'; ?>
					<?php endif; ?>
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
