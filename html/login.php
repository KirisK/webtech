<?php

include('../db.php');
session_start();

if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $user, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">you broke something with the DB connection</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">please work</p>';
        } else {
            echo '<p class="error">it didnt work and/or wrong password</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylesheet.css">
</head>
<body>
<div id="container">
    <div id="main">
        <header>
            <img class="banner" src="../images/banner.jpg" alt="banner">
        </header>

        <div class="topnav">
            <a href="home.html">Home</a>
            <a href="services.html">Services</a>
            <a href="terms.html">Terms</a>
            <a href="ims.html">About IMS</a>
            <a href="contact.html">Contacts</a>
            <a href="login.php">Login</a>
            <a href="registration.php">Register</a>
        </div>

        <h1 class="heading1">Login</h1>

        <p class="contacttext">Login into your account to apply for the insurance!</p>
        <form class="login" method="post" action="" name="signin-form" >
            <label for="username"></label>
            <input class="input" type="text" name="username" pattern="[a-zA-Z0-9]+" id="username" placeholder="Username" required><br />
            <label for="password"></label>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required><br />
            <button class="button1" type="submit" name="login">Log in</button>
        </form>
    </div>
</div>
<footer id="footer">
    <p>ICD0007 TeamProject</p>
</footer>
</body>
</html>
