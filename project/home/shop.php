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
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){


while($row = $result->fetch_assoc()) {
  ?>

                        <div
                            class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 <?php echo $row['category'] ; ?>">
                            <div class="item">
                                <div class="thumb">
                                    <a href="show_det.php?id=<?php echo $row['id']; ?>"><img
                                            src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt=""></a>
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
          } }
?>
                    </div>
                </div>
            </div>

        </div>
        <?php
include_once "footer.php";