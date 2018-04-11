@extends('layouts.admin')
@section('content')
<section class="content box" style="width: 90%;margin-top: 40px">    
	<h3 class="text-center">PHÂN QUYỀN</h3>

	<tr>
		
	</tr>
	<div class="table-responsive">   
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>#</th>
					<th>Tên Phân Quyền</th>
					<th>description</th>
					<th>giá trị</th>
					<th>Module</th>
					<th><a class="text-primary" data-toggle="modal" href='#modal-id'>Tạo Phân Quyền</a></th>

				</tr>
			</thead>
			<tbody>
				@php $i=1; @endphp
				@foreach($roleshow as $roleshows)
				<tr>
					<td></td>
					<td> {{$i++}}</td>
					<td>{{$roleshows->name}}</td>
					<td>{{$roleshows->description}}</td>
					<td>{{$roleshows->id}}</td>
					<td>
						@foreach($roleshows->role_modules as $rlmodule)
						@foreach($rlmodule->modules as $modules )

						<li><a href="{{route('admin.modules')}}">{{$modules->name}}</a></li>
						@endforeach
						@endforeach
					</td>
					<td>
						<a href="{{route('admin.roles.destroy',$roleshows->id)}}" class="btn btn-danger">xóa</a>
						<a onclick="return alert('chức năng đang bị đóng')" class="btn btn-success">sửa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</section>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('admin.roles.store')}}" method="POST" onsubmit="return checkvalidate()">
				{{csrf_field()}}

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">TẠO PHÂN QUYỀN</h4>
				</div>
				<div class="modal-body">

					<div class="row"> 
						<div class="col-sm-6"> 
							<div class="input-group">
								<label>Tên Phân Quyên</label>
								<input type="text" class="form-control" name="name" id="tenphanquyen" placeholder="ex:admin">

							</div>
							<small style="color: red;" id="tenphanquyenerror"></small>
						</div>
						<div class="col-sm-6"> 
							<div class="input-group">
								<label>Giá Trị</label>
								<input type="number" name="id" class="form-control" id="giatri" placeholder="ex: 400">
							</div>
							<small style="color: red;" id="giatrierror"></small>
						</div>
					</div>
					<br>
					<div class="input-group">
						<label>Mô Tả</label>
						<textarea name="description" class="form-control"></textarea>
					</div>

					<br>

					<label>Danh Sách Module</label>
					<div class="row">
						<div class="col-sm-4">
							<tr>
								<td><input type="checkbox" class="check" id="checkAll"></td>
								<td>Check ALL</td>
							</tr>
						</div>




						@foreach($showallmodule as $showallmodule1)
						<div class="col-sm-4">
							<tr>
								<td><input type="checkbox" class="check" name="checkbox[]" value="{{$showallmodule1->id}}"></td>
								<td>{{$showallmodule1->name}}</td>
							</tr>
						</div>
						@endforeach




					</div>


					<br>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>

			</form>
		</div>
	</div>
</div>
<script>var Arr=[];</script>
@foreach($roleshow as $roleshows)
<script>

	Arr.push("{{$roleshows->name}}");
</script>

@endforeach
<script>
	function checkvalidate() {
		var name, giatri,mota;
		name= document.getElementById("tenphanquyen").value;
		giatri= document.getElementById("giatri").value;
		if (name =='') {
			document.getElementById("tenphanquyenerror").innerHTML = "vui lòng nhập thông tin";
			return false;
		}else if (giatri=='') {
			document.getElementById("giatrierror").innerHTML = "vui lòng nhập thông tin";
			return false;
		}else if (Arr.indexOf(name)>-1) {
			document.getElementById("tenphanquyenerror").innerHTML = "Tên Phân Quyền Đã Tồn Tại";
			return false;
		}
		else{
			return true;
		}
		return false;

	}
</script>
<script src="{{url('css/jquery/jquery.min.js')}}"></script>
<script>
	$("#checkAll").click(function () {
		$(".check").prop('checked', $(this).prop('checked'));
	});

</script>

@endsection