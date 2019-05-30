<!DOCTYPE html>
<html>
   <head>
   </head>
  <body>
     <header><h1>Work Tracker</h1></header>
     
     <h2>Customer Directory</h2>
     
     <?php
        require 'connection.php';
        $list = '<ul>';
        
        foreach($db->query('SELECT name_last, name_first, address, phone_number FROM owner') as $row)
        {
            $list .= '<li>' . $row['name_last'] . ',' . $row['name_first'] . ',' . $row['phone_number'] . '</li>';
        }
        
        $list .= '</ul>';
        echo $list;
     ?>
     
  </body>

</html>
