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
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$baoquan = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../hinh-sanpham/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO hanghoa(TenHH,QuyCach,BaoQuan,Gia,SoLuongHang,image,MaLoaiHang) values ('$tensanpham','$mota','$baoquan','$gia','$soluong','$hinhanh','$danhmuc')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$baoquan = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../hinh-sanpham/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE hanghoa SET TenHH='$tensanpham',QuyCach='$mota',BaoQuan='$baoquan',Gia='$gia',SoLuongHang='$soluong',MaLoaiHang='$danhmuc' WHERE MSHH='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE hanghoa SET TenHH='$tensanpham',QuyCach='$mota',BaoQuan='$baoquan',Gia='$gia',SoLuongHang='$soluong',image='$hinhanh',MaLoaiHang='$danhmuc' WHERE MSHH='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM hanghoa WHERE MSHH='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
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
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM hanghoa WHERE MSHH='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['MaLoaiHang'];
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['TenHH'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['MSHH'] ?>">
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../hinh-sanpham/<?php echo $row_capnhat['image'] ?>" height="100" width="80"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['Gia'] ?>"><br>
					<!--<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" value=""><br>-->
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['SoLuongHang'] ?>"><br>
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['QuyCach'] ?></textarea><br>
    
					<label>Bảo quản</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['BaoQuan'] ?></textarea><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['MaLoaiHang']){
						?>
						<option selected value="<?php echo $row_danhmuc['MaLoaiHang'] ?>"><?php echo $row_danhmuc['TenLoaiHang'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['MaLoaiHang'] ?>"><?php echo $row_danhmuc['TenLoaiHang'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
					<!--<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>-->
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
					<label>Mô tả</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Bảo quản</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['MaLoaiHang'] ?>"><?php echo $row_danhmuc['TenLoaiHang'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê sản phẩm</h4>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM hanghoa,loaihanghoa WHERE hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang ORDER BY hanghoa.MSHH ASC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Danh mục</th>
						<th>Giá sản phẩm</th>
						<!--<th>Giá khuyến mãi</th>-->
						<th style="width: 150px">Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['TenHH'] ?></td>
						<td><img src="../hinh-sanpham/<?php echo $row_sp['image'] ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['SoLuongHang'] ?></td>
						<td><?php echo $row_sp['TenLoaiHang'] ?></td>
						<td><?php echo number_format($row_sp['Gia']).'đ' ?></td>
						<td><a href="?xoa=<?php echo $row_sp['MSHH'] ?>" class="xoa">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['MSHH'] ?>" class="sua" >Cập nhật</a></td>
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