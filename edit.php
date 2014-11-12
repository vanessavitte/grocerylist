<?php

require('dbconnection.php');
$con = mysqli_connect(HOST, USER, PASS, DB);

$gl_id=$_POST['gl_id'];
$gl_name=$_POST['gl_name'];

$gl_name=mysqli_real_escape_string($con, $gl_name);

require('functions.php');

if(edit_list($gl_name))
{
header ('location: editlist.php');
}else{
echo "This is stupid!";
}

?>

