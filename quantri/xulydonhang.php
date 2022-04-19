<?php
	session_start();
	include('config.php');
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
if(isset($_POST['capnhatdonhang'])){
	$xuly = $_POST['xuly'];
	$madonhang = $_POST['madonhang_xuly'];
	$masohang=$_POST['mahanghoa'];
	$ngaydat= $_POST['ngaydat'];
	$ngaygiao=$_POST['ngaygiao'];
	$manhanvien=$_POST['manhanvien'];
	$soluong=$_POST['sldat'];
	$tongtien=$_POST['tongtien'];
	$soluongban=$_POST['slban'];
	$sql_update_donhang = mysqli_query($con,"UPDATE dathang SET TrangThaiDH='$xuly' WHERE SoDonDH='$madonhang'");
	$sql_update_giaodich = mysqli_query($con,"UPDATE huydon SET TinhTrang='$xuly' WHERE SoDonDH='$madonhang'");
	$sql_update_soluong = mysqli_query($con,"UPDATE hanghoa SET SoLuongHang='$soluong' WHERE MSHH='$masohang'");
	$sql_tongtien=mysqli_query($con,"INSERT INTO doanhthu SET (MSHH,NgayGH,TongTien,SoLuongBan) value('$masohang','$ngaygiao','$tongtien','$soluongban')");
	if($ngaygiao>=$ngaydat){
		$sql_giaohang=mysqli_query($con,"UPDATE dathang SET MSNV='$manhanvien',NgayGH='$ngaygiao' WHERE SoDonDH='$madonhang'");
	}
}
?>
<?php
	if(isset($_GET['xoadonhang'])){
		$madonhang = $_GET['xoadonhang'];
		$sql_delete = mysqli_query($con,"DELETE FROM dathang WHERE SoDonDH='$madonhang'");
		$sql_delete = mysqli_query($con,"DELETE FROM chitietdathang WHERE SoDonDH='$madonhang'");
		header('Location:xulydonhang.php');
	} 
	if(isset($_GET['xacnhanhuy'])&& isset($_GET['madonhang'])){
		$huydon = $_GET['xacnhanhuy'];
		$magiaodich = $_GET['madonhang'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_giaodich = mysqli_query($con,"UPDATE huydon SET HuyDon='$huydon' WHERE SoDonDH='$magiaodich'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
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
	<div class="container-fluid">
		<div class="row">
			 <?php
			if(isset($_GET['quanly'])=='xemdonhang'){
				$madonhang = $_GET['madonhang'];
				$sql_xemchitiet = mysqli_query($con,"SELECT * FROM chitietdathang,hanghoa,dathang,mauhh,tbl_khachhang,diachi WHERE dathang.SoDonDH=chitietdathang.SoDonDH AND chitietdathang.MSHH=hanghoa.MSHH AND hanghoa.MSHH=mauhh.MSHH 
					AND dathang.MSKH=tbl_khachhang.MSKH AND tbl_khachhang.MSKH=diachi.MSKH AND chitietdathang.SoDonDH='$madonhang'");
				?>
				<div class="col-md-7">
				<p>Xem chi tiết đơn hàng</p>
			<form action="" method="POST">
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã số đơn hàng</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Màu</th>
						<th>Size</th>
						<th>Giá</th>
						<th>Tổng tiền</th>
						<th>Ngày đặt</th>

						
						<!-- <th>Quản lý</th> -->
					</tr>
					<?php
					$tongtien=0;
					$soluong=0;
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_xemchitiet)){ 
						$tiensp = $row_donhang['SoLuong'] * $row_donhang['Gia'];
                        $tongtien+=$tiensp;
						$i++;
						$diachi=$row_donhang['Diachi'];
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_donhang['SoDonDH']; ?></td>
						
						<td><?php echo $row_donhang['TenHH']; ?></td>
						<td><?php echo $row_donhang['SoLuong']; ?></td>
						<td><?php echo $row_donhang['TenMau']; ?></td>
						<td><?php echo $row_donhang['Size']; ?></td>
						<td><?php echo number_format($row_donhang['GiaDatHang']); ?></td>
						<td><?php echo number_format($row_donhang['SoLuong']*$row_donhang['GiaDatHang']).'đ'; ?></td>
						
						<td><?php echo $row_donhang['NgayDH'] ?></td>
						<input type="hidden" name="ngaydat" value="<?php echo $row_donhang['NgayDH'] ?>">
						<input type="hidden" name="slban" value="<?php echo $row_donhang['SoLuong'] ?>">
						<input type="hidden" name="sldat" value="<?php echo $row_donhang['SoLuongHang']-$row_donhang['SoLuong'] ?>">
						<input type="hidden" name="mahanghoa" value="<?php echo $row_donhang['MSHH'] ?>">
						<input type="hidden" name="madonhang_xuly" value="<?php echo $row_donhang['SoDonDH'] ?>">
						<input type="hidden" name="manhanvien" value="<?php echo $_SESSION['admin_id'] ?>">
						<input type="hidden" name="tongtien" value="<?php echo $row_donhang['SoLuong']*$row_donhang['GiaDatHang'] ?>">
						<!-- <td><a href="?xoa=<?php echo $row_donhang['donhang_id'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem đơn hàng</a></td> -->
					</tr>
					 <?php
					} 
					?> 
					<tr>
					<td>Tổng tiền đơn hàng</td>
					<td colspan="8" style="font-size:18px;font-weight:bold;color:blue;"><?php echo number_format($tongtien)?><sup>đ</sup></td>
					</tr>
					<tr>
					<td>Địa chỉ giao hàng</td>
					<td colspan="8" style="font-size:18px;font-weight:bold;color:red;"><?php echo $diachi ?></td>
					</tr>
					<tr>
					<td>Ngày giao hàng</td>
					<td colspan="8"><input type="datetime-local" name="ngaygiao" min="<?php echo $row_donhang['NgayDH']?>"></td>
					</tr>
				</table>

				<select class="form-control" name="xuly">
					<option value="1">Đã xử lý | Giao hàng</option>
					<option value="0">Chưa xử lý</option>
				</select><br>

				<input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
			</form>
				</div>  
			<?php
			}else{
				?> 
				
				<div class="col-md-7">
					<p>Đơn hàng</p>
				</div>  
				<?php
			} 
			
				?> 
			<div class="col-md-5">
				<h4>Liệt kê đơn hàng</h4>
				<?php
				$sql_select = mysqli_query($con,"SELECT * FROM hanghoa,tbl_khachhang,dathang,chitietdathang,giaodich,huydon WHERE chitietdathang.MSHH=hanghoa.MSHH AND chitietdathang.SoDonDH=dathang.SoDonDH AND dathang.MSKH=tbl_khachhang.MSKH AND dathang.SoDonDH=giaodich.SoDonDH AND dathang.SoDonDH=huydon.SoDonDH GROUP BY dathang.SoDonDH;"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã đơn đặt hàng</th>
						<th>Tình trạng đơn hàng</th>
						<th>Tên khách hàng</th>
						<th>Ngày đặt</th>
						<th>Ngày giao</th>
						<th>Ghi chú</th>
						<th>Hủy đơn</th>
						<th style="width:150px">Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_donhang['SoDonDH']; ?></td>
						<td><?php
							if($row_donhang['TrangThaiDH']==0){
								echo 'Chưa xử lý';
							}else{
								echo 'Đã xử lý';
							}
						?></td>
						<td><?php echo $row_donhang['HoTenKH']; ?></td>
						
						<td><?php echo $row_donhang['NgayDH'] ?></td>
						<td><?php echo $row_donhang['NgayGH'] ?></td>
						<td><?php echo $row_donhang['note'] ?></td>
						<td><?php if($row_donhang['HuyDon']==0){ }elseif($row_donhang['HuyDon']==1){
							echo '<a href="xulydonhang.php?quanly=xemdonhang&madonhang='.$row_donhang['SoDonDH'].'&xacnhanhuy=2">Xác nhận hủy đơn</a>';
						}else{
							echo 'Đã hủy';
						} 
						?></td>
					
						<td><a href="?xoadonhang=<?php echo $row_donhang['SoDonDH'] ?>" class="xoa">X</a> || <a href="?quanly=xemdonhang&madonhang=<?php echo $row_donhang['SoDonDH'] ?>" class="xem">Xem </a></td>
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