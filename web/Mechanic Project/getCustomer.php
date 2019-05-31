<!DOCTYPE html>
<html>
<head>
   
</head>

<body>
	<h1>Customer Record</h1>
	<h2>Personal Information</h2>
	
    <?php
        require 'connection.php';
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        $table = '<table id=vehicles><tr><th>Make</th><th>Model</th><th>Year</th><th>VIN</th></tr>';
        
        $statement = $db->prepare('SELECT * FROM owner, vehicle WHERE owner.owner_id=:id AND vehicle.owner_id=:id;');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($rows as $row)
        {
            $table .= '<tr><td>' . $row['vehicle.make'] . '</td><td>' . $row['vehicle.model'] . '</td><td>' . $row['vehicle.vehicle_year'] . '</td><td>' . $row['vehicle.vin'] . '</td></tr>';
            
        }
        
        $table .= '</table>';
        echo $table;
   ?>

</body>

</html>