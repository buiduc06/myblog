@extends('layouts.admin')

@section('content')


<div class="container" style="width: 1000px">
  <form action="{{route('admin.posts.update',$getData->id)}}" method="POST" role="form" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <legend>Thêm Bài Viết</legend>
    </div>

    <div class="row">
    <div class="col-sm-9">
    <div class="col-md-9">
      <label for="input">Tiêu Đề</label>
      <input type="text" name="title" class="form-control" value="{{ $getData->title }}"  id="focusedInput">
      @if(count($errors) > 0)
      <small style="color: red">{{$errors->first('title')}}</small><br>
      @endif
      <br>
    </div>
    <div class="col-xs-9">
      <label for="input">Mô Tả</label>
      <textarea name="summary" id="input" class="form-control" rows="3">{{$getData->summary}}</textarea>
      @if(count($errors) > 0)
      <small style="color: red">{{$errors->first('summary')}}</small><br>
      @endif
      <br>
    </div> 



  <div class="col-md-12">
    <label for="textarea">Nội Dung</label>
    <textarea name="content" class="form-control tinymce" id="focusedInput">
      {{$getData->content }}
    </textarea>
    @if(count($errors) > 0)
    <small style="color: red">{{$errors->first('content')}}</small><br>
    @endif
    <br>
  </div>

</div>
<div class="col-sm-3">



  @if(Auth::user()->user_roles->id_roles < 150 && $web_settings[0]->status==1)
@else
  <div class="col-xs-12">
   <label for="input">Trạng Thái</label>
   <select name="status" id="input" class="form-control" required="required">
    @if($getData->status==2)
    <option value="2">công khai</option>
    <option value="1">không công khai</option>
    @else
    <option value="1">không công khai</option>
    <option value="2">công khai</option>

    @endif
  </select>
  <br>
</div>
@endif


    <div class="col-xs-12">
     <label for="input">Danh Mục</label>
     <select name="subcategory" id="input" class="form-control" required="required">
      <option value="{{$getData->shownamesubcate()->id}}">{{$getData->shownamesubcate()->name}}</option>
      @foreach($showcategory as $showSubcate1)
      <option value="{{$showSubcate1->id}}">{{$showSubcate1->name}}</option>
      @endforeach
    </select>
    <br>
  </div>


  <div class="col-xs-12">
    <label for="input">Hình ảnh Đại diện</label>
    <img src="/images/{{$getData->images }}" width="200" class="img-responsive" alt="Image">
    <input type="file" name="avatar" >
    @if(count($errors) > 0)
    <small style="color: red">{{$errors->first('avatar')}}</small><br>
    @endif
    <br>
  </div>










</div>


</div>
<br><br>
<div class="col-md-10">
  <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
  <br>
  <br>
</div>
</form>

</div>
@endsection
