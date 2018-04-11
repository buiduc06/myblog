@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nhập Mật Khẩu Mới</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.reset') }}" onsubmit="return Validate()">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">


 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >
                                <span id="helpblock">
                                        <strong></strong>
                                    </span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="passwordconfirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="passwordconfirm" type="password" class="form-control" name="password_confirmation" >
                                <span id="helpblock1">
                                        <strong></strong>
                                    </span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<script>
    function Validate() {
        var name, giatri,mota;
        password= document.getElementById("password").value;
        password2= document.getElementById("passwordconfirm").value;
        if (password =='') {
            document.getElementById("helpblock").innerHTML = "vui lòng điền mật khẩu của bạn";
            return false;
        }else if (password != password2) {
            document.getElementById("helpblock").innerHTML = "2 mật khẩu không giống nhau";
            document.getElementById("helpblock1").innerHTML = "2 mật khẩu không giống nhau";
            return false;
        }else if (password.length < 5) {
            document.getElementById("helpblock").innerHTML = "mật khẩu phải lớn hơn 6 kí tự";
            return false;
        }
        else{
            return true;
        }
        return false;
    }
</script>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
