<?php

session_start();

include 'database.php';
include 'url.php';

$con = mysqli_connect($host,$user,$password,$database);

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    mysqli_close($con);
}
else
{
    //get variables passed by POST method
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $userName = $_POST['uname'];
    $password = $_POST['password1'];
    $language = $_POST['language'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
    $memberSince = date('Y-m-d');

    

    $sql = "INSERT INTO users (username, password, type, firstName, lastName, memberSince, comments, language) 
    VALUES ('$userName', '$password', '$type', '$firstName', '$lastName', '$memberSince', '$comment', '$language')";
    

    if (!mysqli_query($con,$sql))
    {
        //error
        die('Error: ' . mysqli_error($con));

    }
    else
    {
        //success
        mysqli_close($con);
        header( $base_url. 'main.php?info='.urlencode('User added successfully.') ) ;
    }

}

mysqli_close($con);



?>