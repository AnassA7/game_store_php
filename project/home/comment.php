<link rel="stylesheet" href="assets/css/comment.css">
<div class="container1">
    <div class="row">
        <div class="col-md-8">
            <?php
include_once "config.php";
$id = $_GET['id'];

$sql = "SELECT c.*, u.name FROM comment c JOIN user u ON c.user_id = u.id WHERE c.classe='$classe' AND c.target_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id); // Bind the ID parameter
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row['name'];
        $content = $row['content'];
        $pubdate = $row['publish_date'];

foreach ($result as $row) {
?>
            <div class="media g-mb-30 media-comment">
                <img class="d-row g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                    src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php echo $username    ?></h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo $pubdate ?></span>
                    </div>
                    <p><?php echo $content ?></p>
                    <ul class="list-inline d-sm-flex my-0">
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                <?php echo "5"; ?>
                            </a>
                        </li>
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                <?php echo "66" ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
}
    }}
?>

        </div>
    </div>
</div>