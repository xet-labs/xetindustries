<?php

use Illuminate\Support\Facades\Route;
use xet\Loc;

route::get('/d', function () {
    echo "<pre>";
    
    debug_backtrace()[0]['file'];
    echo "--=--=--=--=--=--=--=--=--=--=--=--=--=--=--";
    var_dump(Loc::pathx());
    echo "--=--=--=--=--=--=--=--=--=--=--=--=--=--=--";
    var_dump(Loc::path());
    echo "--=--=--=--=--=--=--=--=--=--=--=--=--=--=--";
    var_dump(Loc::filex());
    echo "--=--=--=--=--=--=--=--=--=--=--=--=--=--=--";
    var_dump(Loc::file());
    
    echo "</pre>";
});



Route::get('/dbg', function () { require(Loc::file('PAGE', 'debug')); });

Route::get('/style', function () { require(Loc::file('CNTR', 'style')); });

Route::post('/formctl', function () { require(Loc::file('CNTR', 'formctl')); });

Route::get('/', function () { return view('welcome'); });


