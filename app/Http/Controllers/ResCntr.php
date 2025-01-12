<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use xet\Loc;

class ResCntr extends Controller
{
    public function style()
    {
        require(Loc::file('CNTR', 'styles.res'));
    }

    public function sitemap()
    {
        require(Loc::file('CNTR', 'sitemap.res'));
    }
}

