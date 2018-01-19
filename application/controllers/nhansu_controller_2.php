<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		/*
		gọi phương thức getAllData() để lấy dữ liệu có trong cơ sở dữ liệu phpmyadmin
		 */
		$this->load->model('nhansu_model');
	 	 	$ketqua= $this->nhansu_model->getAllData();//$ketqua là một mảng
	  	 	$mangketqua=array('dulieuketqua'=>$ketqua);
	  	 //hàm truyền dữ liệu $mangketqua cho nhansu_view
	  	 $this->load->view('nhansu_view', $mangketqua, FALSE);
	}
	public function nhansu_add()
	{
		//lấy nhân sự từ view nhansu_view.php
		$ten= $this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$sodonhang=$this->input->post('sodonhang');
		$linkfb=$this->input->post('linkfb');
		/*
		Xuất ra tên, tuôi, số điện thoại, số đơn hàng, link facebook của nhân viên
		 */
		//echo "tên là:$ten, Tuổi: $tuoi, Số điện thoại: $sdt, Số đơn hàng: $sodonhang, Link facebook: $linkfb";
		echo  "</pre>";
		//Xử lý upload anhavatar được lấy từ nhansu_view.php
		//Tạo một thư mục có trong bai3dulieu mang tên Fileupload
		//anhavatar được lấy từ view nhansu_view có name="anhavatar"
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Xin lỗi, đã có 1 file trùng tên trong ổ cứng.";
		//     $uploadOk = 0;
		// }
		// Check file size, chọn 50Mb
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		    echo "Dung lượng bạn chọn lớn hơn 50Mb.Vui lòng chọn ảnh khác";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Chỉ chấp nhận file jqg, png, jpeg, gif";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Ảnh của bạn chưa upload.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}
		
		$anhavatar= base_url()."Fileupload/".basename( $_FILES["anhavatar"]["name"]);
		//base_url()."Fileupload/".basename( $_FILES["anhavatar"]["name"]) cho biết đường dẫn của ảnh avatar
		//echo "Tên ảnh là:".basename( $_FILES["anhavatar"]["name"]);
		
		/*
		Gọi hàm insertDataToMySQL thông qua nhansu_model.php
		 */
		$this->load->model('nhansu_model');
		if($this->nhansu_model->insertDataToMySQL($ten,$tuoi,$anhavatar,$linkfb,$sodonhang,$sdt))
		{
			//echo "Upload thành công";
			//insert view insert_thanhcong_view.php
			$this->load->view('insert_thanhcong_view');
		}
		else{
			echo "Bạn nên upload lại";
		}
	 }//ket thuc funtion nhansu_add

	public function edit_nhanvien($idnhanvao)
	{
		// echo "bắt đầu code sửa nội dung";
		// echo "$idnhanvao";
		$this->load->model('nhansu_model');
		$ketqua=$this->nhansu_model->getDataById($idnhanvao);//=$dulieudangmang
		$ketquadangmang=array('dulieu'=>$ketqua);
		//đưa dữ liệu sang view
		$this->load->view('edit_nhanvien_view', $ketquadangmang);
	}
	public function delete_nhanvien($idnhapvap)
	{
		//Xoá dữ liệu thông tin nhân viên thông qua id của nhân viên đó
		//Cụ thể xoá dữ liệu thông qua biến $idnhapvao với phương thức deleteDataById của nhansu_model
		$this->load->model('nhansu_model');
		$this->nhansu_model->deleteDataById($idnhapvap);
		$this->load->view('delete_thanhcong_view');
	}

	public function update_nhanvien()
	{
		//lấy dữ liệu từ edit_nhanvien_view.php
		$id=$this->input->post('id');
		$ten=$this->input->post('ten');
		$tuoi=$this->input->post('tuoi');
		$sdt=$this->input->post('sdt');
		$linkfb=$this->input->post('linkfb');
		$sodonhang=$this->input->post('sodonhang');

		/*
		Xử lý upload ảnh avatar
		 */
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Xin lỗi, đã có 1 file trùng tên trong ổ cứng.";
		//     $uploadOk = 0;
		// }
		// Check file size, chọn 50Mb
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		    echo "Dung lượng bạn chọn lớn hơn 50Mb.Vui lòng chọn ảnh khác";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Chỉ chấp nhận file jqg, png, jpeg, gif";
		    //$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Ảnh của bạn chưa upload.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}
		
		$anhavatar= basename( $_FILES["anhavatar"]["name"]);
		//Nếu $anhavtar có giá trị và khác 0 thì nó sẽ dùng điều kiện 2
		/*Tức là nếu có upload lại ảnh ở edit_nhanvien_view thì $anhavatar sẽ là tên của búc ảnh đó(tức $anhavatar có giá trị khác 0)
		Khi đó, qua vòng lệnh if nó sẽ dùng điều kiện 1.
		Nếu ta không upload ảnh ở edit_nhanvien_view thì $anhavatar=0 khi đó qua vòng lệnh if nó sẽ dùng điều kiện 2.
		*/
		if($anhavatar)//Xét xem $anhavatar có bằng 0 hay không
		{
			$anhavatar=base_url()."Fileupload/".basename( $_FILES["anhavatar"]["name"]);//Nếu $anhavatar khác 0 thì dùng trường hợp này
			echo $anhavatar;

		}else
		{
			//echo "Bạn nên upload lại";
			//Nếu $anhavatar=0 thì dùng trường hợp này
			//anhavatar2 được lấy từ type="hidden"
			$anhavatar=$this->input->post('anhavatar2');
			//echo $anhavatar;

		}
		//Xử lý xong up ảnh avatar dựa vào edit_nhanvien_view.php
		//Gọi model nhansu_model để sử dụng phương thức update_nhanvien.php để cập nhật vào cơ sở dữ liệu
		$this->load->model('nhansu_model');
		if($this->nhansu_model->updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang))
		{
			//echo "Bạn update thành công";
			$this->load->view('insert_thanhcong_view');
		}else
		{
			echo "Bạn vui lòng update lại. Đã xảy ra lỗi";
		}
		
		
	}

	
}

/* End of file nhansu_controller.php */
/* Location: ./application/controllers/nhansu_controller.php */