<center>
	<div class="container" style="max-width:800px;max-height: 600px;font-family: Arial;">
		<div class="box-1" style="width: 100%;height:13%;background-color: #f5f8fa;line-height: 85px;">
			<a href="http://ducpanda.net" style="color:#bbbfc3;text-decoration: none;font-size: 20px "><b>DUCPANDA BLOG</b></a>
		</div>
		<div class="box-2" style="width: 100%;height: 60%;text-align: left;">
			<div class="content" style="max-width: 70%;margin: auto; ">

				<h3>XIN CHÀO !</h3>
				<p style="color:#74787e">Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
				<center> 
					<button style="background: green; padding: 10px 10px 10px 10px;border-radius: 5px;border:1px solid green;margin-top: 50px;margin-bottom: 50px;"><a href="{{url('changepassword/token=')}}{{$linktoken}}" style="color:white;text-decoration: none;">Reset Password</a></button>
				</center>
				<p style="color:#74787e">
				Nếu bạn không yêu cầu đặt lại mật khẩu, bạn không cần thực hiện thêm hành động nào nữa.</p>
				<br>
				<p style="color:#74787e">Quản Trị Viên,<br> <b>Ducpanda</b></p>
				<hr>
				<p style="font-size: 13px">Nếu bạn gặp sự cố khi nhấp vào nút "Reset Password", hãy sao chép và dán URL dưới đây vào trình duyệt web của bạn: <a href="{{url('changepassword/token=')}}{{$linktoken}}" >{{url('changepassword/token=')}}{{$linktoken}}</a></p>


			</div>

		</div>
<br>
		<div class="box-4" style="width: 100%;height:13%;background-color: #f5f8fa;margin-bottom: 100px;line-height: 80px;font-size: 14px;color:gray; ">
		Copyright © ducpanda blog. All right reserved.
		</div>
		
	</div>
</center>