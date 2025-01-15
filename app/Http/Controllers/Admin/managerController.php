<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class managerController extends Controller
{
    public function list()
    {
        $list = Manager::get();
        return view("admin.manager.list", compact("list"));
    }

    public function add()
    {
        return view("admin.manager.add");
    }

    public function checkManager(Request $req)
    {
        $manager = (new Manager())->checkManager($req->userId);
        if (!empty($manager)) {
            echo ("exist");
        }
    }

    public function hasManager(Request $req)
    {
        $manager =(new Manager())->hasManager($req->userId,$req->oldUserId);
        if(!empty($manager))
        {
            echo("exist");
        }
    }

    public function insert(Request $req)
{
    $manager = new Manager();
    $manager->userId = $req->userId;
    $manager->pwd = password_hash($req->pwd, PASSWORD_BCRYPT); // 使用 password_hash 加密密碼
    $manager->save();

    Session::flash("message", "已新增");
    return redirect("/admin/manager/list");
}


    public function edit(Request $req)
    {
        $manager = Manager::find($req->id);
        return view("admin.manager.edit", compact("manager"));
    }

    public function update(Request $req)
{
    $manager = Manager::find($req->id);
    $manager->userId = $req->userId;

    // 如果有輸入新的密碼才更新
    if (!empty($req->pwd)) {
        $manager->pwd = password_hash($req->pwd, PASSWORD_BCRYPT); // 使用 password_hash 加密密碼
    }

    $manager->update();

    Session::flash("message", "已修改");
    return redirect("/admin/manager/list");
}


    public function delete(Request $req)
    {
        Manager::destroy($req->id);
        Session::flash("message", "已刪除");
        return redirect("/admin/manager/list");
    }
}
