<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php

session_start();

?>
<!DOCTYPE>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="styles/login.css" media="all"/>
</head>
<div class="login-page">
<h2 style="text-align:center;"><?php
echo @$_GET['not_admin'];


?></h2>
  <div class="form">
    <form method="post" action="login.php" class="login-form">
	<h2> Admin Login</h2>
      <input type="text" name="email" placeholder="Email" required/>
      <input type="password" name="pass" placeholder="Password" required/>
      <button type="submit" name="login">login</button>
    </form>
  </div>
</div>
</body>
</html>

<?php

include("Includes/db.php");

if(isset($_POST['login'])){

	//command to avoid injecting sql database
	$email =$_POST['email'];
	$pass =$_POST['pass'];
	
	$select_user = "select * from admin where email='$email' AND pass='$pass'";
	
	$run_user = mysqli_query($con, $select_user);
	
	$check_user = mysqli_num_rows($run_user);
	
	if($check_user==0){
		
		echo"<script>alert('Password or Email is incorrect!')</script>";
		
	}
	else{
		$_SESSION['email']=$email;
		
		echo"<script>window.open('index.php?logged_in=You have logged in successfully!','_self')</script>";
	}
	
	
	
	
	
}










?>
