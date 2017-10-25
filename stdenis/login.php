<?php


include 'database.php';
include 'url.php';

//take values from method POST (user name and password)
$name = $_POST["user"];
$pwd = $_POST["pwd"];

//connect to database and check info
$con=mysqli_connect($host,$user,$password,$database);


// Check connection
if (mysqli_connect_errno($con))
{
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
	
	$query = "SELECT * FROM users WHERE username = '$name' && password = '$pwd'";
	$result = mysqli_query($con,$query);


	$row = mysqli_fetch_array($result);

	if($row)
  	{
  		session_start();
  	
  		//create a session variable with all the information of the user
		$_SESSION['user']=$row;
		
  		
  		header( $base_url. 'main.php' ) ;
		
		
  	}
  	else
  	{
  		//msg = 1 invalid user
  	    $msg = "Invalid Username or Password. Please try again.";
  	    header( $base_url. 'index.php?msg='.urlencode($msg)) ;
  	    
	
		
  	}
	
}

mysqli_close($con);


?>

