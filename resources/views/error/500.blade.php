 @extends('layouts.admin')
@section('content')
 <!-- Content Wrapper. Contains page content -->

  
    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">500</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

          <p style="text-transform:capitalize">
            đường dẫn đã bị hỏng hoặc bạn không đủ quyền truy cập chức năng này
            . <br>liên hệ admin hoặc  <a href="{{route('homepage')}}">Trở về Trang Chủ</a> 
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>



  @endsection