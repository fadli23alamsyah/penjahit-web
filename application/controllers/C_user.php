<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

    public function __construct(){

        parent:: __construct();

        $this->load->library('session');  
        $this->load->helper("url");
        $this->load->helper("form");   
        $this->load->model("M_user");   
        $hak = $this->session->userdata('hak');
        if($hak == '@dm1n'){
            redirect('c_login');
        }
    }

    public function index()
    {
        $data['komen'] = $this->M_user->getkomen();
        //$data['datakomen'] = $this->M_user->datakomen();
        $this->load->view("user/header");
        $this->load->view("user/home",$data);
        $this->load->view("user/footer");
    }

    public function koleksi()
    {
        $data['sql'] = $this->M_user->koleksi();
        $this->load->view("user/header");
        $this->load->view("user/koleksi",$data);
        $this->load->view("user/footer");
    }

    public function carapesan()
    {
        $this->load->view("user/header");
        $this->load->view("user/carapesan");
        $this->load->view("user/footer");
    }

    public function caraukur()
    {
        $this->load->view("user/header");
        $this->load->view("user/caraukur");
        $this->load->view("user/footer");
    }
    

    public function searchAjax(){
        $keyword = $this->input->post('keyword');
        $this->M_user->searchAjax($keyword);
    }

}