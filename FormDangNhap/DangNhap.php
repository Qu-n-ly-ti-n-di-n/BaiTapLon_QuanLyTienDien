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
                                <input type="submit" name="submit" class="btn btn-primary btn-md" value="Đăng nhập" onclick="location.href=''">
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
    </div>
</body>

</html>