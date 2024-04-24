<link rel="stylesheet" href="assets/css/comment.css">

            <?php

            include_once "config.php";
            $id = $_GET['id'];

            $sql = "SELECT c.*, u.name, u.image FROM comment c JOIN user u ON c.user_id = u.id WHERE c.classe=? AND c.target_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("si", $classe, $id); // Bind the parameters
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $username = $row['name'];
                    $content = $row['content'];
                    $pubdate = $row['publish_date'];
                    $profile_image = $row['image'];
					$timestamp = strtotime($pubdate);
					$date = date("Y-m-d", $timestamp);
					$time = date("H:i:s", $timestamp);
            ?>

<!-- comments container -->



		 <!-- new comment -->
		 <div class="new_comment">

			<!-- build comment -->
		 	<ul class="user_comment">

		 		<!-- current #{user} avatar -->
			 	<div class="user_avatar">
			 		<img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>">
			 	</div><!-- the comment body --><div class="comment_body">
			 		<p><?php echo $content ?></p>
			 	</div>

			 	<!-- comments toolbar -->
			 	<div class="comment_toolbar">

			 		<!-- inc. date and time -->
			 		<div class="comment_details">
			 			<ul>
			 				<li><i class="fa fa-clock-o"></i> <?php echo $time ?></li>
			 				<li><i class="fa fa-calendar"></i> <?php echo $date ?></li>
			 				<li><i class="fa fa-pencil"></i> <span class="user"><?php echo $username ?></span></li>
			 			</ul>
			 		</div><!-- inc. share/reply and love --><div class="comment_tools">
			 			<ul>
			 				<li><i class="fa fa-share-alt"></i></li>
			 				<li><i class="fa fa-reply"></i></li>
			 				<li><i class="fa fa-heart love"></i></li>
			 			</ul>
			 		</div>

			 	</div>

			 	<!-- start user replies -->
		 	<li>
		 		



		 	</li>

		 	</ul>

		 </div>




            <?php
                }
            } else {
                echo "No comments found.";
            }
            ?>
		 </div>

</div>
