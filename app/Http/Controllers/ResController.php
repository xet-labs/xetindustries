<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use xet\Loc;

class ResController extends Controller
{
    public function form()
    {
        require(Loc::file('CNTR', 'formctl'));
    }

    public function style()
    {
        require(Loc::file('CNTR', 'style'));
    }

}
