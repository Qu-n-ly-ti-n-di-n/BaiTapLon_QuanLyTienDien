<?php 
    include ("../connect.php");
    if(isset($_POST['masv']) && isset($_POST['tensv']) && isset($_POST['malop']) && isset($_POST['gioitinh']) && isset($_POST['sodienthoai']) && isset($_POST['email']) && isset($_POST['diachi']))
    {
        $update = "UPDATE sinhvien SET MaSV = '".$_POST['masv']."', TenSV = '".$_POST['tensv']."', MaLop ='".$_POST['malop']."',GioiTinh = '".$_POST['gioitinh']."',SĐT = '".$_POST['sodienthoai']."',Email = '".$_POST['email']."',DiaChi= '".$_POST['diachi']."' WHERE MaSV ='".$_GET['id']."' ";     
        if(empty($_POST['masv']) || empty($_POST['tensv']) || empty($_POST['malop']) || empty($_POST['gioitinh']) || empty($_POST['sodienthoai']) || empty($_POST['email']) || empty($_POST['diachi']))
        {
            echo "Mời bạn nhập đầy đủ thông tin .<a href='javascript: history.go(-1)'>Trở lại</a>"; 
            exit();
        }
                 
        if( mysqli_query($connect,$update))
        {
            header('location:../TrangSauDangNhap/RoleGVSinhVien.php');
        }
        else 
        {
            echo "Mời bạn nhập lại mã khoa";
        }
    }                         
?>