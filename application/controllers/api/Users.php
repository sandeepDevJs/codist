<?php

/*
=================================================================
|
|This API controller is modified according to Jquery Datatables.
|
|
=================================================================
 */

require APPPATH . "libraries/REST_Controller.php";

class Users extends REST_Controller
{

    public $table_data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud', 'users');
    }

    public function is_logged_in($user = 0)
    {
        if (!$user) {
            return (!$this->session->userdata('logged_in')) ? false : true;
        } else {
            return (!$this->session->userdata('user_id')) ? false : true;
        }

    }

    public function index_get()
    {
        $data             = $this->users->get('users');
        $this->table_data = array();
        foreach ($data as $row) {
            array_push($this->table_data, array(
                $row['fname'],
                $row['lname'],
                $row['email'],
                date('F d, Y h:mA', strtotime($row['date_added'])),
                "<button onclick=window.location.href='profile/" . $row['user_id'] . "' class='btn btn-warning'><i class='fas fa-eye mr-2'></i>view</button>",
            ));
        }
        $this->response(array(
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => $this->table_data,
        ), REST_Controller::HTTP_OK);
    }

    public function feeds_get()
    {
        $data = $this->users->get_join("users", "feedbacks", "user_id");
        if ($data) {
            $seen             = "";
            $this->table_data = array();
            foreach ($data as $row) {
                if ($row['seen']) {
                    $seen = '<p class="text-success"><i class="fas fa-check-circle mr-2"></i>Seen</p>';
                } else {
                    $seen = "<button onclick='markSeen(" . $row['feedback_id'] . ")' class='btn btn-warning'>Mark As Seen</button>";
                }
                array_push($this->table_data, array(
                    $row['fname'],
                    $row['email'],
                    $row['feedback'],
                    date('F d, Y h:mA', strtotime($row['date_added'])),
                    $seen,
                    "<button onclick=window.location.href='profile/" . $row['user_id'] . "'  class='btn btn-warning'><i class='fas fa-eye mr-2'></i>View</button>",
                ));
            }
        }
        $this->response(array(
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => array_reverse($this->table_data),
        ), REST_Controller::HTTP_OK);
    }

    public function seen_post()
    {
        $feedback_id = $this->input->post('id');
        if ($this->users->update_data("feedbacks", array("feedback_id" => $feedback_id), array("seen" => 1))) {
            $this->response(array(
                "result" => 1,
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function postApprove_post()
    {
        $post_id = $this->input->post('id');
        if ($this->users->update_data("posts", array("post_id" => $post_id), array("approved" => 1))) {
            $this->response(array(
                "result" => 1,
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function replyApprove_post()
    {
        $reply_id = $this->input->post('id');
        if ($this->users->update_data("replies", array("reply_id" => $reply_id), array("approved" => 1))) {
            $this->response(array(
                "result" => 1,
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function postDisapprove_post()
    {
        $post_id = $this->input->post('id');
        if ($this->users->delete_data('posts', 'post_id', $post_id)) {
            $this->response(array(
                "result" => 1,
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function replyDisapprove_post()
    {
        $reply_id = $this->input->post('id');
        if ($this->users->delete_data('replies', 'reply_id', $reply_id)) {
            $this->response(array(
                "result" => 1,
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function posts_get()
    {
        $data = $this->users->get("posts");
        if ($data) {
            $approved         = "";
            $this->table_data = array();
            foreach ($data as $row) {
                if ($row['approved']) {
                    $approved = '<p class="text-success"><i class="fas fa-check-circle mr-2"></i>Approved</p>';
                } else {
                    $approved = "<div class='btn-group btn-group-sm'>
                        <a onclick='appPost(" . $row['post_id'] . ")' class='btn btn-info'><i class='fas fa-check'></i></a>
                        <a onclick='disappPost(" . $row['post_id'] . ")' class='btn btn-danger'><i class='fas fa-times'></i></a>
                        </div>";
                }
                array_push($this->table_data, array(
                    "<button onclick=window.location.href='profile/" . $row['user_id'] . "'  class='btn btn-warning'><i class='fas fa-eye mr-2'></i>View</button>",
                    $row['post'],
                    date('F d, Y h:mA', strtotime($row['date_added'])),
                    $approved,
                ));
            }
        }
        $this->response(array(
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => array_reverse($this->table_data),
        ), REST_Controller::HTTP_OK);
    }

    public function replies_get()
    {
        $data = $this->users->get("replies");
        if ($data) {
            $approved         = "";
            $this->table_data = array();
            foreach ($data as $row) {
                if ($row['approved']) {
                    $approved = '<p class="text-success"><i class="fas fa-check-circle mr-2"></i>Approved</p>';
                } else {
                    $approved = "<div class='btn-group btn-group-sm'>
                        <a onclick='appReply(" . $row['reply_id'] . ")' class='btn btn-info'><i class='fas fa-check'></i></a>
                        <a onclick='disappReply(" . $row['reply_id'] . ")' class='btn btn-danger'><i class='fas fa-times'></i></a>
                        </div>";
                }
                array_push($this->table_data, array(
                    "<button onclick=window.location.href='profile/" . $row['user_id'] . "'  class='btn btn-warning'><i class='fas fa-eye mr-2'></i>View</button>",
                    $row['reply'],
                    date('F d, Y h:mA', strtotime($row['date_added'])),
                    $approved,
                ));
            }
        }
        $this->response(array(
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => array_reverse($this->table_data),
        ), REST_Controller::HTTP_OK);
    }

    public function get_topic_by_course_id($course_id)
    {
        $data = $this->users->get("topics", array("course_id" => $course_id));
        return $data[0];
    }

    public function courses_get()
    {
        $data = $this->users->get("courses");

        if ($data) {
            $buttons          = "";
            $this->table_data = array();
            foreach ($data as $row) {
                $topic_id = $this->get_topic_by_course_id($row['course_id'])['topic_id'];
                $buttons  = '<a class="btn btn-primary btn-sm" href="' . base_url() . 'admin/courses/view/' . $row["course_id"] . '/' . $topic_id . '">
                        <i class="fas fa-eye"></i>
                        view
                        </a>
                        <a href="' . base_url() . 'admin/courses/edit/' . $row['course_id'] . '/' . $topic_id . '/1" class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>';
                array_push($this->table_data, array(
                    $row['course_name'],
                    date('F d, Y h:mA', strtotime($row['date_added'])),
                    $buttons,
                ));
            }
        }
        $this->response(array(
            "recordsTotal"    => count($data),
            "recordsFiltered" => count($data),
            "data"            => array_reverse($this->table_data),
        ), REST_Controller::HTTP_OK);
    }

    public function delCourse($course_id)
    {
        if ($this->users->delete_data("courses", "course_id", $course_id)) {
            if ($this->users->delete_data("topics", "course_id", $course_id)) {
                $this->response(array(
                    "result" => 1,
                ), REST_Controller::HTTP_OK);
            } else {
                $this->response(array(
                    "result" => 0,
                ), REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(array(
                "result" => 0,
            ), REST_Controller::HTTP_OK);
        }
    }

    public function enrol_post()
    {
        if (!$this->is_logged_in(1)) {
            $this->response(array(
                "result" => false,
            ), REST_Controller::HTTP_OK);

            return false;
        }

        $values = array(
            "user_id"   => $this->session->userdata("user_id"),
            "course_id" => $this->input->post("id"),
        );

        if ($this->users->insert_data("enrolled_courses", $values)) {
            $this->response(array(
                "result" => true,
            ), REST_Controller::HTTP_OK);
            return true;
        } else {
            $this->response(array(
                "result" => false,
            ), REST_Controller::HTTP_OK);
            return false;
        }

    }

    public function markComplete_post()
    {
        if (!$this->is_logged_in(1)) {
            $this->response(array(
                "result" => false,
            ), REST_Controller::HTTP_OK);

            return false;
        }

        $where = array(
            "enroll_id" => $this->input->post("id"),
        );

        $values = array(
            "status" => 1,
        );

        if ($this->users->update_data("enrolled_courses", $where, $values)) {
            $this->response(array(
                "result" => true,
            ), REST_Controller::HTTP_OK);

            return true;
        } else {
            $this->response(array(
                "result" => false,
            ), REST_Controller::HTTP_OK);

            return false;
        }
    }

}
