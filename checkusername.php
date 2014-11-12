<?php
require('dbconnection.php');
require('functions.php');
$fname=$_POST['fname'];
$username=$_POST['username'];
if(empty($username)){
header('location: signup.php?error=blank');


}
$password=$_POST['password'];

$con = mysql_connect(HOST, USER, PASS) or die("Could not connect to database.");
      mysql_select_db(DB, $con) or die("Could not select database.");
      $username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
      if(check_username($username))
      {
      header ("location: signup.php?user_check=true");      
      //echo "User Name already taken. Please choose a different username";
    }else{
    
    $query="INSERT INTO login(fname, username, password)
     VALUES('$fname','$username','$password')";
      mysql_query($query);  
    if (mysql_num_rows){
      header ("location: userhome.php");
      }else{
      header ("location: features.php");
    }

 }
    
  ?> 