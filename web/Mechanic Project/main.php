<!DOCTYPE html>
<html>
   <head>
   </head>
  <body>
     <header><h1>Work Tracker</h1></header>
     
     <h2>Customer Directory</h2>
     
     <?php
     
         try
         {
             $dbUrl = getenv('DATABASE_URL');
             
             $dbOpts = parse_url($dbUrl);
             
             $dbHost = $dbOpts["host"];
             $dbPort = $dbOpts["port"];
             $dbUser = $dbOpts["user"];
             $dbPassword = $dbOpts["pass"];
             $dbName = ltrim($dbOpts["path"],'/');
             
             $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
             
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }
         catch (PDOException $ex)
         {
             echo 'Error!: ' . $ex->getMessage();
             die();
         }
         
        //require 'connection.php';
        
        $stmt = $db->prepare('SELECT name_last, name_first, address, phone_number FROM owner');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $list = '<ul>';
        
        foreach($rows as $row)
        {
            $list .= '<li>' . $row['name_last'] . ',' . $row['name_first'] . ',' . $row['phone_number'] . '</li>';
        }
        
        $list .= '</ul>';
        echo $list;
     ?>
     
  </body>

</html>
