<!DOCTYPE html>
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Sign up Page </title>
 
</head>

<body>  
    <h1>Sign up Form</h1>
    <form method="post" action="signup-process.php">
        <div> 
            <input type="text" placeholder="Enter Username" name="username" required><br/><br />
            <input type="email" placeholder="Enter Email" name="email" required><br/><br />
            <input type="password" placeholder="Enter Password" name="password" required><br /><br />
            <input type="password" placeholder="Confirm Password" name="password2" required><br /><br />
            <button type="submit">Sign up</button>
            <a href="login.php"><button type="button">Login page</button></a>
        </div> 
    </form>   
</body>   
</html>
