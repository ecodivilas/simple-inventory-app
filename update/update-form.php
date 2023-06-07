<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<!--====form section start====-->
<div class="user-detail">
    <h2>Update User Data</h2>
    <p id="msg"></p>
    <form id="updateForm" method="POST">
      <input type="hidden" name="id" id="updateId">
          <label>Full Name</label>
          <input type="text" placeholder="Enter Full Name" name="fullName" required>
          <label>Email Address</label>
          <input type="email" placeholder="Enter Email Address" name="emailAddress" required>
          <label>City</label>
          <input type="city" placeholder="Enter Full City" name="city" required>
          <label>Country</label>
          <input type="text" placeholder="Enter Full Country" name="country" required>
          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
</body>
</html>