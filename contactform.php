<?php

//Logic behind the PHP form, its quite basic, asking for name, subject, mail address, and message

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sub = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    //Still need to set up the DB connect to actully test this mail

    $mailTo = "notrealmail@fake.net";
    $headers = "From: ".$mailFrom;
    $txt = "Test mail from ".$name.".\n\n".$message;

    //mail function is nice, but will be commented out till we do MSQL.
    //mail($mailTo, $sub, $txt, $headers);
    
    //Leads back to  homepage, added a confirmation page that waits 5 seconds, or lets you click a link.
    //echo("Thank you for your mail, you will now be redirected back to the homepage in 5 seconds.")
    header("Location: html/redirect.html");
    header("Refresh: 5, Location: html/home.html?_ijt=88c49rui9mnfi0b87shpkua66e");


     //This should write the previous mail into a text file as a backup.
    $writeFile = fopen("mailbackups.txt", "a+") or die ("Oopsie, you broke the file");


    fwrite($writeFile, "Name: ".$name."\n");
    fwrite($writeFile, "Mail Subject: ".$sub."\n");
    fwrite($writeFile, "Content : ".$txt."\n");
    fwrite($writeFile, "".$headers."\n");
    fwrite($writeFile, "\n\n");
    fclose($writeFile);



}