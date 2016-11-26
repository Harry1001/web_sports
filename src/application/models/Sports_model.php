<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/26
 * Time: 13:17
 */
class Sports_model extends CI_Model
{
    //运动总量数据
    public function totalData($user_id)
    {
        $sql = "SELECT sum(distance) AS distance, sum(duration) as duration, sum(calorie) AS calorie FROM sport WHERE user_id = ? ";
        $query = $this->db->query($sql, array($user_id));
        $row_array = $query->row_array();
        foreach ($row_array as $key=>$value) {
            if ($value == null){
                $row_array[$key] = 0.0;
            }
        }
        return $row_array;
    }

    //今日运动数据
    public function todayData($user_id)
    {
        $sql = "SELECT distance, duration, step, calorie FROM sport WHERE user_id = ? AND sport.date >= ? AND sport.date < ? ";
        $begin_time = strtotime(date('Y-m-d', time()));
        $end_time = strtotime('tomorrow');
        $query = $this->db->query($sql, array($user_id, $begin_time, $end_time));
        $rows = $query->result_array();
        if (count($rows) > 0 ){
            return $rows[0];
        }
        else {
            return array(
                'distance' => 0.0,
                'duration' => 0.0,
                'step' => 0,
                'calorie' => 0.0
            );
        }
    }

    //本周运动数据
    public function weekData($user_id)
    {
        $sql = "SELECT sum(distance) AS distance, sum(duration) as duration, sum(step) as step, sum(calorie) AS calorie FROM sport WHERE user_id = ? AND sport.date >= ? ";
        $unix_time = strtotime(date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600)));
        $query = $this->db->query($sql, array($user_id, $unix_time));
        $rows = $query->result_array();
        if (count($rows) > 0 ){
            return $rows[0];
        }
        else {
            return array(
                'distance' => 0.0,
                'duration' => 0.0,
                'step' => 0,
                'calorie' => 0.0
            );
        }
    }

    //本月运动数据
    public function monthData($user_id)
    {
        $sql = "SELECT sum(distance) AS distance, sum(duration) as duration, sum(step) as step, sum(calorie) AS calorie FROM sport WHERE user_id = ? AND sport.date >= ? ";
        $unix_time = strtotime(date('Y-m', time()).'-01 00:00:00');
        $query = $this->db->query($sql, array($user_id, $unix_time));
        $rows = $query->result_array();
        if (count($rows) > 0 ){
            return $rows[0];
        }
        else {
            return array(
                'distance' => 0.0,
                'duration' => 0.0,
                'step' => 0,
                'calorie' => 0.0
            );
        }
    }

    //本周运动曲线
    public function weekChart($user_id)
    {
        $sql = "SELECT calorie FROM sport WHERE user_id = ? AND sport.date >= ? ";
        $unix_time = strtotime(date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600)));
        $query = $this->db->query($sql, array($user_id, $unix_time));
        $rows = $query->result_array();
        return $rows;
    }

    //本月运动曲线
    public function monthChart($user_id)
    {
        $sql = "SELECT calorie FROM sport WHERE user_id = ? AND sport.date >= ? ";
        $unix_time = strtotime(date('Y-m', time()).'-01 00:00:00');
        $query = $this->db->query($sql, array($user_id, $unix_time));
        $rows = $query->result_array();
        return $rows;
    }

    public function bodyNow($user_id)
    {
        $sql = "SELECT t1.height, t1.weight FROM body t1 WHERE t1.user_id = ? AND t1.date = (SELECT max(t2.date) FROM body t2) ";
        $query = $this->db->query($sql, array($user_id));
        $rows = $query->result_array();
        if (count($rows) > 0 ){
            return $rows[0];
        }
        else {
            return array(
                'height' => 0.0,
                'weight' => 0.0
            );
        }
    }

    public function bodyChart($user_id)
    {
        $sql = "SELECT t1.date, t1.weight FROM body t1 WHERE t1.user_id = ? ORDER BY t1.date ASC ";
        $query = $this->db->query($sql, array($user_id));
        $rows = $query->result_array();
        foreach ($rows as &$row){
            $row['date'] = date('Y-m', $row['date']);
        }
        return $rows;
    }
}