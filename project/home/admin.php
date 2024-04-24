
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
// Step 2: Execute the query
$sql_m = "SELECT SUM(money) AS total_money FROM user WHERE type_user = 'user'";
$result_m = $con->query($sql_m);

// Step 3: Fetch the result
if ($result_m->num_rows > 0) {
    // Output data of each row
    $row = $result_m->fetch_assoc();
    $totalMoney = $row["total_money"];
} else {
    echo "No transactions found.";
}
// Step 2: Execute the query
$sql_o = "SELECT SUM(money) AS total_money FROM operation";
$result_o = $con->query($sql_o);

// Step 3: Fetch the result
if ($result_o->num_rows > 0) {
    // Output data of each row
    $row = $result_o->fetch_assoc();
    $totalOMoney = $row["total_money"];
} else {
    echo "No transactions found.";
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
                   <h1>$<?php echo  number_format($res_money, 2) ?></h1>
                 </div>
               </div>
            </div>
           <!-- end seling -->
              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">paid</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>money user</h4>
                    <h1>$<?php echo number_format($totalMoney, 2) ?></h1>
                  </div>

 
                </div>
             </div>
            <!-- end seling -->
               <!-- start seling -->
               <div class="income">
                <span class="material-symbols-sharp">stacked_line_chart</span>
                <div class="middle">
 
                  <div class="left">
                    <h4>Total Sales</h4>
                    <h1>$<?php echo number_format($totalOMoney, 2) ?></h1>
                  </div>

 
                </div>
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
                <th>user</th>
                <th>game</th>
                <th>Payments</th>
                <th>time</th>
              </tr>
             </thead>
             
             <?php
                  $sql = "SELECT * FROM operation";
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()) {
                    $res_id_op = $row['id_op'];
                    $res_user = $row['user_name'];
                    $res_game = $row['game_name'];
                    $res_money = $row['money'];
                    $res_time = $row['time'];
                  ?>
                <tbody>
                 <tr>
                   <td><?php echo $res_id_op ?></td>
                   <td><?php echo $res_user ?></td>
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

  

   <div class="sales-analytics">
     <h2>Sales Analytics</h2>

      <div class="item onlion">
        <div class="icon">
          <span class="material-symbols-sharp">shopping_cart</span>
        </div>
        <div class="right_text">
          <div class="info">
            <h4>Onlion Orders</h4>
            <small class="text-muted">Last seen 2 Hours</small>
          </div>
          <h5 class="danger">-17%</h5>
          <h4>3849</h4>
        </div>
      </div>
      <div class="item onlion">
        <div class="icon">
          <span class="material-symbols-sharp">shopping_cart</span>
        </div>
        <div class="right_text">
          <div class="info">
            <h4>Onlion Orders</h4>
            <small class="text-muted">Last seen 2 Hours</small>
          </div>
          <h5 class="success">-17%</h5>
          <h3>3849</h3>
        </div>
      </div>
      <div class="item onlion">
        <div class="icon">
          <span class="material-symbols-sharp">shopping_cart</span>
        </div>
        <div class="right_text">
          <div class="info">
            <h4>Onlion Orders</h4>
            <small class="text-muted">Last seen 2 Hours</small>
          </div>
          <h5 class="danger">-17%</h5>
          <h3>3849</h3>
        </div>
      </div>
   
  

</div>

      <div class="item add_product">
            <div>
            <span class="material-symbols-sharp">add</span>
            </div>
     </div>
</div>


   </div>



   <script src="assets/js/script.js"></script>
</body>
