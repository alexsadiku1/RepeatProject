<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php
//session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php?not_admin=Access Denied!','_self')</script>";
}
else{
	

	
	




?>

<form action="" method="post" style="padding:80px;">


<b>Insert new Category</b>
<input type="text" name="new_cat" required/>
<input type="submit" name="add_cat" value="Add"/>



<?php
include("Includes/db.php");

if(isset($_POST['add_cat'])){
$new_cat =$_POST['new_cat'];

$insert_cat = "insert into categories (cat_name) values ('$new_cat')";


$run_cat = mysqli_query($con,$insert_cat);

if($run_cat){
	
	echo "<script>alert('Category has been created')</script>";
	echo "<script>window.open('index.php?view_cat','_self')</script>";
}

}
}

?>









</form>