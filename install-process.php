<html>
    <head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

<?php
require_once('config.php');
$license = $_POST['license'];
$email = mysqli_real_escape_string($conn, $_POST['email']);

#password generator
function generate_password($length){
	$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.'0123456789-=~!@#$%^&*+?';
  
	$str = '';
	$max = strlen($chars) - 1;
  
	for ($i=0; $i < $length; $i++)
	  $str .= $chars[random_int(0, $max)];
  
	return $str;
  }
  

$password_n = generate_password(rand(6,12));
$password= md5("$password_n");
#/password generator


#form validation
if (empty($license))
{echo "<div class='msg'>فیلد لایسنس خالی است.</div>";
exit;} else {$license = md5($_POST['license']);}


if (empty($email))
{echo "<div class='msg'>فیلد ایمیل خالی است</div>";
exit;}

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{echo "<div class='msg'>ایمیل نامعتبر است. لطفا ایمیل خود را به طور صحیح وارد نمایید.</div>";
exit;
}

$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '".$email."'");
if(mysqli_num_rows($result)>0){ 
	echo "<div class='msg'>ایمیل تکراری می باشد</div>";
exit;
} 
#/form validation




$query = "Select * from license where license='$license'";
$result = mysqli_query($conn, $query);
$count=mysqli_num_rows($result);
	if ($result) {
			if ($count > 0) {
				
				

				#1-check and creating admin
				$check_admin=mysqli_query($conn, "Select * from users where username='admin'");
				$admin_count=mysqli_num_rows($check_admin); 
					if ($admin_count > 0) {
						echo "admin already exists.";
						exit;}

					else {
					$create_admin=mysqli_query($conn, "INSERT INTO users (username,email,password) VALUES ('admin','$email','$password')");
						if (!$create_admin) {echo "error in creating admin."; exit;} else {$step1=1;}


				#2-set the license as used
				$used_license=mysqli_query($conn, "UPDATE license SET used='1' WHERE license='$license'");
				if (!$used_license) {echo "error in using the license.";exit;} else {$step2=1;}


						#check if the steps above are completed
						if ($step1 == 1 && $step2 == 1) {
							echo "
							<p>لایسنس صحیح است</p>
							<p>اطلاعات یوزر ادمین شما به شرح ذیل می باشد</p>
							<p>username: admin</p>
							<p>password: $password_n</p>
							<p>از طریق دکمه زیر میتوانید وارد صفحه لاگین شوید</p>
							<a href='login.php'><button type='button'>login</button></a>
							";
						}
						else {
							echo "The process is not completed.";
						}
					}
			}
			else {
				echo "لایسنس اشتباه است";
			}	
		}
		
	else {
			echo "مشکل در اتصال به دیتابیس و اجرا کوئری";
		}

?>

</body>
</html>