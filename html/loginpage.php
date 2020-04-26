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
    <title>Title</title>
    <link rel="stylesheet" href="../styles/stylesheet.css">
</head>
<body>
<header>
    <img class="banner" src="../images/banner.jpg" alt="banner">
</header>

<div class="topnav">
    <a href="home.html?_ijt=88c49rui9mnfi0b87shpkua66e" style="width:17.5%">Home</a>
    <a href="link1.html?_ijt=5eka7fb121ok3bqbnqa52otqck" style="width:17.5%">Services</a>
    <a href="link2.html?_ijt=5eka7fb121ok3bqbnqa52otqck" style="width:17.5%">Terms</a>
    <a href="link3.html?_ijt=5eka7fb121ok3bqbnqa52otqck" style="width:17.5%">About IMS</a>
    <a href="contact.html?_ijt=2munarh10ialn594f11lh9j4pl" style="width:17%">Contacts</a>
</div>
<h1 class="heading1">Our Terms</h1>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>



<footer>
    <p>ICD0007 TeamProject</p>
</footer>
</body>
</html>