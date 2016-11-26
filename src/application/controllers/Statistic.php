<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/26
 * Time: 15:49
 */
class Statistic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }
        $this->load->model('sports_model');
    }

    public function index()
    {
        $this->sport();
    }

    //我的运动
    public function sport()
    {
        $user_id = $_SESSION['user_id'];
        $data['total'] = $this->sports_model->totalData($user_id);
        $data['today'] = $this->sports_model->todayData($user_id);
        $data['week'] = $this->sports_model->weekData($user_id);
        $data['month'] = $this->sports_model->monthData($user_id);

        $this->load->view('sports_view', $data);
    }

    public function weekChart()
    {
        $user_id = $_SESSION['user_id'];
        $rows = $this->sports_model->weekChart($user_id);
        echo json_encode($rows);
    }

    public function monthChart()
    {
        $user_id = $_SESSION['user_id'];
        $rows = $this->sports_model->monthChart($user_id);
        echo json_encode($rows);
    }

    //身体管理
    public function body()
    {
        $user_id = $_SESSION['user_id'];
        $data['bodyNow'] = $this->sports_model->bodyNow($user_id);
        $this->load->view('body_view', $data);
    }

    public function bodyChart()
    {
        $user_id = $_SESSION['user_id'];
        $rows = $this->sports_model->bodyChart($user_id);
        echo json_encode($rows);
    }

    //睡眠分析
    public function sleep()
    {
        $data['efficiency'] = 78;
        $data['start'] = '10:00 PM';
        $data['end'] = '7:00 AM';
        $data['total'] = '9小时';
        $data['realSleep'] = '7.02小时';
        $this->load->view('sleep_view', $data);
    }

}