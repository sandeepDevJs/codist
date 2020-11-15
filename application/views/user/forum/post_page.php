
<?php

$image_array = ["avatar.png", "avatar2.png", "avatar3.png", "avatar04.png", "avatar5.png"];

?>

<div class="container-fluid pb-0">


    <div class="col-lg-12">

        <!-- Date/Time -->
        <h4>Posted On <?= date("F j, Y h:mA", strtotime($post_data[0]['date_added'])); ?></h4>

        <p class="lead">
          by
          <a href="#"><?= $post_data[0]['fname']." ".$post_data[0]['lname'] ?></a>
        </p>

        <hr>

        <!-- Post Content -->
        <p class="lead">
            <?= $post_data[0]['post']; ?>
        </p> 

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
            <h5 style="color:#ff0000" class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <textarea style="color:white" name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Single Comment -->
        <?php foreach($reply_data as $reply): ?>
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" height="80" src="<?= base_url("assets/user/img/").$image_array[array_rand($image_array)] ?>" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= $reply['fname']. " " .$reply['lname'] ?></h5>
                <?=  $reply['reply']; ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>


</div>