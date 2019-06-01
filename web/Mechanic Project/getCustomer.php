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
        
        //Display owner information
        $statement1 = $db->statement('SELECT * FROM owner WHERE owner_id=:id');
        $statement1->bindValue(':id', $id, PDO::PARAM_INT);
        $statement1->execute();
        $customerInfo = $statement1->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($customerInfo as $row)
        {
            $customer = '<div id=customerInfo><h3>Customer Information</h3><h4>Name</h4><p>' . $row['name_last'] . ', ' . $row['name_first'];
            $customer = '</p><h4>Phone</h4><p>' . $row['phone_number'] . '</p><h4>Address</h4><p>' . $row['address'] . '</p></div>';
        }
        
        echo $customer;
        
 
        //Create table of cars brought in by the selected owner
        $table = '<table id=vehicles><caption>Customer Vehicles</caption><tr><th>Make</th><th>Model</th><th>Year</th><th>VIN</th>';
        $table .= '<th>View Work Order</tr>';
        
        $statement2 = $db->prepare('SELECT * FROM owner, vehicle WHERE owner.owner_id=:id AND vehicle.owner_id=:id;');
        $statement2->bindValue(':id', $id, PDO::PARAM_INT);
        $statement2->execute();
        $rows = $statement2->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($rows as $row)
        {
            $table .= '<tr><td>' . $row['make'] . '</td><td>' . $row['model'] . '</td><td>' . $row['vehicle_year'];
            $table .= '</td><td>' . $row['vin'] . '</td><td><button type=submit name=vin value='. $row['vin'] . '>View Order</button></tr>';
            
        }
        
        $table .= '</table></div>';
        echo $table;
   ?>

</body>

</html>