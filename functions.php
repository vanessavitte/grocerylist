<?php
require('dbconnection.php');

function login_check($username,$password){
      $con = mysqli_connect(HOST, USER, PASS, DB);
      $query="SELECT user_id,username,password FROM login WHERE username='$username' AND password='$password'";
      $result=mysqli_query($con, $query);
      if ($row=mysqli_fetch_array($result)){ 
          session_start();         
          $_SESSION['login']=1;
          $_SESSION['user_id']=$row['user_id'];                 
          header ("location: userhome.php");
      }else{
          header ("location: login.php");
      }
}         

 
function check_username($username){
     require('dbconnection.php');
     $con = mysqli_connect(HOST, USER, PASS, DB);
       $sql="Select username FROM login users WHERE username='$username'";
       $result=mysqli_query($con, $sql);
      if (mysqli_num_rows($result)){
      return true;
      }else{
      return false;
      }
      }
      
 


function new_list($gl_name,$user_id){
      require('dbconnection.php');
      $con = mysqli_connect(HOST, USER, PASS, DB);
      $sql="INSERT INTO grocery_list (gl_name, user_id) VALUES ('$gl_name','$user_id')";
      mysqli_query($con, $sql);       
      $gl_id= mysqli_insert_id($con);               
      return $gl_id;
      }   


function edit_list($gl_name){
     require('dbconnection.php');
     $con = mysqli_connect(HOST, USER, PASS, DB);
       $sql="Select gl_name FROM grocery_list WHERE gl_name='$gl_name'";
       $result=mysqli_query($con, $sql);
      if (mysqli_num_rows($result)){
      return true;
      }else{
      return false;
      }
      }
      
function add_item($item_name, $gl_id){
      require('dbconnection.php');
      $con = mysqli_connect(HOST, USER, PASS, DB);
      $sql="INSERT INTO gl_items (item_name, gl_id) VALUES ('$item_name','$gl_id')";
       $result=mysqli_query($con, $sql); 
       return $result;
      }       
      
function item_name($item_name){
     require('dbconnection.php');
     $con = mysqli_connect(HOST, USER, PASS, DB);
       $sql="Select item_name FROM gl_items WHERE gl_id='$gl_id'";
       $result=mysqli_query($con, $sql);
      if (mysqli_num_rows($result)){
      return true;
      }else{
      return false;
      }
      }   
      
function delete_item($item_id){
     require('dbconnection.php');
      $con = mysqli_connect(HOST, USER, PASS, DB);
      $sql="Delete FROM gl_items WHERE item_id='$item_id'";
      $result=mysqli_query($con, $sql);
      if($result)
      {
      return true;
      }else{
      return false;
      }
      
      }         
      
function update_item($item_price, $item_id){
      require('dbconnection.php');
      $con = mysqli_connect(HOST, USER, PASS, DB);
      $sql="UPDATE gl_items SET item_price='$item_price' WHERE item_id='$item_id'";
       $result=mysqli_query($con, $sql); 
       return $result;
      }       
      


?>