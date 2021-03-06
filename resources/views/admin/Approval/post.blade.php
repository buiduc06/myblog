@extends('layouts.admin')
@section('content')
<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            Tác giả : {{ $postshows->getUser()->name}}
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
    <!-- timeline icon -->
    <i class="fa fa-edit bg-blue"></i>

    <div class="timeline-item">

      <span class="time">

       <i class="fa fa-clock-o"></i> {{$postshows->created_at !=null ? $postshows->created_at->format('Y/m/d H:i:s  ') : ''}}</span>
       <h3 class="timeline-header"><a href="#">{{$postshows->title}}</a> ...</h3>

       <div class="timeline-body">
        <div class="row"> 
          <div class="col-sm-2">
            <img src="{{url('images')}}/{{$postshows->images}}" width="150px">
          </div>
          <div class="col-sm-10">
            <div class="row"> 
              <p class="col-sm-10">{!!str_limit($postshows->summary, 800)!!}}</p>
              {{-- <a class="btn btn-xs btn-primary col-sm-1" style="margin-left: 65px">{{$postshows->getUser()->name}}</a> --}}
              <img style="margin-left: 105px;border-radius: 50%" src="{{url('images')}}/{{$postshows->getUser()->avatar}}" width="35px" height="35px"  title="{{$postshows->getUser()->name}}">
            </div>
            <br>
            <p>{!!$postshows->content!!}</p>
          </div>
        </div>
        <br>

      </div>

      <div class="timeline-footer">
        <a class="btn btn-success btn-xs" href="{{route('admin.approval.update',['id'=>$postshows->id,'check'=>'2'])}}">Chấp Nhận</a>
        <a class="btn btn-danger btn-xs" href="{{route('admin.approval.update',['id'=>$postshows->id,'check'=>'4'])}}">Từ Chối</a>
      </div>
    </div>
  </li>
    <!-- END timeline item -->

    ...

</ul>
@endsection