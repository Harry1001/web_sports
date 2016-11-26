<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/12/1
 * Time: 13:11
 */
class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }

    }

    public function index()
    {
        if ((!isset($_SESSION['user_type'])) || ($_SESSION['user_type']) != 1){
            $this->load->view('prompt_view');
        }
        else{
            $this->load->view('reports_view');
        }
    }

    public function loadReports()
    {
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM report t1, activity t2 WHERE t1.actvt_id = t2.id ";
        $query = $this->db->query($sql, array());
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}