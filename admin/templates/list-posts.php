<?php require __DIR__ . '/../../templates/header.php'; ?>

<?php if ( isset( $_GET['success'] ) ): ?>
	<div class="success">
		El post ha sido creado
	</div>
<?php elseif (isset($_GET['modify'])) : ?>
	<div class="success">
		El post ha sido modificado
	</div>
<?php endif; ?>

<table>
	<h3>Administración > Mantenimiento del Listado de posts</h3>
	<?php foreach ( $all_posts as $post ): ?>
		<tr>
			<td><?php echo $post['title']; ?></td>
			<?php if ($post['fav']): ?>
				<td><a href="<?php echo SITE_URL . '/admin?action=list-posts&fav-post=' . $post['id'] .'&condition-post='.$post['fav'] ?>"><i class="fas fa-star"></i></a></td>
			<?php else: ?>
				<td><a href="<?php echo SITE_URL . '/admin?action=list-posts&fav-post=' . $post['id'] .'&condition-post='.$post['fav'] ?>"><i class="far fa-star"></i></a></td>
			<?php endif; ?>
			<td><a href="<?php echo SITE_URL . '/view-post.php?id=' . $post['id'] ?>">Ver</a></td>
			<td><a href="<?php echo SITE_URL . '/admin?action=modify-post&id-post=' . $post['id'] ?>">Modificar</a></td>
			<td><a href="<?php echo SITE_URL . '/admin?action=list-posts&delete-post=' . $post['id'] ?>&hash=<?php echo generate_hash( 'delete-post-' . $post['id'] ); ?>">Borrar</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php require __DIR__ . '/../../templates/footer.php'; ?>
