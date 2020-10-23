<?php require __DIR__ . '/../../templates/header.php'; ?>
<h2>Modificar un post</h2>

<?php if ( $error ): ?>
	<div class="error">
		Error en el formulario.
	</div>
<?php endif; ?>

<?php if (isset($_GET['id-post']))  {
	$id= $_GET['id-post'];
  $post=get_post($id);
}
else {
  $error=true;
}
?>

<form action="" method="post">
	<label for="title">Título (requerido)</label>
	<input type="text" name="title" id="title" value="<?php echo htmlspecialchars( $post['title'], ENT_QUOTES ); ?>">

	<label for="excerpt">Extracto (requerido)</label>
	<input type="text" name="excerpt" id="excerpt" value="<?php echo htmlspecialchars( $post['excerpt'], ENT_QUOTES ); ?>">

	<label for="content">Contenido (requerido)</label>
	<textarea name="content" id="content" cols="30" rows="30"><?php echo htmlspecialchars( $post['content'], ENT_QUOTES ); ?></textarea>

  <input type="hidden" name="id" id="id" value="<?php echo $post['id']; ?>">

	<p>
		<input type="submit" name="submit-modify-post" value="Modificar post">
	</p>
</form>
<?php require __DIR__ . '/../../templates/footer.php'; ?>
