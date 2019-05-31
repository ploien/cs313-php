<!DOCTYPE html>
<html>
<head>
<title>Scriptures</title>
</head>
<body>
<?php

 // Get the database connection file
 require_once 'connections.php';
 
 echo "<h1>Scripture Resources</h1>";
 
 $stmt = d

 foreach($db->query('SELECT * FROM Scriptures') as $rows)
 {
   $queryString = "id=" . $rows["id"];
   echo '<a href=scriptureDetails.php?' . $queryString . '><b>' . $rows['book'] . ' </b>' . $rows['chapter'] . ':' . $row['verse'] . ' - "' . '"</a><br><br>';
 }

 ?>

</body>
</html>