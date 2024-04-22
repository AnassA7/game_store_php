<?php
include_once "stuh.php";
$sql_count = "SELECT COUNT(*) AS game_count FROM operation WHERE studio_id=$id ";
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

           <!-- start seling -->
            <div class="sales">
               <span class="material-symbols-sharp">paid</span>
               <div class="middle">

                 <div class="left">
                   <h4>money</h4>
                   <h1>$<?php echo $res_money ?></h1>
                 </div>

               </div>
            </div>
           <!-- end seling -->
              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">local_mall</span>
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
         <h2>Recent Orders</h2>
         <table> 
             <thead>
              <tr>
                <th>ID operation</th>
                <th>game</th>
                <th>Payments</th>
                <th>time</th>
              </tr>
             </thead>
             
             <?php
                  $sql = "SELECT * FROM operation WHERE studio_id=$id";
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()) {
                    $res_id_op = $row['id_op'];
                    $res_game = $row['game_name'];
                    $res_money = $row['money'];
                    $res_time = $row['time'];
                  ?>
                <tbody>
                 <tr>
                   <td><?php echo $res_id_op ?></td>
                   <td><?php echo $res_game ?></td>
                   <td class="warning"><?php echo $res_money ?></td>
                   <td class="primary"><?php echo $res_time ?></td>
                 </tr>
                </tbody>
                <?php } } ?>
         </table>
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
