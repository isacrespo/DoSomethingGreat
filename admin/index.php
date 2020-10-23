<?php

require '../init.php';

if ( ! is_logged_in() ) {
	redirect_to( 'login.php' );
}

$action = isset( $_GET['action'] ) ? $_GET['action'] : '';

switch ( $action ) {
	case 'list-posts': {
		if ( isset( $_GET['delete-post'] ) ) {
			$id = $_GET['delete-post'];
			if ( ! check_hash( 'delete-post-' . $id, $_GET['hash'] ) ) {
				die( 'Hackeando, no?' );
			}

			delete_post( $id );
			redirect_to( 'admin?action=list-posts' );
			die();
		}

		if ( isset( $_GET['fav-post'] ) ) {
			$id = $_GET['fav-post'];
			$condition = $_GET['condition-post'];
			fav_post( $id, $condition );
			redirect_to( 'admin?action=list-posts' );
			die();
		}

		$all_posts = get_all_posts();
		require 'templates/list-posts.php';
		break;
	}
	case 'new-post': {
		$error = false;
		$title = '';
		$excerpt = '';
		$content = '';
		$favorito = false;

		if ( isset( $_POST['submit-new-post'] ) ) {
			// Se ha enviado el formulario
			$title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
			$excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING );
			$content = strip_tags( $_POST['content'], '<br><p><a><img><div>' );
			$favorito= filter_input(INPUT_POST, 'favorito');

			if ( empty( $title ) || empty( $excerpt ) || empty( $content )) {
				$error = true;
			}
			else {
				insert_post( $favorito, $title, $excerpt, $content );
				// Redirigir al blog
				redirect_to( 'admin?action=list-posts&success=true' );
			}
		}

		require 'templates/new-post.php';
		break;
	}
	case 'modify-post': {
		$error = false;
		$title = '';
		$excerpt = '';
		$content = '';
		$id='';

		if ( isset( $_POST['submit-modify-post'] ) ) {
			// Se ha enviado el formulario
			$title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
			$excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING );
			$content = strip_tags( $_POST['content'], '<br><p><a><img><div>' );
			$id = filter_input(INPUT_POST, 'id');

			if ( empty( $title ) || empty( $excerpt ) || empty( $content )) {
				$error = true;
			}
			else {
				update_post( $id, $title, $excerpt, $content );
				// Redirigir al blog
				redirect_to( 'admin?action=list-posts&modify=true' );
			}
		}

		require 'templates/modify-post.php';
		break;
	}
	default: {
		require 'templates/admin.php';
	}
}
