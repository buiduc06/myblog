@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<a href="{{route('admin.myprofile.createmail')}}" class="btn btn-primary btn-block margin-bottom">Tạo Mail Mới</a>

			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Folders</h3>

					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="{{route('admin.myprofile.inbox')}}"><i class="fa fa-inbox"></i> Inbox
							<span class="label label-primary pull-right">{{$countMail}}</span></a></li>

							<li><a href="{{route('admin.myprofile.createmail')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
							<li><a><i class="fa fa-trash-o"></i> Trash</a></li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<div class="col-md-9">
				<form action="{{route('admin.myprofile.sendchat')}}" method="post" accept-charset="utf-8">
					{{csrf_field('')}}
				
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Tin Nhắn Mới</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="form-group">
							<div class="row">

								<div class="col-sm-5">
									Người Nhận
									<select name="user_id" id="input" class="form-control" required>
										@foreach($alluser as $allusers)
										<option value="{{$allusers->id}}">{{$allusers->email}} ( {{ $allusers->name }} )</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-5">

								</div>
							</div>

						</div>



						<div class="form-group">
							<input class="form-control" name="title" placeholder="Subject:" required>
						</div>
						<div class="form-group">
							<textarea id="compose-textarea" name="content" class="form-control" style="height: 300px" required>

							</textarea>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<div class="pull-right">

						</div>
						<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /. box -->

				</form>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>




@endsection