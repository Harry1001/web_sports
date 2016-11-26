<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/13
 * Time: 11:19
 */
class Blog_model extends CI_Model
{
    public function getUserData()
    {
        return $this->db->get('user')->result_array();
    }
}