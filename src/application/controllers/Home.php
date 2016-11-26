<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/12
 * Time: 21:14
 */
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view("home_view");
    }
}