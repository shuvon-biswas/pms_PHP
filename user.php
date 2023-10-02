<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $address = $_POST['address'];

  $sql = "insert into `patient` (name,email,phone,dob,gender,type,address)
        values('$name','$email','$phone','$dob','$gender','$type','$address')";

  $result = mysqli_query($con, $sql);
  if($result){
    header('location:display.php');
  }else{
    die(mysqli_error($con));
  }

}
?>



<!doctype html>
<html lang="ar">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>pms</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="name">
      </div><br>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email">
      </div><br>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter your phone number" name="phone">
      </div><br>
      <div class="form-group">
        <label>DOB</label>
        <input type="date" class="form-control" placeholder="Enter your date of birth" name="dob">
      </div><br>

      <div class="form-group">
        <label>Gender</label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br>
      </div><br>
      <div class="form-group">
        <label>Type</label><br>
        <select name="type" id="type" class="form-control">
          <option value="corporate">Corporate</option>
          <option value="general">General</option>
        </select>
      </div><br>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter your address" name="address">
      </div><br>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

</body>

</html>