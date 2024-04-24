<?php
session_start();
include_once "config.php";

if(!isset($_SESSION['valid'])){
  header("Location: index.php");
  exit; // Added exit to stop further execution
}

$id_valid = $_SESSION['valid'];

$sql = "SELECT g.name, g.image, g.price, g.category FROM game g JOIN library l ON g.id = l.game_idgame WHERE l.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_valid); // Changed "si" to "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $game_name = $row['name'];
    $game_image = $row['image'];
    $game_price = $row['price'];
    $game_category = $row['category'];
    // echo $game_name;
    
  }
} else {
  // echo "No games found in the library.";
}
include_once "uh.php";
?>

<main>
<h1>ton jeu </h1>

           <div class="insights">

             
             </div>
             <!-- end insights -->
             <div class="recent_order">
               <h2></h2>
               <link rel="stylesheet" href="assets/css/lib.css">
      <ul class="cards">
               
               <?php
         $id_valid = $_SESSION['valid'];
         
         $sql = "SELECT g.name, g.image, g.price, g.category FROM game g JOIN library l ON g.id = l.game_idgame WHERE l.user_id = ?";
         $stmt = $con->prepare($sql);
         $stmt->bind_param("i", $id_valid); // Changed "si" to "i" for integer
         $stmt->execute();
         $result = $stmt->get_result();
         
         if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
             $game_name = $row['name'];
             $game_image = $row['image'];
             $game_price = $row['price'];
             $game_category = $row['category'];
             ?>
             <div class="card">
             <?php include "dot.php"; ?>
              
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                  <path />
                </svg>
                <div class="card__header-text">
                  <h3 class="card__title"><?php echo $row['name']; ?></h3>
                  <span class="card__status"><?php echo $row['category']; ?></span>
                </div>
              </div>
            </div>
          </div>
<?php
            }
          } else {
              echo "No games found in the library.";
          }
?>
</ul>
         <a href="#">Show All</a>
      </div>

      </main>
      <!------------------
         end main
        ------------------->

      <!----------------
        start right main 
      ---------------------->
    <div class="right">

<div class="top">
   <button id="menu_bar">
     <span class="material-symbols-sharp">menu</span>
   </button>

   <div class="theme-toggler">
     <span class="material-symbols-sharp active">light_mode</span>
     <span class="material-symbols-sharp">dark_mode</span>
   </div>
    <div class="profile">
       <div class="info">
           <p><b>Babar</b></p>
           <p><?php echo $res_Uname ?></p>
           <small class="text-muted"></small>
       </div>
       <div class="profile-photo">
         <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image); ?>" alt=""/>
       </div>
    </div>
</div>



   



   <script src="assets/js/script.js"></script>
</body>
<?php

