<?php 
$id = $_SESSION['valid'];
$query = mysqli_query($con,"SELECT*FROM user WHERE id=$id");
while($result = mysqli_fetch_assoc($query)){
	
	$res_user_image = $result['image'];
}

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
        <img src="data:image/jpeg;base64,<?php echo base64_encode($res_user_image); ?>">
    </div><!-- the input field --><div class="input_comment">
        <input type="text" name="comment" id="comment" autocomplete="off" required >
    </div>
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
        mysqli_stmt_bind_param($stmt, "sssss", $classe, $date, $comment, $user, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // Handle result if necessary
        $stmt->close();
        // header("Location: show_det.php");
    }
}

?>
