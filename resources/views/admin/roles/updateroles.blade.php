@extends('layouts.admin')
@section('content')
<section class="content col-sm-8" style="margin-left: 200px;">
	<div class="box margin" style="padding: 2em 4em 2em 4em">
		<div class="box-header">
			<h3 class="box-title">Thay Đổi Quyền Cho Tài Khoản</h3>

			<div class="box-tools">
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<!-- general form elements -->
			<div class="box box-primary">
				<br><br>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="{{route('admin.roles.update',$dataUser->thanhvien()->id)}}" method="POST">
					{{csrf_field()}}
					<div class="box-body">
						<div class="form-group col-sm-8">
							<label for="exampleInputEmail1">Tài Khoản : {{$dataUser->thanhvien()->email}} </label>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group col-sm-8">
							<label for="exampleInputEmail1">Quyền</label>
							<select name="roles" id="input" class="form-control" required="required">
								@foreach($data as $data1)
								<option value="{{$data1->id}}" {{$data1->id==$dataUser->id_roles ?"selected":" "}}>{{$data1->name}}</option>
								@endforeach
							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Cập Nhật</button>
					</div>
				</form>
			</div>
			<!-- /.box -->
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>

<!-- /.content -->
@endsection