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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <!-- Create Product -->
    <section class="product-section background bg-dark text-light">
      <div class="container">
        <h2 class="py-2">Simple Inventory App</h2>
        <form class="form-control" action="productCreation.php" method="post"  enctype="multipart/form-data">
          <h2>Create Product</h2>
          <div>
            <label>Product Name: </label>
            <input type="text" name="product" class="form-control" />
          </div>
          <div>
            <label>Unit: </label>
            <input type="text" name="unit" class="form-control" />
          </div>
          <div>
            <label>Price: </label>
            <!-- <input type="text" name="product" /> -->
            <div class="input-group">
              <span class="input-group-text">₱</span>
              <input type="text" class="form-control" name="price" />
              <span class="input-group-text">.00</span>
            </div>
          </div>
          <div>
            <label>Date of Expiry: </label>
            <input type="date" name="expiry_date" class="form-control" />
          </div>
          <div>
            <label>Available in Inventory: </label>
            <input type="number" name="quantity" class="form-control" />
          </div>
          <div>
            <label>Upload Image: </label>
            <input type="file" name="file" class="form-control" />
          </div>

          <div class="submit">
            <input
              type="submit" name="upload"
              class="form-control bg-success text-white fw-bold"
            />
          </div>
        </form>
      </div>
    </section>

    <!-- Product List -->
    <section class="product-list-section background bg-dark text-light">
      <div class="container">
        <h2>Product List</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Product</th>
            <th scope="col">Unit</th>
            <th scope="col">Price</th> 
            <th scope="col">Expiry Date</th>
            <th scope="col">Available</th>
            <th scope="col">Available Cost</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                # Image
                echo "<tr>";
                // echo "<div class=\"table-data d-flex align-items-center p-2\">";
                echo "<td class=\"table-data align-middle\" >";
                echo "<img src=\"upload/$row[image_url]\" class=\"img-thumbnail\" style=\"max-width: 6.25rem;\" alt=\"$row[image_url]\" />";
                echo "</td>";

                $attr = array("product",
                              "unit", "price",
                              "expiry_date",
                              "quantity");
                $attrlength = count($attr);
                for ($x = 0; $x < $attrlength; $x++) {
                  echo "<td scope=\"row\" class=\"align-middle\">";
                  echo $row[$attr[$x]];
                  echo "</td>";
                }
                # available inventory cost
                echo "<td scope=\"row\" class=\"align-middle\">";
                  echo $row["price"] * $row["quantity"];
                  echo "</td>";
              } }
              echo "</tr>";
              // echo "</div>";
            
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
