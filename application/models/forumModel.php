<?php


    class ForumModel extends CI_model{


        public function __construct()
        {
            parent::__construct();
        }

        public function get_all()
        {
            $result = $this->db->query("SELECT * FROM allposts")->result_array();
            return empty($result) ? false : $result;
        }

        public function get_reply_by_post_id($post_id)
        {
            $post_id = $this->db->escape_str($post_id);
            return $this->db->query("CALL get_reply_by_post_id(".$post_id.")")->result_array();
        }

    }


?>