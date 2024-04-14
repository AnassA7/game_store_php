<?php

if (isset($_SESSION['valid'])){
    $user_id = $_SESSION['valid'];

    // Assuming $con is your database connection
    $sql = "SELECT game_idgame FROM library WHERE user_id=$user_id";
    $query = mysqli_query($con, $sql);

    $gameInLibrary = false; // Initialize a variable to track if the game is in the library

    // Assuming $game_id is defined somewhere in your code
    $game_id = $_GET['id']; // Define $game_id here or fetch it from somewhere

    while($result = mysqli_fetch_assoc($query)){
        $res_game_id = $result['game_idgame'];
        if ($res_game_id == $game_id ){ // Use == for loose comparison
            $gameInLibrary = true; // If the game ID matches, set the flag to true
             // No need to continue the loop once the game is found
        }
    }

    if ($gameInLibrary){
?>
        <form action="librery.php">
            <button type="submit" name="view_library"><i class="fa fa-shopping-bag"></i> In Library</button>
        </form>
<?php
    } else {
?>
                        <form id="buy_game" method="post" action=""> 
                    <button type="submit" name="add_to_cart"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
                </form>
<?php
    }
} else {
?>
    <form action="login.php">
        <button><i class=""></i> Login</button>
    </form>
<?php
}
?>
