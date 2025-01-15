<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\intro_system;
use Illuminate\Http\Request;

class intro_systemController extends Controller
{
    public function list()
    {
        $list = intro_system::get();
        return view("front.intro_system",compact("list"));
    }
    public function getPhoto(Request $req)
    {
        $intro_system=intro_system::find($req->id);
        echo($intro_system->picture);
    }
}
