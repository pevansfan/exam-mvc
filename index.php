<?php
require './utils/utils.php';
session_start();

if ($_SERVER['REDIRECT_URL'] === '/') {
    require 'controllers/indexCtrl.php';
} elseif ($_SERVER['REDIRECT_URL'] === '/login') {
    require 'controllers/loginCtrl.php';
} elseif ($_SERVER['REDIRECT_URL'] === '/logout') {
    require 'controllers/logoutCtrl.php';
} elseif ($_SERVER['REDIRECT_URL'] === '/createUser') {
    require 'controllers/createUserCtrl.php';
} elseif ($_SERVER['REDIRECT_URL'] === '/addBlog') {
    require 'controllers/addBlogCtrl.php';
} else {
    require 'views/404.php';
}
