<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDataToMySQL($ten,$tuoi,$anhavatar,$linkfb,$sodonhang,$sdt)
	{
		//xử lý thông tin nhận về từ nhansu_controller và upload thông tin lên MySQL
		$dulieu=array(
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'anhavatar'=>$anhavatar,
			'linkfb'=>$linkfb,
			'sodonhang'=>$sodonhang,
			'sdt'=>$sdt,
			);
		//nhập dữ liệu(được lấy từ $dulieu) vào cơ sở dữ liệu trong bảng nhan_vien có ở phpmyadmin
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	/*
	Viết hàm lấy tất cả dữ liệu từ cơ sở dữ liệu
	 */
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		//nhan_vien trong get() là 1 bảng của cơ sở dữ liệu bai3dulieu_p9, ta bỏ limit và offset tức có nghĩa là lấy hết các dữ liệu có trong bảng nhan_vien
		$dulieu=$this->db->get('nhan_vien');
		//Biến dữ liệu thành 1 mãng thông qua hàm db_result_array
		$dulieumang=$dulieu->result_array();
		return $dulieumang;

	}
	//Viết phương thức getDataById phục vụ cho việc sử dụng phương thức edit_nhanvien trong nhansu_controller
	public function getDataById($idnhanvao)
	{
		$this->db->select('*');
		$this->db->where('id', $idnhanvao);
		$dulieu=$this->db->get('nhan_vien');
		$dulieudangmang=$dulieu->result_array();//lấy dữ liệu dạng mảng
		// echo "<pre>";
		// var_dump($dulieudangmang); //in ra kiểu dữ liệu
		return $dulieudangmang;
	}
	public function updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$data = array(
			'id' =>$id ,
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'sdt'=>$sdt,
			'anhavatar'=>$anhavatar,
			'linkfb'=>$linkfb,
			'sodonhang'=>$sodonhang 
			);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);//Kết quả trả về của update là 1
	}
	//Hàm xoá dữ liệu nhân viên
	public function deleteDataById($idnhapvao)
	{
		$this->db->where('id', $idnhapvao);
		$this->db->delete('nhan_vien');
		$this->db->order_by('title', 'desc');
	}

}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */