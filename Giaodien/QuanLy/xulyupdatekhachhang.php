<?php
    include '../../FormDangNhap/connect.php';
    $makh = $_POST['makh'];
    $ten = $_POST['ten'];
    $ngaysinh = $_POST['ngaysinh'];
    $que = $_POST['quequan'];
    $sdt = $_POST['SDT'];
    $email = $_POST['Email'];
    $sothe = $_POST['Sothe'];     
   
        if(isset($_POST['makh']) && isset($_POST['ten']) && isset($_POST['ngaysinh']) && isset($_POST['quequan'])&& isset($_POST['SDT']) && isset($_POST['Email']) && isset($_POST['Sothe']))
        {
            $query1="UPDATE khachhang SET MaKH = '".$makh."', TenKH = '".$ten."', NgaySinh ='".$ngaysinh."',Email ='".$email."',DiaChi ='".$que."',SDT = '".$sdt."',MaThe = '".$sothe."'where MaKH ='". $_GET['id']."'";
            if(empty($_POST['makh']) || empty($_POST['ten']) || empty($_POST['ngaysinh']) || empty($_POST['quequan'])|| empty($_POST['SDT']) || empty($_POST['Email']) || empty($_POST['Sothe']))
            {
                echo "Mời bạn nhập đầy đủ thông tin .<a href='javascript: history.go(-1)'>Trở lại</a>"; 
                exit();
            }
            if (mysqli_query($connect, $query1)) {
                header("location:khachhang.php");
            } else {
                echo "Lỗi: " . $query1 . "<br>" . mysqli_error($connect);
            }
        }  
?>