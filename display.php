<?php
include 'connect.php';


$searchTerm = "";


if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];

  $sql = "SELECT * FROM `patient` WHERE `name` LIKE ? OR `email` LIKE ? OR `phone` LIKE ?";

  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $searchParam, $searchParam, $searchParam);
  $searchParam = '%' . $searchTerm . '%';
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
} else {
  $sql = "SELECT * FROM `patient`";
  $result = mysqli_query($con, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light"> Add Patient</a></button>

    <div class="container mt-0">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2>Search Patient</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mb-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." name="search"
                value="<?php echo $searchTerm; ?>">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sl No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">DOB</th>
          <th scope="col">Gender</th>
          <th scope="col">Type</th>
          <th scope="col">Address</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result) {
          $count = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $type = $row['type'];
            $address = $row['address'];
            echo '<tr>
                            <th scope="row">' . $count . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $dob . '</td>
                            <td>' . $gender . '</td>
                            <td>' . $type . '</td>
                            <td>' . $address . '</td>
                            <td>
                                <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
            $count++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>