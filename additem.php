<?php
session_start();
$user_id=$_SESSION['user_id'];
require('dbconnection.php');
require('functions.php');
$item_name=$_POST['item_name'];
$gl_id=$_POST['gl_id'];

//gl_id is not being put into the db
  
   if(add_item($item_name, $gl_id))
      {
    header ("location: editlist.php?gl_id=". $gl_id);      
     

    }else{
     "There seems to be an error. Please notify Vanessa of the problem.";

   
      }   
    
  ?> 