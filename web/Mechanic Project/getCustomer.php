<!DOCTYPE html>
<html>
<head>
   
</head>

<body>
	<h1>Customer Record</h1>
	<h2>Personal Information</h2>
	
    <?php
        require 'connection.php';
        
        $id = filter_input(INPUT_POST, 'customerId', FILTER_SANITIZE_STRING);
        
        $table = '<table id=vehicles><tr><th>Make</th><th>Model</th><th>Year</th><th>VIN</th></tr>';
        
        $statement = $db->prepare('SELECT make, model, owner_id, vehicle_year, vin FROM owner, vehicle WHERE owner.owner_id=:id AND vehicle.owner_id=:id;');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($rows as $row)
        {
            $table .= '<tr><td>' . $row['make'] . '</td><td>' . $row['model'] . '</td><td>' . $row['vehicle_year'] . '</td><td>' . $row['vin'] . '</td></tr>';
            
        }
        
        $table .= '</table>';
        echo $table;
   ?>

</body>

</html>