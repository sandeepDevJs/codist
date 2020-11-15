<?php

function get_href($topic_id, $course_id)
{
  return base_url()."admin/courses/edit/".$course_id."/".$topic_id."/1";
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
    <form action="" method="post" enctype="multipart/form-data">
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
                <li class="nav-item">
                  <a href="<?= base_url("admin/courses/addTopic/".$data[0]['course_id']); ?>" class="btn btn-primary btn-block">
                    <i class="fas fa-plus"></i> Add More
                  </a>
                </li>
              </ul>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <?php foreach($data as $dt): ?>
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <input class="form-control" name="topic_name" value="<?= $dt['topic_name'] ?>">
                <p class="text-danger">
                  <?= form_error('topic_name'); ?>
                </p>
              </div>
              <input type="hidden" name="course_id" value="<?= $dt['course_id'] ?>">
              <input type="hidden" name="topic_id" value="<?= $dt['topic_id'] ?>">
              <input type="hidden" name="filename" value="<?= $dt['filename'] ?>">
              <input type="hidden" name="hid_note" value="<?= $dt['note'] ?>">

              <div class="form-group">
                <div class="container">
                  <video height="500" id="videoPlayer" controls class="video-js vjs-big-play-centered col-md-12" data-setup='{}'>
                    <source src="<?= base_url();?>uploads/course_id_<?=(int)$dt['course_id']."/".$dt['filename']?>" type="video/mp4">
                  </video>
                  <br>
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-play mr-2"></i>Change video
                    <p class="text-danger">Only MP4 formats</p>
                    <input type="file" name="video">
                  </div>
                  <p class="help-block">Max. 8MB</p>
                  <p class="text-danger">
                    <?= form_error('video'); ?>
                  </p>
                  <br>
                  <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">
                      <?= $dt['description'] ?>
                    </textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="container">
                  <a download class="link" href="<?= base_url();?>uploads/course_id_<?=(int)$dt['course_id']?>/notes/<?=$dt['note']?>">
                    <i class="fas fa-paperclip mr-2"></i>
                    <?= $dt['note']; ?>
                  </a>
                </div>
                <br>
                <div class="btn btn-default btn-file">
                  <i class="fas fa-paperclip"></i>Change Attachment
                  <p class="text-danger">Only ZIP formats</p>
                  <input type="file" name="note">
                </div>
                <p class="help-block">Max. 3MB</p>
                <p class="text-danger">
                  <?= form_error('note'); ?>
                </p>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-left">
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-pencil-alt"></i> Save</button>
              </div>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
    </form>
  </div>