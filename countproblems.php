<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,"Sale Price " , "</td><td>", 'Model ' ,"</td><td>", 'problem count', "</td></tr></b>";

$query = "SELECT MSRP, model, edition, year, count(problem_number) FROM cars, used_car_problems WHERE used_car_problems.VIN = cars.vin GROUP BY cars.vin;"; 
$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['MSRP'] . "</td><td>" . $row['model'] . "</td><td>" . $row['edition'] . "</td><td>" . $row['year'] . "</td><td>" . $row['count(problem_number)'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>