<?php
session_start();
$user_id=$_SESSION['user_id'];

?> 




<html lang="en">
	<head>
		<title>Grocerylist.net</title>

			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<meta name="description" content="" />
			<meta name="author" content="Vanessa Vitte">
			<link rel="canonical" href="http://www.grocerylist.net"/>
			<link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
			<link href='http://fonts.googleapis.com/css?family=Salsa' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
			<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
			<script>
	  		for(var e,l='article aside footer header nav section time'.split(' ');e=l.pop();document.createElement(e))
			</script>

			
	</head>
<body>

	<?php include_once("headerlogout.php");?>
	
    	
		<section>
			
			
	
			<article>
				
			  <div id="lists">	
       
            			<div id="mylists">
            	
               				<form action="####" method="post" >
               					<h2>My Lists</h2>
               					
               				 <?php
					            
					     require('dbconnection.php');
					     $con = mysqli_connect(HOST, USER, PASS, DB);
					     $query="SELECT * FROM grocery_list WHERE user_id='$user_id'";
					     $result=mysqli_query($con, $query) or die(mysql_error($con));
					     while($row=mysqli_fetch_array($result))
					     
					     	{
					          echo "<a href=editlist.php?gl_id=" . $row['gl_id'] . "><div id='boldtitle'>".$row['gl_name']."</a><br></div>".
					          					          
					          "<form action='editblist.php' method='post' type='hidden' name='gl_id'>
     <input type='hidden' name='gl_id' value='".$row['gl_id']."'></form>";
       						}
       										 
					      mysqli_close($con); 
					          
					   ?> 
		
			  	
			     
			     
               
               				</form>
              			</div>
            		</div>
            
           			 <div id="createlists">
            	
               				
              					 <h2>Create A List</h2>
              					 
              					 <h6>Name</h6>
              					 
              					 
              					 <form action='grocerylistname.php' method='post' type='hidden'>              					 
              					    <input type="text" size="40" name='gl_name' class="gl_name" placeholder="Name Your List"></br>              					       
			     			    <input type='submit' value='Create'  class="createbtn" name='createbtn'>
			     			 </form>
              					 
              					
              					
              
            			</div>
            
            			<div id="premadelists">
            				
              				 <form action="####" method="post" >
               					<h2>Premade Lists</h2>
               
               				<?php
					            
					     require('dbconnection.php');
					     $con = mysqli_connect(HOST, USER, PASS, DB);
					     $query="SELECT * FROM premadelists";
					     $result=mysqli_query($con, $query) or die(mysql_error($con));
					     while($row=mysqli_fetch_array($result)){?>
					          
					          <a href="editlist.php?gl_id=<?php echo $row['gl_id']?>&premade=yes"><div id='boldtitle'><?php echo $row['gl_name'] ?></a><br></div>
					          					          
					          <?php echo "<form action='editblist.php' method='post' type='hidden' name='gl_id'>
     <input type='hidden' name='gl_id' value='".$row['gl_id']."'></form>";
       						}
				 mysqli_close($con); 
					          
					   ?> 
              		
            			</div>
            
   
			  </div>
			</article>
		</section>	

		<?php include_once("footer.php");?>


		
</body>
</html>






	
	
		