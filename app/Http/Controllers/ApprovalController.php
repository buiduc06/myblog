<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\chatlog;
use Illuminate\Support\Facades\Auth;
class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postshow=posts::where('status',0)->get();
        return view('admin.Approval.index',compact('postshow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postshows=posts::find($id);
        return view('admin.Approval.post',compact('postshows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,$check)
    {
        if (isset($check)==2) {
            $updateposts=posts::find($id);
            $updateposts->status=2;
            $updateposts->update();
             $sendmsg=chatlog::create([
                'user_id'=>Auth::user()->id,
                'from_user_id' =>$updateposts->create_by,
                'title' => 'Bài Viết của bạn đã được chấp nhận',
                'content' =>"Xin chào! bài viết <b>$updateposts->title</b> của bạn đã được chấp nhận . xin chúc mừng bạn ! ",
            ]);

            return redirect(route('admin.approval'))->with('msg','phê duyệt bài viết thành công');
        }else{
            $updateposts=posts::find($id);
            $updateposts->status=4;
            $updateposts->update();
            $sendmsg=chatlog::create([
                'user_id'=>'1',
                'from_user_id' =>$updateposts->create_by,
                'title' => 'Bài Viết của bạn đã bị từ chối',
                'content' =>"Xin chào ! bài viết <b>$updateposts->title</b> chưa được chấp nhận . xin mời bạn kiểm tra lại nội dung ",
            ]);
            return redirect(route('admin.approval'))->with('msg','phê duyệt bài viết thành công');
        }

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
