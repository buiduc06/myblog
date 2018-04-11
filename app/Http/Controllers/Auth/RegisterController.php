<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\user_roles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\web_settings;
use App\password_resets;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
     $this->middleware('guest');
 }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ],
        [
            'name.required' => 'vui lòng nhập tên của bạn',
            'name.string' => 'tên không được chứa kí tự đặc biệt',
            'email.required' => 'vui lòng nhập địa chỉ Email của bạn',
            'email.email' => 'định dạng email không hợp lệ',
            'password.min' => 'Độ dài mật khẩu phải lớn hơn 6 kí tự',   
            'password.required' => 'Vui lòng nhập mật khẩu của bạn',
            'password_confirmation.required'  => 'vui lòng nhập lại mật khẩu của bạn',
            'password.confirmed'  => 'hai mật khẩu không trùng nhau',
        ]

    ); 
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
    

    public function create(Request $Request)
    {
        if (!empty($Request)) {

            $Request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'name.required' => 'vui lòng nhập tên của bạn',
                'name.string' => 'tên không được chứa kí tự đặc biệt',
                'email.required' => 'vui lòng nhập địa chỉ Email của bạn',
                'email.unique' => 'Địa chỉ email đã tồn tại trên hệ thống',
                'email.email' => 'định dạng email không hợp lệ',
                'password.min' => 'Độ dài mật khẩu phải lớn hơn 6 kí tự',   
                'password.required' => 'Vui lòng nhập mật khẩu của bạn',
                'password_confirmation.required'  => 'vui lòng nhập lại mật khẩu của bạn',
                'password.confirmed'  => 'hai mật khẩu không trùng nhau',
            ]

        ); 
            $user =User::create([
                'name' => $Request->name,
                'email' => $Request->email,
                'password' => bcrypt($Request->password),
                'status' => '0',
            ]);
            // caapj nhat roles
            $rolesuser=user_roles::create(['id_user' => "$user->id",'id_roles'=>'50']);
            // tạo token 
            $token=password_resets::create([
                'email' => $user->email,
                'token' =>str_random(190),
            ]);
            // gửi mail kick hoạt
            
            Mail::send('mail.welcome', ['linktoken'=>$token->token], function ($message) use ($token){
                $message->from($token->email, 'ducpanda.net');

                $message->to($token->email,'ducpanda.net');

                $message->subject('Chào Mừng Thành Viên Mới');
            });


        }
        return redirect(route('login'))->with('msg','tạo tài khoản thành công vui lòng check email để kích hoạt tài khoản');
    }


    public function index()
    {
        $showkey=web_settings::find(2);
        if ($showkey->status==0) {
         return redirect(route('login'))->with('msg','tính năng đăng kí tạm thời bị đóng mời bạn quay lại sau');
     }
        return view('auth.register');
    }
    public function comfimmail($token)
    {
       if (isset($token)!=null) {

        $checkToken=password_resets::where('token',$token)->first();
        if (!empty($checkToken)) {
            $update=User::where('email',$checkToken->email)->first();
            if (!empty($update)) {
                $update->status=1;
                $update->update();
            }else{
                $deletetokencu=password_resets::where('token', $token)->delete();
                return redirect(route('login'))->with('msg','Kích Hoạt Tài Khoản Thất bại token ko đúng hoặc đã hết hạn');
            }
            $deletetokencu=password_resets::where('token', $token)->delete();
            return redirect(route('login'))->with('msg','Kích Hoạt Tài Khoản Thành Công Mời Bạn Đăng Nhập');

        }else{
            $deletetokencu=password_resets::where('token', $token)->delete();
            return redirect(route('login'))->with('msg','Kích Hoạt Tài Khoản Thất bại token ko đúng hoặc đã hết hạn');
        }


    }else{
        $deletetokencu=password_resets::where('token', $token)->delete();
        return redirect(route('login'))->with('msg','Kích Hoạt Tài Khoản Thất bại token ko đúng hoặc đã hết hạn');
    }
}

}

