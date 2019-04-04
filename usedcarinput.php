Submit successful
<?php
	#echo htmlspecialchars($_POST['Vin']);
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota');
#stuff goes here
#TODO: everything


$sql = "INSERT INTO cars (vin,miles, Seller, date_of_purchase, model, edition, year, exterior_colour, MSRP, Price_Paid)
        VALUES ('".$_POST["Vin"]."','".$_POST["miles"]."','".$_POST["Dealer"]."','".$_POST["Date"]."','".$_POST["Model"]."','".$_POST["Edition"]."','".$_POST["year"]."','".$_POST["Colour"]."','".$_POST["bookprice"]."','".$_POST["paidprice"]."')";


mysqli_query($C1, $sql);

//echo $_POST["Vin"],$_POST["Date"],$_POST["Model"],$_POST["Edition"],$_POST["year"],$_POST["ExteriorColour"],$_POST["InteriorColour"],$_POST["Miles"],$_POST["MSRP"];

$sql = "INSERT INTO used_car_problems (VIN, problem_number, Problem, Est_cost, Actual_cost)
        VALUES ('".$_POST["Vin"]."','".$_POST["f00"]."','".$_POST["f10"]."','".$_POST["f20"]."','".$_POST["f30"]."')";

mysqli_query($C1, $sql);

mysqli_close($C1);

header("HTTP/1.1 303 See Other");
header("Location: /index.html");
?>
'  'Query Table to be added below
