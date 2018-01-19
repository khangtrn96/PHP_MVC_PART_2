<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row">
					<h3 class="text-xs-center display-3">Sửa thông tin nhân viên</h3>
				</div>
			</div>
		</div>

		<div class="row">
			<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>/index.php/nhansu_controller/update_nhanvien">
				<?php foreach ($dulieu as $value): ?>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6 ">
								<div class="row">
									<label for="anhavatar" class="col-sm-4 form-control-label">Ảnh đại diện</label>
									
									<div class="col-sm-8">
										<input type="hidden" name="id" class="form-control" value="<?= $value['id'] ?>">
										<input name="anhavatar2" type="text" class="form-control"  placeholder="" value="<?= $value['anhavatar'] ?>">

										<img src="<?= $value['anhavatar'] ?>" alt="" class="img-fluid">

										<input name="anhavatar" type="file" class="form-control" 
										id="anhavatar" placeholder="sdfsdf">
									</div>
								</div>
							</div>
							<div class="col-xs-6 ">
								<div class="row">
									<label for="ten" class="col-sm-4 form-control-label">Tên nhân viên</label>
									<div class="col-sm-8">
										<input name="ten"value="<?= $value['ten'] ?>" type="text" class="form-control" id="ten" placeholder="Họ và tên">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4 row">
							<label for="tuoi" class="col-sm-2 form-control-label">Tuổi</label>
							<div class="col-sm-10">
								<input name="tuoi"value="<?= $value['tuoi'] ?>" type="text" class="form-control" id="tuoi" placeholder="">
							</div>
						</div>
						<div class="col-sm-4 row">
							<label for="sdt" class="col-sm-2 form-control-label">Số điện thoại</label>
							<div class="col-sm-10">
								<input name="sdt" value="<?= $value['sdt'] ?>" type="text" class="form-control" id="sdt" placeholder="">
							</div>
						</div>
						<div class="col-sm-4 row">
							<label for="sodonhang" class="col-sm-2 form-control-label">Số đơn hàng</label>
							<div class="col-sm-10">
								<input name="sodonhang" value="<?= $value['sodonhang'] ?>" type="text" class="form-control" id="sodonhang" placeholder="">
							</div>
						</div>
						<div class="col-sm-4 row">
							<label for="linkfb" class="col-sm-2 form-control-label">Link facebook</label>
							<div class="col-sm-10">
								<input name="linkfb" value="<?= $value['linkfb'] ?>" type="text" class="form-control" id="linkfb" placeholder="">
							</div>
						</div>
					</div>
				<?php endforeach ?>
				
		
				
				<div class="form-group row">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-secondary">Lưu <i class="fa fa-floppy-o"></i></button>
						<button type="reset" class="btn btn-outline-danger">Nhập lại <i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>