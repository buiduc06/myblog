@extends('layouts.admin')

@section('content')
<section class="content">
  <div class="container" style="width: 700px">
    <form action="{{route('admin.myprofile.update',Auth::user()->id)}}" method="POST" role="form" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <legend>Cập Nhật Thông Tin</legend>
      </div>


      <div class="col-md-9">
        <label for="input">Tên Tài Khoản</label>
        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"  id="focusedInput">
        @if(count($errors) > 0)
        <small style="color: red">{{$errors->first('name')}}</small><br>
        @endif
        <br>
      </div>

      <div class="col-xs-12">
        <img width="300px" src="{{url('images')}}/{{Auth::user()->avatar}}" alt="">
      </div>


      <div class="col-xs-12">
        <label for="input">Hình ảnh</label>
        <input type="file" name="avatar">
        @if(count($errors) > 0)
        <small style="color: red">{{$errors->first('avatar')}}</small><br>
        @endif
        <br>
      </div>
        <div class="col-sm-4 float-right">
<br><br>
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-dashboard"></span> Cập Nhật</button>
        </div>

    </form>

  </div>

</section>

@endsection
