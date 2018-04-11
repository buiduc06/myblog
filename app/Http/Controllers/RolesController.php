<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roles;
use App\User;
use App\user_roles;
use App\modules;
use App\role_modules;
use Illuminate\Support\Facades\Auth;
class RolesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       $roleshow=roles::all();
       $showallmodule = modules::all();
       return view('admin.roles.index',compact('roleshow','showallmodule'));
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
    public function store(request $request)
    {
            $find=roles::find($request->id);
        if (!empty($find)) {
            return redirect(route('admin.roles'))->with('msg','value đã tồn tại trên hệ thông mời chọn lại');
        }else{
        $findid=roles::create([
            'id' =>"$request->id",
            'name' => "$request->name",
            'description' =>"$request->description",

        ]);
        foreach ($request->checkbox as $key) {
          role_modules::create([
            'role_id' =>"$request->id",
            'module_id' => "$key",

        ]);
      }

      return redirect(route('admin.roles'))->with('msg','thêm phân quyền thành công');
}

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeRoleForUsers()
    {
        $showdata=User::all();
        // $showallmodule = modules::all();
        return view('admin.roles.changeroles',compact('showdata'));
    }
    public function updateRoles($id)
    {
        if (Auth::user()->user_roles->id_roles > 151) {
            $data=roles::all();
            $dataUser=User_roles::where('id_user',$id)->first();
            return view('admin.roles.updateroles',compact('dataUser','data'));
        }
        else{
            return redirect(route('admin.roles.Userhasrole'))->with('msg','bạn không đủ quyền để thực hiện hành động này');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,$id)
    {
        $updateUserRoles = User_roles::where('id_user',$id)->first();
        $updateUserRoles->id_roles = $request->roles;
        $updateUserRoles->update();
        return redirect(route('admin.roles.Userhasrole'))->with('msg','Thay đổi quyền cho user thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteRolesModule=role_modules::where('role_id',$id)->get();
        foreach ($deleteRolesModule as $key) {
            $key->delete();
        };
        $deleteroles=roles::find($id)->delete();

        return redirect(route('admin.roles'))->with('msg','xoá module phân quyền thành công');
    }
}
