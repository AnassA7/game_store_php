<?php
session_start();
include_once "config.php";

if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit; // Added exit to stop further execution
}

$id_valid = $_SESSION['valid'];

$sql = "SELECT g.name, g.image, g.price, g.category FROM game g JOIN library l ON g.id = l.game_idgame WHERE l.user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_valid); // Changed "si" to "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $game_name = $row['name'];
        $game_image = $row['image'];
        $game_price = $row['price'];
        $game_category = $row['category'];
        echo $game_name;
        // You can use the retrieved data here as per your requirements
    }
} else {
    echo "No games found in the library.";
}

$stmt->close(); // Close the prepared statement
$con->close(); // Close the database connection
?>
