<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="asset('')">
  <title>Dashboard | ducpanda.net</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <!-- DataTables -->
   <link rel="stylesheet" href="{{url('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('admin/dist/css/skins/_all-skins.min.css')}}">
   <link rel="stylesheet" href="{{url('css/magic-check.css')}}">

   <!-- Google Font -->
   {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}



   {{-- tinymce --}}
   <script src="{{url('plugin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
   <script>
     var editor_config = {
      path_absolute : "/",
      selector: ".tinymce",
       height : "280",
       width: "700",
      plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>




</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{route('homepage')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            @if(Auth::user()->user_roles->roles->id > 150)
            <li class="dropdown messages-menu">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">{{$countchat1==0 ?'' :$countchat1}}</span>
              </a>
              
              <ul class="dropdown-menu">
                <li class="header">You have {{$countchat1}} messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    @if($countchat1!=null)
                    @foreach($datachat1 as $datachat1s)
                    <li><!-- start message -->
                      <a href="{{route('admin.myprofile.inbox')}}">
                        <div class="pull-left">
                          <img src="{{url('images')}}/{{$datachat1s->getchatimg()->avatar}}" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          {{$datachat1s->user->name}}
                          <small><i class="fa fa-clock-o"></i> {{$datachat1s->created_at->format('H:i:s')}}</small>
                        </h4>
                        <p>{{str_limit($datachat1s->title, 30)}}</p>
                      </a>
                    </li>
                    <!-- end message -->
                    @endforeach
                    @endif
                  </ul>
                </li>
                <li class="footer"><a href="{{route('admin.myprofile.inbox')}}">See All Messages</a></li>
              </ul>
            </li>
            @else
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">{{$countchat2==0 ?'' :$countchat2}}</span>
              </a>
              
              <ul class="dropdown-menu">
                <li class="header">You have {{$countchat2}} messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    @if($countchat2!=null)
                    @foreach($datachat2 as $datachat2s)
                    <li><!-- start message -->
                      <a href="{{route('admin.myprofile.inbox')}}">

                        <div class="pull-left">
                          <img src="{{url('images')}}/{{$datachat2s->getchatimg()->avatar}}" class="img-circle" alt="User Image">
                        </div>
                        <h4>

                          Support Team
                          <small><i class="fa fa-clock-o"></i> {{$datachat2s->created_at->format('H:i:s')}}</small>
                        </h4>
                        <p>{{str_limit($datachat2s->title, 30)}}</p>
                      </a>
                    </li>
                    <!-- end message -->
                    @endforeach
                    
                    @endif


                  </ul>
                </li>
                <li class="footer"><a href="{{route('admin.myprofile.inbox')}}">See All Messages</a></li>
              </ul>
            </li>
            @endif



            <!-- Notifications: style can be found in dropdown.less -->
            @if(Auth::user()->user_roles->roles->id > 150)
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">New</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Thông Báo Hệ Thống</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>

                      <a href="{{route('admin.approval')}}">
                        <i class="fa fa-suitcase text-aqua"></i> Bạn có <b>{{$kiemduyet}}</b> bài viết cần phê duyệt
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="footer"><a>View all</a></li>
              </ul>
            </li>
            @endif
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/images/{{ Auth::check() ? Auth::user()->avatar : 'default.png'}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="/images/{{ Auth::check() ? Auth::user()->avatar : 'default.png'}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}}
                    <small>Member since {{Auth::user()->created_at->format('d/m/Y')}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{route('admin.myprofile')}}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    @include('admin.sidebar')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <small></small>
        </h1>
        <ol class="breadcrumb">
          {{-- dùng segment nếu lấy vào mảng segments nếu lấy tất cả --}}
          <li><a href="{{url('homepage')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          @for($i=1 ; $i <= count(Request::segments()) ;$i++)
          <li><a href="{{url(Request::path())}}">{{ Request::segment($i) }}</a></li>
          @endfor 
        </ol>
      </section>
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" >
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://facebook.com/ducdeveloper">ducpanda</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg">

   </div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="{{url('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="{{url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
 <!-- SlimScroll -->
 <script src="{{url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{url('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{url('admin/dist/js/adminlte.min.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{url('admin/dist/js/demo.js')}}"></script>
 <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script src="/js/ducpanda.js"></script>



@include('layouts.alertShow')


</body>
</html>
