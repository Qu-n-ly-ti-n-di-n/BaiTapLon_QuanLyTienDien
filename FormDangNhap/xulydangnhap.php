<?php
session_start();
$userName = $_POST['username'];
$passWord = $_POST['passWord'];
include 'connnect.php';
$sql = "SELECT * FROM user WHERE userID = '$userName'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_assoc($result);
    $hass=$row['passWord'];
	if(password_verify($password,$hass)){
		$_SESSION['username'] = $username;
		$_SESSION['lv'] = $row['role'];
		//$_SESSION['name'] = $row['Name'];
		echo '1';
	}
	else{
        echo '0';
    }   
}
mysqli_close($connect);
mysqli_free_result($result);
?>