<?php
include "../app/config.php";

// create account handler

// insert user
if($_POST['unique-key'] == $app->get_setting('site.unique-key')){
    $user_id = $app->sql->insert(
        "users",
        array(
            "username" => $_POST['username'],
            "user_password" => password_hash($_POST['password'],  PASSWORD_DEFAULT)
        )
    );
    $_SESSION[$app->get_setting('site.unique-key')."_username"] = $_POST['username'];
}

// redirect
header('location: https://'.$app->get_setting('site.url').'/admin/posts');
exit;