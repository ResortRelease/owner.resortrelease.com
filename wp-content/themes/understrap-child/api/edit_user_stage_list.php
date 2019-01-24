<?php
// PHP SQL
// Template Name: Table "Users' Stage List"
require 'ils.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM $table ORDER BY dateposted DESC";
$result = $conn->query($sql);
echo "
<style>
table, th, td {
  border: 1px solid black;
}
th{
  background: #cecece;
}
</style>
<table>
        <thead>
          <tr>
            <th>ID</th><th>EMAIL</th><th>STAGE</th><th>DATE</th>
          </tr>
        </thead>
        <tbody>
      ";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row['email'] != ""){
          echo "<tr>
            <td>". $row['id']."</td>
            <td>". $row['email']."</td>
            <td>". $row['stage']."</td>
            <td>". $row['dateposted']."</td>
          </tr>";
        }
    }
} else {
    echo "0 results";
}
echo "</table></tbody>";
$conn->close();
?>