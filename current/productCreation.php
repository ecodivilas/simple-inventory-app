<?php 
$product = $_POST['product'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$expiry_date = $_POST['expiry_date'];
$quantity = $_POST['quantity'];
// $file = $_POST['file'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'inventory_db');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    if(isset($_POST['upload'])){
        $new_file_name = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $final_file=str_replace(' ','-',$new_file_name);
        $folder="upload/";

        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
        // Insert
        $stmt = $conn->prepare("insert into product(product, unit, price, expiry_date, quantity, image_url)
            values(?, ?, ?, ?, ?, ?)");
            // i = integer, d = double, s = string, b = BLOB
        $stmt->bind_param("ssdsis", $product, $unit , $price, $expiry_date, $quantity, $final_file);
        $stmt->execute();
        echo "Created Successfully ...";
        $stmt->close();
        $conn->close();
        // Redirect Page Location
        header("Location: /");

        echo "File successfully upload";
        } else {
        echo "Error. Please try again";
        }
    }
}
?>