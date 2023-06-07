<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "inventory");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM products ORDER BY product_id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">Image</th>
     <th width="15%">Product</th>
     <th width="10%">Unit</th>
     <th width="10%">Price</th>
     <th width="15%">Expiry Date</th>
     <th width="10%">Available</th>
     <th width="10%">Available Cost</th>
     <th width="10%">Change</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>
     <img src="data:image/jpeg;base64,'.base64_encode($row['file'] ).'" height="60" width="75" class="img-thumbnail" />
     </td>
     <td class="align-middle">'.$row["product"].'</td>
     <td class="align-middle">'.$row["unit"].'</td>
     <td class="align-middle">'.$row["price"].'</td>
     <td class="align-middle">'.$row["expiry_date"].'</td>
     <td class="align-middle">'.$row["quantity"].'</td>
     <td class="align-middle">'.$row["quantity"]*$row['price'].'</td>
     <td class="align-middle"><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["product_id"].'">Change</button></td>
     <td class="align-middle"><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["product_id"].'">Remove</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
   $product = $_POST['product'];
   $unit = $_POST['unit'];
   $price = $_POST['price'];
   $expiry_date = $_POST['expiry_date'];
   $quantity = $_POST['quantity'];
   $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
   $query = "INSERT INTO products(product, unit, price, expiry_date, quantity, file)
   VALUES ('$product', '$unit', '$price', '$expiry_date', '$quantity', '$file')";
  if(mysqli_query($connect, $query))
  {
    echo 'Product Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $product = $_POST['product'];
  $unit = $_POST['unit'];
  $price = $_POST['price'];
  $expiry_date = $_POST['expiry_date'];
  $quantity = $_POST['quantity'];
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE products SET product = '$product', unit = '$unit', price = '$price',
  expiry_date = '$expiry_date', quantity = '$quantity', file = '$file' WHERE product_id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Product Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM products WHERE product_id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Product Deleted from Database';
  }
 }
}
?>
