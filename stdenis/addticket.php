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

    $ticketNumber = $_POST["ticket"];
    
    
    $timeIn = date('H:i:s', gmdate('U'));
    $timeOut = "";
    
    $date = date('Y-m-d');
    
    $type = $_POST["tickettype"];
    
    $price = 0; //initially 0 until timeOut is updated
    $complete = 0;
    
    if($type == "Complete")
    {
        $price = $price_complete; //price for one complete day
        $complete = 1;
        $timeOut = "24:00:00";
    }
    $user = $_SESSION["user"];
    $username = $user["username"];
      
        

    $sql = "INSERT INTO tickets (ticketNumber, timeIn, timeOut, price, date, username, complete )
    VALUES('$ticketNumber','$timeIn','$timeOut','$price', '$date', '$username','$complete')";

    
    

    if (!mysqli_query($con,$sql))
    {
        //error
        die('Error: ' . mysqli_error($con));

    }
    else
    {
        //success
        mysqli_close($con);
        //echo "Ticket added successfully.";
        header( $base_url. 'main.php?info='.urlencode('Ticket added successfully.') ) ;
    }

    mysqli_close($con);
    
}




?>