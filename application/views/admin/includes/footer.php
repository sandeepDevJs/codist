</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Codist</b> 3.0.5
  </div>
  <strong>Copyright &copy; 2020-2021
    <a href="http://codist">Codist</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?= base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/admin/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/admin/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin/dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>

<script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 7000
    });

    <?php if($this->session->flashdata('error')){
    echo 'Toast.fire({
      icon: "error",
      title: "'.strip_tags(trim($this->session->flashdata("error"))).'"
    });';
   } ?>
    <?php if($this->session->flashdata('success')): ?>
    Toast.fire({
      icon: 'success',
      title: "<?= trim($this->session->flashdata('success')) ?>",
    });
    <?php endif; ?>

    <?php if($this->session->flashdata('toast-error')): ?>
    $(document).Toasts('create', {
      class: 'bg-danger',
      title: 'OOOOOOPPPPSSS!!!!!!',
      body: "<?= $this->session->flashdata('toast-error') ?>",
    })
    <?php endif; ?>

    <?php if($this->session->flashdata('success-modal')){

    echo '$("#modal-success").modal("show");';
  } ?>

    $('#users_table').DataTable({
      "ordering": true,
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ServerSide": true,
      "ajax": {
        url: '<?= base_url(); ?>api/users',
        type: 'get',
      },
    });

    $('#feedbacks_table').DataTable({
      "ordering": true,
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ServerSide": true,
      "ajax": {
        url: '<?= base_url(); ?>api/users/feeds',
        type: 'get',
      },
    });

    $('#posts_table').DataTable({
      "ordering": true,
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ServerSide": true,
      "ajax": {
        url: '<?= base_url(); ?>api/users/posts',
        type: 'get',
      },
    });

    $('#replies_table').DataTable({
      "ordering": true,
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ServerSide": true,
      "ajax": {
        url: '<?= base_url(); ?>api/users/replies',
        type: 'get',
      },
    });

    $('#courses_table').DataTable({
      "ordering": true,
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ServerSide": true,
      "ajax": {
        url: '<?= base_url(); ?>api/users/courses',
        type: 'get',
      },
    });

    $('#compose-textarea').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'clear']],
        ['font', ['superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol', 'paragraph']],
      ]
    });



  });

  function markSeen(feed_id) {
    $.ajax({

      url: '<?= base_url(); ?>api/users/seen',
      type: 'POST',
      data: {
        id: feed_id
      },
      success: function(data) {
        if (data.result) {
          $("#feedbacks_table").DataTable().ajax.reload();
        } else {
          alert("An Error Occurred!");
        }
      }

    });
  }

  function appPost(post_id) {
    if (confirm("Want To Approve?")) {
      $.ajax({

        url: '<?= base_url(); ?>api/users/postApprove',
        type: 'POST',
        data: {
          id: post_id
        },
        success: function(data) {
          if (data.result) {
            $("#posts_table").DataTable().ajax.reload();
          } else {
            alert("An Error Occurred!");
          }
        }

      });
    }
  }

  function appReply(reply_id) {
    if (confirm("Want To Approve?")) {
      $.ajax({

        url: '<?= base_url(); ?>api/users/replyApprove',
        type: 'POST',
        data: {
          id: reply_id
        },
        success: function(data) {
          if (data.result) {
            $("#replies_table").DataTable().ajax.reload();
          } else {
            alert("An Error Occurred!");
          }
        }

      });
    }
  }

  function disappPost(post_id) {
    if (confirm("Want To Disapprove?")) {
      $.ajax({

        url: '<?= base_url(); ?>api/users/postDisapprove',
        type: 'POST',
        data: {
          id: post_id
        },
        success: function(data) {
          if (data.result) {
            $("#posts_table").DataTable().ajax.reload();
          } else {
            alert("An Error Occurred!");
          }
        }

      });
    }
  }

  function disappReply(reply_id) {
    if (confirm("Want To Disapprove?")) {
      $.ajax({

        url: '<?= base_url(); ?>api/users/replyDisapprove',
        type: 'POST',
        data: {
          id: reply_id
        },
        success: function(data) {
          if (data.result) {
            $("#replies_table").DataTable().ajax.reload();
          } else {
            alert("An Error Occurred!");
          }
        }

      });
    }
  }
</script>
<script>
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = donutData;
  var pieOptions = {
    maintainAspectRatio: false,
    responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
  })
</script>

</body>

</html>