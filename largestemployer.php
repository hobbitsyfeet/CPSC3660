<?php
$C1 = new mysqli('localhost','phpuser','phppassword','mcmaster_toyota'); //The Blank string is the password
echo "<b><tr><td>" ,"first name " , "</td><td>", ' last name ' ,"</td><td>", ' address ', "</td><td>", ' employer', "</td></tr></b>";

$query = "SELECT firstname, lastname, person.address, employer FROM person, employment_history WHERE firstname = cust_first AND lastname = cust_last AND (employer) IN (SELECT employer 
								FROM (SELECT *, COUNT(cust_first) AS B FROM employment_history GROUP BY employer) AS t2 WHERE B = (SELECT MAX(A) FROM (SELECT employer, COUNT(cust_first) AS A FROM employment_history GROUP BY employer) AS T))"; 

$result = mysqli_query($C1, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['address'] . "</td><td>" . $row['employer'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($C1); //Make sure to close out the database connection
?>