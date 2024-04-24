<?php
include_once "config.php";

if(!isset($_SESSION['valid'])){
  header("Location: index.php");
  exit; // Added exit to stop further execution
}

$id = $_SESSION['valid'];
$query = mysqli_query($con,"SELECT*FROM user WHERE id=$id");

while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['name'];
    $res_Email = $result['email'];
    $res_Age = $result['birth_day'];
    $res_id = $result['id'];
    $res_image = $result['image'];
    $res_money = $result['money'];

}

?>
<head>
  <title>admin page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="assets/css/style3.css">
</head>
<body>
<div class="container">
      <aside>
           
      <div class="top">
           <div class="logo">
             <h2> <span class="danger"><?php echo $res_Uname ?></span> </h2>
           </div>
           <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
              close
              </span>
           
    </div>
           <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
              close
              </span>
           </div>
         </div>
         <!-- end top -->
          <div class="sidebar">

            <a href="index.php">
              <span class="material-symbols-sharp">home_app_logo </span>
              <h4>Game night</h4>
           </a>
           <a id="a2" href="users.php" class="active">
              <span class="material-symbols-sharp">person </span>
              <h4>user</h4>
           </a>
           <a href="wallet.php">
              <span class="material-symbols-sharp">Wallet</span>
              <h4>Wallet</h4>
           </a>
           <a href="librery.php">
              <span class="material-symbols-sharp">stadia_controller </span>
              <h4>library</h4>
              <!-- <span class="msg_count">14</span> -->
           </a>
           <a href="edit.php">
              <span class="material-symbols-sharp">settings </span>
              <h4>settings</h4>
           </a>
           <a href="logout.php">
              <span class="material-symbols-sharp">logout </span>
              <h4>logout</h4>
           </a>
             


          </div>

      </aside>