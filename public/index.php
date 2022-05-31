<?php

require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

$router = new \Bramus\Router\Router();



$router->get('/users/list', 'Mvc\Controller\UserController@list');
$router->post('/users/create', 'Mvc\Controller\UserController@createUser');
$router->delete('/users/delete/(\d+)', 'Mvc\Controller\UserController@delete');
$router->put('/users/update/(\d+)', 'Mvc\Controller\UserController@update');



$router->get('/tournament/list', 'Mvc\Controller\UserController@listTournament');
$router->post('/tournament/create', 'Mvc\Controller\UserController@createTournament');
$router->delete('/tournament/delete/(\d+)', 'Mvc\Controller\UserController@deleteTournament');
$router->put('/tournament/update/(\d+)', 'Mvc\Controller\UserController@updateTournament');



$router->post('/tournament/join/(\d+)/(\d+)', 'Mvc\Controller\UserController@joinTournament');



$router->run();

?>