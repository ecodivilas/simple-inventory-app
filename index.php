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
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <?php
    include "navBar.php";
    ?>
    <!-- Create Product -->
    <section class="product-section background bg-dark text-light px-2">
      <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Picture</th>
            <th scope="col">Product</th>
            <th scope="col">Unit</th>
            <th scope="col">Price</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Available Inventory</th>
            <th scope="col">Available Inventory Cost</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                $attr = array("image_url", "product",
                              "unit", "price",
                              "expiry_date",
                              "quantity");
                $attrlength = count($attr);
                for ($x = 0; $x < $attrlength; $x++) {
                  echo "<td scope=\"row\">";
                  echo $row[$attr[$x]];
                  echo "</td>";
                }
                # available inventory cost
                echo "<td scope=\"row\">";
                  echo $row["price"] * $row["quantity"];
                  echo "</td>";
              } }
            
            ?>
        </tbody>
      </table>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
