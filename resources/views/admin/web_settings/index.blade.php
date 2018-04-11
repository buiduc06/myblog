@extends('layouts.admin')
@section('content')
<section class="content col-sm-8" style="margin-left: 200px;">
  <div class="box margin" style="padding: 2em 4em 2em 4em">
    <div class="box-header">
      <h3 class="box-title">CÀI ĐẶT</h3>

      <div class="box-tools">
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table">
        <tr>
          <th style="width: 10px">#</th>
          <th>Tính Năng</th>
          <th>Trạng Thái</th>
          <th style="width: 15%">Thao Tác</th>
        </tr>
        @foreach($showdata as $showdatas)
        <tr>
          <td>{{$showdatas->id}}</td>
          <td>{{$showdatas->name}}</td>
          <td>
            <button class="{{$showdatas->status ==1 ?'btn bg-olive margin btn-xs' : 'btn bg-maroon  btn-xs margin'}}">{{$showdatas->status ==1 ?'đã kích hoạt' : 'chưa kích hoạt'}}</button>

          </td>
          <td>
            @if($showdatas->status==0)
            <a class="btn bg-olive margin btn-flat" href="{{route('admin.web_settings.update',['id'=>$showdatas->id,'status'=>1])}}">Bật</a>
            @else
            <a class="btn bg-maroon margin btn-flat" href="{{route('admin.web_settings.update',['id'=>$showdatas->id,'status'=>0])}}">Tắt</a>
            @endif
          </td>
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