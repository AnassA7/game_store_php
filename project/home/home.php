<?php 
    
session_start();

include_once "config.php";
if(!isset($_SESSION['valid'])){
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['valid'];
            $query = mysqli_query($con,"SELECT*FROM user WHERE id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['name'];
                $res_Email = $result['email'];
                $res_Age = $result['birth_day'];
                $res_id = $result['id'];
                $res_walet_id = $result['walet_id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>birth day <b><?php echo $res_Age ?> </b>.</p> 
            </div>
            <div class="box">
                <p>walet id <b><?php echo $res_walet_id ?> </b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>