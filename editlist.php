<?php
session_start();
$user_id=$_SESSION['user_id'];
$gl_id=$_GET['gl_id'];
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

<SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    });
});
</SCRIPT>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

			
	</head>

<body>


	
    	<?php include_once("headerlogout.php");?>
		
		<section>
			<article>
			    	
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
     						<input type='hidden' name='gl_id' value='".$row['gl_id']."'>
     						</form>";
       						}
				 mysqli_close($con); 
					          
					   ?> 
               
               				</form>
               				
               				<div class="create">
               				 <h4>Create A List</h4> 
              					 <form action='grocerylistname.php' method='post' type='hidden'>
              					    <input type="text" size="20" name='gl_name' class="gl_name" placeholder="Name Your List"></br>                 					       
			     			    <input type='submit' value='Create'  class="createbtn" name='createbtn'>
			     			 </form>
              					 
              					
              					
              
            				</div>
            
            				<div class="pre">
            				
              				 <form action="####" method="post" >
               					<h4>Premade Lists</h4>
               
               			
               
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
					  
					   
               
               				</form>
               				
               				
              				</div>
            		
            </div>
           			 <div id="editlist">   
           			 
					
					<?php 
					if($_GET['premade']=="yes"){					$gl_id=$_GET['gl_id'];
					require('dbconnection.php');
					$con = mysqli_connect(HOST, USER, PASS, DB);
      					$query="SELECT * FROM premadelists  WHERE gl_id='$gl_id'";
					$result=mysqli_query($con, $query) or die(mysql_error($con));
					while($row=mysqli_fetch_array($result)){
	 					echo "<a href=editlist.php?gl_id=" . $row['gl_id'] . "><h2 >".$row['gl_name']."</a><br></h2>"; 
	 					
	 			
	 					
					}}else{					
					$gl_id=$_GET['gl_id'];
					require('dbconnection.php');
					$con = mysqli_connect(HOST, USER, PASS, DB);
      					$query="SELECT * FROM grocery_list  WHERE gl_id='$gl_id'";
					$result=mysqli_query($con, $query) or die(mysql_error($con));
					while($row=mysqli_fetch_array($result)){
	 					echo "<a href=editlist.php?gl_id=" . $row['gl_id'] . "><h2 >".$row['gl_name']."</a><br></h2>";
	 					
					}					
					
					}
             					         
 					?>   
 					
 					        <form action="additem.php" method="post" >
 					        <input type="text" size="40" name='item_name' class="item_name" placeholder="Add Item">    
              					
              					<input type="hidden" name="gl_id" value="<?php echo $gl_id; ?>" />          					       
			     			<input type="submit" value="Add Item"  class="additem" name="createbtn">
			     			</form>
				  
     				
  <?php           				
              				$query = "SELECT item_id, item_name, item_price FROM gl_items WHERE gl_id='$gl_id'";              				
              				$result=mysqli_query($con,$query);  
if (mysqli_num_rows($result) == 0) // table is empty 
echo 'There are no items in your list.  Add items now.'; 
else 
{ ?>
    <table>
     	<tr>
     	<th></th>
	<th>Item</th>
	<th>Price</th>
	<th>Delete</th>
	
	</tr>    
	<?php while($row = mysqli_fetch_array($result)) 
    { ?>
   
         <tr>
         	 <td class="check"><input type="checkbox" class="case" name="case" value="1"/></td>
        	<td><small class="itemna"><?php echo $row['item_name'] ?></small></td>
        	<td>
        	<form method="post" action="updateitem.php" type='hidden'>
        	<small><input type="text" name="item_price" value="<?php echo $row['item_price'] ?>" class="txt" > </small>
        		<input type="hidden" name="item_id" value="<?echo $row['item_id'];?>" /> 
        		<input type="hidden" name="gl_id" value="<?php echo $gl_id; ?>" /> 
        		<input type="submit" value="Update" class="updatebtn"/>
        	</form>
        	</td>
        	<td>
        		<form method="post" action="deleteitem.php">
        			<input type="hidden" name="item_id" value="<?echo $row['item_id'];?>" />
        			<input type="hidden" name="gl_id" value="<?php echo $gl_id; ?>" /> 
        			<input type="submit" value="X" class="btndel"/>
        		</form>
        	</td>
        	
        </tr>
        
      
               				
        
        
        
        
        
   <?php }  ?> 
    </table>
    
    <hr><br>
    <p class="total">Total:
    <span id="sum">0</span></p>
    
    <script>
    $(document).ready(function(){
    calculateSum();
     //var totalSpan=document.getElementById('sum');
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".txt").each(function() {
 
            $(this).keyup(function(){
                calculateSum();
            });
        });
        
  
    });
 
    function calculateSum() {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".txt").each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#sum").html(sum.toFixed(2));
    }
</script>
    

    
<?php } //close else ?>       					

              					 
            			</div>
            

   
			</article>
		</section>	

		<?php include_once("footer.php");?>

		
</body>
</html>






	
	
		