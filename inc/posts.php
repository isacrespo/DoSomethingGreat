<?php

function get_all_posts () {
  global $app_db;
  $result = $app_db->query("SELECT * FROM posts");
  return $app_db->fetch_all($result);
    // Si no ponemos MYSQLI_ASSOC nos devuelve un array numérico, de esta forma nos devuelve
    // un array asociativo
}

function insert_post($favorito,$title,$excerpt,$content) {
  global $app_db;
  $published_on= date('Y-m-d H:i:s');

  if ($favorito==1) {
    $fav=1;
  }
  else {
    $fav=0;
  }

  $title = $app_db->real_escape_string($title);
  $excerpt = $app_db->real_escape_string($excerpt);
  $content = $app_db->real_escape_string($content);

  $query= "INSERT INTO posts (fav,title,excerpt,content,published_on)
  VALUES ($fav, '$title', '$excerpt', '$content', '$published_on')";

  $result = $app_db->query ($query);
}

function update_post($id, $title, $excerpt, $content) {
  global $app_db;
  $published_on= date('Y-m-d H:i:s');

  $id_post=intval($id);
  $title = $app_db->real_escape_string($title);
  $excerpt = $app_db->real_escape_string($excerpt);
  $content = $app_db->real_escape_string($content);

  $query= "UPDATE posts SET title='$title', excerpt='$excerpt', content='$content', published_on='$published_on'
  WHERE id=$id_post";

  $result = $app_db->query ($query);
}

function get_post ($post_id){
  global $app_db;
  $post_id = intval($post_id);
  $query="SELECT * FROM posts WHERE id=".$post_id;
	$result= $app_db->query($query);

  return $app_db->fetch_assoc($result); //Devuelve el primer resultado de la última query
}

function get_post_favs (){
  global $app_db;
  $query="SELECT * FROM posts WHERE fav=1";
	$result= $app_db->query($query);

  return $app_db->fetch_all($result);
}

function delete_post ($id) {
  global $app_db;
  $id = intval($id);
  $result= $app_db->query ("DELETE FROM posts WHERE id=$id");
}

function fav_post($id, $fav_condition) {
  global $app_db;
  $id = intval($id);
  $fav=boolval($fav_condition);

  if ($fav) {
    $result= $app_db->query ("UPDATE posts SET fav=0 WHERE id=$id");
  }
  else {
    $result= $app_db->query ("UPDATE posts SET fav=1 WHERE id=$id");
  }
}
