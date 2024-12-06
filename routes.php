<?php

$r->addRoute('GET', '/', 'HomeController@index');

// Login
$r->addRoute('GET', '/login', 'LoginController@login');
$r->addRoute('POST', '/login', 'LoginController@fazerLogin');
$r->addRoute('GET', '/logout', 'LoginController@logout');
$r->addRoute('GET', '/mandarEmail', 'LoginController@sendEmail');

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

// Professores
$r->addRoute('GET', '/professores', 'ProfessorController@list');
$r->addRoute('GET', '/professores/form', 'ProfessorController@form');
$r->addRoute('POST', '/professores/save', 'ProfessorController@save');
$r->addRoute('GET', '/professores/remove', 'ProfessorController@remove');

// Curso
$r->addRoute('GET', '/cursos', 'CursoController@list');
$r->addRoute('GET', '/cursos/form', 'CursoController@form');
$r->addRoute('POST', '/cursos/save', 'CursoController@save');
$r->addRoute('GET', '/cursos/remove', 'CursoController@remove');

// Curso
$r->addRoute('GET', '/empresas', 'EmpresaController@list');
$r->addRoute('GET', '/empresas/form', 'EmpresaController@form');
$r->addRoute('POST', '/empresas/save', 'EmpresaController@save');
$r->addRoute('GET', '/empresas/remove', 'EmpresaController@remove');

$r->addRoute('GET', '/recuperarSenha', 'LoginController@recuperarSenha');
$r->addRoute('POST', '/enviarRecuperacao', 'LoginController@enviarRecuperacao');
$r->addRoute('GET', '/resetSenha', 'LoginController@resetSenha');
$r->addRoute('POST', '/processarNovaSenha', 'LoginController@processarNovaSenha');
