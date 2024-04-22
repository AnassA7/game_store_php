<?php
include_once "stuh.php";
$sql_count = "SELECT COUNT(*) AS game_count FROM game WHERE studio_id=$id ";
$result = $con->query($sql_count);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $n_game = $row["game_count"];
    }
} else {
    echo "0 results";
}


?>


      <main>
           <h1>Dashbord</h1>


        <div class="insights">


              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">gamepad</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>user buy the game</h4>
                    <h1><?php echo $n_game ?></h1>
                  </div>
                </div>
                <small>game</small>
             </div>

            <!-- end seling -->

        </div>
       <!-- end insights -->
      <div class="recent_order">
         <h2>add game</h2>
         <?php include_once "forme_game.php" ?>
         <div class="container">

        </div>

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
