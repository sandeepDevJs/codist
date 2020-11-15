<?php 
        
        $all_data = array_merge($post_data, $reply_data, $feedback_data, $courses); 
        $timeline_data = array();
        foreach($all_data as $key => $value){
            $timeline_data[$value['date_added']] = $value;    
        }
        ksort($timeline_data);
      ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/admin/dist/img/avatar2.png" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">
            <?= $user_data['fname']." ".$user_data['lname']; ?>
          </h3>

          <p class="text-muted text-center">
            <?= $user_data['email'] ?>
          </p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Enrolled Courses</b>
              <a class="float-right">
                <?= count($courses); ?>
              </a>
            </li>
            <li class="list-group-item">
              <b>Posts</b>
              <a class="float-right">
                <?= count($post_data); ?>
              </a>
            </li>
            <li class="list-group-item">
              <b>Replies</b>
              <a class="float-right">
                <?= count($reply_data); ?>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#activity" data-toggle="tab">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
            </li>
          </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <?php if(empty($post_data)): ?>
              <div class="callout callout-info">
                <h5>No Post Yet.</h5>
              </div>
              <?php endif; ?>
              <!-- Post -->
              <?php foreach($post_data as $post): ?>
              <div class="post clearfix">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/admin/dist/img/avatar2.png" alt="User Image">
                  <span class="username">
                    <a href="#">
                      <?= $user_data['fname']." ".$user_data['lname']; ?>
                    </a>
                    <a href="#" class="float-right btn-tool">
                      <i class="fas fa-times"></i>
                    </a>
                  </span>
                  <span class="description">Posted at -
                    <?= date('F d, Y h:m A', strtotime($post['date_added'])) ?>
                  </span>
                </div>
                <!-- /.user-block -->
                <p>
                  <?= $post['post'] ?>
                </p>
              </div>
              <?php endforeach; ?>
              <!-- Post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-danger">
                    <?= date('F d, Y', strtotime($user_data['date_added'])) ?>
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-user bg-info"></i>

                  <div class="timeline-item">
                    <span class="time">
                      <i class="far fa-clock"></i>
                      <?= date('F d, Y', strtotime($user_data['date_added'])) ?>
                    </span>
                    <h3 class="timeline-header border-0">
                      <a>
                        <?= $user_data['fname']." ".$user_data['lname']; ?>
                      </a> Joined Codist
                    </h3>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <?php foreach($timeline_data as $tdata): ?>
                <div>
                  <?= array_key_exists("enroll_id", $tdata) ? '<i class="fas fa-book bg-danger"></i>' : '<i class="fas fa-comments bg-warning"></i>'; ?>
                    <div class="timeline-item">
                      <span class="time">
                        <i class="far fa-clock"></i>
                        <?= date('F d, Y', strtotime($tdata['date_added'])) ?>
                      </span>

                      <h3 class="timeline-header">
                        <a>
                          <?= $user_data['fname']." ".$user_data['lname']; ?>
                        </a>
                        <?= array_key_exists("post", $tdata) ? "Posted On Forum" : ""; ?>
                          <?= array_key_exists("reply", $tdata) ? "Replied On Post" : ""; ?>
                            <?= array_key_exists("feedback", $tdata) ? "Posted Feedback" : ""; ?>
                              <?= array_key_exists("enroll_id", $tdata) ? "Enrolled In A Course" : ""; ?>
                      </h3>

                      <div class="timeline-body">
                        <?= array_key_exists("post", $tdata) ? $tdata['post'] : NULL; ?>
                          <?= array_key_exists("reply", $tdata) ? $tdata['reply'] : NULL; ?>
                            <?= array_key_exists("feedback", $tdata) ? $tdata['feedback'] : NULL; ?>
                      </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- END timeline item -->
                <!-- timeline time label -->
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<pre>