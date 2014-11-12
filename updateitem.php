<?php
session_start();
$user_id=$_SESSION['user_id'];
require('dbconnection.php');
require('functions.php');
$item_id=$_POST['item_id'];
$gl_name=$_POST['gl_name'];
$gl_id=$_POST['gl_id'];
$item_price=$_POST['item_price'];



  
   if(update_item($item_price, $item_id)) 
      {
    header ("location: editlist.php?gl_id=". $gl_id);      
     

    }else{
     "There seems to be an error. Please notify Vanessa of the problem.";

   
      }   
    
  
    
  ?> 