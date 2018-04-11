@extends('layouts.admin')
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<a href="{{route('admin.myprofile.inbox')}}" class="btn btn-primary btn-block margin-bottom">Quay Lại</a>
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
			<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Read Mail</h3>

						<div class="box-tools pull-right">
							<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
							<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-read-info">
							<h3>{{$readmail->title}}</h3>
							<h5>From: {{$readmail->user->name}}
								<span class="mailbox-read-time pull-right">{{$readmail->created_at->format('Y/m/d H:i:s')}}</span></h5>
							</div>
							<!-- /.mailbox-read-info -->
							<div class="mailbox-controls with-border text-center">
								<div class="btn-group" style="float: right;">
									<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
										<i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
											<i class="fa fa-reply"></i></button>
											<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
												<i class="fa fa-share"></i></button>
											{{-- </div> --}}
											<!-- /.btn-group -->
											<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
												<i class="fa fa-print"></i></button>
											</div>
											<!-- /.mailbox-controls -->
											<div class="mailbox-read-message">
												<br>
												<p> {!!$readmail->content!!}</p>





												
											</div>
											<!-- /.mailbox-read-message -->
										</div>
										<!-- /.box-body -->
										<div class="box-footer">
											
										</div>
										<!-- /.box-footer -->
										<div class="box-footer">
											<div class="pull-right">
												<button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
												<button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
											</div>
											<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
											<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
										</div>
										<!-- /.box-footer -->
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