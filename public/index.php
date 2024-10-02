<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Pzn\BelajarMVC\App\Router;
use Pzn\BelajarMVC\Controller\HomeController;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('POST', '/', HomeController::class, 'index');

Router::add('GET', '/login', HomeController::class, 'login');
Router::add('POST', '/login', HomeController::class, 'login');

Router::add('GET', '/register', HomeController::class, 'register');
Router::add('POST', '/register', HomeController::class, 'register');

Router::add('GET', '/dashboard_buyer', HomeController::class, 'dashboard_buyer');
Router::add('POST', '/dashboard_buyer', HomeController::class, 'dashboard_buyer');

Router::add('GET', '/dashboard_seller', HomeController::class, 'dashboard_seller');
Router::add('POST', '/dashboard_seller', HomeController::class, 'dashboard_seller');

Router::add('GET', '/transaksi', HomeController::class, 'transaksi');
Router::add('POST', '/transaksi', HomeController::class, 'transaksi');


Router::add('POST', '/logout', HomeController::class, 'logout');

Router::add('GET', '/zahra', HomeController::class, 'about');

Router::run();
