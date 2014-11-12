<?php
session_start();
$user_id=$_SESSION['user_id'];
require('dbconnection.php');
require('functions.php');
$gl_name=$_POST['gl_name'];
//$gl_id=$_POST['gl_id'];



      if($gl_id=new_list($gl_name, $user_id))
        {
      
    header ("location: editlist.php?gl_id=". $gl_id);      
     

    }else{
     "There seems to be an error. Please notify Vanessa of the problem.";

   
      }   
    
  ?> 
  
 