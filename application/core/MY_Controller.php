<?php


    class MY_Controller extends CI_controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/Users', 'users');
        }

        public function is_logged_in($user=0)
        {
            if(!$user){
                return (!$this->session->userdata('logged_in')) ? false : true;   
            }else{
                return (!$this->session->userdata('user_id')) ? false : true;   
            }
            
        }

        public function log_out($user=0){
            
            if(!$user){
                $this->session->unset_userdata('logged_in');
                redirect('admin/login');  
                return true;
            }else{
                $this->session->unset_userdata('user_id');
                redirect('login');  
                return true;
            }
        }

        public function render($is_login=0, $page='main', $nav=array("nav"=>array("forum", 2)), $head_title="",  $data=array(), $errors=array())
        {
            $title['title'] = empty($head_title) ? ucfirst($nav['nav'][0]) : $head_title;
            $this->load->view('admin/includes/header', $title);
            if($is_login){
                $this->load->view('admin/login');
                return true;
            }
            $topnav['replies'] = count($this->users->get('replies', array('approved' => 0)));
            $topnav['posts'] = count($this->users->get('posts', array('approved' => 0)));
            $topnav['feedbacks'] = count($this->users->get('feedbacks', array('seen' => 0)));

            $page_header['page_name'] = empty($head_title) ? ucfirst($nav['nav'][0]) : $head_title;
            $sidebar = array_merge($topnav, $nav);

            $this->load->view('admin/includes/top_navbar', $topnav);
            $this->load->view('admin/includes/sidebar', $sidebar);
            $this->load->view('admin/includes/page_header', $page_header);
            $this->load->view('admin/'.$page, $data);
            $this->load->view('admin/includes/footer');
            return true;
        }

        public function refresh()
        {
            redirect($this->uri->uri_string());
        }

        public function render_user($page_name="home", $sidebar=array("home",0), $data=array())
        {
            $header_title['title'] = $sidebar[0];
            $this->load->view("user/includes/header", $header_title);

            if(is_numeric($page_name)){
                if($page_name){
                    $this->load->view("user/register");
                }
                if(!$page_name){
                    $this->load->view("user/login");
                }
            }else{
                $active_nav['sidebar'] = $sidebar;
                $this->load->view("user/includes/topnav");
                $this->load->view("user/includes/sidebar", $active_nav);
                $this->load->view("user/".$page_name, $data);
                $this->load->view("user/includes/footer");
            }
        }

    }   


?>