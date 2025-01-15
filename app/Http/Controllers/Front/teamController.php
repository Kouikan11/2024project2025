<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\player;
use App\Models\recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class teamController extends Controller
{
    public function insert(Request $req)
    {
        $profile_manage_id = session('id');
        $recruitment_id = $req->input('recruitment_id');

        $existRecord = player::where('recruitment_id', $recruitment_id)
            ->where('profile_manage_id', $profile_manage_id)
            ->first();

        if ($existRecord) {
            Session::flash("message", "已經參加囉！要看看其他招募嗎?");
            return redirect("/team");
        }

        player::create([
            'recruitment_id' => $recruitment_id,
            'profile_manage_id' => $profile_manage_id,
        ]);

        Session::flash("message", "已成功加入！請留意您的社群訊息，並準時參加遊戲！");
        return redirect("/team");
    }

    public function attendNo()
    {   
        // 取得所有的招募計劃
        $recruitments = recruitment::where('process', 'passed')
                                    ->with('users')
                                    ->get();

        foreach ($recruitments as $recruitedNo) {
            $recruitedNo->countPlayer = $recruitedNo->users->count();  //計算已招募玩家數量
            $recruitedNo->remainingNo = $recruitedNo->nuOfMember-$recruitedNo->countPlayer; //剩餘可招募人數
            if($recruitedNo->countPlayer >=2){
                 $recruitedNo->result = '已成團';
            }else{
                $recruitedNo->result = '未成團';
            }
            $recruitedNo->save();
        }

        return view("front.team", compact("recruitments"));
    }
}