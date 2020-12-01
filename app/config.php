<?php

// SHOW ERRORS FOR DEV
error_reporting(E_ALL & ~E_NOTICE);
ini_set('log_errors', 1);
ini_set('error_log', 'errors.log');

// dependencies
require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/Sequel.php";
require "LightBlog.php";

// initialize .env helper
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

// initialize controller
$app = new LightBlog();

session_name('light-blog-lml');
ini_set("session.gc_maxlifetime", "3600");
ini_set("session.cookie_secure", "ON");
session_start();