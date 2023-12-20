<?php 

//serverside script 

if(isset($_GET['customer'])){ 

    
    $databaseFile = 'Database1.db';

    $pdo = new PDO("sqlite:$databaseFile");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql="SELECT * FROM consumer WHERE 1";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result){

    if(count($result)>0){
      ///
        
      foreach($result as $row){
      
         $s_no=$row['id'];
         $email=$row['email'];
         $name=$row['name'];
         $mobile=$row['mobile'];
         $address=$row['address'];
         $prod_name=$row['prod_name'];
         $cost=$row['cost'];
         $city=$row['city'];
         $country=$row['country'];
         $state=$row['state'];
         $postcode=$row['postcode'];
         $purchase_date=$row['Orderdate'];
         $delivered_date="In process";
         $supplierid=$row['supplierid'];
      
        //echo "&&&&&&&&&&&&".$result->num_rows;
     
         echo json_encode(array(
             
             's_no'=>$s_no,
             'delivered_date'=>$delivered_date,
              'purchase_date'=>$purchase_date,
              'postcode'=>$postcode,
             'state'=>$state, 
             'country'=>$country,
             'city'=>$city, 
             'cost'=>$cost,
             'prod_name'=>$prod_name,
             'email'=>$email,
             'name'=>$name, 
             'mobile'=>$mobile,
             'address'=>$address,
             'supplierid'=>$supplierid,
     
            ));
     
            echo "#";  
      }
     
       ///
         }
         else{
     
             echo json_encode(array(
     
                 'msg'=>'No items', 
                 'status'=>509
                  )
             );        
        
         }
     
        }
        else{
  
          echo json_encode(array(
  
            "status"=>502
      
          ));  
  
        }    

        $pdo=null;

      }
  


?>
