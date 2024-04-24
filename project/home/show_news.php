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
        $res_price = $row['post_text'];
        $res_pubdate = $row['post_date'];
        $res_category = $row['admin_id'];

    }
}
?>
<div class="page-heading header-text" style="padding: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3><?php echo $res_Uname ?></h3>
                <span class="breadcrumb"><a href="index.php">Accueil</a> > <a href="shop.php">nouvelles</a> >
                    <?php echo $res_Uname ?></span>
            </div>
        </div>
    </div>
</div>

    <div class="thumb">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($res_image); ?>" alt=""> 
    </div>


<?php
include_once "addcomment.php";
include "comment.php";
include_once "footer.php";
