<?php
//complete tickets


   include 'database.php';
   	
   echo '<div class="notification attention png_bg">
					   <a href="" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
        					<div id="messageDatabaseCompleted">
        					   Welcome.
        					</div>
   
					</div>';
   
   //connect to database and check info
   $con = @mysqli_connect($host,$user,$password,$database) or die('Connect Error: ' . mysqli_connect_errno());;
   
   
   if(isset($_POST['page']))
   {
       //get elements from page number = $page, $itemPerPage elements
       $page = ($_POST['page'] - 1) * $itemPerPage;
       $query = "SELECT * FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 1 ORDER BY timeIn LIMIT ".$page.",".$itemPerPage;
       	
   }
   else
   {
       //get from the beginning $itemPerPage elements
       $query = "SELECT * FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 1 ORDER BY timeIn LIMIT 0,".$itemPerPage;
   
   }
   
   
   $result = mysqli_query($con,$query);
    
   
   //calculate total number of elements of this type (pending)
   $query2 = "SELECT * FROM tickets WHERE date = '".date('Y-m-d')."' AND complete = 1 ORDER BY timeIn";
   $result2 = mysqli_query($con,$query2);
   $qty = mysqli_num_rows($result2);
   
   if(mysqli_num_rows($result))
   {
       ?>
   							<table>
   							
   							<thead>
   								<tr>
   								   <th><input class="check-all" type="checkbox" /></th>
   								   <th>Ticket Number </th>
   								   <th>Time In</th>
   								   <th>Time Out</th>
   								   <th>Price</th>
   								   <th>Date</th>
   								   <th class="option">Options</th>
   								</tr>
   								
   							</thead>
   						      
   						    <tbody>
   							
   							<?php	
   							    $alt_row = 0;
   								while ($row = mysqli_fetch_array($result))
   								{	
   							         if($alt_row%2 == 0)
   								        echo "<tr class='alt-row'>";
   							         else 
   							            echo "<tr>";
   							         $alt_row++;
       								    echo "<td><input type='checkbox'' /></td>";
       								    echo "<td>".$row["ticketNumber"]."</td>";
       								    echo "<td>".$row["timeIn"]."</td>";
       								    
       								    
       								   //time out
       								    echo "<td>";
       								        if($row["timeOut"] == "00:00:00")
       								        {
       								            echo " Undefined";
       								        }
       								        else 
       								            echo $row["timeOut"];
       								        echo "</td>";
       								    //price    
       								    echo "<td>";
       								    if($row["price"] == 0)
       								    {
       								        echo " Undefined";
       								    }
       								    else
       								        echo "$ ".$row["price"].".00";
       								    echo "</td>";
       								    
       								    
       								    echo "<td>".$row["date"]."</td>";
       								    echo "<td class='option'>";
       								        //<!-- Icons -->
       								            if($row["complete"]) //if the ticket is for a complete day
       								                echo "<a href='' title='Completed'><img src='resources/images/icons/tick_circle1.png' alt='Done' style='height: 20px; width: 20px;' /></a>";
       								            else
       								            {
       								                echo "<a href='' title='Check Price'><img src='resources/images/icons/dollarsign.png' alt='Check Price' style='height: 25px; width: 25px;' /></a>";
       								                echo "<a href='closeticket.php?ticketnumber=".$row["ticketNumber"]."' title='Close Ticket'><img src='resources/images/icons/cross1.png' alt='Close Ticket' style='height: 20px; width: 20px;' /></a>";
       								                
       								            
       								            }
       									echo "</td>";
   								    echo "</tr>";
   							
   							
   														
   					
   								}	
   						
   							echo"</tbody>";
   					   ?>
   							 
   							<tfoot>
   								<tr>
   									<td colspan="7">
   										
   										<?php 
   										$pages = ceil($qty / 5);
   										
   
   										
   										if($pages > 1)
   										{
   										
   										
   										echo "<div class='pagination' id='pagination3'>
   											<a href='' title='1'>&laquo; First</a>";
   											
   											
   											if(!isset($_POST['page']))
   											{
   											    echo "<a href='' title='1'>&laquo; Previous</a>";
   											    echo "<a href='' class='number current' title='1'>1</a>";
       											
   											    for($i=2;$i<=$pages;$i++)
   											    {
   											         echo "<a href='' class='number' title='".$i."'>".$i."</a>";
   											    }
   											    echo "<a href='' title='2'>Next &raquo;</a>";
   											}
   											else
   											{										    	
   											    $previous = $_POST['page']-1;
   										
   										         $next = $_POST['page']+1;
   										         
   										         echo "<a href='' title='".$previous."'>&laquo; Previous</a>";
   
   											    for($i=1;$i<=$pages;$i++)
   											    {
   											        if($i == $_POST['page']) 
   											             echo "<a href='' class='number current' title='".$i."'>".$i."</a>";
   											        else 
   											            echo "<a href='' class='number' title='".$i."'>".$i."</a>";
   											    }
   											    echo "<a href='' title='".$next."'>Next &raquo;</a>";
   											    
       										
   											}
   											
   											
   											echo "<a href='' title='".$pages."'>Last &raquo;</a>
   										</div> ";
   										//<!-- End .pagination -->
   										echo "<div class='clear'></div>";
   										}
   										
   										?>
   									</td>
   								</tr>
   							</tfoot>
   						</table>
   						<?php 
   							mysqli_close($con);
   							if(isset($_POST['page']))
   							     unset($_POST['page']);
   							
   						}
   						else
   						{
   								//print message saying there are no records.
   								?>
   								<script> 
   							    document.getElementById("messageDatabaseCompleted").innerHTML = "The Database is empty at this point.";
   							
   
   								</script>
   								<?php
   								
   							    mysqli_close($con);
   							    if(isset($_POST['page']))
   							         unset($_POST['page']);
   							    
   						}
   					
   					
   					
   										
   ?>
   						
   								
   							
       								    
       								      
   
   
   
   
   

   
   

  
     