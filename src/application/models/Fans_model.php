<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/30
 * Time: 19:53
 */
class Fans_model extends CI_Model
{
    public function follower($user_id)
    {
        $query = $this->db->query("SELECT id,  username FROM fans, user WHERE following_id = ? AND follower_id = user.id", array($user_id));
        $result = $query->result_array();
        return $result;
    }

    public function following($user_id)
    {
        $query = $this->db->query("SELECT id,  username FROM fans, user WHERE follower_id = ? AND following_id = user.id", array($user_id));
        $result = $query->result_array();
        return $result;
    }
}