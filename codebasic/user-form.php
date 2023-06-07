<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css" />
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
</head>
<body>
<!--====form section start====-->
<!-- <div class="user-detail">
    <h2>Insert User Data</h2>
    <p id="msg"></p>
    <form id="userForm" method="POST">
          <label>Full Name</label>
          <input type="text" placeholder="Enter Full Name" name="fullName" required>
          <label>Email Address</label>
          <input type="email" placeholder="Enter Email Address" name="emailAddress" required>
          <label>City</label>
          <input type="city" placeholder="Enter Full City" name="city" required>
          <label>Country</label>
          <input type="text" placeholder="Enter Full Country" name="country" required>
          <button type="submit">Submit</button>
    </form>
</div> -->
 <!-- Create Product -->
 <section class="product-section background bg-dark text-light">
      <div class="container">
        <h2 class="py-2">Simple Inventory App</h2>

        <div class="card"><p id="msg"></p></div>

        <form class="form-control" id="productForm" method="post" enctype="multipart/form-data">
          <h2>Create Product</h2>
          <div>
            <label>Product Name: </label>
            <input type="text" name="product" class="form-control" placeholder="(example : Coke, Coke 8oz)" required />
          </div>
          <div>
            <label>Unit: </label>
            <input type="text" name="unit" class="form-control" placeholder="(example : bottle, case x 12)" required />
          </div>
          <div>
            <label>Price: </label>
            <!-- <input type="text" name="product" /> -->
            <div class="input-group">
              <span class="input-group-text">₱</span>
              <input type="text" class="form-control" name="price" placeholder="(example : 60.00)" required />
              <span class="input-group-text">.00</span>
            </div>
          </div>
          <div>
            <label>Date of Expiry: </label>
            <input type="date" name="expiry_date" class="form-control" placeholder="(example: January 16,2022)" required />
          </div>
          <div>
            <label>Available in Inventory: </label>
            <input type="number" name="quantity" class="form-control" placeholder="(example: 20)" required />
          </div>
          <div>
            <label>Upload Image: </label>
            <input type="file" accept="image/*" name="image" id="image" class="form-control" required />
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



<!--====form section start====-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
</body>
</html>