<?php

    function get_course_count($course_id, $enrolled_courses)
    {
        $course_count = 0;
        foreach($enrolled_courses as $ecourse){
            if($ecourse['course_id'] == $course_id){
                $course_count++;
            }
        }
        return $course_count;
        
    }

    function get_slug($course_name)
    {
        return base_url("courses/").str_replace(" ", "-",$course_name);
    }

?>
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h6>Completed Courses</h6>
                    </div>
                </div>
                <?php foreach($courses as $course): ?>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="channels-card">
                        <div class="channels-card-image">
                            <a href="#">
                                <img class="img-fluid" src="<?= base_url("assets/user/") ?>img/s1.png" alt="">
                            </a>
                        </div>
                        <div class="channels-card-body">
                            <div class="channels-title">
                                <a href="#">
                                    <?= strtoupper($course['course_name']); ?>
                                </a>
                            </div>
                            <div class="channels-view">
                                <span id="en-span-<?= $course['course_id'] ?>">
                                    <?= get_course_count($course['course_id'], $enrolled_courses); ?>
                                </span>people enrolled
                            </div>
                            <br>
                            <button onclick="window.location.href='<?= get_slug($course['course_name']); ?>'" type="button" class="btn btn-primary btn-sm border-none">Have A Visit</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <hr>
    </div>