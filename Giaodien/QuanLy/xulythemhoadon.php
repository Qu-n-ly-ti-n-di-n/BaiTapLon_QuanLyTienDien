<?php
    include '../../connect.php';
    //lấy số tiền trên 1 số điện
    $sql = "SELECT * FROM trangthaisodien";
	$result = mysqli_query($connect,$sql);
    $row =mysqli_fetch_assoc($result);  
    //lấy chỉ sô điện cũ
    $makh = $_POST['makh'];
    $sql1 = "SELECT * FROM chisodiencu where MaKH = '$makh'";
    $result1 = mysqli_query($connect,$sql1);
    $row1 =mysqli_fetch_assoc($result1);
    //
    $mahd = $_POST['mahd'];
    $ngayphaithanhtoan = $_POST['ngayphaithanhtoan'];
    $ngaythanhtoan = "";
    $chisocu = $row1['chisocu'];
    $chisomoi = $_POST['chisomoi'];
    $soKwh = $chisomoi - $chisocu;
    $sotienKwh = $row['SoTien/Kwh'];
    $tongtien = $soKwh*$sotienKwh;
    $trangthai = "Chưa đóng";     
    $query1="INSERT INTO hoadon VALUES('".$mahd."','".$makh."','".$ngayphaithanhtoan."','".$ngaythanhtoan."',".$chisocu.",".$chisomoi.",".$soKwh.",".$sotienKwh.",".$tongtien.",'".$trangthai."')";
    $query2="UPDATE chisodiencu SET chisocu = $chisomoi WHERE MaKH = '$makh'";
        if(isset($_POST['mahd']) && isset($_POST['makh']) && isset($_POST['ngayphaithanhtoan']) && isset($_POST['chisomoi']))
        {
            if(empty($_POST['mahd']) || empty($_POST['makh']) || empty($_POST['ngayphaithanhtoan']) || empty($_POST['chisomoi']))
            {
                echo "Mời bạn nhập đầy đủ thông tin .<a href='javascript: history.go(-1)'>Trở lại</a>"; 
                exit();
            }
            if (mysqli_query($connect, $query1)) {
                mysqli_query($connect,$query2);
                header("location:hoadon.php");
            } else {
                echo "Lỗi: " . $query1 . "<br>" . mysqli_error($connect);
            }
        }  
?>