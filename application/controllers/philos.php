<?php
Class Philos extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $data = array(
            'menuactive'=>array(
                'productlist'=>'','productnote'=>'',
                'devicelist'=>'','devicenote'=>'',
                'vaslist'=>'','vasnote'=>'',
                'philoslist'=>'active','philosnote'=>''
            ),
            'objs'=>$this->philo->gets(),
            'categories'=>$this->service->getCategories()
        );
        $this->load->view('philos/index',$data);
    }
    function getajaxsource($objs){
        $arr = array();
        foreach($objs['res'] as $obj){
            array_push($arr,'[
                '.$obj->id.',
                "'.$obj->philo_id.'",
                "'.$obj->name.'",
                '.$obj->price.',
                "'.number_format($obj->price).'",
                '.$obj->discount.',
                "'.number_format($obj->discount).'",
                "'.$obj->description.'",
                "'.$obj->unit.'"
              ]');
        }
        return '{"aaData": ['. implode(",",$arr).']}';
    }
    function ajaxsource(){
        $objs = $this->philo->gets();
        echo $this->getajaxsource($objs);
    }
    function ajaxsourcebycategories(){
        $params = $this->input->post();
        $objs = $this->philo->getsbycategory($params['category_id']);
        echo $this->getajaxsource($objs);
    }
    function testgetsbycategory(){
        $params = $this->input->post();
        echo $this->philo->getsbycategory($params['category']);
    }
    function clients(){
        $params = $this->input->post();
        $this->load->model('client');
        $objs = $this->client->getbyname($params['name']);
        $out = '<ul id="country-list">';
        foreach($objs['res'] as $obj){
            $out.= '<li onClick="selectCountry(\''.$obj->id.'\',\''.$obj->name.'\')">'.$obj->name.'</li>';
        }
        $out.= '</ul>';
        echo $out;
    }
    function getclientsites(){
        $client_id = $this->uri->segment(3);
        $this->load->model('client');
        $objs = $this->client->getClientSiteByClientId($client_id);
        $out = '<ul id="sites">';
        foreach($objs['res'] as $obj){
            $out.= '<li>'.$obj->address.'</li>';
        }
        $out.= '</ul>';
    }
}