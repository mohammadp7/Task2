<?php
require_once('config.php');

$query = mysqli_query($conn, "Select * from license where used=1");
$count=mysqli_num_rows($query);
if ($count == 0){

echo "

<html>
<head>
</head>

<body>
    <form method='post' action='install-process.php' required>
    <input type='text' name='license' placeholder='Enter your license' required />
    <input type='email' name='email' placeholder='Enter your email' required />
    <input type='submit' value='submit' />
</form>
</body>

</html>

";
}
else {
    echo "This file cannot be executed more than once.";
}

