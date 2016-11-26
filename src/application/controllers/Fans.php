<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/30
 * Time: 19:17
 */
class Fans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }
        $this->load->model('fans_model');
    }

    public function index()
    {
        $user_id = $_SESSION['user_id'];
        $data['follower'] = $this->fans_model->follower($user_id);
        $data['following'] = $this->fans_model->following($user_id);
        $this->load->view('fans_view', $data);
    }
}