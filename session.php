<?php
//just as example to see if it works
$myemail = 'karina@gmail.com';
$mypass = '12345';
if(isset($_POST['login'])){
    $email = $_POST['mail'];
    $pass = $_POST['password'];
    if($email == $myemail and $pass == $mypass) {
        session_name("Profile");
        session_start();
        $_SESSION['name'] = "Karina";
        $_SESSION['location'] = "20";
        echo '<p>Session has started</p>';
        echo "Name = ", $_SESSION['name'], "<br>", " Age = ", $_SESSION['location'], "<br>";
    } else {
        echo '<p>Pin is incorrect</p>';
        echo '<form action="html/login.php" method="POST" id="session">
               <input type="submit" value="Try again" name="try again">';
    }
}  else {
    header("location : /session.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
</head>
<body>

</body>
</html>