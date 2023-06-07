<?php
include('database.php');
$db=$connection;// database connection  
//legal input values
 $product = legal_input($_POST['product']);
 $price = legal_input($_POST['price']);
 $unit = legal_input($_POST['unit']);
 $expiry_date = legal_input($_POST['expiry_date']);
 $quantity = legal_input($_POST['quantity']);
//  $file = legal_input($_POST['file']);
// $file = "Something";
// File Setup
if(isset($_POST['upload'])){
    // $new_file_name = rand(1000,100000)."-".$_FILES['file']['name'];
    $new_file_name = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $final_file=str_replace(' ','-',$new_file_name);
    $folder="upload/";

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
           
        if(!empty($product) && !empty($price) && !empty($unit) && !empty($expiry_date) && !empty($quantity) && !empty($file)){
            //  Sql Query to insert user data into database table
            Insert_data($product, $price, $unit, $expiry_date, $quantity, $file);
        }else{
        echo "All fields are required";
        }
        
    }
} else {
    // echo print_r($_POST);
    echo print_r($_FILES['image']['name']);
}



 
// convert illegal input value to ligal value formate
function legal_input($value) {
    // $value = trim($value);
    // $value = stripslashes($value);
    // $value = htmlspecialchars($value);
    return $value;
}
// // function to insert user data into database table
 function insert_data($product, $price, $unit, $expiry_date, $quantity, $file){
 
     global $db;
      $query="INSERT INTO product(product, price, unit, expiry_date, quantity, image_url) VALUES('$product','$price','$unit','$expiry_date', '$quantity', '$file')";
     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $query . "<br>" . mysqli_error($db);
     }
 }
?>