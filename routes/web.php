<?php

use Illuminate\Support\Facades\Route;
use xet\Loc;
use App\Http\Controllers\BlogController;


route::post('/blog/get-cards', function () { require(Loc::file('CNTR', 'blogs-card-gen')); });
Route::get('/blog/{slug}', [BlogController::class, 'blogPost']);
route::resource('/blog', BlogController::class);

route::post('/form', function () { require(Loc::file('CNTR', 'formctl')); });
route::get('/style', function () { require(Loc::file('CNTR', 'style')); });

route::get('/', function () { require(Loc::file('CNTR', 'formctl')); });

route::get('/dev/dbg', function () { require(Loc::file('PAGE', 'debug')); });