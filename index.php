<?php

require 'Routing.php';

$path = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('history', 'DefaultController');
Routing::post('login_2', 'SecurityController');
Routing::post('wishlist', 'WishlistController');
Routing::post("books", "BookController");
Routing::post('register', 'SecurityController');
Routing::post('search', 'BookController');
Routing::post('logout', 'DefaultController');
Routing::post('security', 'DefaultController');
Routing::run($path);

