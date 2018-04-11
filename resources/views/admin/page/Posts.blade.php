@extends('layouts.admin')

@section('content')

<section class="content box" style="width: 95%;margin-top: 20px;padding-left: 30px;padding-right: 30px">      
  <h3 class="text-center">DANH SÁCH BÀI VIẾT</h3>
  <tr>
    <td>
      <div class="box-header">  
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle btn-sm disabled" type="button" data-toggle="dropdown">sorting by default  
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">sorting by default</a></li>
              <li><a href="#">sorting by views</a></li>
              <li><a href="#">sorting by id</a></li>
              <li><a href="#">sorting by a-z</a></li>
              <li><a href="#">sorting by z-a</a></li>
            </ul>
          </div>

          <div class="box-tools">
            <form action="{{route('admin.posts')}}" method="get">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" name="search" placeholder="Search name" value="{{$search}}">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </td>
    </tr>
    @if(count($getPosts)>0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tiêu Đề</th>
          <th>Hình ảnh</th>
          <th>Mô Tả</th>
          <th>Danh Mục</th>
          <th style="width: 12%">Trạng Thái</th>
          <th>Tác giả</th>
          <th style="width: 8%">Lượt Xem</th>
          <th style="width: 15%"><a href="{{route('admin.posts.create')}}">Tạo Bài Viết</a></th>
        </tr>
      </thead>

      @if(!empty($getPosts))
      <tbody>

       @foreach($getPosts as $getPosts1)

       <tr>
        <td>{{$getPosts1->id}}</td>
        <td><a href="{{route('category',['category'=>$getPosts1->shownamesubcate()->slug,'post'=>$getPosts1->slug])}}">{{str_limit($getPosts1->title,40)}}</a></td>
        <td><img src='{{ url("images/$getPosts1->images") }}' width="100px" height="100px"></td>
        <td>{{str_limit($getPosts1->summary,60)}}</td>
        <td><span class="label label-success">{{$getPosts1->shownamesubcate()->name}}</span></td>
        <td>
          @if($getPosts1->status==2)
          <a class="btn btn-success btn-xs">Công Khai</a>
          @elseif($getPosts1->status==1)
          <a class="btn btn-primary btn-xs">Không Công Khai</a>
          @elseif($getPosts1->status==0)
          <a class="btn btn-warning btn-xs">Chờ Kiểm Duyệt</a>
          @else
          <a class="btn btn-danger btn-xs">Bị Từ Chối</a>
          @endif
        </td>
        <td>{{$getPosts1->getUser()->name}}</td>
        <td>{{number_format($getPosts1->views)}}</td>
        <td><a class="btn btn-danger btn-sm" href="{{route('admin.posts.delete',$getPosts1->id)}}">xóa</a> <a class="btn btn-info btn-sm" href="{{route('admin.posts.edit',$getPosts1->id)}}">cập nhật</a></td>
      </tr>

      @endforeach
      
    </tbody>

  </table>
  {{ $getPosts->links() }}
  @else
</table>
<h3 class="text-center text-info">Không có dữ liệu</h3>

@endif
@else
<h3 class="text-center text-info">Bạn Hiện Không Có Bài Viết Nào .. <a href="{{route('admin.posts.create')}}">Tạo Bài Viết Mới</a></h3>
@endif
</section>

@endsection
