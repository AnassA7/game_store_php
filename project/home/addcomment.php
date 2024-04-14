<?php 


include_once "config.php";
if(!isset($_SESSION['valid'])){
    echo "You are not logged in." ;
} else {
?>

<form action="" method="post">
    <div class="field input">
        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment" autocomplete="off" required>
        <input type="submit" class="btn" name="submit" value="Send">
    </div>    
</form>

<?php 
    if (isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        $user = $_SESSION['valid'];
        $id = $_GET['id'];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comment (classe, publish_date, content, user_id, target_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        echo "++++++++++++++", $id;
        echo "++++++++++++++", $user;
        mysqli_stmt_bind_param($stmt, "sssss", $classe, $date, $comment, $user, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // Handle result if necessary
        mysqli_stmt_close($stmt);
    }
}
?>
