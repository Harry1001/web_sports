<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/14
 * Time: 20:13
 */
class Auth_model extends CI_Model
{
    public function login($username, $password)
    {
        $sql = "SELECT id, password, type FROM user WHERE username = ? LIMIT 1 ";
        $query = $this->db->query($sql, array($username));
        $row = $query->row_array();
        $hashed_password = $row['password'];
        if (($hashed_password != null) && (password_verify($password, $hashed_password))) {
            return $row;
        }
        else {
            return false;
        }
    }

    public function register($data)
    {
        $query = $this->db->query("SELECT * FROM user WHERE username = ? OR email = ? LIMIT 1 ", array($data['username'], $data['email']));
        if ($query->num_rows() == 0 ) {
            $this->db->trans_start();
            $this->db->insert('user', array(
                'username' => $data['username'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'email' => $data['email']
            ));
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            if ($insert_id > 0){
                return $insert_id;
            }
        }
        return false;
    }
}