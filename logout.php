<?PHP
   session_start();
   unset($_SESSION['username']);
   
   echo "
   <p>شما با موفقیت خارج شدید.</p>
   <a href='login.php'><button type='button'>login</button></a>
   <a href='index.php'><button type='button'>main page</button></a>";
?> 