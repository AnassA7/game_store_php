<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>
  <?php
    include 'conixion.php';
    session_start();
      $_SESSION['id_upd'] = $_GET['Id'];
// Ensure the 'Id' parameter is set and is numeric
if(isset($_GET['Id']) && is_numeric($_GET['Id'])) {
  // Retrieve the 'Id' parameter
  $id = $_GET['Id'];

  // Prepare the SQL statement
  $statement = $con->prepare("SELECT * FROM studio WHERE Id = ?");

  // Bind the parameter to the placeholder
  $statement->bind_param('i', $id);

  // Execute the statement
  $statement->execute();

  // Get the result
  $result = $statement->get_result();

  // Fetch the row
  $table = $result->fetch_assoc();
} else {
  // Handle case where 'Id' parameter is missing or not numeric
  echo "Invalid or missing Id parameter.";
}
  ?>
<div class="container w-50">


<form method="POST" action="" enctype="multipart/form-data">
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">img:</label>
                                    <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Name" value="<?php echo $table['name']?>">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Email" value="<?php echo $table['email']?>">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Phone:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Phone" value="<?php echo $table['description']?>">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Date of admission:</label>
                                    <input type="date" class="form-control" id="recipient-name" name="DateOfAdmission" value="<?php echo $table['date']?>">
                                  </div>
                                  <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Update student</button>
                              </div>
                                </form>
</div>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
<?php
$id = $_GET['Id'];
include 'conixion.php';
if (isset($_POST['submit'])){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $DateOfAdmission = $_POST['DateOfAdmission'];
    $requete = $con -> prepare("UPDATE studio 
    SET 
    name = '$Name',
    email = '$Email',
    description = '$Phone',
    date = '$DateOfAdmission'
    WHERE Id = $id");
    $res = $requete -> execute();
    header("location:students_list.php");
}
?>