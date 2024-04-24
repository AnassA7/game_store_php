<?php
include_once "header.php";
include_once "config.php";
$classe = "post";
if(isset($_GET['id'])){
    $id = $_GET['id'] ;
    $sql ="SELECT * FROM news WHERE id=?" ; 
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the ID parameter
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $res_id = $row['id'];   
        $res_Uname = $row['post_name'];
        $res_image = $row['post_img'];
        $res_text = $row['post_text'];
        $res_pubdate = $row['post_date'];
        $res_category = $row['admin_id'];

    }
}
?>



    <div class="thumb">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image); ?>" alt=""> 
    </div>
    
    <section style="background-color: rgba(27, 21, 21, 0.301); padding: 4%;">
        
        <h1 style="color:#eee5; padding-left: 44%;"><?php echo $res_Uname ?></h1>
        <h2 style="color:#eee; padding: 10%;"><?php echo $res_text ?></h2>
    </section>


<?php
include_once "addcomment.php";
include "comment.php";
include_once "footer.php";
