<?php
session_start();
include_once "config.php";

if(!isset($_SESSION['valid'])){
  header("Location: index.php");
  exit; // Added exit to stop further execution
}

$id = $_SESSION['valid'];
$query = mysqli_query($con, "SELECT * FROM user WHERE id = $id");

while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['name'];
    $res_Email = $result['email'];
    $res_Age = $result['birth_day'];
    $res_id = $result['id'];
    $res_image = $result['image'];
    $res_money = $result['money'];
}

$message = []; // Initialize an empty array for messages

if(isset($_POST['update_profile'])){
   $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($con, $_POST['update_email']);

   // Update name and email
   mysqli_query($con, "UPDATE `user` SET name = '$update_name', email = '$update_email' WHERE id = '$id'");

   // Password updating
   $old_pass = mysqli_real_escape_string($con, $_POST['old_pass']);
   $update_pass = mysqli_real_escape_string($con, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm_pass']);

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if(md5($update_pass) == $old_pass){
         $message[] = 'Old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password not matched!';
      }else{
         $hashed_pass = md5($confirm_pass); // Hash the password
         mysqli_query($con, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$id'");
         $message[] = 'Password updated successfully!';
      }
   }

   // Update image
   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image is too large';
      }else{
         $image_update_query = mysqli_query($con, "UPDATE `user` SET image = '$update_image' WHERE id = '$id'");
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name,$update_image);
         }
         $message[] = 'Image updated successfully!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="assets/css/edit.css">
</head>
<body>
   
<div class="update-profile">

   <form action="" method="post" enctype="multipart/form-data">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image); ?>">
      <?php
         if(!empty($message)){
            foreach($message as $msg){
               echo '<div class="message">'.$msg.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username:</span>
            <input type="text" name="update_name" value="<?php echo $res_Uname; ?>" class="box">
            <span>Your Email:</span>
            <input type="email" name="update_email" value="<?php echo $res_Email; ?>" class="box">
            <span>Update Your Picture:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $res_pass; ?>">
            <span>Old Password:</span>
            <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box">
            <span>New Password:</span>
            <input type="password" name="new_pass" placeholder="Enter New Password" class="box">
            <span>Confirm Password:</span>
            <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box">
         </div>
      </div>
      <input type="submit" value="Update Profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Go Back</a>
   </form>

</div>

</body>
</html>
