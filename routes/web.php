<?php

use Illuminate\Support\Facades\Route;
use xet\Loc;
use App\Http\Controllers\ResCntr;
use App\Http\Controllers\UserCntr;
use App\Http\Controllers\BlogsCntr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/blog/@{BlogAuthor}/{BlogSlug}',    [BlogsCntr::class, 'show']);
route::post('/blog/get-cards',                  [BlogsCntr::class, 'getCards']);
route::resource('/blog',                        BlogsCntr::class);


route::get('/', function () { Loc::filer('PAGE', 'main'); });


route::get('/signup',   [UserCntr::class, 'signupForm'])->name('user.signupForm');
route::get('/login',    [UserCntr::class, 'loginForm'])->name('user.loginForm');
route::post('/signup',  [UserCntr::class, 'signup'])->name('user.signup');
route::post('/login',   [UserCntr::class, 'login'])->name('user.login');
route::post('/logout',  [UserCntr::class, 'logout'])->name('user.logout');


route::post('/acc/update/profile-img',  [UserCntr::class, 'updateProfileImg'])->name('user.update.profile-img');
route::get('/acc/update',               [UserCntr::class, 'updateName']);


route::get('/res/css/styles',   [ResCntr::class, 'style'])->name('styles.res');
route::get('/sitemap.xml',   [ResCntr::class, 'sitemap'])->name('sitemap.res');




route::get('/de', function () { Loc::filer('PAGE', 'debug'); });
route::get('/d', function () { 
    echo "<pre style=\"margin-top:2rem;font-size:13.5px;color:var(--colr)\">";
    
    var_dump(session()->all());
    
    $callFile = debug_backtrace()[0]['file'];
    $callBy = basename($callFile); $callDir = dirname($callFile);
    echo (var_dump($callFile));
    echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
    var_dump(Loc::pathurl());
    echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
    var_dump(Loc::path());
    echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
    var_dump(Loc::fileurl());
    echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
    var_dump(Loc::file());
        
    echo "</pre>"; });
