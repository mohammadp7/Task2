<?php
session_start();
require_once('config.php');
$username = $_POST['username'];
$password = MD5($_POST['password']);


$query = "Select * from users where username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$count=mysqli_num_rows($result);
	if ($result) {
			if ($count > 0) {
                $_SESSION['username'] = $_POST['username'];
				echo "
				<p>شما با موفقیت وارد شدید. هم اکنون میتوانید وارد داشبورد شوید</p>
				<a href='index.php'><button type='button'>داشبورد</button></a>
				";
			}
			else {
				echo "اطلاعات وارد شده اشتباه است";
			}	
		}
		
	else {
			echo "مشکل در اتصال به دیتابیس و اجرا کوئری";
		}



mysqli_close($conn);

?>