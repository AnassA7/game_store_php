<?php 

session_start();
include_once "config.php";
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
}
?>





 <?php 

$id = $_SESSION['valid'];
$query = mysqli_query($con,"SELECT*FROM user WHERE id=$id");
while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['name'];
    $res_Email = $result['email'];
    $res_Age = $result['birth_day'];
    $res_id = $result['id'];
    $res_walet_id = $result['money'];
    $res_image = $result['image'];
}
include_once "uh.php";
?>
      <main>

       <!-- end insights -->
      <div class="recent_order">
         <h2>info</h2>
         <h2>name: <?php echo $res_Uname ?> </h2><br>
         <h2>email: <?php echo $res_Email ?> </h2><br>
         <h2>birth day:  <?php echo $res_Age ?></h2><h1></h1><br>
         <h2>id user: <?php echo $res_id ?> </h2><br>



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
$con->close();