<?php

/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 2016/11/14
 * Time: 18:54
 */
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->getLogin();
    }

    //handle get request
    public function getLogin()
    {
        if (isset($_SESSION['user_id'])){
            redirect('home');
        }
        $this->load->view('login_view');
    }

    //handle post request
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
        if (isset($_SESSION['user_id'])){
            $this->load->view('home_view');
        }
        else {

            if ($this->form_validation->run() == false) {
                $this->load->view('login_view');
            }
            else {
                $result = $this->auth_model->login($_POST['username'], $_POST['password']);
                if ($result != false){
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['user_type'] = $result['type'];
                    redirect('home');
                }
                else {
                    $data = array('error_message'=>'Invalid Username or Password! ');
                    $this->load->view('login_view', $data);
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('home');
    }

    //handle get request
    public function getRegister()
    {
        unset($_SESSION['user_id']);
        $this->load->view('register_view');
    }

    //handle post request
    public function register()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['user_type']);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('register_view');
        }
        else {
            $data = array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            );
            $result = $this->auth_model->register($data);
            if ($result != false) {
                $_SESSION['user_id'] = $result;
                $_SESSION['username'] = $_POST['username'];
                redirect('home');
            }
            else {
                $msg['message_display'] = 'Username or Email already exists!';
                $this->load->view('register_view');
            }
        }
    }
}