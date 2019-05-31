<!DOCTYPE html>
<html>
   <head>
   </head>
  <body>
     <header><h1>Work Tracker</h1></header>
     
     <h2>Customer Directory</h2>
     <form action="getCustomer.php" method="post">
     
     <?php
        require 'connection.php';
        
        $list = '<ul>';
        
        foreach($db->query('SELECT name_last, name_first, phone_number, owner_id FROM owner') as $row)
        {
            $list .= '<li>' . $row['name_last'] . ',' . $row['name_first'] . '   ' . $row['phone_number'] .  '<button name=customerId type=submit value=';
            $list .= $row['owner_id'] . '>Retrieve Info</button></li>';
        }
        
        $list .= '</ul>';
        echo $list;
     ?>
     
     </form>
     
  </body>

</html>
