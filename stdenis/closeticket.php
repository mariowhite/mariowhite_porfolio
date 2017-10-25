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

    $ticketNumber = $_GET["ticketnumber"];
    //echo date_default_timezone_get();

    $timeOut = date('H:i:s', gmdate('U'));
   
    $finalprice = $price_complete;
    
    $query = "SELECT timeIn FROM tickets WHERE ticketNumber = '$ticketNumber'";
    
    if (!mysqli_query($con,$query))
    {
        //error
        die('Error: ' . mysqli_error($con));
    
    }
   
    $result = mysqli_query($con,$query);
   
    $row = mysqli_fetch_array($result);
    
    $timeIn = $row["timeIn"];
    
    $time = $timeOut - $timeIn;
    
    if($time<2)
        $finalprice = $priceup2h;
    else if($time >=2 && $time<6)
        $finalprice = $priceup6h;
    
    //$date = date('Y-m-d');

    //$user = $_SESSION["user"];
    //$username = $user["username"];

    $sql = "UPDATE tickets SET timeOut = '$timeOut', complete = 1, price = '$finalprice' WHERE ticketNumber = '$ticketNumber'" ;


    if (!mysqli_query($con,$sql))
    {
        //error
        die('Error: ' . mysqli_error($con));

    }
    else
    {
        //success
        mysqli_close($con);
        header( $base_url. 'main.php?info='.urlencode('Ticket closed successfully.') ) ;
    }

}

mysqli_close($con);



?>