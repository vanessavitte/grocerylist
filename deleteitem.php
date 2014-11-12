<?php
session_start();
$user_id=$_SESSION['user_id'];
require('dbconnection.php');
require('functions.php');
$item_id=$_POST['item_id'];
$gl_id=$_POST['gl_id'];


  
   if(delete_item($item_id))
      {
    header ("location: editlist.php?gl_id=". $gl_id);      
     

    }else{
     "There seems to be an error. Please notify Vanessa of the problem.";

   
      }   
    
  ?> 