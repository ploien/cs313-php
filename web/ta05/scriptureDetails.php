<!DOCTYPE html>
<html>

<head>
</head>

<body>

<?php

	// Get the database connection file
	require_once 'connections.php';
 
	echo "<h1>Scripture Resources</h1>";
     
	
	$db->query('SELECT content FROM scriptures WHERE id=' . $_GET["id"] . ';') as $row;

	
	//echo '<b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '"<br><br>';

	

?> 
</body>

</html>