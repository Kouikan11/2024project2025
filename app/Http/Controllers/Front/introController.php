<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\intro;
use Illuminate\Http\Request;

use function Laravel\Prompts\intro;

class introController extends Controller
{
    public function list()
    {
        $list = intro::get();
        return view("front.intro");

    }
}
