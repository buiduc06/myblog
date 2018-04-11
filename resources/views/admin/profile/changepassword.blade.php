@extends('layouts.admin')

@section('content')
<!-- Horizontal Form -->
<div class="container" style="width: 70%;margin-top: 70px"> 

	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Thay Đổi Mật Khẩu</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" method="POST" action="{{route('admin.myprofile.changepassword')}}">
			{{csrf_field('')}}
			<div class="box-body">

				<br><br>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Mật Khẩu Cũ</label>

					<div class="col-sm-7">
						<input type="password" name="oldpassword" class="form-control" id="inputPassword3" placeholder="Password">
						@if(count($errors) > 0)
						<small style="color: red">{{$errors->first('oldpassword')}}</small><br>
						@endif
						<br>
					</div>
				</div>
				<br>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Mật Khẩu Mới</label>

					<div class="col-sm-7">
						<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
						@if(count($errors) > 0)
						<small style="color: red">{{$errors->first('password')}}</small><br>
						@endif
						<br>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Nhập Mật Khẩu Mới</label>

					<div class="col-sm-7">
						<input type="password"  name="password_confirmation" class="form-control" id="inputPassword3" placeholder="Password">
						@if(count($errors) > 0)
						<small style="color: red">{{$errors->first('password_confirmation')}}</small><br>
						@endif
						<br>
					</div>
				</div>


			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-info pull-right">Đổi Mật Khẩu</button>
			</div>
			<!-- /.box-footer -->
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection