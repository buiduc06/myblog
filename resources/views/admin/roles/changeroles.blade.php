@extends('layouts.admin')
@section('content')
<section class="content col-sm-8" style="margin-left: 200px;">
  <div class="box margin" style="padding: 2em 4em 2em 4em">
    <div class="box-header">
      <h3 class="box-title">Danh Sách Quyền && User</h3>

      <div class="box-tools">
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table">
        <tr>
          <th style="width: 10px">#</th>
          <th>user_name</th>
          <th>user_email</th>
          <th>Level</th>
          <th>Change</th>
        </tr>
        @foreach($showdata as $showdatas)
        <tr>
          <td>{{$showdatas->id}}</td>
          <td>{{$showdatas->name}}</td>
          <td>{{$showdatas->email}}</td>
          <td>
           @if($showdatas->user_roles->id_roles==200)
           <a class="btn btn-success btn-xs">ADMIN</a>
           @elseif($showdatas->user_roles->id_roles==150)
           <a class="btn btn-primary btn-xs">MOD</a>
           @elseif($showdatas->user_roles->id_roles==100)
           <a class="btn btn-info btn-xs">AUTHOR</a>
           @else 
           <a class="btn btn-warning btn-xs">THÀNH VIÊN</a>
           @endif
         </td>
         <td><a href="{{route('admin.roles.updateRoles',$showdatas->id)}}" class="btn btn-sm btn-flat bg-orange">Thay Đổi</a></td>
       </tr>
       @endforeach

     </table>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>

<!-- /.content -->
@endsection