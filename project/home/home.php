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
           <h1>Bienvenue <?php echo $res_Uname ?> </h1>


        <div class="insights">

           <!-- start seling -->
            <div class="sales">
               <span class="material-symbols-sharp">id_card</span>
               <div class="middle">

                 <div class="left">
                   <h4>name</h4>
                   <h1><?php echo $res_Uname ?></h1>
                 </div>

               </div>
            </div>
           <!-- end seling -->
              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">mail</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>Email</h4>
                    <h1><?php echo $res_Email ?></h1>
                  </div>
                </div>
                <small></small>
             </div>
              <div class="expenses">
                <span class="material-symbols-sharp">calendar_today </span>
                <div class="middle">
 
                  <div class="left">
                    <h4>date</h4>
                    <h1><?php echo $res_Age ?></h1>
                  </div>
                </div>
                <small></small>
             </div>

            <!-- end seling -->

        </div>
       <!-- end insights -->
      <div class="recent_order">
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