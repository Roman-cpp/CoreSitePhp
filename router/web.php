<?php

use App\Controller\CatController;
use App\controller\HomeController;
use App\Controller\UserController;
use Core\Route;

Route::get('home', [HomeController::class, 'index']);

Route::get('user', [UserController::class, 'index']);

Route::get('cat', [CatController::class, 'index']);