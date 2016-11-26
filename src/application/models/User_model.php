<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/12/1
 * Time: 12:34
 */
class User_model extends CI_Model
{
    public function modify($data)
    {
        $query = $this->db->query("SELECT password FROM user WHERE id = ? LIMIT 1 ", array($data['user_id']));
        $row = $query->row_array();
        $hashed_password = $row['password'];
        if (($hashed_password != null) && (password_verify($data['old_pass'], $hashed_password))) {
            $hashed_new_pass = password_hash($data['new_pass'], PASSWORD_DEFAULT);
            $query1 = $this->db->query("UPDATE user SET password = ? WHERE id = ? ", array($hashed_new_pass, $data['user_id']));
            $result = $query->result_array();
            return true;
        }
        else {
            return false;
        }
    }
}