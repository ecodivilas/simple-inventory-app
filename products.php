<?php
  include 'connection.php';
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Product List</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Picture</th>
          <th scope="col">Product</th>
          <th scope="col">Unit</th>
          <th scope="col">Price</th>
          <th scope="col">Available</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM product";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
              echo "<tr>";
              $attr = array("product",
                            "unit", "price",
                            "expiry_date",
                            "quantity",
                            "image_url");
              $attrlength = count($attr);
              for ($x = 0; $x < $attrlength; $x++) {
                echo "<td scope=\"row\">";
                echo $row[$attr[$x]];
                echo "</td>";
              }
            } }
          
          ?>
      </tbody>
    </table>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
