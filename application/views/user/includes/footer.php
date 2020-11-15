<footer class="sticky-footer">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0">&copy; Copyright 2020
                    <strong class="text-dark">Codist</strong>. All Rights Reserved
                    <br>
                    <small class="mt-0 mb-0">Made with
                        <i class="fas fa-heart text-danger"></i> by
                        <a class="text-primary" target="_blank" href="https://askbootstrap.com/">Sandeep Gupta</a>
                    </small>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right">
                <div class="app">
                    <a href="#">
                        <img alt="" src="img/google.png">
                    </a>
                    <a href="#">
                        <img alt="" src="img/apple.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" style="color:black;" id="exampleModalLabel">SUCCESS!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo ($this->session->flashdata("success")) ? $this->session->flashdata("success") : "Enrolled In Successfully"; ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url("logout"); ?>">Go To Home</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url("logout"); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">OOPS!!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><?= $this->session->userdata("error"); ?></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/user/')?>vendor/jquery/jquery.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/user/')?>vendor/bootstrap/js/bootstrap.bundle.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>vendor/jquery-easing/jquery.easing.min.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>vendor/owl-carousel/owl.carousel.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>js/custom.js" type="440201f72d146f2f5c572228-text/javascript"></script>

<script src="<?=base_url('assets/user/')?>js/rocket-loader.min.js" data-cf-settings="440201f72d146f2f5c572228-|49" defer=""></script>

<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>

<script>

        <?php if($this->session->flashdata("success")): ?>
            $("#successModal").modal("show");
        <?php endif; ?>

    function already_alert() {
        alert('Already Enrolled!!');
    }

    function enrol_user(course_id) {
        $.ajax({
            url: "<?= base_url("api/users/enrol"); ?>",
            data: {id: course_id},
            type: "post",
            success: function (data) {
                if(data.result){
                    $("#successModal").modal("show");
                    var btn_id = "#en-btn-"+course_id;
                    $(btn_id).removeClass();
                    $(btn_id).addClass("btn btn-outline-success btn-sm");
                    $(btn_id).text(" ");
                    $(btn_id).text("Enrolled");
                    $(btn_id).attr("onclick", "already_alert()");
                    var count_text_id = "#en-span-"+course_id;
                    var course_count = parseInt($(count_text_id).text().trim());
                    $(count_text_id).text(" ");
                    $(count_text_id).text(course_count+1+" ");
                }else{
                    alert("An Error Occurred.");
                }
            }
        });
    }

    <?php if($this->session->flashdata("error")): ?>
        $("#ErrorModal").modal("show");
    <?php endif; ?>

    var video = videojs('main-video').ready(function(){
    var player = this;

    <?php if(!$this->session->flashdata("last")): ?>

    player.on('ended', function() {
            var next = $("#main-video").data("action");
            window.location.href = next;
        });
    });

    <?php else: ?>

        player.on('ended', function() {
            var enroll_id = $("#topic_name").data('id');
            $.ajax({
                url : "<?= base_url("api/users/markComplete"); ?>",
                type: "post",
                data: {id:enroll_id},
                success: function(data){
                    if(data.result){
                        alert("Congratulations!!!!, You've Completed The Course.");
                    }
                }
            });
        });
    });

    <?php endif; ?>

</script>

</body>


</html>