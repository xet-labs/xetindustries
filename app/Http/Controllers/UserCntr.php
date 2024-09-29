<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserTraits\UserAuth;
use App\Http\Controllers\UserTraits\UserUpdate;


use Illuminate\Http\Request;

class UserCntr extends Controller
{
    use 
    UserAuth, 
    UserUpdate;
}
