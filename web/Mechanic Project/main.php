<!DOCTYPE html>
<html>

   <head>
   </head>
   
  <body>
     <header><h1>Work Tracker</h1></header>
     
     <h2>Customer Directory</h2>
     
     <?php
        require_once 'connection.php';
        
        $statement = $db->query('SELECT name_last, name_first, address, phone FROM owner');
        
        $list = "<ul id=customerList>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $list .= '<li>' . $row['name_last'] . ',' . $row['name_first'] . ',' . $row['phone_number'] . '</li>';
        }
        
        $list .= '</ul>';
        
        echo $list;
     ?>
     
  </body>

</html>
