<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function home()
    {
        return view("admin.home");
    }
    public function login()
    {
        return view("admin.login");
    }

    public function doLogin(Request $req)
    {
        $userId = $req->userId;
        $pwd = $req->pwd;
        
        $manager = (new Manager())->getManager($userId, $pwd);

        if (empty($manager)) {
            return back()->withInput()->withErrors(["error" => "帳號或密碼錯誤"]);
            exit;
        } else {
            session()->put("managerId",$userId);
            return redirect("/admin/home");
        }
    }
    public function logout()
    {
        session()->flush(); 
        return redirect("/myadmin");
    }
}