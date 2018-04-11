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
			<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Inbox</h3>

						<div class="box-tools pull-right">
							<div class="has-feedback">
								<input type="text" class="form-control input-sm" placeholder="Search Mail">
								<span class="glyphicon glyphicon-search form-control-feedback"></span>
							</div>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-controls">
							<!-- Check all button -->
							<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
							</div>
							<!-- /.btn-group -->
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
							<div class="pull-right">
								1-50/200
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
								</div>
								<!-- /.btn-group -->
							</div>
							<!-- /.pull-right -->
						</div>
						<div class="table-responsive mailbox-messages">
							<table class="table table-hover table-striped">
								<tbody>
									@foreach($showMail as $showMails)
									<tr>
										<td><input type="checkbox"></td>
										<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
										<td class="mailbox-name"><a href="{{route('admin.myprofile.showmail',$showMails->id)}}">{{$showMails->user->name}}</a></td>
										<td class="mailbox-subject"><b>{{str_limit($showMails->title,22)}}</b> - 
											{!!str_limit($showMails->content,80)!!}...
										</td>
										<td class="mailbox-attachment"></td>
										<td class="mailbox-date">{{$showMails->created_at->format('m/d H:i')}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<!-- /.table -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.box-body -->
					<div class="box-footer no-padding">
						<div class="mailbox-controls">
							<!-- Check all button -->
							<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
							</div>
							<!-- /.btn-group -->
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
							<div class="pull-right">
								1-50/200
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
								</div>
								<!-- /.btn-group -->
							</div>
							<!-- /.pull-right -->
						</div>
					</div>
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>




@endsection