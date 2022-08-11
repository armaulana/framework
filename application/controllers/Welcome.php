<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $order = array('id' => 'desc');
	var $table = 'dbEmploye';
	var $idq = 'id';
	var $column_search = array('nama', 'nik', 'nama');
	var $column_order = array('id', 'nik', 'nama');

	public function __construct(){
		parent::__construct();
		$this->load->database();
		//-- Fix Standar 1 source
		$this->load->model('MyModel');
		$this->load->helper('url');
		//-- Fix Standar 2 source
		$this->load->library('session');
	}

	public function index(){
		//-- Allow modul access 
		$data['title'] = 'Employe Datas';
		$data['active_menu_parent'] = '';
		$data['active_menu_sub'] = '';
		$data['active_menu_sub1'] = '';
		//-- Datas
		//$data['datas1'] = $this->MyModel->show();		
		$this->load->view('welcome_message', $data);
	}

	public function ajax_list(){
		$list = $this->MyModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach($list as $li){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $li->nik;
			$row[] = $li->nama;
			$row[] = $li->alamat;
			$row[] = '<a href="javascript:void(0)" class="btn btn-sm btn-primary">Edit</a>
					<a href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>';
			$data[] = $row;
		}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->MyModel->count_all(),
				"recordsFiltered" => $this->MyModel->count_filtered(),
				"data" => $data,
			);
			echo json_encode($output);
	}

	public function ajax_add(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		if(empty($data['error'])){
			$data = array(
				'nik' => $nik,
				'nama' => $nama,
				'alamat' => $alamat,
				'insert_date' => gmdate('Y-m-d h:i:s', time()+60*60+7),
				'insert_by' => 1,
				'is_trash' => 1
			);
			$insert = $this->MyModel->save($data);
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	public function ajax_edit($id){
		$data = $this->MyModel->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update(){
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		if(empty($data['error'])){
			$data = array(
				'nik' => $nik,
				'nama' => $nama,
				'alamat' => $alamat,
				'update_date' => gmdate('Y-m-d h:i:s', time()+60*60*7),
				'update_by' => 1,
				'is_trash' => 1
			);
			$this->db->update($this->input->post('id'), $data);
			$data['status'] = TRUE;
		}else{
			$data['status'] = FALSE;
		}
	}

	public function ajax_delete($id){
		$this->MyModel->delete_by_id($id);
		echo json_encode(array('status' => TRUE));
	}


}
