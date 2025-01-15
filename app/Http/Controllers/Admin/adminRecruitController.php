<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminRecruitController extends Controller
{
    public function list()
    {
        $list = recruitment::get();
        return view("admin.recruitment.list", compact("list"));
    }

    public function add()
    {
        return view("admin.recruitment.add");
    }

    public function insert(Request $req)
    {
        $nickName = $req->nickName;
        $address = $req->address;
        $system = $req->system;
        $module = $req->module;
        $nuOfMember = $req->nuOfMember;
        $level = $req->level;
        $dateTime = $req->dateTime;
        $timeSlot = $req->timeSlot;
        $content = $req->content;
        $gm = $req->gm;
        $process = $req->process;

        $recruitment = new recruitment();
        //$recruitment->itemName = $itemName;
        //save():存入資料表

        $recruitment->nickName = $nickName;
        $recruitment->address = $address;
        $recruitment->system = $system;
        $recruitment->module = $module;
        $recruitment->nuOfMember = $nuOfMember;
        $recruitment->level = $level;
        $recruitment->dateTime = $dateTime;
        $recruitment->timeSlot = $timeSlot;
        $recruitment->timeSlot = $timeSlot;
        $recruitment->content = $content;
        $recruitment->gm = $gm;
        $recruitment->process = $process;

        $recruitment->save();

        Session::flash("message", "已新增");
        return redirect("/admin/recruitment/list");
    }
    public function edit(Request $req)
    {
        $recruitment = recruitment::find($req->id);
        return view("admin.recruitment.edit", compact("recruitment"));
    }

    public function update(Request $req)
    {
        $recruitment = recruitment::find($req->id);
        $recruitment->nickName = $req->nickName;
        $recruitment->address = $req->address;
        $recruitment->system = $req->system;
        $recruitment->module = $req->module;
        $recruitment->nuOfMember = $req->nuOfMember;
        $recruitment->level = $req->level;
        $recruitment->dateTime = $req->dateTime;
        $recruitment->timeSlot = $req->timeSlot;
        $recruitment->content = $req->content;
        $recruitment->gm = $req->gm;
        $recruitment->process = $req->process;

        $recruitment->update();

        Session::flash("massage", "已修改");
        return redirect("/admin/recruitment/list");
    }

    public function delete(Request $req)
    {
        recruitment::destroy($req->id);
        Session::flash("message", "已刪除");
        return redirect("/admin/recruitment/list");
    }

    public function getAttend()
    {
        $recruitments = recruitment::with('users')->get();
        
        return view('admin.recruitment.list', compact('recruitments'));

    }
}