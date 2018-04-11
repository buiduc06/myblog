<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Mail;
use App\password_resets;
use App\User;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index(request $request)
    {

        return view('auth.passwords.email');
    }

    public function store(Request $Request)
    {
        if (!empty($Request)) {



            $EmailCheck=User::where('email',$Request->email)->first();
            if (!empty($EmailCheck)) {
                $createtoken=password_resets::create([
                    'email' => $EmailCheck->email,
                    'token' =>str_random(190),
                ]);

                // gửi mail

                Mail::send('mail.resetpassword', ['linktoken'=>$createtoken->token], function ($message) use ($createtoken){
                    $message->from($createtoken->email, 'ducpanda.net');

                    $message->to($createtoken->email,'ducpanda.net');

                    $message->subject('quên mật khẩu');
                });
                return redirect(route('login'))->with('msg','gửi mail thành công xin mời check email để lấy lại mật khẩu');

            }else{
                return redirect(route('login'))->with('msg','gửi mail thành công xin mời check email để lấy lại mật khẩu');
            }
        }
        else{
            return redirect(route('login'))->with('msg','gửi mail thành công xin mời check email để lấy lại mật khẩu');
        }
    }


    public function edit(request $request,$tokenEmail)
    {
        $checktoken=password_resets::where('token',$tokenEmail)->first();

        if (!empty($checktoken)) {

           $datetoken=$checktoken->created_at->format('Ymd');
           $datenow = date('Ymd');
           if ($datetoken==$datenow || $datenow-$datetoken<=1 ) {
            // create new token new
            $createnewtoken=password_resets::create([
                'email' => $checktoken->email,
                'token' =>str_random(190),
            ]);
            // xóa token cũ


            $deletetokencu=password_resets::where('token', $tokenEmail)->delete();

            // lấy token mơi
            $token=$createnewtoken->token;

            return view('auth.passwords.change',compact('token'));
        }else{
            return redirect(route('login'))->with('msg','Link reset password đã bị hỏng hoặc không tồn tại mời bạn thực hiện lại');
        }

    }else{
        return redirect(route('login'))->with('msg','Link reset password đã bị hỏng hoặc không tồn tại mời bạn thực hiện lại (1)');
    }
}

public function update(request $request)
{
//     $request->validate([
//         'password' => 'required|string|min:6|confirmed',
//         'password_confirmation' => 'required',
//     ],
//     [
//         'password.min' => 'Độ dài mật khẩu phải lớn hơn 6 kí tự',   
//         'password.required' => 'Vui lòng nhập mật khẩu của bạn',
//         'password_confirmation.required'  => 'vui lòng nhập lại mật khẩu của bạn',
//         'password.confirmed'  => 'hai mật khẩu không trùng nhau',
//     ]

// );
    if (!empty($request)) {


       $checktoken=password_resets::where('token',$request->token)->first();
       if (!empty($checktoken)) {
           $updatePws=User::where('email',$checktoken->email)->first();
           $updatePws->password=bcrypt($request->password);
           $updatePws->update();
           // xóa token cũ
           $deletetokencu=password_resets::where('token', $request->token)->delete();
           return redirect(route('login'))->with('msg','Đổi Mật Khẩu Thành Công');
       }else{
        return redirect(route('login'))->with('msg','Link reset password đã bị hỏng hoặc không tồn tại mời bạn thực hiện lại');
    }

}else{
    return redirect()->abort(404);
}
}



}
