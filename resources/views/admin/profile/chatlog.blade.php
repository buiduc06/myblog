@extends('layouts.admin')

@section('content')
<br><br><br>
<div class="container col-sm-8" style="margin-left: 180px">
 <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>

            <h3 class="box-title">Gửi Tin Nhắn Hỗ Trợ</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              {{-- <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
              title="Remove"> --}}
              {{-- <i class="fa fa-times"></i></button> --}}
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="{{route('admin.myprofile.sendchat')}}" method="POST">
              {!! csrf_field() !!}
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Subject">
              </div>
              <div>
                <textarea class="textarea" name="content" placeholder="Message"
                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="box-footer clearfix">
            <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
              <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
          </div>
           
          </div>

          </div>

@endsection