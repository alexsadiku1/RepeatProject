<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php 
include("includes/db.php");
$user =$_SESSION['customer_email'];
$get_customer= "select * from customers where customer_email='$user'";
$run_customer= mysqli_query($con,$get_customer);
$row_customer=mysqli_fetch_array($run_customer);

	$c_id = $row_customer['customer_id'];
	$name = $row_customer['customer_name'];
	$email = $row_customer['customer_email'];
	$pass = $row_customer['customer_pass'];
	$country = $row_customer['customer_country'];
	$city = $row_customer['customer_city'];
	$image = $row_customer['customer_image'];
	$number = $row_customer['customer_number'];
	$address = $row_customer['customer_add'];

?>

<form action ="" method="post" enctype="multipart/form-data">
<table align="center" width="750px">

<tr align="center">
<td colspan="6"><h2>Edit Account</h2></td>
</tr>


<tr>
<td align="right">Name</td>
<td><input type="text" name="c_name" value="<?php echo $name ?> "required/></td>
</tr>

<tr>
<td align="right">Email</td>
<td><input type="text" name="c_email" value="<?php echo $email ?> " required/></td>
</tr>

<tr>
<td align="right">Password</td>
<td><input type="password" name="c_pass" value="<?php echo $pass ?> " required/></td>
</tr>

<td align="right">Picture</td>
<td><input type="file" name="c_image"/><img src="customer_images/<?php echo $image; ?> "
 width="50" height="50"/></td>
</tr>

<tr>
<td align="right">Country</td>
<td><select name="c_country" disabled>
<option><?php echo $country ?></option>
<option>Ireland</option>
<option>America</option>
<option>France</option>
<option>Germany</option>
<option>Italy</option>
<option>Spain</option>
</select>
</td>
</tr>

<tr>
<td align="right">City</td>
<td><input type="text" name="c_city" value="<?php echo $city ?> " required/></td>
</tr>


<td align="right">Address</td>
<td><input type="text" name="c_address" value="<?php echo $address ?> " required/></td>
</tr>

<td align="right">Number</td>
<td><input type="text" name="c_number" value="<?php echo $number ?> " required/></td>
</tr>


<tr align="center">
<td colspan="6"><input type="submit" name="update" value="Submit"/></td>
</tr>
</table>
</form>



<?php

if(isset($_POST['update'])){
	global $con;
	
	$ip = getIp();
	$cust_id = $c_id;
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_city = $_POST['c_city'];
	$c_address = $_POST['c_address'];
	$c_number = $_POST['c_number'];
	
	move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	
	$update_cust = "update customers set customer_name='$c_name',
	customer_email='$c_email', customer_pass='$c_pass',
	customer_city='$c_city',
	customer_number='$c_number',customer_add='$c_address',
	customer_image='$c_image'where customer_id ='$cust_id'";
	
	$run_update = mysqli_query($con,$update_cust);
	
	if($run_update){
		echo "<script>alert('Update Successful')</script>";
		echo "<script>windo.open('my_account.php','_self')</script>";
	}
}



?>