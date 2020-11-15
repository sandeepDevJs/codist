<?php

    function get_video($course_id, $filename)
    {
        return "course_id_".$course_id."/".$filename;
    }

    function get_slug($course_name, $topic_name)
    {
        return base_url("courses/").str_replace(" ", "-",$course_name)."/".str_replace(" ", "-",$topic_name)."/";
    }

    $enrolled_courses_ids = array(); 
    foreach($user_enrolled_courses as $enrolled_course){
        $enrolled_courses_ids[] = $enrolled_course['course_id'];
    }

?>
    <div class="container-fluid">
        <div class="single-channel-nav">
            <nav style="padding: 3px;" class="navbar navbar-expand-lg navbar-light">
                <a style="padding:10px;" class="channel-brand">
                    <?= $course_data[0]['course_name']; ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div style="float:right;" class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if(!in_array($course_data[0]['course_id'], $enrolled_courses_ids)): ?>
                    <button id="en-btn-<?= $course_data[0]['course_id'] ?>" onclick="enrol_user(<?= $course_data[0]['course_id']; ?>)" class="btn btn-outline-danger btn-sm" type="button">Enroll</button>
                    <?php else: ?>
                    <button id="en-btn-<?= $course_data[0]['course_id'] ?>" onclick="already_alert()" class="btn btn-outline-success btn-sm"
                        type="button">Enrolled</button>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <div class="video-block section-padding">
            <div class="row">
                <div style="padding:10px" class="col-md-12">
                    <div class="main-title">
                        <h6>Topics</h6>
                    </div>
                </div>
                <?php foreach($topics as $topic): ?>
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="video-card">
                        <div class="video-card-image">
                            <a class="play-icon" href="#">
                                <i class="fas fa-play-circle"></i>
                            </a>
                            <a href="<?= get_slug($course_data[0]['course_name'], $topic['topic_name']); ?>">

                                <video height="200" class="video-js vjs-big-play-centered col-md-12" data-setup='{}'>
                                    <source src="<?= base_url();?>uploads/<?= get_video($course_data[0]['course_id'], $topic['filename']); ?>" type="video/mp4">
                                </video>

                            </a>
                        </div>
                        <div class="video-card-body">
                            <div class="video-title">
                                <a href="#">
                                    <?= $topic['topic_name'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>