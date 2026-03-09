<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->match(['get', 'post'], 'news/create', 'News::create');
$routes->match(['get', 'post'], 'news/update', 'News::update');
$routes->match(['get', 'post'], 'news/delete', 'News::delete');

$routes->get('/', 'Home::index');
$routes->get('news/update', 'News::update/$1');
$routes->get('news/delete', 'News::delete/$1');
$routes->get('news/overview', 'News::view/$1');
$routes->get('news', 'News::index');
$routes->get('(:any)', 'Pages::view/$1');
