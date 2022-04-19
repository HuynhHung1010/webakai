<?php
	include('config.php');
	session_start();
	if(isset($_GET['login'])){
		$dangxuat = $_GET['login'];
		}else{
			$dangxuat = '';
		}
		if($dangxuat=='dangxuat'){
			session_destroy();
			header('Location: index.php');
		}
?>
<?php
	if(isset($_POST['themnhanvien'])){
		$tennhanvien = $_POST['tennhanvien'];
		$chucvu = $_POST['chucvu'];
        $diachi = $_POST['diachi'];
		$sodienthoai= $_POST['sodienthoai'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql_insert_nhanvien = mysqli_query($con,"INSERT INTO nhanvien(HoTenNV,ChucVu,DiaChi,SoDT,email,password) values ('$tennhanvien','$chucvu','$diachi','$sodienthoai','$email','$password')");
	}elseif(isset($_POST['capnhatnhanvien'])) {
		$id_update = $_POST['id_update'];
		$tennhanvien = $_POST['tennhanvien'];
		$chucvu = $_POST['chucvu'];
        $diachi = $_POST['diachi'];
		$sodienthoai= $_POST['sodienthoai'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql_update_nhanvien =mysqli_query($con,"UPDATE nhanvien SET HoTenNV='$tennhanvien',ChucVu='$chuvu',DiaChi='$diachi',SoDT='$sodienthoai',email='$email',password='$password' WHERE MSNV='$id_update'");
        header('Location:xulynhanvien.php');
    }	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM nhanvien WHERE MSNV='$id'");
	}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhân viên</title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">Đăng xuất</a></p>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Quản lý Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php"> Quản lý danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Quản lý Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	         <a class="nav-link" href="xulykhachhang.php">Quản lý khách hàng</a>
	      </li>
		  <li class="nav-item">
	         <a class="nav-link" href="nhanvienxulydon.php">Nhân Viên Xử lý đơn hàng</a>
	      </li>
		  <li class="nav-item">
	         <a class="nav-link" href="xulynhanvien.php">Quản lý Nhân Viên</a>
	      </li>
	      <li class="nav-item">
	         <a class="nav-link" href="xulydanhgia.php">Quản lý Đánh Giá</a>
	      </li>
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM nhanvien WHERE MSNV='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['MSNV'];
				?>
				<div class="col-md-4">
				<h4>Cập nhật nhân viên</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Họ tên nhân viên</label>
					<input type="text" class="form-control" name="tennhanvien" value="<?php echo $row_capnhat['HoTenNV'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['MSNV'] ?>">
					<label>Chức vụ</label>
					<input type="text" class="form-control" name="chucvu" value="<?php echo $row_capnhat['ChucVu'] ?>"><br>
					<!--<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" value=""><br>-->
					<label>Địa chỉ</label>
					<input type="text" class="form-control" name="diachi" value="<?php echo $row_capnhat['DiaChi'] ?>"><br>
					<label>Số điện thoại</label>
					<input type="text" class="form-control" name="sodienthoai" value="<?php echo $row_capnhat['SoDT'] ?>"><br>
                    <label>Email</label>
					<input type="text" class="form-control" name="email" value="<?php echo $row_capnhat['email'] ?>"><br>
                    <label>Password</label>
					<input type="text" class="form-control" name="password" value="<?php echo $row_capnhat['password'] ?>"><br>

					<input type="submit" name="capnhatnhanvien" value="Cập nhật nhân viên" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm nhân viên</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Họ tên nhân viên</label>
					<input type="text" class="form-control" name="tennhanvien"><br>
					<label>Chức vụ</label>
					<input type="text" class="form-control" name="chucvu" ><br>
					<!--<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" value=""><br>-->
					<label>Địa chỉ</label>
					<input type="text" class="form-control" name="diachi" ><br>
					<label>Số điện thoại</label>
					<input type="text" class="form-control" name="sodienthoai"><br>
                    <label>Email</label>
					<input type="text" class="form-control" name="email" ><br>
                    <label>Password</label>
					<input type="text" class="form-control" name="password" ><br>
                    
					<input type="submit" name="themnhanvien" value="Thêm nhân viên" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê nhân viên</h4>
				<?php
				$sql_select_nv = mysqli_query($con,"SELECT * FROM nhanvien ORDER BY MSNV ASC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên nhân viên</th>
						<th>Chức vụ</th>
                        <th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Password</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_nv = mysqli_fetch_array($sql_select_nv)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_nv['HoTenNV'] ?></td>
						<td><?php echo $row_nv['ChucVu'] ?></td>
                        <td><?php echo $row_nv['DiaChi'] ?></td>
                        <td><?php echo $row_nv['SoDT'] ?></td>
                        <td><?php echo $row_nv['email'] ?></td>
                        <td><?php echo $row_nv['password'] ?></td>
						<td style="width:150px;"><a href="?xoa=<?php echo $row_nv['MSNV'] ?>" class="xoa">Xóa</a> || <a href="xulynhanvien.php?quanly=capnhat&capnhat_id=<?php echo $row_nv['MSNV'] ?>" class="sua">Cập nhật</a></td>
					</tr>
				<?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>