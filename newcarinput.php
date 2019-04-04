Submit successful
<?php
	#echo htmlspecialchars($_POST['Vin']);
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota');
#stuff goes here
#TODO: everything


$sql = "INSERT INTO cars (vin, date_of_purchase, model, edition, year, exterior_colour, interior_colour, expected_miles, MSRP)
        VALUES ('".$_POST["Vin"]."','".$_POST["Date"]."','".$_POST["Model"]."','".$_POST["Edition"]."','".$_POST["year"]."','".$_POST["ExteriorColour"]."','".$_POST["InteriorColour"]."','".$_POST["Miles"]."','".$_POST["MSRP"]."')";


mysqli_query($C1, $sql);

//echo $_POST["Vin"],$_POST["Date"],$_POST["Model"],$_POST["Edition"],$_POST["year"],$_POST["ExteriorColour"],$_POST["InteriorColour"],$_POST["Miles"],$_POST["MSRP"];
mysqli_close($C1);

header("HTTP/1.1 303 See Other");
header("Location: /index.html");
?>
'  'Query Table to be added below
