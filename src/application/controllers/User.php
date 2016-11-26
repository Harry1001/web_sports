<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/30
 * Time: 20:40
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {

    }

    public function detail($user_id)
    {
        $query = $this->db->query("SELECT id, title, `time`, introduction, `position` FROM user_activity t1, activity t2 WHERE t1.user_id = ? AND t1.actvt_id = t2.id ", array($user_id));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        $query1 = $this->db->query("SELECT username FROM `user` WHERE id = ?", array($user_id));
        $result1 = $query1->result_array();
        $data['join'] = $result;
        $data['username'] = $result1[0]['username'];
        $data['user_id'] = $user_id;
        $this->load->view('user_joined_view', $data);
    }

    public function isFaned()
    {
        $following_id = $_SESSION['user_id'];
        $follower_id = $_GET['username'];
        $query = $this->db->query("SELECT * FROM fans WHERE follower_id = ? AND following_id = ? ", array($follower_id, $following_id));
        $result = $query->result_array();
        if (count($result) > 0){
            echo json_encode(true);
        }
        else{
            echo json_encode(false);
        }
    }

    public function fan()
    {
        $following_id = $_SESSION['user_id'];
        $follower_id = $_GET['username'];
        $query = $this->db->query("SELECT * FROM fans WHERE follower_id = ? AND following_id = ? ", array($follower_id, $following_id));
        $result = $query->result_array();
        if (count($result) > 0){
            echo json_encode(false);
        }
        else{
            $query1 = $this->db->insert('fans', array(
                'follower_id'=>$follower_id,
                'following_id'=>$following_id
            ));
            if ($this->db->affected_rows()>0){
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }
        }
    }

    public function unFan()
    {
        $following_id = $_SESSION['user_id'];
        $follower_id = $_GET['username'];
        $query = $this->db->query("SELECT * FROM fans WHERE follower_id = ? AND following_id = ? ", array($follower_id, $following_id));
        $result = $query->result_array();
        if (count($result) > 0){
            $query1 = $this->db->delete('fans', array(
                'follower_id'=>$follower_id,
                'following_id'=>$following_id
            ));
            if ($this->db->affected_rows()>0){
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }
        }
        else{
            echo json_encode(false);
        }
    }

    public function modify()
    {
        $this->load->view('modify_view');
    }

    public function modifyPass()
    {
        $this->form_validation->set_rules('new_pass', 'Password', 'required|min_length[8]|max_length[255]');
        if ($this->form_validation->run() == false) {
            $this->load->view('modify_view');
        }
        else{
            $data = array(
                'user_id'=>$_SESSION['user_id'],
                'old_pass'=>$_POST['old_pass'],
                'new_pass'=>$_POST['new_pass']
            );
            $result = $this->user_model->modify($data);
            if ($result){
                $msg['message_display'] = '修改成功!';
                $this->load->view('modify_view',$msg);
            }
            else{
                $msg['error_message'] = '对不起，原密码不正确!';
                $this->load->view('modify_view',$msg);
            }
        }
    }
}