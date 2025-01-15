<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\player;
use App\Models\profile_manage;
use App\Models\recruitment;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminUserController extends Controller
{
    public function list()
    {
        $list = profile_manage::get();
        return view("admin.user.list", compact("list"));
    }

    public function add()
    {
        return view("admin.user.add");
    }

    public function checkUser(Request $req)
    {
        $user =(new profile_manage())->checkUser($req->address);
        if(!empty($user))
        {
            echo("exist");
        }
    }

    public function hasUser(Request $req)
    {
        $user =(new profile_manage())->hasUser($req->address,$req->oldAddress);
        if(!empty($user))
        {
            echo("exist");
        }
    }

    public function insert(Request $req)
    {
        $user = new profile_manage();
        $user->name = $req->name;
        $user->address = $req->address;
        $user->password = bcrypt($req->password);
        $user->nickName = $req->nickName;
        $user->socialMedia = $req->socialMedia;
        $user->smAddress = $req->smAddress;
        $user->email = $req->email;
        $user->phoneNb = $req->phoneNb;
        $user->save();

        Session::flash("message", "已新增");
        return redirect("/admin/user/list");
    }

    public function edit(Request $req)
    {
        $user = profile_manage::find($req->id);
        return view("admin.user.edit", compact("user"));
    }

    public function update(Request $req)
    {
        $user = new profile_manage();
        $user->name = $req->name;
        $user->address = $req->address;
        $user->password = bcrypt($req->password);
        $user->nickName = $req->nickName;
        $user->socialMedia = $req->socialMedia;
        $user->smAddress = $req->smAddress;
        $user->email = $req->email;
        $user->phoneNb = $req->phoneNb;
        $user->update();

        Session::flash("massage", "已修改");
        return redirect("/admin/user/list");
    }

    public function delete(Request $req)
    {
        profile_manage::destroy($req->id);
        Session::flash("message", "已刪除");
        return redirect("/admin/user/list");
    }

    /*public function show($profile_address)
    {
        $user = player::with('player')->findOrFail($profile_address);
        return view('admin.user.list', compact("user"));
    }*/
}