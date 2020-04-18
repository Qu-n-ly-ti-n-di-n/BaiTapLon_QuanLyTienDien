<?php
session_start();
if(isset($_SESSION['lv'])){
    if($_SESSION['lv'] == 'QL'){
        header("location:../Giaodien/QuanLy/");

    }

}
?>