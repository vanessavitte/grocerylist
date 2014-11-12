<?php 
require('functions.php');
$operation=$_POST['operation'];
if($operation=="login"){    
    $username=$_POST['username'];
    $password=$_POST['password'];
    login_check($username, $password);      
}

?>


<html lang="en">
	<head>
		<title>Grocerylist.net</title>

			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<meta name="description" content="" />
			<meta name="author" content="Vanessa Vitte" >
			<link rel="canonical" href="http://www.grocerylist.net"/>
			<link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
			<link href='http://fonts.googleapis.com/css?family=Salsa' rel='stylesheet' type='text/css' >
			<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' >
			<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
			<script>
	  		for(var e,l='article aside footer header nav section time'.split(' ');e=l.pop();document.createElement(e))
			</script>

			
	</head>
<body>

	<?php include_once("header.php");?>

		<section>
			
			<article>
				
				
       
            <div id="login">
            	
               <form action="login.php" method="post" >
               <h2>Log In</h2>
               <h6>E-mail:</h6></br><input type="text" name="username" class="email"><br/>
               <h6>Password:</h6></br><input type="password" name="password" class="password"><br/>
               
               
               <input type="submit" name="operation" value="login" class="submit"/></form>
              
            
            </div>
            
   
				
			</article>

		</section>	
		<div id="foot" style="position: fixed; bottom: 0; width: 100%;">
			<?php include_once("footer.php");?>
		</div>