<?php 


include_once "config.php";
if(!isset($_SESSION['valid'])){?>
    <link rel="stylesheet" href="assets/css/comment.css">
<div class="comment_block"><?php
    echo "You are not logged in." ;
} else {
?>

<form action="" method="post">
<link rel="stylesheet" href="assets/css/comment.css">
<div class="comment_block">

<div class="create_new_comment">

   <!-- current #{user} avatar -->
    <div class="user_avatar">
        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/BillSKenney/73.jpg">
    </div><!-- the input field --><div class="input_comment">
        <input type="text" name="comment" id="comment" autocomplete="off" required >
        <input type="submit" class="btn" name="submit" value="Send">
    </div>

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
        mysqli_stmt_bind_param($stmt, "sssss", $classe, $date, $comment, $user, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // Handle result if necessary
        $stmt->close();
        // header("Location: show_det.php");
    }
}

?>
