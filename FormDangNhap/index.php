<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/all.css">
    <link rel="stylesheet" href="style/style_dangnhap.css">
</head>

<body>
    <div id="login">
        <div class="container">
            <div class="alert alert-info , xinchao"  role="alert">
                <i class="far fa-hand-point-right"></i>  Chào mừng Quý Khách đến với trang đăng nhập của dịch vụ thanh toán tiền điện online <i class="far fa-hand-point-left"></i>
              </div>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center ">Đăng nhập <i class="far fa-user , account"></i></h3>
                            <div class="form-group">
                                <label for="username">Tài khoản:</label><br>
                                <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu:</label><br>
                                <input type="password" name="password" placeholder="mật khẩu" id="password" class="form-control">
                            </div>
                            <div class="form-group">                        
                                <button type="submit" id ="btndangnhap" class="btn btn-primary" name="btn_dangnhap" >Đăng nhập</button>
                            </div>
                            <div class="text-right phai">
                                <a href="" id="forgot-password" class=" text-danger ">Quên mật khẩu</a>
                                <br>
                                <a href="" class=" text-danger ">Quay về trang chủ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="error" style="color: red; margin-left:300px; "></div>
    </div>
    <script type="text/javascript">
		$("#btndangnhap").click(function() {
			var username=$("#username").val();
            var password=$("#password").val();
            var error = $("#error");
      
		if (username == "") {
			error.html("Tên đăng nhập không được để trống");
			return false;
		}
		
		if (password == "") {
			error.html("Mật khẩu không được để trống");
			return false;
		}
			$.ajax({
				url: 'xulydangnhap.php',
				type: 'POST',
				dataType: 'html',
				data: {username:username ,password:password},
				success:function(response){
					if(response== 1)
					{
						window.location="role.php";
					}
          else {error.html("Mật khẩu hoặc tài khoản không chính xác !");}

				}
			})		
		});
		
	</script> 
</body>

</html>