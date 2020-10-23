<?php

function redirect_to($path) {
  header ('Location:'.SITE_URL.'/'.$path);
  die();
}

// función que genera un hash para comprobar que borramos lo que queremos
// y no nos hackean
function generate_hash($action){
    return md5($action);
}

// Función que comprueba si el hash de la entrada que se quiere borrar es correcto
function check_hash ($action, $hash){
  if (generate_hash($action) === $hash) {
    return true;
  }
  return false;
}

function is_logged_in() {
  // Comprueba si el usuario administrador ha hecho Login
  $is_user_logged_in = isset($_SESSION['user']) && $_SESSION['user']===ADMIN_USER;
  return $is_user_logged_in;
}

function login($username, $password) {
  if ($username === ADMIN_USER && $password === ADMIN_PASS) {
    // Si los datos están correctos
    $_SESSION['user'] = ADMIN_USER;
    return true;
  }
  return false;
}

function logout() {
    unset($_SESSION['user']); // unset borra el user de la variable de sesión
    redirect_to('index.php');
    session_destroy();
}
