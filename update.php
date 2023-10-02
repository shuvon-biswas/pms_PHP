<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from `patient` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$dob = $row['dob'];
$gender = $row['gender'];
$type = $row['type'];
$address = $row['address'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $address = $_POST['address'];

  $sql = "update `patient` set name='$name', email='$email', phone='$phone', dob='$dob', gender='$gender', type='$type', address='$address' where id=$id";

  $result = mysqli_query($con, $sql);
  if ($result) {
    header('location: display.php');
  } else {
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
        <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $name; ?>">
      </div><br>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email"
          value="<?php echo $email; ?>">
      </div><br>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter your phone number" name="phone"
          value="<?php echo $phone; ?>">
      </div><br>
      <div class="form-group">
        <label>DOB</label>
        <input type="date" class="form-control" placeholder="Enter your date of birth" name="dob"
          value="<?php echo $dob; ?>">
      </div><br>

      <div class="form-group">
        <label>Gender</label><br>
        <input type="radio" id="male" name="gender" value="Male" <?php if ($gender == 'Male')
          echo 'checked'; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?php if ($gender == 'Female')
          echo 'checked'; ?>>
        <label for="female">Female</label><br>
      </div><br>
      <div class="form-group">
        <label>Type</label><br>
        <select name="type" id="type" class="form-control">
          <option value="corporate" <?php if ($type == 'corporate')
            echo 'selected'; ?>>Corporate</option>
          <option value="general" <?php if ($type == 'general')
            echo 'selected'; ?>>General</option>
        </select>
      </div><br>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" placeholder="Enter your address" name="address"
          value="<?php echo $address; ?>">
      </div><br>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>

</body>

</html>