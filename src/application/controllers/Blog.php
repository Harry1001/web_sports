<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/5
 * Time: 19:03
 */
class Blog extends CI_Controller
{
    public function index()
    {
        $this->load->model('blog_model');
        $data["user"] = $this->blog_model->getUserData();
        $data["title"] = "blog title";
        $data["heading"] = "this is head";
        $data["todo_list"] = array("item1", "item2", "item3");
//        $this->load->helper('url');
        $this->load->view("blogview", $data);
    }

    public function add($a, $b)
    {
        echo $a."+".$b."=".($a+$b);
    }
}