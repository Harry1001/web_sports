<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/28
 * Time: 18:17
 */
class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }
        $this->load->model('activity_model');
    }

    public function index()
    {
        $this->load->view('all_activity_view');
    }

    public function all()
    {
        $this->load->view('all_activity_view');
    }

    //page start from 1
    public function get_activities()
    {
        $page = (int)$_GET['page'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
        $arr = $this->activity_model->active_list($begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function getCreate()
    {
        $this->load->view('create_activity_view');
    }

    public function create()
    {
        $data['title'] = $_POST['title'];
        $data['introduction'] = $_POST['introduction'];
        $data['time'] = DateTime::createFromFormat('m/d/Y h:i A', $_POST['time'])->getTimestamp();
        $data['position'] = $_POST['location'];
        $data['content'] = $_POST['description'];
        $data['launcher_id'] = $_SESSION['user_id'];
        $result = $this->activity_model->create_activity($data);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function launched()
    {
        $this->load->view('my_launched_view');
    }

    public function all_launched()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->all_launched($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function active_launched()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->active_launched($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function expire_launched()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->expire_launched($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function detail($id)
    {
        $actvt_id = (int)$id;
        $data = $this->activity_model->detail($actvt_id);
        //get the user who join the activity
        $data['join'] = $this->activity_model->joined_user($actvt_id);
        if ($data != false){
            $this->load->view('activity_detail_view', $data);
        }
        else{

        }
    }

    public function delete()
    {
        $user_id = $_SESSION['user_id'];
        $actvt_id = (int)$_GET['actvt_id'];
        $result = $this->activity_model->delete($user_id, $actvt_id);
        echo json_encode($result);
    }

    public function delete_report()
    {
        $actvt_id = (int)$_GET['actvt_id'];
        $result = $this->activity_model->delete_report($actvt_id);
        echo json_encode($result);
    }

    public function delete_join()
    {
        $user_id = $_SESSION['user_id'];
        $actvt_id = (int)$_GET['actvt_id'];
        $result = $this->activity_model->delete_join($user_id, $actvt_id);
        echo json_encode($result);
    }

    public function joined()
    {
        $this->load->view('my_joined_view');
    }

    public function all_joined()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->all_joined($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function active_joined()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->active_joined($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function expire_joined()
    {
        $page = (int)$_GET['page'];
        $user_id = $_SESSION['user_id'];
        if ($page>=1){
            $begin_index = ($page-1)* ACTIVITY_PAGE_SIZE;
            $count = ACTIVITY_PAGE_SIZE;
            $arr = $this->activity_model->expire_joined($user_id, $begin_index, $count);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
        else{
            header('Content-Type: application/json');
            echo json_encode(array());
        }
    }

    public function join()
    {
        $user_id = $_SESSION['user_id'];
        $actvt_id = (int)$_GET['id'];
        $result = $this->activity_model->join($user_id, $actvt_id);
        echo json_encode($result);
    }

    public function report()
    {
        $actvt_id = (int)$_GET['id'];
        $this->activity_model->report($actvt_id);
        echo json_encode(true);
    }
}