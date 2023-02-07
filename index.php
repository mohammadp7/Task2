<?php
session_start();
require_once('config.php');
?>

<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
 
</head>

<body>  

<?php

if (isset($_SESSION['username'])){

            if ($_SESSION['username'] == 'admin') {
                echo "<div style='text-align:center;'><h1 style='font-weight:bold;color:green;'>داشبورد ادمین</h1>

                <a href='logout.php'><button type='button'>logout</button></a>
                </div>
                ";
            } else {
            echo "<div style='text-align:center;'><h1 style='font-weight:bold;color:green;'>داشبورد</h1>

            <a href='logout.php'><button type='button'>logout</button></a>
            </div>
            ";}

}

else {

    echo "<div style='text-align:center;'>

    <h1>جهت دسترسی به داشبورد نیاز است وارد شوید</h1>

    <a href='login.php'><button type='button'>login</button></a>
    <a href='signup.php'><button type='button'>Sign up</button></a>


</div>";



$query = mysqli_query($conn, "Select * from license where used=1");
$count=mysqli_num_rows($query);
if ($count == 0){
    echo "<div style='text-align:center;'>

    <h3 style='color:red'>با توجه به اینکه این محصول فعال نمی باشد. جهت فعالسازی و ساخت یوزر ادمین به لینک زیر مراجعه نمایید</h3>
    
    <a href='install.php'><button type='button'>install</button></a>
    </div>";
}
}
?>

</body>   
</html>
