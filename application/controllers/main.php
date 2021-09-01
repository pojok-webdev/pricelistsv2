<?php
Class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('padiauth');
    }
    function authenticate(){
        $params = $this->input->post();
        if ($this->padiauth->authenticate($params)){
            echo 'authenticated';
        }else{
            echo 'unauthenticated';
        };
    }
    function login(){
        $this->load->view('login/login');
    }
    function testsha1(){
        echo sha1('puji');
    }
    function notfound(){
        $this->load->view('commons/404.php');
    }
}