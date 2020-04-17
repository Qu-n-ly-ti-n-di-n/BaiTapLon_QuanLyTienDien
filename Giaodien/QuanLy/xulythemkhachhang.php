<?php
    include '../../FormDangNhap/connect.php';
    $makh = $_POST['makh'];
    $ten = $_POST['ten'];
    $ngaysinh = $_POST['ngaysinh'];
    $que = $_POST['quequan'];
    $sdt = $_POST['SDT'];
    $email = $_POST['Email'];
    $sothe = $_POST['Sothe'];     
    $query1="INSERT INTO user VALUES('".$makh."','".$ten."','".$ngaysinh."','".$que."','".$sdt."','".$email."','".$sthe."')";
        if(isset($_POST['username']) && isset($_POST['mkhau']) && isset($_POST['confimMK']) && isset($_POST['name']))
        {
            if(empty($_POST['username']) || empty($_POST['mkhau']) || empty($_POST['confimMK']) || empty($_POST['name']))
            {
                echo "Mời bạn nhập đầy đủ thông tin .<a href='javascript: history.go(-1)'>Trở lại</a>"; 
                exit();
            }
            if (mysqli_query($connect, $query1)) {
                header("location:taikhoan.php");
            } else {
                echo "Lỗi: " . $query1 . "<br>" . mysqli_error($connect);
            }
        }  
?>