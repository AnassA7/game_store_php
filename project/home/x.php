<div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Trending</h6>
            <h2>Trending Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>



<?php
include "config.php";
$sql = "SELECT * FROM  game ORDER BY RAND() LIMIT 4";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){


while($row = $result->fetch_assoc()) {
  ?>
        <div class="col-lg-3 col-md-6">
        <div class="item">

<div class="thumb">
              <a href="show_det.php?id=<?php echo $row['id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt=""></a>
              <span class="price"><?php echo $row['price'];?>$</span>
            </div>
            <div class="down-content">
              <span class="category"><?php echo $row['category'] ; ?></span>
              <h4><?php echo $row['name'] ; ?></h4>
              <a href="show_det.php?id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <?php
          } }
?>
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP GAMES</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>



<?php

$sql = "SELECT * FROM game  LIMIT 6";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){


while($row = $result->fetch_assoc()) {
  ?>

        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="show_det.php?id=<?php echo $row['id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category"><?php echo $row['category'] ; ?></span>
                <h4><?php echo $row['name'] ; ?></h4>
                <a href="show_det.php?id=<?php echo $row['id']; ?>">Explore</a>
            </div>
          </div>
        </div>
        <?php
          } }
?>
      </div>
    </div>
  </div>

  
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="shop.php">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Subscribe Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>