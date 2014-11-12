<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grocerylist.net</title>

			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<meta name="description" content="" >
			<meta name="author" content="Vanessa Vitte">
			<link rel="canonical" href="http://www.grocerylist.net"/>
			<link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
			<link href='http://fonts.googleapis.com/css?family=Salsa' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
			<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
		<script>
	  		for(var e,l='article aside footer header nav section time'.split(' ');e=l.pop();document.createElement(e));
			</script>	

			
	</head>
<body>

	<?php include_once("header.php");?>
	
		<section>
			
			<article>
				
			<div id="create">
            	
                <form action="checkusername.php" method="post" class="login">
               <h2>Create An Account</h2>
               <h6>First Name:</h6></br><input type="text" name="fname" class="fname"><br/>
               <h6>E-mail:</h6></br><input type="text" name="username" class="username"><br/>
               <h6>Password:</h6></br><input type="password" name="password" class="password2"><br/>
                
               
               <input type="submit" name="operation" value="Create Account" class="submit2"/></form>
              
              <?php
$user_check=$_GET['user_check'];
if($user_check){

echo "User Name already taken. Please choose a different username";
}
?>
            
            </div>
				
				
			</article>

		</section>	
		<div id="foot" style="position: fixed; bottom: 0; width: 100%;">
			<?php include_once("footer.php");?>
		</div>
