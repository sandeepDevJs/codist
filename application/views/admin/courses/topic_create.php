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

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Topics</h3>
          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <?php foreach($all_topics as $tp): ?>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-book"></i>
                  <?= $tp['topic_name']; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <h4>Topic Name:</h4>
              <input class="form-control" placeholder="Topic Name" name="topic_name" value="<?= set_value('topic_name'); ?>" required>
              <p class="text-danger">
                <?= form_error('topic_name'); ?>
              </p>
            </div>

            <div class="form-group">
              <div class="container">
                <h4>Video:</h4>
                <div class="btn btn-default btn-file">
                  <i class="fas fa-play mr-2"></i>ADD video
                  <p class="text-danger">Only MP4 formats</p>
                  <input type="file" name="video" required>
                </div>
                <p class="help-block">Max. 8MB</p>
                <p class="text-danger">
                  <?= form_error('video'); ?>
                </p>
                <br>
                <h4>Descripton:</h4>
                <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">
                    <?= set_value('description'); ?>
                    </textarea>
                <p class="text-danger">
                  <?= form_error('description'); ?>
                </p>
              </div>
            </div>
            <div class="form-group">
              <div class="container">
              </div>
              <br>
              <h4>Attachment:</h4>
              <div class="btn btn-default btn-file">
                <i class="fas fa-paperclip"></i>Add Attachment
                <p class="text-danger">Only ZIP formats</p>
                <input type="file" name="note" required>
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
    </div>
    <!-- /.row -->
  </form>
</div>

<div class="modal fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content bg-success">
      <div class="modal-header">
        <h4 class="modal-title">Greate Job!!!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tpoic Added Successfully!!!&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button onclick="window.location.href='<?= base_url('admin/courses') ?>'" type="button" class="btn btn-outline-light">Go To Courses</button>
        <button onclick="window.location.href='<?= base_url('admin/courses/addTopic/'.$course_id) ?>'" type="button" class="btn btn-outline-light">If You Wish To Add More Topics</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->