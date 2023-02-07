<html>
    <head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
    
<?php 
require_once('config.php');


#form validation and register
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){ 
	$username = mysqli_real_escape_string($conn, $_POST['username']); 
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']); 
	

	#username validation
	if (empty($username))
    {echo "<div class='msg'>فیلد نام کاربری خالی است</div>";
	exit;}
	
	if ($username=="admin" or $username=="administrator" or $username=="root"){echo "<div class='msg'>این نام کاربری مجاز نیست</div>";
	exit;}
	
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '".$username."'");
	if(mysqli_num_rows($result)>0){ 
		echo "<div class='msg'>نام کاربری تکراری می باشد</div>";
	exit;} 
	#/username validation


	#email validation
	if (empty($email))
    {echo "<div class='msg'>فیلد ایمیل خالی است</div>";
	exit;}
	
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
	{echo "<div class='msg'>ایمیل نامعتبر است. لطفا ایمیل خود را به طور صحیح وارد نمایید.</div>";
	exit;}

	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '".$email."'");
	if(mysqli_num_rows($result)>0){ 
		echo "<div class='msg'>ایمیل تکراری می باشد</div>"; 
	exit;} 
 	#/email validation


 
 	#password validation
  	if (empty($_POST['password']))
    {echo "<div class='msg'>فیلد رمز عبور خالی است</div>";
	exit;}
	
	  if (strlen($_POST['password'])<6 or strlen($_POST['password'])>12)
    {echo "<div class='msg'>تعداد کاراکترهای رمز عبور باید بین 6 تا 12 کاراکتر باشد</div>";
	exit;}
	
		if($_POST['password'] != $_POST['password2'] ){
	echo "<div class='msg'>مقادیر فیلد های رمز عبور یکسان نیست</div>";
	exit;}
	#/password validation



	#register
    $query="INSERT INTO users (username,password,email) values ('$username','$password','$email')";
    if (mysqli_query($conn, $query)) {
        echo "<div class='msg'>ثبت نام شما با موفقیت انجام شد. برای رفتن به صفحه اصلی <a href='index.php'>اینجا</a> کلیک کنید</div>";
		}

	else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
	#/register
		

}
else {
    
    echo "please fill out the form properly!";
}
#/form validation and register


mysqli_close($conn);
?>

</body>
</html>