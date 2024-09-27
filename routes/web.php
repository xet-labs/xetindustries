<?php

use Illuminate\Support\Facades\Route;
use xet\Loc;
use App\Http\Controllers\ResController;
use App\Http\Controllers\BlogsController;

route::get('/style',    [ResController::class, 'style']);
route::post('/form',    [ResController::class, 'form']);

route::get('/blog/{slug}',      [BlogsController::class, 'blogPost']);
route::post('/blog/get-cards',  [BlogsController::class, 'blogGetCards']);
route::resource('/blog',         BlogsController::class);

// route::get('/', function () { require(Loc::file('PAGE', 'main')); });
route::get('/', function () { return view('main'); });


route::get('/dev/dbg', function () { require(Loc::file('PAGE', 'debug')); });
route::get('/dev/d', function () { return view('d'); });
