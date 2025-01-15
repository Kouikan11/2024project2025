<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\player;
use App\Models\profile_manage;
use App\Models\recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class recruitController extends Controller
{
    public function form()
    {
        return view("front.recruitment");
    }

    public function checkUser(Request $req)
    {
        $user = (new profile_manage())->checkUser($req->userId);
        if (!empty($user)) {
            echo ("exist");
        }
    }

    public function apply(Request $req)
    {
        $address = $req->address;
        $nickName = $req->nickName;
        $system = $req->system;
        $module = $req->module;
        $nuOfMember = $req->nuOfMember;
        $level = $req->level;
        $dateTime = $req->dateTime;
        $timeSlot = $req->timeSlot;
        $content = $req->content;

        $recruitment = new recruitment();
        $recruitment->address = $address;
        $recruitment->nickName = $nickName;
        $recruitment->system = $system;
        $recruitment->module = $module;
        $recruitment->nuOfMember = $nuOfMember;
        $recruitment->level = $level;
        $recruitment->dateTime = $dateTime;
        $recruitment->timeSlot = $timeSlot;
        $recruitment->content = $content;

        $recruitment->save();

        Session::flash("message", "已新增");
        return redirect("/recruitment");
    }
    
    public function catagory()
    {
        $address = session('address');
        $id = session('id');
        $inReview = recruitment::where('address', $address)->where('process', 'review')->get();
        $inPassed = recruitment::where('address', $address)->where('process', 'passed')->get();
        $inFinished = recruitment::where('address', $address)->where('process', 'finished')->get();

        $inAttend = profile_manage::with('recruitments')->where('id', $id)->get();
    
        return view('front.record', compact('inReview', 'inPassed', 'inFinished','inAttend'));
    }

}