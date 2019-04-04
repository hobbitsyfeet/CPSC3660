<?php
	#echo htmlspecialchars($_POST['Vin']);
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota');
#stuff goes here
#TODO: everything

//update the sale table
$sql = "INSERT INTO sale (date, total_due, down_payment, financed_amount, interest_rate, Customer_first, Customer_last, Sales_first, Sales_last, VIN, sale_price)
        VALUES ('".$_POST["date"]."','".$_POST["total"]."','".$_POST["down"]."','".$_POST["financed"]."','".$_POST["interest"]."','".$_POST["custfirst"]."','".$_POST["custlast"]."','".$_POST["salesfirst"]."','".$_POST["saleslast"]."','".$_POST["Vin"]."','".$_POST["saleprice"]."')";
mysqli_query($C1, $sql);


//update people for customer

$sql = "INSERT INTO person (firstname, lastname, phonenumber, address, city, province, postal)
        VALUES ('".$_POST["custfirst"]."' ,'".$_POST["custlast"]."','".$_POST["custphone"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["province"]."','".$_POST["zip"]."')";
mysqli_query($C1, $sql);

$sql = "INSERT INTO employment_history (cust_first, cust_last, employer, title, supervisor, phone, address, start_date, jobnumber)
        VALUES ('".$_POST["custfirst"]."' ,'".$_POST["custlast"]."','".$_POST["e0"]."','".$_POST["t0"]."','".$_POST["su0"]."','".$_POST["p0"]."','".$_POST["a0"]."','".$_POST["s0"]."', 0 )";
mysqli_query($C1, $sql);

//update people for sales employee
$sql = "SELECT firstname, lastname FROM person WHERE firstname = '".$_POST["salesfirst"]."' AND lastname = '".$_POST["saleslast"]."' ";
$query = mysqli_query($C1, $sql);



if(mysqli_num_rows($query) > 0){

	//update
	$sql = "INSERT INTO commission (firstname, lastname, vin, commission, product)
        VALUES ('".$_POST["salesfirst"]."','".$_POST["saleslast"]."','".$_POST["Vin"]."','".$_POST["commission"]."', 'car')";

	mysqli_query($C1, $sql);

}else{

	//insert
		$sql = "INSERT INTO commission (firstname, lastname, vin, commission, product)
        VALUES ('".$_POST["salesfirst"]."','".$_POST["saleslast"]."','".$_POST["Vin"]."','".$_POST["commission"]."', 'car')";

	mysqli_query($C1, $sql);

	$sql = "INSERT INTO person (firstname, lastname, phonenumber)
        VALUES ('".$_POST["salesfirst"]."','".$_POST["saleslast"]."','".$_POST["salesphone"]."')";
	mysqli_query($C1, $sql);
}

//update cars
$miles = $_POST["miles"];
$price = $_POST["saleprice"];


$sql = "UPDATE cars SET Sold = 1 , miles = $miles WHERE vin ='".$_POST["Vin"]."'";

mysqli_query($C1, $sql);


mysqli_close($C1);

header("HTTP/1.1 303 See Other");
header("Location: index.html");
?>