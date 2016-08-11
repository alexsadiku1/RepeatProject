<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<?php
$mysql_host = "fdb12.atspace.me";
$mysql_database = "2173748_alex";
$mysql_user = "2173748_alex";
$mysql_password = "Alexander1";

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password,$mysql_database)or die(mysql_error());

//if(mysqli_connect_errno()){
//	echo " Failed to connect to MySQL: ".mysqli_connect_err();
//}

//retrieved from http://www.phpf1.com/tutorial/get-ip-address.html
function getIpp() {
    $c_ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $c_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $c_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $c_ip;
}
function cart(){
	if(isset($_GET['add_cart'])){

	global $con;
	
		$ip=getIpp();
		$pro_id = $_GET['add_cart'];
		
		$check_pro = "select * from cart where ip_add ='$ip' AND p_id='$pro_id'";
		
		$run_check = mysqli_query($con, $check_pro);
		
		if(mysqli_num_rows($run_check)>9){
			echo"";
		}
		else{
			$insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
			
			$run_pro = mysqli_query($con, $insert_pro);
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
	
	
}

function total_items(){
	
	if(isset($_GET['add_cart'])){
		global $con;
		
		$ip = getIp();
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_times = mysqli_query($con, $get_items);
		
		$count_items = mysqli_num_rows($run_items);
	}
		else{
			
			global $con;
			
			$ip = getIpp();
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con, $get_items)or die("Error: ".mysqli_error($con));;
		
		$count_items = mysqli_num_rows($run_items);
			
		}
		
		echo $count_items;
	}
	
function total_price(){
	
	$total = 0;
	
	global $con;

   $ip=getIpp();
   
   $sel_price = "select * from cart where ip_add='$ip'";
   
   $run_price = mysqli_query($con, $sel_price);
   
  // if (!$check1_res) {
   // printf("Error: %s\n", mysqli_error($con));
  //  exit();
  //}
   
   while($p_price=mysqli_fetch_array($run_price)){
	   
	   $pro_id = $p_price['p_id'];
	   
	   $pro_price = "select * from products where product_id='$pro_id'";
	   
	   $run_pro_price = mysqli_query($con,$pro_price);
	   
	   while($pp_price = mysqli_fetch_array($run_pro_price)){
		   
		   //taken all values into a single array to add them together
		   $product_price = array($pp_price['product_price']);
		   
		   $values = array_sum($product_price);
		   $total += $values;
	   }
	   
   }
	echo $total;
	}


//function to retrieve categories from database
function getCats(){
global $con;

//sql query
	$get_cats = "select * from categories";
	//variable with query and connection
	$run_cats = mysqli_query($con, $get_cats);
	
        
	while ($row_cats = mysqli_fetch_array($run_cats)){
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_name'];
		
		
		echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
		
	}
	
}


function getProducts(){
	
	if(!isset($_GET['cat'])){
		
		
	
	
	global $con;
	
	$get_products = "select * from products order by RAND() LIMIT 0,6";
	
	$run_products = mysqli_query($con, $get_products);
	
	while($row_pro= mysqli_fetch_array($run_products)){
		
		$pro_id = $row_pro['product_ID'];
		$pro_cat = $row_pro['product_cat'];
		$pro_name = $row_pro['product_name'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		
		
		echo"
		<div id ='single_product'>
		
		<h3>$pro_name</h3>
		<img src ='Admin/product_images/$pro_image' width='180 height='180'/>
		<p><b>Price: &euro; $pro_price</b></p>
		<a href ='details.php?pro_id=$pro_id'><button style='float:left;'> Details</button></a>
		
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
		</div>
		
		
		
		";
		
		
	}
}
}

function getCat(){
	
	if(isset($_GET['cat'])){
		
		
	$cat_id=$_GET['cat'];
	
	global $con;
	
	$get_cat = "select * from products where product_cat ='$cat_id'";
	
	$run_cat = mysqli_query($con, $get_cat);
	
	//will count products in the category.
	$count_cat = mysqli_num_rows($run_cat);
	
	if($count_cat==0){
		echo "<h2>There are no products in this category</h2>";
		exit();
	}
	else{
	
	while($row_cat= mysqli_fetch_array($run_cat)){
		
		$pro_id = $row_cat['product_ID'];
		$pro_cat = $row_cat['product_cat'];
		$pro_name = $row_cat['product_name'];
		$pro_price = $row_cat['product_price'];
		$pro_image = $row_cat['product_image'];
		
		
		echo"
		<div id ='single_product'>
		
		<h3>$pro_name</h3>
		<img src ='Admin/product_images/$pro_image' width='180 height='180'/>
		<p>Price: &euro; <b>$pro_price</b></p>
		<a href ='details.php?pro_id=$pro_id'><button style='float:left;'> Details</button></a>
		
		
		<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
		</div>
		
		
		
		";
		
	}
	}
}
}






















?>