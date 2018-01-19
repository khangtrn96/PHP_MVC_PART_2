<!DOCTYPE html>
<html lang="en">
<head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
 	<div class="container">
 		<div class="text-xs-center">
 			<h3 class="display-3">Danh sách nhân sự</h3>
 		</div>
 	</div>
 	<div class="container">
 		<div class="row">
 		<!--cards:columns-->
 			<div class="card-columns">
				<?php foreach ($dulieuketqua as $value): ?>
					<div class="card">
		 				<img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="Card image cap">
		 				<div class="card-block">
		 					<h4 class="card-title ten"><?= $value['ten'] ?></h4>
		 					<p class="card-text badge badge-secondary tuoi">Age: <cite><?= $value['tuoi'] ?></cite></p>
		 					<p class="card-text sdt">Tel: <cite><?= $value['sdt'] ?></cite></p>
		 					<p class="card-text sodonhang">Number of order have complete: <?= $value['sodonhang'] ?></p>
		 					<p class="card-text linkfb">
		 						<a href="<?= $value['linkfb'] ?>" class="btn btn-secondary btn-center">Facebook <i class="fa fa-chevron-right"></i></a>

								<a href="<?= base_url() ?>/index.php/nhansu_controller/edit_nhanvien/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Edit <i class="fa fa-pencil"></i></a>

								<a href="<?= base_url() ?>/index.php/nhansu_controller/delete_nhanvien/<?= $value['id'] ?>" class="btn btn-outline-danger btn-xs">Xoá <i class="fa fa-remove"></i></a>
		 					</p>	
		 				</div>
		 			</div><!-- div-card -->
	 			
				<?php endforeach ?>

	 		</div><!--div của card column-->

		</div><!--div row-->

		<div class="row">
			<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>/index.php/nhansu_controller/nhansu_add">
				<div class="container">
					<div class="text-xs-center">
						<h3 class="display-3">Thêm mới nhân sự</h3>
						<hr>
					</div>
				</div> <!-- div liên quan đến việc thêm nhân sự -->

				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="anh" class="col-sm-2 form-control-label">Ảnh đại điện</label>
							<div class="col-sm-8">
							<!-- trong trường id thì ta đặt anhavatar trùng với trường lấy ảnh trong phpmyadmin
								. Do chọn ảnh mà ảnh là 1 file nên ta đặt trường type="file"	
							 -->
								<input name="anhavatar" type="file" class="form-control" id="anhavatar" placeholder="Upload file image">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
								<label for="ten" class="col-sm-4 form-control-label">Tên nhân viên</label>
								<div class="col-sm-8">
									<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên">
								</div>
						</div><!-- div để lấy Tên nhân viên -->
					</div>
					
				</div> <!-- div để lấy ảnh avatar và tên nhân viên -->

				<div class="form-group row">
					<div class="col-sm-4">
						<div class="row">
							<label for="tuoi" class="col-sm-4 form-control-label" >Tuổi</label>
							<div class="col-sm-8">
								<input name="tuoi" type="number" class="form-control" id="tuoi"
								placeholder="Tuổi">
							</div>
						</div>
					</div><!-- div để lấy tuổi của nhân viên -->
					<div class="col-sm-4">
						<div class="row">
							<label for="sdt" class="col-sm-4 form-control-label" >Số điện thoại</label>
							<div class="col-sm-8">
								<input name="sdt" type="text" class="form-control" id="sdt"
								placeholder="Số điện thoại">
							</div>
						</div>
					</div><!-- div để lấy Số điện thoại của nhân viên-->
					<div class="col-sm-4">
						<div class="row">
							<label for="sodonhang" class="col-sm-4 form-control-label" >Số đơn hàng</label>
							<div class="col-sm-8">
								<input name="sodonhang" type="number" class="form-control" id="sodonhang"
								placeholder="Số đơn hàng">
							</div>
						</div>
					</div><!-- div để lấy số đơn hàng của nhân viên -->
					<div class="col-sm-4">
						<div class="row">
							<label for="linkfb" class="col-sm-4 form-control-label" >Link facebook</label>
							<div class="col-sm-8">
								<input name="linkfb" type="text" class="form-control" id="linkfb"
								placeholder="nhập link facebook">
							</div>
						</div>
					</div><!-- div để lấy link facebook của nhân viên -->
				</div>

				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Thêm mới</button>
						<button type="reset" class="btn btn-danger">Nhập lại</button>
					</div>
				</div> <!-- div tạo nút Sign in -->
			</form>
		</div>
 	</div><!--div container-->
 	<script>
 		$.ajax({
 			url: '/path/to/file',
 			type: 'default GET (Other values: POST)',
 			dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
 			data: {param1: 'value1'},
 		})
 		.done(function() {
 			console.log("success");
 		})
 		.fail(function() {
 			console.log("error");
 		})
 		.always(function() {
 			console.log("complete");
 		});
 		
 	</script>
</body>
</html>