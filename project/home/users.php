<?php
session_start();
include_once "config.php";
if(isset($_SESSION['valid'])){
    if($_SESSION['type']==="user")
        header("Location: home.php");


}else{
    header("Location: index.php");
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
include_once "adh.php";
$sql_count = "SELECT COUNT(*) AS user_count FROM user";
$result = $con->query($sql_count);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $n_user = $row["user_count"];
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
               <span class="material-symbols-sharp">supervised_user_circle</span>
               <div class="middle">

                 <div class="left">
                   <h4>users</h4>
                   <h1><?php echo $n_user ?></h1>
                 </div>


               </div>
               <small>number of users</small>
            </div>
           <!-- end seling -->
              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">do_not_disturb_on</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>ofline user</h4>
                    <h1>10</h1>
                  </div>

 
                </div>
                <small>Last 24 Hours</small>
             </div>
            <!-- end seling -->
               <!-- start seling -->
               <div class="income">
                <span class="material-symbols-sharp">radio_button_checked</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>online user</h4>
                    <h1>1</h1>
                  </div>
                </div>
                <small>Last 24 Hours</small>
             </div>
            <!-- end seling -->

        </div>
       <!-- end insights -->
      <div class="recent_order">
         <h2>Recent Orders</h2>
         <table> 
             <thead>
              <tr>
                <th>ID</th>
                <th>user</th>
                <th>profile</th>
                <th>email</th>
                <th>point</th>
                <th>birth day</th>
              </tr>
             </thead>
             
             <?php
                  $sql = "SELECT * FROM user WHERE type_user = 'user' ";
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()) {
                    $res_id = $row['id'];
                    $res_user = $row['name'];
                    $res_email = $row['email'];
                    $res_point = $row['point'];
                    $res_birth_day = $row['birth_day'];
                    $res_image_user = $row['image'];
                  ?>
                <tbody>
                 <tr>
                   <td><?php echo $res_id ?></td>
                   <td><?php echo $res_user ?></td>
                   <td>        
                        <div class="profile-photo">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image_user); ?>" alt=""/>
                        </div>
                    </td>
                   <td><?php echo $res_email ?></td>
                   <td class="warning"><?php echo $res_point ?></td>
                   <td class="primary"><?php echo $res_birth_day ?></td>
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
<?php
$con->close();