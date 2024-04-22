<?php
if(isset($_POST['submit'])){
    $game_name = $_POST['name'];
    $game_dis = $_POST['discription'];
    $game_date = $_POST['date'];
    $game_pri = $_POST['price'];
    $game_cate = $_POST['category'];
    $game_stu_id = $id;
    
    // Image upload handling
    $image_data = file_get_contents($_FILES["image"]["tmp_name"]);

    // Insert game details along with image data into the database
    $add_game_query = "INSERT INTO game (name, image, price, category, publish_date, description, studio_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $op_stmt = $con->prepare($add_game_query);
    $op_stmt->bind_param("sbisssi", $game_name, $image_data, $game_pri, $game_cate, $game_date, $game_dis, $game_stu_id);
    $op_stmt->execute();
    $op_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="quick-draft p-20 bg-white rad-10" style="margin-left: 200px;">
        <h2 class="mt-0 mb-10">Games Posts</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Add Your Game</p>
        <form action="addgame.php" method="post" enctype="multipart/form-data">
            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="Game Name" name="name"/>
            <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" placeholder="Game About" name="discription"></textarea>
            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="number" placeholder="Enter The Price" name="price">
            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="date" name="date">
            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="Enter The category" name="category">
            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" class="pict1" name="image">
            <img src="imgs/windows-7.jpg" id="profile-pic" class="pict2">
            <label for="input-file" class="pict">Choose Image</label>
            <script>
                let profilePic = document.getElementById("profile-pic");
                let inputFile = document.getElementById("input-file");

                inputFile.onchange = function(){
                  profilePic.src = URL.createObjectURL(inputFile.files[0]);
                }
            </script>
            <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="submit" value="Post It" />
        </form>
    </div>
</body>
</html>
