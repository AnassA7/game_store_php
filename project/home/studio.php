<?php
include_once "stuh.php";
?>
      <main>
           <h1>Dashbord</h1>


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
                    <h1><?php echo $res_date ?></h1>
                  </div>
                </div>
                <small></small>
             </div>
              <div class="expenses">
                <span class="material-symbols-sharp">description</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>description</h4>
                    <h1><?php echo $res_description ?></h1>
                  </div>
                </div>
                <small></small>
             </div>

            <!-- end seling -->

        </div>
       <!-- end insights -->
      <div class="recent_order">
         <h2></h2>
         
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