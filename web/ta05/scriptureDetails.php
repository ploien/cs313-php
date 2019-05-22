<!DOCTYPE html>
<html>

<head>
</head>

<body>

<?php

	// Get the database connection file
	require_once 'connections.php';
 
	echo "<h1>Scripture Resources</h1>";
     
	
	$db->query('SELECT content FROM scriptures WHERE id=' . $_GET["id"]) as $row)
	{
		//echo '<b>' . $row2['book'] . ' </b>' . $row2['chapter'] . ':' . $row2['verse'] . ' - "' . $row2['content'] . '"<br><br>';
	}
	

?> 
</body>

</html>