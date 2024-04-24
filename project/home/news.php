<?php
include_once "header.php";
include_once "config.php";
?>

<div>
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>News</h3>
          <span class="breadcrumb"><a href="#">Home</a> > News</span>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-2" style="padding: 5%; justify-content: space-between;">
    <?php
    $sql = "SELECT * FROM news";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id']
      ?>
      <div class="card" ?id=<?php echo $id ?> style="width: 18rem; margin-bottom: 20px;">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['post_img']); ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['post_name']; ?></h5>
          <p class="card-text"><?php echo $row['post_re']; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated in <?php echo $row['post_date']; ?></small>
        </div>
        <button class = "btn"><a href="show_news.php?id=<?php echo $id ?>">Read more</a></button>
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php
include_once "footer.php";
?>