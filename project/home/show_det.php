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
function updateAdminBalance($con, $new_admin_balance) {
    $update_query = "UPDATE user SET money=? WHERE type_user= 'admin'";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("d", $new_admin_balance);
    $stmt->execute();
    $stmt->close();
}
function updateStudioBalance($con, $studio_id, $stud_balance) {
    $update_query = "UPDATE studio SET money=? WHERE id=?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("di", $stud_balance, $studio_id);
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
        $user_full_name = $user['name'];
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
        $studio_id = $game['studio_id'];
        $game_namme = $game['name'];
        
    }
}
$stud_query = "SELECT * FROM studio WHERE id=?";
$s_stmt = $con->prepare($stud_query);
$s_stmt->bind_param("i", $studio_id);
$s_stmt->execute();
$studio_result = $s_stmt->get_result();

if($studio_result->num_rows > 0){
    $studio = $studio_result->fetch_assoc();
    $studio_balance = $studio['money'];
}
    $walo_var = 'admin';
    $admin_balance_query = "SELECT money FROM user WHERE type_user=?";
    $admin_balance_stmt = $con->prepare($admin_balance_query);
    $admin_balance_stmt->bind_param("s", $walo_var);
    $admin_balance_stmt->execute();
    $admin_balance_result = $admin_balance_stmt->get_result();

    if($admin_balance_result->num_rows > 0){
        $admin_balance = $admin_balance_result->fetch_assoc();
        $admin_money = $admin_balance['money'];
        
    }

// Process buying the game
if(isset($_POST['add_to_cart'])){
        if(isset($user_money) && isset($game_price) && $user_money >= $game_price){
            // Deduct the price of the game from the user's balance
            $new_balance = $user_money - $game_price;
            $new_admin_balance =$admin_money + ($game_price * 0.05);
            $stud_balance =$studio_balance + ($game_price * 0.95);
            $buy_date = date('Y-m-d H:i:s');
            updateUserBalance($con, $user_id, $new_balance);
            updateAdminBalance($con, $new_admin_balance);
            updateStudioBalance($con, $studio_id, $stud_balance);

            // Add the game to the user's library
            $add_to_library_query = "INSERT INTO library (user_id, game_idgame, date) VALUES (?, ?, ?)";
            $stmt = $con->prepare($add_to_library_query);
            $stmt->bind_param("iis", $user_id, $game_id, $buy_date);
            $stmt->execute();
            $stmt->close();
            // Add the operation
            $add_to_operation_query = "INSERT INTO operation (user_name, id_user, game_name, studio_id, money, time) VALUES (?, ?, ?, ?, ?, ?)";
            $op_stmt = $con->prepare($add_to_operation_query);
            $op_stmt->bind_param("sisiss", $user_full_name, $user_id, $game_namme, $studio_id, $game_price, $buy_date);
            $op_stmt->execute();
            $op_stmt->close();

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
        $res_image = $row['image'];
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
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image); ?>" alt="">
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
include_once "addcomment.php";
include "comment.php";
include_once "footer.php";
?>
