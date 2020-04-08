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
    
    //Leads back to  homepage, should probably make a page or JS pop up for confirmation, for now it will do.
    //TODO confirmation page
    header("Location: html/home.html?_ijt=88c49rui9mnfi0b87shpkua66e");
    
     //This should write the previous mail into a text file as a backup.

    $writeFile = fopen("mailbackups.txt", "a+") or die ("Oopsie, you broke the file");


    fwrite($writeFile, "".$name."\n");
    fwrite($writeFile, "".$sub."\n");
    fwrite($writeFile, "".$txt."\n");
    fwrite($writeFile, "".$headers."\n");
    fwrite($writeFile, "\n\n");
    fclose($writeFile);



}