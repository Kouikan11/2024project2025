<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\intro_gm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminGmController extends Controller
{
    public function list()
    {
        $list = intro_gm::get();
        return view("admin.gm.list", compact("list"));
    }

    public function add()
    {
        return view("admin.gm.add");
    }

    public function insert(Request $req)
    {
        $title = $req->title;
        $picture = $req->picture;
        $content = $req->content;
        $gm_system = $req->gm_system;

        $fileName = time() . "." . $picture->extension();
        if (!file_exists("images/intro")) {
            mkdir("images/intro", 0777);
        }
        $picture->move("images/intro", $fileName);

        $gm = new intro_gm();
        $gm->title = $title;
        $gm->picture = $picture;
        $gm->content = $content;
        $gm->gm_system = $gm_system;
        //save():存入資料表

        $gm->save();

        Session::flash("message", "已新增");
        //redirect:轉址，將網址轉到/admin/product/list
        return redirect("/admin/gm/list");
    }
    public function edit(Request $req)
    {
        $gm = intro_gm::find($req->id);
        return view("admin.gm.edit", compact("gm"));
    }

    public function update(Request $req)
    {
        $gm = intro_gm::find($req->id);
        $gm->title = $req->title;
        $gm->picture = $req->picture;
        $gm->content = $req->content;
        $gm->gm_system = $req->gm_system;

        //如果有上傳新的產品圖
        if(!empty($picture))
        {
            //將原有的產品圖從資料夾中刪除 @:表示出現錯誤時，忽略錯誤訊息
            @unlink("images/intro/".$gm->picture);
            $fileName = time().".".$picture->extension();
            $picture->move("images/intro",$fileName);

            $gm->picture=$fileName;
        }

        $gm->update();

        Session::flash("massage", "已修改");
        return redirect("/admin/gm/list");
    }

    public function delete(Request $req)
    {
        intro_gm::destroy($req->id);
        Session::flash("message", "已刪除");
        return redirect("/admin/gm/list");
    }
}
