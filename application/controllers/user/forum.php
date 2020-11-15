<?php


    class Forum extends MY_controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model("forumModel", "forum");
            $this->load->model("crud");
            $this->load->helper('text');
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
            $data['posts'] = $this->forum->get_all();

            if($this->input->post()){
                $post = trim($this->input->post("post"));
                if(empty($post)){
                    $this->session->set_flashdata("error", "You Cannot Post Empty!!");
                    $this->render_user("forum/home", array("forum", 0), $data);
                    $this->session->set_flashdata("error", 0);
                    return false;
                }else{
                    $value = array(
                        "user_id" => $this->get_user_id(),
                        "post" => htmlentities($post)
                    );

                    if(!$this->crud->insert_data("posts", $value)){
                        $this->session->set_flashdata("error", "Some Internal Error Has Occurred!!");
                        $this->render_user("forum/home", array("forum", 0), $data);
                        $this->session->set_flashdata("error", 0);
                        return false;
                    }else{
                        $this->session->set_flashdata("success", "Your post will first be verified by admin then it will get posted.");
                        $this->render_user("forum/home", array("forum", 0), $data);
                        $this->session->set_flashdata("success", 0);
                        return false;
                    }
                }
            }

            $this->render_user("forum/home", array("forum", 0), $data);
        }

        public function post_page($post_id = 0)
        {
            if(!$post_id){
                show_404();
                return false;
            }

            if (!$this->is_logged_in(1)) {
                redirect('login');
                return false;
            }

            $data['post_data'] = $this->users->get("allposts", array("post_id" => $post_id));
            $data['reply_data'] = $this->forum->get_reply_by_post_id($post_id);
            mysqli_next_result( $this->db->conn_id );

            if($this->input->post()){
                $comment = trim($this->input->post("comment"));
                if(empty($comment)){
                    $this->session->set_flashdata("error", "Comment Cannot Be Empty!!");
                    $this->render_user("forum/post_page", array("forum", 0), $data);
                    $this->session->set_flashdata("error", 0);
                    return false;
                }else{
                    $value = array(
                        "user_id" => $this->get_user_id(),
                        "post_id" => $post_id,
                        "reply" => htmlentities($comment)
                    );
                    if(!$this->crud->insert_data("replies", $value)){
                        $this->session->set_flashdata("error", "Some Internal Error Has Occurred!!");
                        $this->render_user("forum/post_page", array("forum", 0), $data);
                        $this->session->set_flashdata("error", 0);
                        return false;
                    }else{
                        $this->session->set_flashdata("success", "Your comment will first be verified by admin then it will get posted.");
                        $this->render_user("forum/post_page", array("forum", 0), $data);
                        $this->session->set_flashdata("success", 0);
                        return false;
                    }
                }

            }
            $this->render_user("forum/post_page", array("forum", 0), $data);
        }

    }


?>