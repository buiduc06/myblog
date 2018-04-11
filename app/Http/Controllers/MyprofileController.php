<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\posts;
use App\User;
use Hash;
use App\chatlog;
class MyprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser=posts::where('id',Auth::user()->id)->count();
        return view('admin.profile.profile',compact('datauser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chatlog()
    {
        return view('admin.profile.chatlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendchat(Request $request)
    {
        if (isset($request->user_id)!=null) {
            $sendchat=chatlog::create([
                'user_id'=> Auth::user()->id,
                'from_user_id'=>$request->user_id,
                'title'=>$request->title,
                'content'=>$request->content,
            ]);
            return redirect(route('admin.myprofile'))->with('msg','gửi mail thành công');
        }else{
            $sendchat=chatlog::create([
                'user_id'=> Auth::user()->id,
                'from_user_id'=>1,
                'title'=>$request->title,
                'content'=>$request->content,
            ]);
            return redirect(route('admin.myprofile'))->with('msg','gửi mail thành công');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {   
        return view('admin.profile.changepassword');
    }
    public function updatepassword(Request $request)
    {
        $id=Auth::user()->id;
        $request->validate([
                'oldpassword' => 'required',
                
                'password'=>'required|min:6|confirmed|different:oldpassword',
                 'password_confirmation' => 'required|min:6|same:password',
            ],
            [
                'oldpassword.required' => 'vui lòng nhập mật khẩu cũ của bạn',
                'password.different' => 'mật khẩu mới không được trùng với mật khẩu cũ',
                'password.required' => 'vui lòng nhập mật khẩu mới',
                'password_confirmation.required' => 'vui lòng nhập lại mật khẩu ',
                'password.min'=>'độ dài mật khẩu phải lớn hơn 6 kí tự',
                'password.confirmed'=>'2 mật khẩu không trùng nhau',
                'password_confirmation.min'=>'độ dài mật khẩu phải lớn hơn 6 kí tự',
                'password_confirmation.same'=>'2 mật khẩu không trùng nhau',
            ]

        );
        $oldpassword=Auth::user()->password;

        if (Hash::check($request->oldpassword, $oldpassword)) {
           $id_user=Auth::user()->id;
           $update_pass=User::find($id_user);
           $update_pass->password=Hash::make($request->password);
           $update_pass->update();
           return redirect(route('admin.myprofile'))->with('msg','Đổi Mật Khẩu Thành Công');
        }else{
            return redirect()->back()->withErrors(['oldpassword'=>'Mật Khẩu Cũ Không Chính Xác Mời bạn Nhập Lại'])->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
                'name' => 'required|string|max:255',
                'avatar'=>'image',
            ],
            [
                'name.required' => 'vui lòng nhập tên của bạn',
                'name.string' => 'tên không được chứa kí tự đặc biệt',
                'avatar.image'=>'định dạng img không đúng',
            ]

        ); 

        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $photoname=str_slug($request->name).'_'.time().'.'.$request->avatar->getClientOriginalExtension();
            $file->move('images',$photoname);
        }else{
            $photoname=Auth::user()->avatar;
        }

        $updateinfo=User::find($id);
        $updateinfo->name=$request->name;
        $updateinfo->avatar=$photoname;
        $updateinfo->update();

        return redirect(route('admin.myprofile'))->with('msg','cập nhật thông tin thành công');
    }

    public function inbox()
    {

            $countMail=chatlog::where('from_user_id',Auth::user()->id)->count();
            $showMail=chatlog::where('from_user_id',Auth::user()->id)->get();
            return view('admin.mail.inbox',compact('countMail','showMail'));
    }
    public function showmail($id)
    {
        $countMail=chatlog::where('from_user_id',Auth::user()->id)->count();
        $readmail=chatlog::find($id);
            return view('admin.mail.showmail',compact('countMail','readmail'));
    }
    public function createmail()
    {
        $countMail=chatlog::where('from_user_id',Auth::user()->id)->count();
        $alluser=User::all();
        return view('admin.mail.createmail',compact('countMail','alluser'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
