<?php

/*
|============================================================
|
| This Controller Takes Care Of All Admin Panel
|
|============================================================
 */

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud');
        $this->load->library('form_validation');
        $this->load->library('upload');

    }

    /*
    |============================================================================
    | @usage:
    |
    |    Following Function Will Only Upload note & video i.e MP4 and ZIP Formats
    |
    |   -$post_file is for Super golobal Files Name
    |    eg- $_FILES['video'] then $post_file = 'video'
    |============================================================================
     */

    public function upload_file($post_file, $course_id)
    {
        if ($post_file == 'video') {
            $path   = 'uploads/course_id_' . (int) $course_id . "/";
            $format = "mp4";
        } else if ($post_file == "note") {
            $path   = 'uploads/course_id_' . (int) $course_id . "/" . "notes";
            $format = "zip";
        }
        $config['upload_path']   = $path;
        $config['allowed_types'] = $format . "|" . strtoupper($format);
        $config['max_size']      = 8000;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($post_file)) {
            $this->session->set_flashdata('error_vali', $this->upload->display_errors());
            return false;
        } else {
            return $this->upload->data()['file_name'];
        }
    }

    /*
    |============================================================================
    | @usage:
    |
    |       custom function for form validation that only
    |       validates topic name and description.
    |
    |============================================================================
     */

    public function validate_form()
    {
        $rules = array(
            array(
                'field' => 'topic_name',
                'label' => 'Topic Name',
                'rules' => 'required|xss_clean|max_length[25]|alpha|trim',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|xss_clean|trim',
            ),
        );

        $this->form_validation->set_rules($rules);
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error_vali', validation_errors());
            return false;
        } else {
            return true;
        }
    }

    public function index()
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }
        $data['post_count']     = count($this->users->get("posts"));
        $data['course_count']   = count($this->users->get("courses"));
        $data['user_count']     = count($this->users->get("users"));
        $data['feedback_count'] = count($this->users->get("feedbacks"));
        $this->render(0, 'dashboard', array("nav" => array("dashboard", 0)), "Dashboard", $data);
    }

    public function login()
    {
        if ($this->is_logged_in()) {
            redirect('admin');
            return false;
        }
        if ($this->input->post()) {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            if ($this->users->login($email, $password)) {
                $this->session->set_userdata(array("logged_in" => true));
                redirect('admin');
                return true;
            } else {
                $this->session->set_flashdata('error', 'Invalid Credentials!!');
                $this->render(1, "none", array("nav" => array()), "Login");
                return false;
            }
        }
        $this->render(1, "none", array("nav" => array()), "Login");

    }

    public function logout()
    {
        $this->log_out();
    }

    public function users()
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }

        $this->render(0, 'users', array("nav" => array("users", 0)));
    }

    public function feedbacks()
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }

        $this->render(0, 'feedbacks', array("nav" => array("feedbacks", 0)));
    }

    public function profile($user_id = 0)
    {
        if (!$user_id || !is_numeric($user_id)) {
            show_404();
            return false;
        }
        $user_data             = $this->users->get('users', array("user_id" => $user_id));
        $data['courses']       = $this->users->get('enrolled_courses', array("user_id" => $user_id));
        $data['user_data']     = array_shift($user_data);
        $data['post_data']     = $this->users->get('posts', array("user_id" => $user_id, "approved" => 1));
        $data['reply_data']    = $this->users->get('replies', array('user_id' => $user_id, "approved" => 1));
        $data['feedback_data'] = $this->users->get('feedbacks', array('user_id' => $user_id));
        $this->render(0, 'profile', array("nav" => array("users", 0)), 'Profile', $data);
    }

    public function posts()
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }
        $this->render(0, 'posts', array("nav" => array("forum", 1)), "Posts");
    }

    public function replies()
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }
        $this->render(0, 'replies', array("nav" => array("forum", 2)), "Replies");
    }

    /*
    |=================================================================================
    | @usage:
    |
    |    This Method Takes Care Of Course Module
    |    Following Function works according to variable passed.
    |
    |    => if $course_id is 0 it will simply load a list of All Courses.
    |    => if $course_id is passed then it will load the complete details of course.
    |    => $update is a decion var, To tell the method that load the update view
    |       to update the topic
    |
    |    => You can visit routes for better understanding.
    |================================================================================
     */

    public function courses($course_id = 0, $topic_id = 1, $update = 0)
    {
        if (!$this->is_logged_in()) {
            redirect('admin/login');
            return false;
        }
        if ($this->input->post()) {
            $course_id = xss_clean($this->input->post('course_id'));
            $filename  = xss_clean($this->input->post('filename'));
            $note      = xss_clean($this->input->post('hid_note'));

            if (!$this->validate_form()) {
                redirect(chop($this->uri->uri_string(), "codist"));
                return false;
            } else {

                //if video is uploaded.
                if (!empty($_FILES['video']['name'])) {
                    $filename = $this->upload_file('video', $course_id);
                    if (!$filename) {
                        redirect(chop($this->uri->uri_string(), "codist"));
                        return false;
                    }
                }
                //if note is attached.
                if (!empty($_FILES['note']['name'])) {
                    $note = $this->upload_file('note', $course_id);
                    if (!$note) {
                        redirect(chop($this->uri->uri_string(), "codist"));
                        return false;
                    }
                }
            }

            $topic_id    = xss_clean($this->input->post('topic_id'));
            $topic_name  = xss_clean($this->input->post('topic_name'));
            $description = xss_clean($this->input->post('description'));

            $values = array(
                "topic_name"  => $topic_name,
                "description" => $description,
                "filename"    => $filename,
                "note"        => $note,
            );

            if ($this->crud->update_data("topics", array("course_id" => $course_id, "topic_id" => $topic_id), $values)) {
                $this->session->set_flashdata("success", "Data Updated Successfully!!!");
                $this->session->set_flashdata("error_vali", 0);
                //redirect to current page.
                redirect(chop($this->uri->uri_string(), "codist"));
                return true;
            } else {
                $this->session->set_flashdata('error', "An Error Occurred.");
                redirect(chop($this->uri->uri_string(), "codist"));
                return false;
            }
        }
        if ($course_id) {
            if (!is_numeric($course_id)) {
                show_404();
                return false;
            }
            $data['data']        = $this->crud->get_join("courses", "topics", "course_id", array("topics.topic_id" => $topic_id));
            $data['topics']      = $this->crud->get("topics", array("course_id" => $course_id));
            $data['current_url'] = $this->uri->uri_string();
            if (empty($data['data'])) {
                show_404();
                return false;
            }

            //if not a update request then simpy load a course details.
            if (!$update) {
                $this->render(0, 'courses/course_view', array("nav" => array("courses", 0)), $data['data'][0]['course_name'] . " Details", $data);
            } else {
                $this->render(0, 'courses/course_update', array("nav" => array("courses", 0)), $data['data'][0]['course_name'] . " Details", $data);
            }

        } else {
            $this->render(0, 'courses/courses', array("nav" => array("courses", 0)), "Courses");
        }

    }

    /*
    |=================================================================================
    | @usage:
    |
    |    This Method Creates A course.
    |================================================================================
     */

    public function course_create()
    {
        if ($this->input->post()) {

            $courses     = $this->crud->get("courses");
            $course_name = trim(xss_clean($this->input->post("course_name")));
            if (empty($course_name)) {
                $this->session->set_flashdata("toast-error", "You Should Give A Name.");
                redirect(chop($this->uri->uri_string(), "codist"));
                return false;
            }
            $course_name = $this->db->escape_str($course_name);
            foreach ($courses as $course) {

                //if course name already exists.
                if (strtolower(trim($course['course_name'])) === strtolower($course_name)) {
                    $this->session->set_flashdata("toast-error", "Try Out Differen Name, The Given Name Already Exists.");
                    redirect(chop($this->uri->uri_string(), "codist"));
                    return false;
                }
            }

            $rules = array(
                "field" => "course_name",
                "lablel"=> "Course Name",
                "rules" => "alpha"
            );

            $this->form_validation->set_rules($rules);

            if(!$this->form_validation->run()){
                $this->session->set_flashdata("toast-error", "Course Name can only have alphabets.");
                $this->render(0, 'courses/create', array("nav" => array("courses", 1)), "Create Course");
                $this->session->set_flashdata("toast-error", 0);
                return false;   
            }

            $course_id = $this->crud->insert_data("courses", array("course_name" => $course_name));
            if ($course_id) {
                mkdir('uploads/course_id_' . $course_id);
                mkdir('uploads/course_id_' . $course_id . "/notes");
                redirect(base_url() . "admin/courses/addTopic/" . $course_id);
                return true;
            }
        } else {
            $this->render(0, 'courses/create', array("nav" => array("courses", 1)), "Create Course");
        }
    }

    /*
    |=================================================================================
    | @usage:
    |
    |    This Method Adds Topic To A Existing Course.
    |================================================================================
     */

    public function topic_create($course_id = 0)
    {
        if (!$course_id) {
            show_404();
            return false;
        }
        $course_avail             = $this->crud->get("courses", array("course_id" => $course_id));
        $all_topics               = $this->crud->get("topics", array("course_id" => $course_id));
        $all_topics['all_topics'] = $all_topics;
        $all_topics['course_id']  = $course_id;

        //if Course_id doesn't exist.
        if (empty($course_avail)) {
            show_404();
            return false;
        }
        //if a update request.
        if ($this->input->post()) {

            if (!$this->validate_form()) {
                $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
                return false;
            } else {

                $filename = $this->upload_file('video', $course_id);

                //if  video upload was failed.
                if (!$filename) {
                    $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
                    return false;
                }

                $note = $this->upload_file('note', $course_id);

                if (!$note) {
                    $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
                    return false;
                }

                $topic_name  = xss_clean($this->input->post('topic_name'));
                $description = xss_clean($this->input->post('description'));

                $values = array(
                    "course_id"   => $course_id,
                    "topic_name"  => $topic_name,
                    "description" => $description,
                    "filename"    => $filename,
                    "note"        => $note,
                );

                if ($this->crud->insert_data("topics", $values)) {
                    $this->session->set_flashdata('success-modal', "hello");
                    $this->session->set_flashdata("error_vali", 0);
                    $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
                } else {
                    $this->session->set_flashdata('error', "An Error Occurreed!!");
                    $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
                }
            }

        } else {
            //simply loads a form.
            $this->session->set_flashdata('success-modal', 0);
            $this->render(0, 'courses/topic_create', array("nav" => array("courses", 1)), "Add Topic", $all_topics);
        }
    }

}
