<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grafik extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_grafik']=$this->m_grafik->get_all_grafik();
		$x['sidebar']="grafik";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('grafik/grafik');
		$this->load->view('footer');
	}


	public function cetak()
	{
		$x["data_grafik"]=$this->m_grafik->get_all_grafik();
		$this->load->view("grafik/cetak",$x);
	}


	public function lihat()
	{
    	$x["sidebar"]="grafik2";
		$this->load->view("header",$x);
    	$this->load->view("sidebar");
		$this->load->view("grafik/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$this->load->view("grafik/grafik");
	}

	public function cetak2($id)
	{	
		$x["data_grafik"]=$this->db->query("SELECT * FROM grafik")->row_array();
		$this->load->view("grafik/cetak2",$x);
	}


}