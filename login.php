<?php
ob_start();
session_start();
?>

<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
</head>

<body>  

<?php if (!isset($_SESSION['username'])){
   echo "<h1>Login Form</h1>
    <form method='post' action='login-process.php'>
        <div> 
            <input type='text' placeholder='Enter Username' name='username' required><br/><br />
            <input type='password' placeholder='Enter Password' name='password' required><br /><br />
            <button type='submit'>Login</button>
            <a href='signup.php'><button type='button'>Sign up page</button></a>
        </div> 
    </form>";
} else {
    header ("location: index.php");
} 
?>
</body>   
</html>