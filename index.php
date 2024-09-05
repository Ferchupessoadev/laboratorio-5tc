<?php

require './autoload.php';

use lib\Route;

Route::get('/', fn() => require ('view/inicio.php'));

Route::get('/nosotros', fn() => require ('view/nosotros.php'));

Route::get('/galeria', fn() => require ('view/galeria.php'));

Route::get('/proyectos', fn() => require ('view/proyectos.php'));

Route::start();
