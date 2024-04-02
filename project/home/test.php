<?php
include_once "config.php";
include_once "header.php";
?>

<div>
<?php

$sql = "SELECT * FROM game";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo '  <div class="section trending">
                <div class="container">
                  <div class="row trending-box">
                    <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                      <div class="item">
                        <div class="thumb">
                          <a href="product-details.html"><img src="assets/images/trending-01.jpg" alt=""></a>
                          <span class="price">$24</span>
                        </div>
                        <div class="down-content">
                          <span class="category">Action</span>
                          <h4>Assasin Creed</h4>
                          <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>';
  }
// $row = mysqli_fetch_assoc($result);
// var_dump($row);
// echo $row['id'];
// echo $row['name'];
// echo $row['price'];
// echo $row['category'];
// echo $row['publish_date'];
// echo $row['description'];
// echo $row['studio_id'];
?>
</div>
<?php
include_once "footer.php";

