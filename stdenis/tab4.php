<?php
// balance

					include 'database.php';
			 /*
					echo '<div class="notification attention png_bg">
					   <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
        					<div id="messageDatabase">
        					   Welcome.
        					</div>
						
					</div>';
                */
					//connect to database and check info
					$con = mysqli_connect($host,$user,$password,$database);


					// Check connection
					if (mysqli_connect_errno($con))
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					else
					{
						
				        
						//get total balance amount finished tickets
						$query1 = "SELECT SUM(price) AS balance FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 1";
						$result1 = mysqli_query($con,$query1);
						$row1 = mysqli_fetch_array($result1);
						$balance = $row1['balance'];
						
						//completed
						$query2 = "SELECT * FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 1";
						$result2 = mysqli_query($con,$query2);
						$completed = mysqli_num_rows($result2);
						
						//pending
						$query3 = "SELECT * FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 0";
						$result3 = mysqli_query($con,$query3);
						$pending = mysqli_num_rows($result3);
				        
						//estimate pending balance
						$pendingbalance = 0;
						$timeOut = date('H:i:s', gmdate('U')); //assuming timeout as time now
						if(mysqli_num_rows($result3)) //if there are pending tickets
						while ($row = mysqli_fetch_array($result3))
						{
						        $timeIn = $row["timeIn"];
    
                                $time = $timeOut - $timeIn;
                                
                                if($time<2)
                                    $pendingbalance += $priceup2h;
                                else if($time >=2 && $time<6)
                                    $pendingbalance += $priceup6h;
                                else
                                    $pendingbalance += $price_complete;
						}
						
						
						
						if(mysqli_num_rows($result1))
						{ 
				?>
					<table>
							
							<thead>
								<tr>
								   
								   <th class="option">Date</th>
								   <th class="option">Completed Tickets </th>
								   <th class="option">Current Balance </th>
						           <th class="option">Pending Tickets </th> 
						           <th class="option">Pending Balance </th> 
								 
								</tr>
								
							</thead>
						      
						    <tbody>
							
							<?php	
								    echo "<tr>";
    								   
    								    echo "<td class='option'>".date('Y-m-d')."</td>";
    								    echo "<td class='option'>".$completed."</td>";
    								    echo "<td class='option'> $ ".$balance.".00</td>";
    							  	    echo "<td class='option'>".$pending."</td>"; 
    							  	    echo "<td class='option'> $ ".$pendingbalance.".00</td>";
    								    
								    echo "</tr>";
						
					   ?>
	                      </tbody>
	                 </table>
					<br>		
					<h3>Total Estimated Balance: $ <?php echo $balance + $pendingbalance;?>.00</h3>		
					<!-- End #tab1 -->
					
					<?php
							
					}
				}
					
			mysqli_close($con);
					
					
						
						
						
				
					
					
						
?>