<?php

//Logic behind the PHP form, its quite basic, asking for name, subject, mail address, and message

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sub = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    //Still need to set up the DB connect to actully test this mail ending, for now it will do nothing but display the php page.

    $mailTo = "notrealmail@fake.net"
    $headers = "From: ".$mailFrom;
    $txt = "Test mail from ".$name.".\n\n".$message;

    //mail function is nice :D

    mail($mailTo, $sub, $txt, $headers);
    header("Location: contact.php?mailsend");
    echo "Worked!";
}