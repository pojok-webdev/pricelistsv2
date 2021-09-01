<?php
Class Devices extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('device');
        $this->load->model('service');
    }
    function index(){
        $data = array(
            'objs'=>$this->device->gets(),
            'categories' => $this->device->getDeviceCategories(),
            'menuactive'=>array(
                'productlist'=>'','productnote'=>'',
                'devicelist'=>'active','devicenote'=>'',
                'vaslist'=>'','vasnote'=>'',
                'philoslist'=>'','philosnote'=>''
            ),
            'breadline'=>array(
                0=>array('url'=>'/','label'=>'Devices'),
                1=>array('url'=>'/','label'=>'List'),
            )
        );
        $this->load->view('devices/index',$data);
    }
    function edit(){
        $data = array(
            'obj'=>$this->device->get($this->uri->segment(3)),
            'categories' => $this->device->getDeviceCategories(),
            'menuactive'=>array(
                'productlist'=>'','productnote'=>'',
                'devicelist'=>'active','devicenote'=>'',
                'vaslist'=>'','vasnote'=>''
            ),
            'breadline'=>array(
                0=>array('url'=>'/','label'=>'Devices'),
                1=>array('url'=>'/','label'=>'Edit'),
            )
        );
        $this->load->view('devices/edit',$data);
    }
    function update(){
        $params = $this->input->post();
        print_r($params);
        $this->load->model('device');
        echo $this->device->update($params);
    }
    function getajaxsource($objs){
        $arr = array();
        foreach($objs['res'] as $obj){
            array_push($arr,'[
                "'.$obj->category.'",
                "'.$obj->kddevice.'",
                "'.$obj->name.'",
                "'.$obj->description.'",
                "'.$obj->shownprice.'",
                "'.$obj->unit.'",
                "'.$obj->brand.'"
              ]');
        }
        return '{"aaData": ['. implode(",",$arr).']}';
    }
    function ajaxsource(){
        $objs = $this->device->gets();
        //echo json_encode($objs);
        echo $this->getajaxsource($objs);
    }
    function ajaxsourcebycategories(){
        $params = $this->input->post();
        $objs = $this->device->getsbycategory($params['category_id']);
        echo $this->getajaxsource($objs);
    }
}