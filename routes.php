<?php

$r->addRoute('GET', '/', 'HomeController@index');

// Login
$r->addRoute('GET', '/login', 'LoginController@login');
$r->addRoute('POST', '/login', 'LoginController@fazerLogin');
$r->addRoute('GET', '/logout', 'LoginController@logout');

// Usuários
$r->addRoute('GET', '/usuarios', 'UserController@list');
$r->addRoute('GET', '/usuarios/form', 'UserController@form');
$r->addRoute('POST', '/usuarios/save', 'UserController@save');
$r->addRoute('GET', '/usuarios/remove', 'UserController@remove');

// Estudantes
$r->addRoute('GET', '/estudantes', 'EstudanteController@list');
$r->addRoute('GET', '/estudantes/form', 'EstudanteController@form');
$r->addRoute('POST', '/estudantes/save', 'EstudanteController@save');
$r->addRoute('GET', '/estudantes/remove', 'EstudanteController@remove');
