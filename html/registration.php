<?php

include('../db.php');
session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $db->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">This email is already in use! Returning to registration</p>';
        sleep(5);
        header("Location: registration.php");
    }

    if ($query->rowCount() == 0) {
        $query = $db->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">You broke something, good job!</p>';
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

        <h1 class="heading1">Registration</h1>

        <p class="contacttext">Create an account to manage your insurance!</p>
        <form class="singup" method="post" action="" name="signup-form">
            <label for="username"></label>
            <input class="input" type="text" name="username" pattern="[a-zA-Z0-9]+" id="username" placeholder="Username" required><br />
            <label for="email"></label>
            <input class="input" type="email" name="email" id="email" placeholder="Email" required><br />
            <label for="password"></label>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required><br />
            <button class="button1" type="submit" name="register" >Register</button>
        </form>
    </div>
</div>
<footer id="footer">
    <p>ICD0007 TeamProject</p>
</footer>
</body>
</html>

