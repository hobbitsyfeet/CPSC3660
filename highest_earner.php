<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,"first name " , "</td><td>", 'last name ' ,"</td><td>", 'total commission', "</td></tr></b>";

$query = "SELECT firstname, lastname, SUM(commission) FROM commission WHERE (firstname, lastname) IN (SELECT firstname, lastname FROM (SELECT firstname, lastname, MAX(commission) FROM commission) AS T);"; 
$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['lastname'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['SUM(commission)'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>