<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylelo.css">
    <title>Login</title>
</head>
<body>
    <style>
        body{
            background-image:src="image/game-developers.jpg";
        }
    </style>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include_once "config.php";
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM studio WHERE email='$email' AND password='$password' ") ;
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['studio'] = $row['id'];
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='login.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['studio'])){
                    header("Location: studio.php");
                }
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a> <br>
                    login as user <a href="login.php">user</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>