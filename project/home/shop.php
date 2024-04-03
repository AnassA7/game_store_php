<?php
include_once "config.php";
include_once "header.php";
?>

<div>
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".Adventure">Adventure</a>
        </li>
        <li>
          <a href="#!" data-filter=".Sports">Sports</a>
        </li>
        <li>
          <a href="#!" data-filter=".Racing">Racing</a>
        </li>
      </ul>
<div class="section trending">
                <div class="container">
                  <div class="row trending-box">
<?php

$sql = "SELECT * FROM game";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
  ?>
     
            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 <?php echo $row['category'] ; ?>">
              <div class="item">
                <div class="thumb">
                  <a href="product-details.html"><img src="assets/images/trending-01.jpg" alt=""></a>
                  <span class="price"><?php echo $row['price'];?>$</span>
                </div>
                <div class="down-content">
                  <span class="category"><?php echo $row['category'] ; ?></span>
                  <h4><?php echo $row['name'] ; ?></h4>
                  <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
                </div>
              </div>
            </div>
            <?php
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
            </div>
          </div>

</div>
<?php
include_once "footer.php";

