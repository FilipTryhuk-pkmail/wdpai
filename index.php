<?php

require 'Routing.php';

$path = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('history', 'DefaultController');

Routing::run($path);

