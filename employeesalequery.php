<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,'First Name ', "</td><td>", 'Last name ' ,"</td><td>", 'Sold Car ' , "</td><td>", 'Commission Made ' , "</td></tr></b>";

$query = "SELECT *  FROM commission  WHERE product = 'car' ORDER BY lastname"; 

$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['vin'] . "</td><td>" . $row['commission'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>