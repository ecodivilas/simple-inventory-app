<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Inventory System</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">
        <a href="#" class="navbar-brand">Simple Inventory System</a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="/" class="nav-link">Put Product</a>
            </li>
            <li class="nav-item">
              <a href="/products.php" class="nav-link">Product List</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Create Product -->
    <section class="product-section background bg-dark text-light px-2">
      <div class="container-fluid">
        <form class="form-control" action="createProduct.php" method="post">
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
            <input type="file" name="image" class="form-control" />
          </div>

          <div class="submit">
            <input
              type="submit"
              class="form-control bg-success text-white fw-bold"
            />
          </div>
        </form>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
