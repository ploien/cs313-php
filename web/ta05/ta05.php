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

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  $queryString = "id=" . $row["id"];
  echo '<a href=scriptureDetails.php?' . $queryString . '><b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . '"</a><br><br>';
}

?>

</body>
</html>