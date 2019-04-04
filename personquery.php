<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
//echo "<b><tr><td>" ,"vin ............................. " , "</td><td>", 'model ' ,"</td><td>", 'edition ' ,"</td><td>", 'year ' ,"</td><td>", 'miles ' ,"</td><td>", 'MSRP', "</td></tr></b>";

$query = "SELECT * FROM person"; 

$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['phonenumber'] . "</td><td>" . $row['address'] . "</td><td>" . $row['city'] . "</td><td>" . $row['postal'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>