<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/28
 * Time: 18:23
 */
class Activity_model extends CI_Model
{
    public function active_list($begin_index, $count)
    {
        $time_now = time();
        $sql = "SELECT id, title, introduction, `time` FROM activity WHERE `time` >= ? ORDER BY `time` ASC LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($time_now, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    //$data is an array
    public function create_activity($data)
    {
        $this->db->insert('activity', $data);
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public function all_launched($user_id, $begin_index, $count)
    {
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM activity t2 WHERE t2.launcher_id = ? LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function active_launched($user_id, $begin_index, $count)
    {
        $time_now = time();
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM activity t2 WHERE t2.launcher_id = ? AND t2.`time` > ? LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $time_now, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function expire_launched($user_id, $begin_index, $count)
    {
        $time_now = time();
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM activity t2 WHERE t2.launcher_id = ? AND t2.`time` < ? LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $time_now, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function delete($user_id, $actvt_id)
    {
        $this->db->delete('activity', array('id'=>$actvt_id, 'launcher_id'=>$user_id));
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_report($actvt_id)
    {
        $this->db->delete('activity', array('id'=>$actvt_id));
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_join($user_id, $actvt_id)
    {
        $this->db->delete('user_activity', array('actvt_id'=>$actvt_id, 'user_id'=>$user_id));
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function detail($actvt_id)
    {
        $query = $this->db->query("SELECT t1.id, title, introduction, `time`, `position`, content,t1.launcher_id, t2.username FROM activity t1, user t2 WHERE t1.id = ? AND t1.launcher_id = t2.id ", array($actvt_id));
        $result = $query->result_array();
        if (count($result) > 0){
            $result[0]['time'] = date('Y-m-d H:i', $result[0]['time']);
            return $result[0];
        }
        else{
            return false;
        }
    }

    public function joined_user($actvt_id)
    {
        $query = $this->db->query("SELECT `user`.id, `user`.username FROM user_activity, `user` WHERE actvt_id = ? AND user_id = `user`.id ", array($actvt_id));
        $result = $query->result_array();
        return $result;
    }

    public function all_joined($user_id, $begin_index, $count)
    {
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM user_activity t1, activity t2 WHERE t1.user_id = ? AND t1.actvt_id = t2.id LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function active_joined($user_id, $begin_index, $count)
    {
        $time_now = time();
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM user_activity t1, activity t2 WHERE t1.user_id = ? AND t1.actvt_id = t2.id AND t2.`time` > ? LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $time_now, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function expire_joined($user_id, $begin_index, $count)
    {
        $time_now = time();
        $sql = "SELECT t2.id, title, `time`, position, introduction FROM user_activity t1, activity t2 WHERE t1.user_id = ? AND t1.actvt_id = t2.id AND t2.`time` < ? LIMIT ? OFFSET ? ";
        $query = $this->db->query($sql, array($user_id, $time_now, $count, $begin_index));
        $result = $query->result_array();
        foreach ($result as &$row) {
            $row['time'] = date('Y-m-d H:i', $row['time']);
        }
        return $result;
    }

    public function join($user_id, $actvt_id)
    {
        $query = $this->db->query("SELECT * FROM user_activity WHERE user_id = ? AND actvt_id = ? LIMIT 1 ", array($user_id, $actvt_id));
        $result = $query->result_array();
        if (count($result) == 0){
            $this->db->insert('user_activity', array(
                'user_id'=>$user_id,
                'actvt_id'=>$actvt_id
            ));
            if ($this->db->affected_rows() > 0){
                return true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        }

    }

    public function report($actvt_id)
    {
        $query = $this->db->query("SELECT * FROM report WHERE actvt_id = ?", array($actvt_id));
        $result = $query->result_array();
        if (count($result) > 0){
            //do nothing
        }
        else{
            $this->db->insert('report', array(
                'actvt_id'=>$actvt_id
            ));
        }
    }
}