@extends('layouts.admin')

@section('content')
<section class="content">

  <div class="container col-sm-12">    
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">  <h4 >Hồ Sơ Cá Nhân</h4></div>
        <div class="panel-body">
          <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
            <img alt="User Pic" src="{{url('images')}}/{{Auth::user()->avatar}}" id="profile-image1" class=" img-responsive" style="object-fit: cover;max-width:300px;max-height: 300px"> 


         </div>
         <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
          <div class="container" >
            <h2>{{Auth::user()->name!=null ? Auth::user()->name : 'no name'}}</h2>
            {{-- <p>an   <b> Employee</b></p> --}}


          </div>
          <hr>
          <ul class="container details" >
            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span>{{Auth::user()->name!=null ? Auth::user()->name : 'Null'}}</p></li>
            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{Auth::user()->email!=null ? Auth::user()->email : 'Null'}}</p></li>
            <li><p><span class="glyphicon glyphicon-book one" style="width:50px;"></span>
              {{Auth::user()->user_roles->roles->name!=null ? Auth::user()->user_roles->roles->name : 'Null'}}
            </p></li>

            <li><p><span class="glyphicon glyphicon-upload one" style="width:50px;"></span>
              {{$datauser!=null ? $datauser : '0'}}
            </p></li>
          </ul>
          <hr>
          <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: {{Auth::user()->created_at!=null ? Auth::user()->created_at : 'Null'}}</div>
        </div>

        <a href="{{route('admin.myprofile.edit',Auth::user()->id)}}" class="btn bg-info" style="margin-top: 20px;float: right;"><span class="glyphicon glyphicon-edit one"></span> Cập Nhật Thông Tin</a>
        <a href="{{route('admin.myprofile.changepassword')}}" class="btn bg-warning" style="margin-top: 20px;margin-right:20px;float: right;"><span class="glyphicon glyphicon-gift one"></span> Đổi Mật Khẩu</a>

        <a href="{{route('admin.myprofile.chatlog')}}" class="btn bg-info" style="margin-top: 20px;margin-right:20px;float: right;"><span class="glyphicon glyphicon-comment one"></span> Gửi Tin Nhắn Hỗ Trợ</a>

      </div>

    </div>

  </div>

</section>

@endsection
