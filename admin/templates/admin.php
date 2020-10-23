<?php require __DIR__ . '/../../templates/header.php'; ?>
<h2>Administración</h2>
<ul>
	<li><a href="?action=list-posts">Mantenimiento del Listado de posts</a></li>
	<li><a href="?action=new-post">Nuevo post</a></li>
	<li><a href="<?php echo SITE_URL . '/index.php?favs'; ?>">Mis posts favoritos <i class="fas fa-star"></i></a></li>
</ul>
<?php require __DIR__ . '/../../templates/footer.php'; ?>
