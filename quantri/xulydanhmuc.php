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
	if(isset($_POST['themdanhmuc'])){
		$tendanhmuc = $_POST['danhmuc'];
		$sql_insert = mysqli_query($con,"INSERT INTO loaihanghoa(TenLoaiHang) values ('$tendanhmuc')");
	}elseif(isset($_POST['capnhatdanhmuc'])){
		$id_post = $_POST['id_danhmuc'];
		$tendanhmuc = $_POST['danhmuc'];
		$sql_update = mysqli_query($con,"UPDATE loaihanghoa SET TenLoaiHang='$tendanhmuc' WHERE MaLoaiHang='$id_post'");
		header('Location:xulydanhmuc.php');
	}
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM loaihanghoa WHERE MaLoaiHang='$id'");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh mục</title>
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
	         <a class="nav-link" href="xulykhachhang.php">Quản lý Khách hàng</a>
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
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM loaihanghoa WHERE MaLoaiHang='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				?>
				<div class="col-md-4">
				<h4>Cập nhật danh mục</h4>
				<label>Tên danh mục</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['TenLoaiHang'] ?>"><br>
					<input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['MaLoaiHang'] ?>">
					<!--<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../hinh-sanpham/" height="100" width="80"><br>-->

					<input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?>
				<div class="col-md-4">
				<h4>Thêm danh mục</h4>
				<label>Tên danh mục</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"><br>
					<!--<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>-->
					<input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê danh mục</h4>
				<?php
				$sql_select = mysqli_query($con,"SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC"); 
				?>
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên danh mục</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_category = mysqli_fetch_array($sql_select)){ 
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_category['TenLoaiHang'] ?></td>
						<!--<td><img src="../hinh-sanpham/ height="100" width="80"></td>-->
						<td><a href="?xoa=<?php echo $row_category['MaLoaiHang'] ?>" class="xoa">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row_category['MaLoaiHang'] ?>"class="sua">Cập nhật</a></td>
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