<?php
  include_once "config.php";
include_once "header.php";
?>
<?php
    
    $classe = 'game';
    $id = $_GET['id'] ;
    $sql ="SELECT*FROM game WHERE id=?" ; 
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the ID parameter
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $res_id = $row['id'];
      $res_Uname = $row['name'];
      $res_price = $row['price'];
      $res_pubdate = $row['publish_date'];
      $res_category = $row['category'];
      $res_description = $row['description'];
    }

    
?>

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3><?php echo $res_Uname ?></h3>
                <span class="breadcrumb"><a href="index.php">Home</a> > <a href="shop.php">Shop</a> >
                    <?php echo $res_Uname ?></span>
            </div>
        </div>
    </div>
</div>

<div class="single-product section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-image">
                    <img src="assets/images/single-game.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <h4 style="color: aliceblue;"><?php echo $res_Uname ?></h4>
                <span class="price">$<?php echo $res_price ?></span>
                <p style="color: aliceblue;"><?php echo $res_description ?></p>
                <form id="qty" action="#">
                    <button type="submit"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
                </form>
                <ul>
                    <li><span>Game ID:</span> <?php echo $res_Uname ?></li>
                    <li><span>Genre:</span> <a href="#"><?php echo $res_category ?></a></li>
                    <li><span>publish_date:</span> <a href="#"><?php echo $res_pubdate ?></a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="sep"></div>
            </div>
        </div>
    </div>
</div>

<div class="more-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-content">
                    <div class="row">
                        <div class="nav-wrapper ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                                        aria-selected="false">Reviews (3)</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>You can search for more templates on Google Search using keywords such as "templatemo
                                    digital marketing", "templatemo one-page", "templatemo gallery", etc. Please tell
                                    your friends about our website. If you need a variety of HTML templates, you may
                                    visit Tooplate and Too CSS websites.</p>
                                <br>
                                <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan
                                    activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean
                                    shorts edison bulb poutine next level humblebrag la croix adaptogen. Hashtag poke
                                    literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat
                                    chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters
                                    asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents
                                    street art.</p>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan
                                    activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean
                                    shorts edison bulb poutine next level humblebrag la croix adaptogen. <br><br>Hashtag
                                    poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx
                                    waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of
                                    bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard
                                    succulents street art.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "comment.php";
include_once "footer.php" ;