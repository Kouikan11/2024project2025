<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\intro_gm;
use Illuminate\Http\Request;

class intro_gmController extends Controller
{
    public function list()
    {
        $list = intro_gm::get();
        return view("front.intro_gm",compact("list"));
    }
    public function getPhoto(Request $req)
    {
        $intro_gm=intro_gm::find($req->id);
        echo($intro_gm->picture);
    }
}
