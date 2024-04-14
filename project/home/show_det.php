<?php
include_once "config.php";
include_once "header.php";
$classe = "game";

// Function to update user's balance
function updateUserBalance($con, $user_id, $new_balance) {
    $update_query = "UPDATE user SET money=? WHERE id=?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("di", $new_balance, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Retrieve user information from session
if(isset($_SESSION['valid'])){
    $user_id = $_SESSION['valid'];
    $user_query = "SELECT * FROM user WHERE id=?";
    $stmt = $con->prepare($user_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user_result = $stmt->get_result();

    if($user_result->num_rows > 0){
        $user = $user_result->fetch_assoc();
        $user_money = $user['money'];
    }
}

// Retrieve game information
if(isset($_GET['id'])){
    $game_id = $_GET['id'];
    $game_query = "SELECT * FROM game WHERE id=?";
    $stmt = $con->prepare($game_query);
    $stmt->bind_param("i", $game_id);
    $stmt->execute();
    $game_result = $stmt->get_result();

    if($game_result->num_rows > 0){
        $game = $game_result->fetch_assoc();
        $game_price = $game['price'];
    }
}

// Process buying the game
if(isset($_POST['add_to_cart'])){
        if(isset($user_money) && isset($game_price) && $user_money >= $game_price){
            // Deduct the price of the game from the user's balance
            $new_balance = $user_money - $game_price;
            $buy_date = date('Y-m-d H:i:s');
            updateUserBalance($con, $user_id, $new_balance);

            // Add the game to the user's library
            $add_to_library_query = "INSERT INTO library (user_id, game_idgame, date) VALUES (?, ?, ?)";
            $stmt = $con->prepare($add_to_library_query);
            $stmt->bind_param("iis", $user_id, $game_id, $buy_date);
            $stmt->execute();
            $stmt->close();

            // Redirect to a page indicating successful purchase
            header("Location: purchase_success.php");
            exit();
        } else {
            // Redirect to a page indicating insufficient funds
            header("Location: insufficient_funds.php");
            exit();
        }
    }

// Close previous statement
if(isset($stmt)) {
    $stmt->close();
}

// Retrieve game information
if(isset($_GET['id'])){
    $id = $_GET['id'] ;
    $sql ="SELECT * FROM game WHERE id=?" ; 
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
                    <?php include_once "botton.php" ?>
                <ul>
                    <li><span>Game ID:</span> <?php echo $res_id ?></li>
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
include_once "addcomment.php";
include_once "footer.php";
?>
