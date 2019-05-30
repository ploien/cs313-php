<!DOCTYPE html>
<html>
   <head>
   </head>
  <body>
     <header><h1>Work Tracker</h1></header>
     
     <h2>Customer Directory</h2>
     
     <?php
     
        require_once 'connection.php';
        
        $stmt = $db->prepare('SELECT name_last, name_first, address, phone FROM owner');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $list = "<ul id=customerList>";
        
        foreach($rows)
        {
            $list .= '<li>' . $rows['name_last'] . ',' . $rows['name_first'] . ',' . $rows['phone_number'] . '</li>';
        }
        
        $list .= '</ul>';
        echo $list;
     ?>
     
  </body>

</html>
