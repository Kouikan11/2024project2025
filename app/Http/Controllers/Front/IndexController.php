<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\home;
use App\Models\recruitment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $index = recruitment::where('process', 'passed')->get();
        return view("front.index", compact("index"));
    }
    
    public function submitMessage(Request $request)
    {
        // 驗證資料
        $validated = $request->validate([
            'qaname' => 'required|string|max:255',
            'qaemail' => 'required|email|max:255',
            'qacontent' => 'required|string',
        ]);

        $message = new home();
        $message->name = $validated['qaname'];
        $message->email = $validated['qaemail'];
        $message->content = $validated['qacontent'];
        $message->createTime =now();

        // 儲存資料
        $message->save();

        return redirect()->back()->with('success', '訊息已成功發送!');
    }
}