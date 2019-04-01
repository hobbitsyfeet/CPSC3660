<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,'First Name ', "</td><td>", 'Last name ' ,"</td><td>", 'Owned Car ' , "</td></tr></b>";

$query = "SELECT firstname, lastname, VIN FROM person, sale WHERE firstname = customer_first AND lastname = customer_last"; 

$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['VIN'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>