<?php
include "../app/config.php";

// login handler

// get user
$user = $app->sql->selectOne('users', array('username' => $_POST['username']));

// check creds
if(password_verify($_POST['password'],$user['user_password'])){
    $_SESSION[$app->get_setting('site.unique-key')."_username"] = $_POST['username'];
    // redirect
    header('location: https://'.$app->get_setting('site.url').'/admin/posts');
}
else header('location: https://'.$app->get_setting('site.url').'/admin/login/bad');
exit;