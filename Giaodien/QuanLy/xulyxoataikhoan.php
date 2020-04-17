<?php 
include '../../FormDangNhap/connect.php';
if(isset($_GET['id'])){
    $user=$_GET['id'];
    $query="delete from user where userID='$user'";
    mysqli_query($connect,$query) or die('Xóa không thành công');
    header('location:taikhoan.php');
}
?>