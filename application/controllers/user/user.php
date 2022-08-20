<?php

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model('crud');
    }

    public function get_user_id()
    {
        return $this->session->userdata('user_id');
    }

    public function index()
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }
        $this->render_user("home", array("home", 0));
    }

    public function logout()
    {
        $this->log_out(1);
        redirect('login');
    }

    public function login()
    {
        if ($this->is_logged_in(1)) {
            redirect('home');
            return false;
        }
        if ($this->input->post()) {

            $email      = trim($this->input->post('email'));
            $password   = trim($this->input->post('password'));
            $login_data = $this->crud->get("users", array("email" => $email, "password" => $password));

            if (empty($login_data)) {
                $this->session->set_flashdata("login-error", "Invalid Credentials!!!");
                $this->render_user(0, array("Login", 0));
                return false;
            } else {
                $this->session->set_userdata("user_id", $login_data[0]['user_id']);
                redirect('home');
                return true;
            }
        }
        $this->render_user(0, array("Login", 0));
    }

    public function register()
    {
        if ($this->is_logged_in(1)) {
            redirect('home');
            return false;
        }

        if ($this->input->post()) {

            $fname    = trim($this->input->post('fname'));
            $lname    = trim($this->input->post('lname'));
            $email    = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));

            $rules = array(
                array(
                    "field"  => "fname",
                    "label"  => "First Name",
                    "rules"  => "required|alpha|max_length[8]",
                    "errors" => array(
                        "required"   => "First Name Is Required.",
                        "alpha"      => "First Name Can Only Contain Alphabets.",
                        "max_length" => "First Name Can Only Have 8 alphabets.",
                    ),
                ),
                array(
                    "field"  => "lname",
                    "label"  => "First Name",
                    "rules"  => "required|alpha|max_length[8]",
                    "errors" => array(
                        "required"   => "Last Name Is Required.",
                        "alpha"      => "Last Name Can Only Contain Alphabets.",
                        "max_length" => "First Name Can Only Have 8 alphabets.",
                    ),
                ),
                array(
                    "field"  => "email",
                    "label"  => "Email",
                    "rules"  => "required|valid_email|max_length[40]|is_unique[users.email]",
                    "errors" => array(
                        "required"   => "Email Is Required.",
                        "max_length" => "Email Can Only Have 20 Characters.",
                        "is_unique"  => "Someone Has Already Registered With Same Email.",
                    ),
                ),

                array(
                    "field"  => "password",
                    "label"  => "Password",
                    "rules"  => "required|min_length[6]|max_length[15]",
                    "errors" => array(
                        "required"   => "Password Is Required.",
                        "max_length" => "password Can Only Have 6-15 Characters.",
                        "min_length" => "password Can Only Have 6-15 Characters.",
                    ),
                ),
            );

            $this->form_validation->set_rules($rules);
            if (!$this->form_validation->run()) {
                $this->session->set_flashdata("validation-error", validation_errors());
                $this->render_user(1, array("register", 0));
                return false;
            } else {
                $values = array(
                    "fname"    => $fname,
                    "lname"    => $lname,
                    "email"    => $email,
                    "password" => $password,
                );

                $user_id = $this->crud->insert_data("users", $values);
                if ($user_id) {
                    $this->session->set_userdata("user_id", $user_id);
                    redirect("home");
                    return true;
                } else {
                    $this->session->set_flashdata("validation-error", validation_errors());
                    $this->render_user(1, array("register", 0));
                    return false;
                }
            }
        }

        $this->render_user(1, array("Register", 0));
    }

    public function explore()
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }
        $data['courses']               = $this->crud->get("courses");
        $data['user_enrolled_courses'] = $this->crud->get("enrolled_courses", array("user_id" => $this->get_user_id()));
        $data['enrolled_courses']      = $this->crud->get("enrolled_courses");
        $this->render_user("explore", array("explore", 0), $data);
    }

    public function single_course($course_name = "", $topic_name = "")
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }

        $course_name         = str_replace("-", " ", $course_name);
        $data['course_data'] = $this->crud->get("courses", array("course_name" => $course_name));

        if (empty($data['course_data'])) {
            show_404();
            return false;
        }

        $course_id                     = $data['course_data'][0]['course_id'];
        $topic_name                    = str_replace("-", " ", $topic_name);
        $data['topics']                = $this->crud->get("topics", array("course_id" => $course_id));
        $data['user_enrolled_courses'] = $this->crud->get("enrolled_courses", array("user_id" => $this->get_user_id()));

        if (empty($topic_name)) {
            $this->render_user("courses/single_course", array("explore", 0), $data);
            return true;
        } else {

            $data['main_data'] = $this->crud->get("topics", array("course_id" => $course_id, "topic_name" => $topic_name));
            if (empty($data['main_data'])) {
                show_404();
                return false;
            }
            $enrolled_data     = $this->crud->get("enrolled_courses", array("course_id" => $course_id, "user_id" => $this->get_user_id()));
            $data['enroll_id'] = $enrolled_data[0]['enroll_id'];
            if (empty($enrolled_data)) {
                $this->session->set_flashdata("error", "You Should Enroll In First.");
                redirect("courses/" . str_replace(" ", "-", $course_name));
                return false;
            }

            $data['next_topic'] = "last";

            for ($i = 0; $i < count($data['topics']); $i++) {
                if ($data['main_data'][0]['topic_id'] === $data['topics'][$i]['topic_id']) {
                    if (isset($data['topics'][$i + 1])) {
                        $data['next_topic'] = $data['topics'][$i + 1]['topic_name'];
                    }
                }
            }

            if ($data['next_topic'] == "last") {
                $this->session->set_flashdata("last", 1);
            } else {
                $this->session->set_flashdata("last", 0);
            }
            $this->render_user("courses/video_page", array("explore", 0), $data);
            return true;

        }

    }

    public function pending()
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }
        $data['enrolled_courses'] = $this->crud->get("enrolled_courses");
        $data['courses']          = $this->db->query("CALL get_enrolled_incomplete_courses(" . $this->get_user_id() . ")")->result_array();
        if (empty($data['courses'])) {
            $this->render_user("home", array("home", 0), $data);
            return true;
        }
        $this->render_user("courses/pending", array("home", 0), $data);
    }

    public function completed()
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }
        $data['enrolled_courses'] = $this->crud->get("enrolled_courses");
        $data['courses']          = $this->db->query("CALL get_enrolled_complete_courses(" . $this->get_user_id() . ")")->result_array();
        if (empty($data['courses'])) {
            $this->render_user("home", array("home", 1), $data);
            return true;
        }
        $this->render_user("courses/completed", array("home", 1), $data);
    }

    public function feedback()
    {
        if (!$this->is_logged_in(1)) {
            redirect('login');
            return false;
        }

        if ($this->input->post()) {
            $feedback = trim($this->input->post("feedback"));
            if (empty($feedback)) {
                $this->session->set_flashdata("error", "You Cannot Post Empty!!");
                $this->render_user("feedback", array("feedback", 0));
                $this->session->set_flashdata("error", 0);
                return false;
            } else {
                $values = array(
                    "user_id"  => $this->get_user_id(),
                    "feedback" => $feedback,
                );
                if ($this->crud->insert_data("feedbacks", $values)) {
                    $this->session->set_flashdata("success", "Thank You For Your Precious Feedback.");
                    $this->render_user("feedback", array("feedback", 0));
                    $this->session->set_flashdata("success", 0);
                    return true;
                } else {
                    $this->session->set_flashdata("error", "Some Internal Error Has Occurred!!");
                    $this->render_user("feedback", array("feedback", 0));
                    $this->session->set_flashdata("error", 0);
                    return false;
                }
            }
        }
        $this->render_user("feedback", array("feedback", 0));
    }

}
