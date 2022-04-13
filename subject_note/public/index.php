<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'Subject Note');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@logout');
$router->get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@register');
$router->get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
$router->post('/login', '\App\Controllers\Auth\LoginController@login');

// Subject routes
$router->set404('\App\Controllers\Controller@sendNotFound');

$router->get('/', '\App\Controllers\HomesController@index');
$router->get('/home', '\App\Controllers\HomesController@index');




$router->get('/subjects/view_subject','\App\Controllers\SubjectsController@index');
$router->get('/subjects/add','\App\Controllers\SubjectsController@showAddPage');
$router->post('/subjects/subject', '\App\Controllers\SubjectsController@create');

$router->get('/subjects/edit/(\d+)','\App\Controllers\SubjectsController@showEditPage');
$router->post('/subjects/(\d+)','\App\Controllers\SubjectsController@update');

$router->post('/subjects/delete/(\d+)','\App\Controllers\SubjectsController@delete');


// Note
$router->get('/notes/view_note/', '\App\Controllers\NotesController@index');
$router->get('/notes/add','\App\Controllers\NotesController@showAddPage');
$router->post('/notes/note', '\App\Controllers\NotesController@create');

$router->get('/notes/edit/(\d+)','\App\Controllers\NotesController@showEditPage');
$router->post('/notes/(\d+)','\App\Controllers\NotesController@update');

$router->post('/notes/delete/(\d+)','\App\Controllers\NotesController@delete');

$router->run();
