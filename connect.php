<?php 
$product = $_POST['product'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$expiry_date = $_POST['expiry_date'];
$quantity = $_POST['quantity'];
$image = $_POST['image'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'inventory_db');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into product(product, unit, price, expiry_date, quantity, image_url)
        values(?, ?, ?, ?, ?, ?)");
        // i = integer, d = double, s = string, b = BLOB
    $stmt->bind_param("ssdsis", $product, $unit , $price, $expiry_date, $quantity, $image);
    $stmt->execute();
    echo "Created Successfully ...";
    $stmt->close();
    $conn->close();

}
?>