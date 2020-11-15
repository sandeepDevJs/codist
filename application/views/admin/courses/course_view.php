<?php

function get_href($topic_id, $course_id)
{
  return base_url()."admin/courses/view/".$course_id."/".$topic_id;
} 

?>
  <?php if($this->session->flashdata('error_vali')):?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5>
      <i class="icon fas fa-ban"></i> Alert!</h5>
    <?= $this->session->flashdata('error_vali') ?>
  </div>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <a href="<?= base_url(); ?>admin/courses" class="btn btn-primary btn-block mb-3">Back To Courses</a>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Topics</h3>
          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <?php foreach($topics as $dt): ?>
              <li class="nav-item">
                <a href="<?= get_href($dt['topic_id'], $data[0]['course_id']); ?>" class="nav-link">
                  <i class="fas fa-book"></i>
                  <?= $dt['topic_name'] ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <?php
          foreach($data as $dt): ?>
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <?= $dt['topic_name']; ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <video height="500" id="videoPlayer" controls class="video-js vjs-big-play-centered col-md-12" data-setup='{}'>
                  <source src="<?= base_url();?>uploads/course_id_<?=(int)$dt['course_id']."/".$dt['filename']?>" type="video/mp4">
                </video>
                <br>
                <?= $dt['description']; ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="card-title">
                <a download class="link" href="<?= base_url();?>uploads/course_id_<?=(int)$dt['course_id']?>/notes/<?=$dt['note']?>">
                  <i class="fas fa-paperclip mr-2"></i>
                  <?= $dt['note']; ?>
                </a>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <?php endforeach; ?>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>