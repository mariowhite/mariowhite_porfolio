<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Parking</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	   <script>
	    
	    
	   
        $(document).ready(function() {
        	$("#tab1").load( "tab1.php"); //load initial records
        	$("#tab2").load( "tab2.php"); //load initial records
        	$("#tab3").load( "tab3.php"); //load initial records
        	
        	        
            //left menu option selector 
            $("#main-nav li a").click(function(event){     
            	event.preventDefault();
                if(!$(this).hasClass("current")){
               
                	$(this).addClass("current");
                    $(this).parent().siblings().children().removeClass("current");
                    $(this).parent().siblings().children().children().siblings().children().removeClass("current");
                   
                    
                }

                   var href = $(this).attr('href');
         
                   if(href == "#tab1" || href == "#tab2" || href == "#tab3" || href == "#tab4")
                   {
                        
                        $(".content-box-tabs li a").each(function(){ 
                        
                                if($(this).attr('href')== href)
                                    $(this).addClass('current');
                                else
                                    $(this).removeClass('current');       

                                /*
                                if($(this).attr('href')== "#tab1")
                                 {
                                	$.ajax({
                                        type: "POST",
                                        url: "tab1.php",
                                        data: { page: '1'},
                                        success: function( result ) {
                                        	
                                            $("#tab1").html(result);
                                            
                                        } 
                                    });
                                    }
                                */
                               
                            });
        
                        $(href).css("display","block");
                        $(href).siblings().css("display","none");
                   }

                return false;
                
     
               
            });


            $(document).on("click", "#pagination1 a", function(event){

            	    
                event.preventDefault();
                
              
                    $.ajax({
                        type: "POST",
                        url: "tab1.php",
                        data: { page: $(this).attr('title')},
                        
                
                        success: function( result ) {
                        	console.log(result);
                            $("#tab1").html(result);
                           
                        } 
                    });
               
                    
                });

            $(document).on("click", "#pagination2 a", function(event){

        	    
                event.preventDefault();
                
              
                    $.ajax({
                        type: "POST",
                        url: "tab2.php",
                        data: { page: $(this).attr('title')},
                        
                
                        success: function( result ) {
                        	console.log(result);
                            $("#tab2").html(result);
                           
                        } 
                    });
               
                    
                });

            $(document).on("click", "#pagination3 a", function(event){

        	    
                event.preventDefault();
                
              
                    $.ajax({
                        type: "POST",
                        url: "tab3.php",
                        data: { page: $(this).attr('title')},
                        
                
                        success: function( result ) {
                        	console.log(result);
                            $("#tab3").html(result);
                           
                        } 
                    });
               
                    
                });

            //add ticket
            $(document).on("click", "#add", function(event){
        	
                /*
        	    alert($("#addticket").serialize());
            	                   	
            	    $.ajax({
            	        url: 'addticket.php',
            	        type: 'post',
            	        dataType: 'json',
            	        data: $('#addticket').serialize(),
            	        success: function(data) {
            	                   $("#messageDatabaseAll").html(data);
            	                 }
            	    });

            	    
            	    event.preventDefault();
            	    $("#ticket").css("display,none");
          		    //return false;
         		   

          		  */  
            	});
          	  
          	

            
            
            
        }); //closing document.ready





    
        </script>
	
</head>
   
  
	<body>
	
	<?PHP
	   include 'url.php';
	   include 'language.php';
    
        //check for a correct login session
        //session_start();

            if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) 
            {
                $msg = "Please LOGIN first. Enter your Username and Password.";
                header( $base_url. 'index.php?msg='.urlencode($msg)) ;
               

            }
            else 
                $user = $_SESSION["user"];
    ?>
	
	
	
	
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Parking</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo2.png" alt="St Denis logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				 Hello, <?php echo $user["firstName"]; ?>
			         <br />
		         <a href="language.php" title="Language"><?php echo $language; ?></a> | <a href="logout.php" title="Sign Out">Sign Out</a>
			</div>        
			
			<?php include 'leftmenu.php'; ?>
			
			
		<!-- End #main-nav -->
			
			<div id="ticket" style="display: none"> 
			<!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				
			     <!--  
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				-->
				
				
				<!-- add new ticket form -->
				<form method="post" id="addticket" action="addticket.php">
					
					<h4>New Ticket:</h4>
					<fieldset>
					<p>Enter the ticket number.</p>
						<input type="text" name="ticket" />
						<select name="tickettype" id="tickettype">
							<option value="Complete">Complete</option>
							<option value="Partial">Partial</option>
						</select>
					</fieldset>
					<fieldset>
						<input class="button" type="submit" value="Add" id="add" />
					</fieldset>
				</form>
				
			</div> 
			
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			<!-- Show a notification if the user has disabled javascript -->
			<noscript> 
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					Download From <a href="http://www.exet.tk">exet.tk</a></div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2><?php echo $user["firstName"]." ".$user["lastName"]; ?></h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				<!--  
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					New Day
				</span></a></li>
				-->
				
				<li><a class="shortcut-button" href="#ticket" rel="modal"><span>
					<img src="resources/images/icons/addTicket.png" alt="icon" width="48" height="48" /><br />
					Add a Ticket
				</span></a></li>
				
				<!--  
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				-->
			</ul>
			<!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<!-- Start Content Box -->
			<div class="content-box">
				<div class="content-box-header">
					<h3>Ticket Sales</h3>
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="current">All</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Pending</a></li>
						<li><a href="#tab3">Completed</a></li>
						<li><a href="#tab4">Current Balance</a></li>
					</ul>
					
				    <div class="clear"></div>
					
				</div> 
				<!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					   <?php //include 'tab1.php'; ?>
					</div>	
						
			        
					<div class="tab-content" id="tab2">
						<?php //include 'tab2.php'; ?>
					</div> 
					      
					<div class="tab-content" id="tab3">
					   <?php //include 'tab3.php'; ?>
					</div>    
					
					<div class="tab-content" id="tab4">
					   <?php include 'tab4.php'; ?>
					</div>   
					
				</div> <!-- End .content-box-content -->
				
			</div> 
			<!-- End .content-box -->
			
			<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Messages</h3>
					
				</div> 
				<!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box will be open if there are message to be shown</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right closed-box">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Important Information</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			<?php include 'notifications.php'; ?>
			
			<!-- End Notifications -->
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2015 St-Denis | Powered by: <a href="http://www.mariowhitewebsite.com">MARIOWHITE</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>
