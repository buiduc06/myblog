<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        Auth::logout();
        return view('auth.login');
    }
    public function store(Request $Request)
    {
        if (Auth::attempt(['email' => $Request->email, 'password' => $Request->password],$Request->remember)) {
            // Authentication passed...
            return redirect()->intended('admin/index');
        }
        return redirect()->back()->withErrors(['email'=>'Tài Khoản Hoặc Mật Khẩu Không Chính Xác','password'=>' '])->withInput();

    }
}
