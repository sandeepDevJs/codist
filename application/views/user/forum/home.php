
<div class="container-fluid">

    <div class="row">

        <div class="col-md-8">

            <?php foreach($posts as $post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 style="color:#ff0000" class="card-title"><?= $post['fname']." ".$post['lname'] ?></h3>
                    <p style="color:black" class="card-text">

                        <?= word_limiter( $post['post'], 20); ?>

                    </p>
                    <a href="<?= base_url("forum/post/".$post['post_id']); ?>" class="btn btn-primary">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?= date("F j, Y", strtotime($post['date_added'])); ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>


        <div class="col-md-4">

            <div class="card mb-4">
                <h5 style="color:#ff0000" class="card-header">Post</h5>
                <form action="" method="post" class="card-body">
                    <div class="input-group">
                        <textarea style="color:white" class="form-control" name="post" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="float-right btn btn-primary mt-4">Post <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>

        </div>
    </div>

</div>