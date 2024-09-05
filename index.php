<?php

require './autoload.php';

use lib\Route;

Route::get('/', fn() => require ('./view/home.php'));

Route::start();
