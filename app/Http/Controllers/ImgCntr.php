<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use xet\Loc;

class ImgCntr extends Controller
{
    public function store(Request $request)
    {
        require(Loc::file('CNTR', 'store.img'));
    }

    public function get(Request $request, $filename)
    {
        require(Loc::file('CNTR', 'get.img'));
    }

}
