<?php
// Replace 'your_database.db' with the actual name and path of your SQLite database file

$databaseFile = 'Database1.db';

echo "hello ";

// try {
//     // Create a PDO connection to the SQLite database
    $pdo = new PDO("sqlite:$databaseFile");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the SQLite database successfully";

    
//   $sql = "UPDATE consumer
//   SET Orderdate = CURRENT_DATE;";
    
//  $res=$pdo->query($sql) ;

// if ($res== TRUE) {

//     echo "Record deleted successfully";

//      echo json_encode($res);

// } else {
//     echo "Error deleting record: ";
// }  


// ////////////

// $tableName = "product";

// // Replace 'John' and '50' with the actual values you want to use for the condition
// $name = "jkh";
// $cost = 6;

// // SQL query to delete a row based on name and cost
// $sql = "DELETE FROM $tableName WHERE  Prod_cost = $cost";

// if ($pdo->query($sql) == TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: ";
// }  
    
/////////////
// $type='camera';

// $line="It is made in India*
// Low cost*
// 45 percentage discount";

// $list2 = [
//     'Compact Marvel',
//   'High-Res Beast',
//   'Smart Capture',
//   'Epic Zoom',
//   'Sleek Shooter',
//   'Professional Grade',
//   'Advanced Tech',
//   'Versatile Lens',
//   'Innovative Design',
//   'Crystal Clarity'
// ];


// $list = [
//     'Visionary',
//     'Spectra',
//     'Captura',
//     'Lumina',
//     'Pixela',
//     'Focuz',
//     'ShutterX',
//     'Vividus',
//     'OptiLens',
//     'Zoomify'
// ];

// $cost=30000;

// $n=0;

 //for($i=0;$i<8;$i++){

//     $cost=$cost+1500;

//     $n=$n+1;

//     $link='cam'.$n.'.png';
    
//  $sql=" INSERT INTO `product`( `Prod_name`, `short_name`, 
//  `Prod_Desc`, `Prod_cost`, `Prod_link`, `about`) 
//  VALUES ('".$type."','".$list[$i]."','".$list2[$i]."' ,'".$cost."', '".$link."','".$line."' ) ";


// $result=$pdo->query($sql);
   
// if($result){

//   //echo "hellow";
//   echo json_encode($result);
// }
// else{
    
//   //echo "hellow 404 ";
//   echo json_encode($result);

// }

// $aduser="suganeshwarandpi@gmail.com";

// $adpass="sugan@4088";


// $sql="SELECT * FROM admin  WHERE pass='".$adpass."' ";

    
//     // Prepare and execute the query
//     try {
//         $stmt = $pdo->prepare($sql);

//         $stmt->execute();

//         if($stmt){
//             // Fetch the results as an associative array
//         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     foreach ($rows as $row) {
//         // Access columns using $row['column_name']

//         echo  "<h1>{$row['email']}<h1>";
//         echo  "<h1>{$row['pass']}</h1>";
//     }
//        //echo "<h1>count is {count($rows)}</h1>";

//         }else{

//             echo "sql error";
//         }

//     } catch (PDOException $e) { 
//         die('Query failed: ' . $e->getMessage());
//     }



    // Close the connection 

    //     id INTEGER PRIMARY KEY AUTOINCREMENT,
    //     Date DATE,
    //     name TEXT,
    //     pass TEXT 
    //     -- add more columns as needed
    // )";


    // $pdo = new PDO("sqlite:$databaseFile");
    // // Set the PDO error mode to exception
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to the SQLite database successfully";
    
    // $sql=" CREATE TABLE admin (id INTEGER PRIMARY KEY AUTOINCREMENT,Date DATE,email TEXT, pass TEXT) ";

    // $res=$pdo->query($sql);

    // if($res){
    //   echo "table created";  
    //   echo json_encode($res);
    // }else{
    //     echo "spontaneously exited";
    // }

  
    // $user='suganeshwarandpi@gmail.com';
    // $pass="sugan@4088";
   
    //  $sql="INSERT INTO admin(email,pass) VALUES('".$user."','".$pass."')";
   
    //  $result=$pdo->query($sql);
   
    //  if($result){
   
    //    //echo "hellow";
    //    echo "record inserted";

    //  }
    //  else{
   
    //    //echo "hellow 404 ";
    //    echo json_encode($result);

    //  }


//////////////////


// $tableName = 'consumer';

//     // Prepare and execute the SQL query to drop the table
//     $query = "ALTER TABLE consumer RENAME TO your_table_name";
//     $pdo->exec($query);

//     echo "Table $tableName deleted successfully.";



// } catch (PDOException $e) {
//     die("Connection failed: " . $e->getMessage());
// }

// $arr=array('sugan',54,545,4,6,5,545);

// $arr2=array('name'=>"alia",'num'=>85049);

// echo $arr2['name'],$arr2['num'];


#echo $obj['pass']


//   $sql = "ALTER TABLE consumer ADD COLUMN date DATE";

//     // Execute the SQL statement
//     $pdo->exec($sql);

//     echo "inserted****************888888";



?>


