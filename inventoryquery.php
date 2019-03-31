<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,'vin', '................................' , "</td><td>", 'model ' ,"</td><td>", 'edition ' , "</td><td>", 'year ', "</td><td>", 'colour ', "</td><td>", 'miles ', "</td><td>", 'MSRP ', "</td></tr></b>";

$query = "SELECT * FROM cars WHERE Sold = 0"; //You don't need a ; like you do in SQL
$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['vin'] . "</td><td>" . $row['model'] . "</td><td>" . $row['edition'] . "</td><td>" . $row['year'] . "</td><td>" . $row['exterior_colour'] . "</td><td>"  . $row['miles'] . "</td><td>" . $row['MSRP'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>