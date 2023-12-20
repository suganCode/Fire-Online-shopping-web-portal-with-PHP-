<?php

require 'Demo1.php';

//serverside script

$databaseFile = 'Database1.db';

session_start();

    ////////signup block
    if(isset($_GET['signup'])){


      $databaseFile = 'Database1.db';

      $pdo = new PDO("sqlite:$databaseFile");
      // Set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      try{ 
              
       $user=$_GET['user'];
       $pass=$_GET['pass'];
   
       $sql="INSERT INTO customer(name,pass) VALUES('".$user."','".$pass."')";
   
        $result=$pdo->query($sql);
   
        if($result){
   
           echo json_encode(array(
               
            'message'=>"signup successful! let's login",
             'code'=>true

           ));

         }
       else{
   
          echo json_encode(array(
               
            'message'=>'server problem',
            'quoto'=>$result,
            'code'=>false

          ));

         }
        
     }catch(PDOException $except){

      echo json_encode(array(

        'message'=>"PDOException",
        'code'=>false

      ));

      }
        
      $pdo=null;  //closing the source
     
    }  // end of signup block


    // sign  in block


if(isset($_GET['signin'])){

      $user=$_GET['user'];
      $pass=$_GET['pass'];

      $sql = "SELECT * FROM customer WHERE name =:user AND pass =:pass";

      $databaseFile = 'Database1.db';

      $pdo = new PDO("sqlite:$databaseFile");
      // Set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     try{
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
  
      $stmt->execute();
  
      // Fetch the result as needed
       if($stmt){  

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($result)>0){
    
          $_SESSION["email"] =$user;
          $_SESSION["pass"] = $pass;

          echo json_encode(array(
            'message'=>"signin successful"
          ));

        }else{   
          echo json_encode(array(
          'message'=>"Incorrect user / password"
        )) ;
            
            }
    
        } 

      else{
  
         echo json_encode(array(
              
           'message'=>'sql qeury execution problem'

         ));

        }


     }catch(PDOException $except){

        echo json_encode(array(

          'message'=>"PDOException"

        ));

     }

     $pdo=null;

}


// fetching data from product table 

  
if(isset($_GET['data'])){

  $content_type=$_GET['data'];

  $databaseFile = 'Database1.db';

  $pdo = new PDO("sqlite:$databaseFile");
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  try{

  $sql="SELECT * FROM product  WHERE Prod_name='".$content_type."'  ";

  
  $result=$pdo->prepare($sql);

  $result->execute();

  $d=$result->fetchAll(PDO::FETCH_ASSOC);

if($result){
 
  
if( count($d)> 0) {

foreach( $d as $row){

$name=$row['short_name'];
$dec=$row['Prod_Desc'];
$about=$row['about'];
$cost=$row['Prod_cost'];
$link=$row['Prod_link'];

//echo "&&&&&&&&&&&&".$result->num_rows;

 echo json_encode(array(
   
   'name'=>$name,
   'desc'=>$dec, 
   'cost'=>$cost,
    'link'=>$link,
    'about'=>$about  

  ));

  echo "#";

 }

///
}
else{

   echo json_encode(array(
       'msg'=>'No items in stock', 
        )
   );        

}
   

}else{

echo json_encode(array(
 'msg'=>'Server load problem'
));

}

 }catch(PDOException $except){

        echo json_encode(array(

          'message'=>"PDOException"

    ));

     }

    $pdo=null;


}

/////////////

if(isset($_GET['reg'])){


  $name=$_GET['name'];
  $email=$_GET['email'];
  $address=$_GET['address'];
  $state=$_GET['state'];
  $country=$_GET['country'];
  $mobile=$_GET['mobile'];
  $prod_name=$_GET['Pname'];
  $cost=$_GET['cost'];
  $postcode=$_GET['postcode'];
  $city=$_GET['city'];
  $date=date("d-m-y");
  $supplierid=rand(10, 100);


$sql="INSERT INTO `consumer`
(`Orderdate`, `email`, `name`, `mobile`, `address`, `prod_name`, `cost`, 
`city`, `country`, `state`, `postcode`,`supplierid`) VALUES 
('".$date."','".$email."','".$name."','".$mobile."','".$address."','".$prod_name."',
'".$cost."',
'".$city."','".$country."','".$state."','".$postcode."','".$supplierid."') " ;


$databaseFile = 'Database1.db';

$pdo = new PDO("sqlite:$databaseFile");
// Set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{

$result=$pdo->query($sql);

if($result){

  echo json_encode(array(

      'msg'=>'successfully added', 
       'status'=>202,
       )

      );        

  }    

  else{

    echo json_encode(array(
      'msg'=>'Not added', 
       'status'=>404,
        
       )

      );      

  }
////


}catch(PDOException $except){

  echo json_encode(array(

    'message'=>"PDOException"

  ));

}

$pdo=null;


}


if(isset($_GET['total'])){


  $databaseFile = 'Database1.db';

  $pdo = new PDO("sqlite:$databaseFile");
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql="SELECT cost from consumer WHERE email='".$_SESSION['email']."' ";

try{

  $stmt = $pdo->prepare($sql);
   $stmt->execute();
   $sum=0;
   $items=0;

   if($stmt){

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
       if(count($rows)>0){
      
        foreach( $rows as $row){

          $sum=$sum+$row['cost'];
          $items=$items+1;
        }

        echo json_encode(array(

          'cost'=>$sum,
          'items'=>$items, 
          'User'=>$_SESSION['email']
      
        ));
         
   }else{

        echo json_encode(array(

          'cost'=>$sum,
          'items'=>$items, 
          'User'=>$_SESSION['email']
      
       ));
            
       }
       
   }else{

    echo json_encode(array(

      'cost'=>$sum,
      'items'=>$items, 
      'User'=>$_SESSION['email']
  
    ));

  }

 }catch(PDOException $except){

  echo json_encode(array(

    'message'=>"PDOException",
    'User'=>$_SESSION['email']

  ));


}

$pdo=null;


}

 ////////////
 //login check for user

 if(isset($_GET['logincheck'])){

 echo  json_encode(array(

 'user'=>$_SESSION['email'],
 'pass'=>$_SESSION['pass']

 ));

 }

 // login check for admin

 if(isset($_GET['adminlogincheck'])){

  echo  json_encode(array(
 
  'user'=>$_SESSION['ademail'],
  'pass'=>$_SESSION['adpass']
 
  ));
 
  }


 /////

 ///logout for user
 
if(isset($_GET['logout'])){

 // session_destroy();  // for smooth run
 
 $_SESSION['email']="";
 $_SESSION['pass']="";
  
  echo json_encode(array(

    'message'=>'signout successful'

  ));

  }
  
////////Addpr

///////////////// ogout for admin

if(isset($_GET['adminlogout'])){

  // session_destroy();  // for smooth run
  
  $_SESSION['ademail']="";
  $_SESSION['adpass']="";
   
   echo json_encode(array(
 
     'message'=>'signout successful',
     'email'=>$_SESSION['ademail']
 
   ));
 
   }

/////////////////////////
if (isset($_FILES['user']) ) {

  
  $name=$_POST['name'];

  $about=$_POST['about'];

  $desc=$_POST['desc'];

  $cost=$_POST['cost'];

  $link=$_POST['link'];

  $type=$_POST['type'];

  $databaseFile = 'Database1.db';

  $pdo = new PDO("sqlite:$databaseFile");
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
$sql=" INSERT INTO `product`( `Prod_name`, `short_name`, 
`Prod_Desc`, `Prod_cost`, `Prod_link`, `about`) 
VALUES ('".$type."','".$name."','".$desc."' ,'".$cost."', '".$link."','".$about."' ) ";
  
  

if($_FILES['user']['error'] === UPLOAD_ERR_OK){


  $target_directory = "themes/images/carousel/Things/";
  $target_path = $target_directory . basename($_FILES['user']['name']);

try{
  
$isuploaded = move_uploaded_file($_FILES['user']['tmp_name'], $target_path);

$result=$pdo->query($sql);

if($result && $isuploaded){

  echo json_encode(array(

      'msg'=>'1 row inserted in a product table', 
       ) );        

  }else{

    echo json_encode(array(
      'msg'=>'Items not inserted in a product table', 
 
       ) );      

  }

}catch(PDOException $except){

  echo json_encode(array(

    'msg'=>"PDOException",

  ));

}


 } else {
    echo json_encode(['success' => false, 'msg' => 'Error uploading file.']);
   
  }

  $pdo=null;

}
//////////////

/////////////////////////////////////////////
// admin login checkup 


if(isset($_GET['adlogin'])){

  $aduser=$_GET['aduser'];

  $adpass=$_GET['adpass'];

  $sql="SELECT * FROM admin WHERE  email='".$aduser."' AND pass='".$adpass."' ";

  $databaseFile = 'Database1.db';

  try{

  $pdo = new PDO("sqlite:$databaseFile");
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare($sql);
  $stmt->execute();

         if($stmt){

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if(count($result)>0){  

            //creating session 
              $_SESSION['ademail']=$aduser;
              $_SESSION['adpass']=$adpass;

            echo json_encode(array(
  
              'code'=>true,
              'msg'=>"login successful",

          
            ));

          }else{

            echo json_encode(array(
  
              'code'=>false,
              'msg'=>"Invalid login",
          
            ));

          }

          }else{

            echo json_encode(array(
  
              'msg'=>"Request failed",
               'code'=>false
          
            ));

          }
              

  }catch(PDOException $except){

    echo json_encode(array(
  
      'msg'=>"PDOException",
      'code'=>false
  
    ));
  
  }
  
$pdo=null;

}

////////////////////////////////////////////

?>

