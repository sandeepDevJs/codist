<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
            <?= $post_count; ?>
          </h3>

          <p>Total Posts</p>
        </div>
        <div class="icon">
          <i class="fas fa-mail-bulk"></i>
        </div>
        <a href="<?= base_url(); ?>admin/posts" class="small-box-footer">More info
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>
            <?= $course_count; ?>
          </h3>
          <p>Total Courses</p>
        </div>
        <div class="icon">
          <i class="fas fa-book"></i>
        </div>
        <a href="<?= base_url(" admin/courses "); ?>" class="small-box-footer">More info
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>
            <?= $user_count; ?>
          </h3>

          <p>User Registered</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= base_url(); ?>admin/users" class="small-box-footer">More info
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
            <?= $feedback_count; ?>
          </h3>

          <p>Feedbacks</p>
        </div>
        <div class="icon">
          <i class="fas fa-comment-alt"></i>
        </div>
        <a href="<?= base_url(); ?>admin/feedbacks" class="small-box-footer">More info
          <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="row">
    <div class="card card-danger col-md-12">
      <div class="card-header">
        <h3 class="card-title">Pie Chart</h3>
      </div>
      <div class="card-body">
        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

</div>
<script>
  var donutData = {
    labels: [
      'Posts',
      'Feedbacks',
      'Users'
    ],
    datasets: [{
      data: [<?= $post_count ?>, <?= $feedback_count ?>, <?= $user_count ?>],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    }]
  }
</script>