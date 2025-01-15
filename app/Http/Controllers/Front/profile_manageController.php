<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\profile_manage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;

class profile_manageController extends Controller
{
    public function login()
    {
        return view("front.login");
    }

    public function doLogin(Request $req)
    {
        $address = $req->address;
        $password = $req->password;

        // 從資料庫中查詢用戶（僅通過地址匹配）
        $user = profile_manage::where('address', $address)->first();

        // 檢查用戶是否存在以及密碼是否正確
        if (!$user || !Hash::check($password, $user->password)) {
            // 如果用戶不存在或密碼錯誤，返回錯誤訊息
            return back()->withInput()->withErrors(["error" => "帳號或密碼錯誤"]);
        }

        // 登入成功，儲存用戶的 session
        session()->put("id", $user->id); // 或其他唯一標識，例如 $user->id
        session()->put("address", $user->address);
        return redirect("/");
    }

    public function logout()
    {
        session()->flush();
        return redirect("/login")->with('message', '您已成功登出');
    }

    public function register()
    {
        $register = profile_manage::get();
        return view("front.register", compact("register"));
    }

    public function doRegister(Request $req)
    {
        $data['creatTime'] = now();
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255|unique:profile_manage,address',
            'password' => 'required|string|min:4',
            'nickName' => 'required|string|max:255',
            'socialMedia' => 'required|string|max:255',
            'smAddress' => 'required|string',
            'email' => 'required|email|max:255',
            'phoneNb' => 'required|string|max:15',
        ], [
            'address.unique' => '此帳號已存在，請使用其他帳號。'
        ]);

        $user = new profile_manage();
        $user->name = $validatedData['name'];
        $user->address = $validatedData['address'];
        $user->password = bcrypt($validatedData['password']);
        $user->nickName = $validatedData['nickName'];
        $user->socialMedia = $validatedData['socialMedia'];
        $user->smAddress = $validatedData['smAddress'];
        $user->email = $validatedData['email'];
        $user->phoneNb = $validatedData['phoneNb'];
        $user->save();

        return redirect('/login')->with('message', '註冊成功，請登入。');
    }

    public function forget()
    {
        $forget = profile_manage::get();
        return view("front.forget", compact("forget"));
    }

    public function store(Request $request)
    {
        $mail = new PHPMailer(true);

        try {

            /* Email SMTP Settings */
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST','smtp.gmail.com');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME', 'your-email@example.com');
            $mail->Password = env('MAIL_PASSWORD', 'your-password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = env('MAIL_PORT',465);

            $mail->setFrom(env('MAIL_FROM_ADDRESS', 'tinwang949@gmail.com'), env('MAIL_FROM_NAME', '旅行者之家服務人員'));
            $mail->addAddress($request->email);

            $mail->isHTML(true);

            $mail->CharSet = 'UTF-8';
            $mail->Subject = '【旅行者之家】重設密碼';
            $mail->Body    = '忘記密碼欲重設密碼請點此：http://127.0.0.1:8000/revise';
            $mail->AltBody = '這是一封純文字的測試郵件';

            if( !$mail->send() ) {

                return back()->with("error", "重設密碼信件發送失敗")->withErrors($mail->ErrorInfo);
            }

            else {
                return back()->with("success", "重設密碼連結已發送至註冊信箱");
            }

        } catch (Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', '錯誤，請稍後再試');
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

    public function edit(Request $req)
    {
        $id = session('id');
        $user = profile_manage::where('id', $id)->get();
        return view("front.user", compact("user"));
    }

    public function update(Request $req)
    {
        $user = profile_manage::find($req->id);

        $validatedData = $req->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255|unique:profile_manage,address,' . $user->id,
        'password' => 'required|string|min:4',
        'nickName' => 'required|string|max:255',
        'socialMedia' => 'required|string|max:255',
        'smAddress' => 'required|string',
        'email' => 'required|email|max:255',
        'phoneNb' => 'required|string|max:15',
        ], [
        'address.unique' => '此帳號已存在，請使用其他帳號。'
         ]);
    
        $user->name = $validatedData['name'];
        $user->address = $validatedData['address'];
        $user->password = bcrypt($validatedData['password']);
        $user->nickName = $validatedData['nickName'];
        $user->socialMedia = $validatedData['socialMedia'];
        $user->smAddress = $validatedData['smAddress'];
        $user->email = $validatedData['email'];
        $user->phoneNb = $validatedData['phoneNb'];

        $user->save();

        return redirect("/user")->with('message', '修改成功');
    }


    public function revise()
    {
        return view("front.revise");
    }

    public function reset(Request $request)
    {
        // 驗證用戶輸入
        $request->validate([
            'address' => 'required', // 確保用戶提供帳號
            'password' => 'required|min:4|confirmed', // 確保密碼和確認密碼一致
        ]);

        // 根據帳號查找用戶
        $user = profile_manage::where('address', $request->address)->first();

        if (!$user) {
            return back()->withErrors(['address' => '該帳號不存在'])->withInput();
        }

        // 更新用戶密碼
        profile_manage::where('address', $request->address)
            ->update(['password' => Hash::make($request->password)]);

        return redirect('/login')->with('success', '密碼修改成功，請使用新密碼登入');
    }
}