<!--X00101462 Alexandro Sadiku 1stop Repeat Project-->
<div>

<table align="center" width="795" border="2" bgcolor="#3380CC">

<tr align="center">
<td colspan="5"><h2>Payment</h2></td>
</tr>
<tr>
<td align="right">CardHolder Name</td>
<td><input type="text"  size="60" required/></td>
</tr>

<tr>
<td align="right">Card Number</td>
<td><input type="text" size="60"required/></td>
</tr>

<tr>
<td align="right">Expiry Date</td>
<td><input type="text" name="product_price" required/></td>
</tr>

<tr>
<td align="right">Security Number</td>
<td><input type="text" required</td>
</tr>


<tr align="center">
<td colspan="5"><input onclick="done()" type="submit" name="insert_post" value="Submit"/></td>
</tr>

<script>
function done(){
	alert("Payment Succesfull");
        	window.open('index.php','_self');
}
</script>

</table>

<h2 align="center">Pay now with Card</h2>
<p style="text-align:center;"><img src="payment.jpg" width="200" height="150"/></P>








</div>