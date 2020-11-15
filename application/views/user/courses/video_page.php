<?php

    function get_video($course_id, $filename)
    {
        return "course_id_".$course_id."/".$filename;
    }

    function get_slug($course_name, $topic_name)
    {
        return base_url("courses/").str_replace(" ", "-",$course_name)."/".str_replace(" ", "-",$topic_name)."/";
    }

    $last_topics_index = 0;
    for ($i=0; $i < count($topics); $i++) { 
        $last_topics_index = $i;
    }
?>

    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <?php foreach($main_data as $data): ?>
                <div class="col-md-8">
                    <h4 id="topic_name" data-id=<?= $enroll_id; ?>>
                        <?= strtoupper($course_data[0]['course_name'])." " ?>/
                            <?= " ".ucfirst($data['topic_name']) ?>
                    </h4>
                    <div class="single-video-left">
                        <div class="single-video">
                            <a>

                                <video data-action="<?= get_slug($course_data[0]['course_name'], $next_topic); ?>" id="main-video" controls height="500"
                                    class="video-js vjs-big-play-centered col-md-12" data-setup='{}'>
                                    <source src="<?= base_url();?>uploads/<?= get_video($course_data[0]['course_id'], $data['filename']); ?>" type="video/mp4">
                                </video>

                            </a>
                        </div>
                        <div class="single-video-title box mb-3">
                            <h2>
                                <a href="#">
                                    <?= $data['topic_name'] ?>
                                </a>
                            </h2>
                        </div>
                        <div class="single-video-info-content box mb-3">
                            <?= $data['description']; ?>
                                <br>
                                <br>
                                <h6>ATTACHMENTS :</h6>
                                <a download href="<?= base_url("uploads/"); ?><?= get_video($course_data[0]['course_id'], $data['note']); ?>">
                                    <?= $data['note'] ?>
                                </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="col-md-4">

                    <div class="single-video-right">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-title">
                                    <h6>Up Next</h6>
                                </div>
                            </div>
                            <?php $i = 0; ?>
                            <?php foreach($topics as $topic):  ?>
                            <div class="col-md-12">
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <video height="100" class="video-js vjs-big-play-centered col-md-12" data-setup='{}'>
                                            <source src="<?= base_url();?>uploads/<?= get_video($course_data[0]['course_id'], $topic['filename']); ?>" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                        </div>
                                        <div class="video-title">
                                            <a>
                                                <?= $topic['topic_name'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="video-card-footer">
                                        <button onclick="window.location.href='<?= get_slug($course_data[0]['course_name'], $topic['topic_name']); ?>'" type="button"
                                            class="btn btn-primary btn-sm border-none">View</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>