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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhân viên xử lý đơn hàng</title>
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
			
			<div class="col-md-12">
				<h4>Nhân viên xử lý đơn hàng</h4>
				<?php
				$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang,diachi,dathang,nhanvien WHERE tbl_khachhang.MSKH=diachi.MSKH AND  tbl_khachhang.MSKH=dathang.MSKH AND dathang.MSNV=nhanvien.MSNV  GROUP BY dathang.SoDonDH ORDER BY tbl_khachhang.MSKH DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
                        <th>Tên nhân viên</th>
                        <th>Chức vụ nhân viên</th>
                        <th>Điạ chỉ nhân viên</th>
                        <th>Số điện thoại nhân viên</th>
                        <th>Email Nhân viên</th>
						<th>Tên khách hàng</th>
						<th>Địa chỉ khách hàng</th>
						<th>Ngày mua</th>
                        <th>Ngày giao hàng</th>
						<th style="width:120px">Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td style="color:black;font-weight:bold;"><?php echo $row_khachhang['HoTenNV']; ?></td>
                        <td><?php echo $row_khachhang['ChucVu']; ?></td>
						<td><?php echo $row_khachhang['DiaChi']; ?></td>
                        <td><?php echo $row_khachhang['SoDT']; ?></td>
                        <td><?php echo $row_khachhang['email'] ?></td>
                        <td><?php echo $row_khachhang['HoTenKH']; ?></td>
						<td><?php echo $row_khachhang['Diachi']; ?></td>
						<td><?php echo $row_khachhang['NgayDH'] ?></td>
                        <td><?php echo $row_khachhang['NgayGH'] ?></td>
						<td><a href="?quanly=xemgiaodich&khachhang=<?php echo $row_khachhang['SoDonDH'] ?>" class="xem">Xem chi tiết</a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>

			<div class="col-md-12">
				<h4>Liệt kê lịch sử đơn hàng đã xử lý</h4>
				<?php
				if(isset($_GET['khachhang'])){
					$magiaodich = $_GET['khachhang'];
				}else{
					$magiaodich = '';
				}
				$sql_select = mysqli_query($con,"SELECT * FROM giaodich,tbl_khachhang,hanghoa,mauhh WHERE giaodich.MSHH=hanghoa.MSHH AND tbl_khachhang.MSKH=giaodich.MSKH AND mauhh.MSHH=hanghoa.MSHH AND  giaodich.SoDonDH='$magiaodich' ORDER BY giaodich.MaGD DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã đơn hàng giao dịch</th>
						<th>Tên sản phẩm</th>
                        <th>Số lượng đặt </th>
						<th>Màu sản phẩm</th>
						<th>Size </th>
                        <th>Tổng tiền</th>
						<th>Ngày đặt</th>
						
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td style="color:red;font-weight:bold;"><?php echo $row_donhang['SoDonDH']; ?></td>
					
						<td><?php echo $row_donhang['TenHH']; ?></td>

                        <td><?php echo $row_donhang['SoLuong']; ?></td>

						<td><?php echo $row_donhang['TenMau']; ?></td>

						<td><?php echo $row_donhang['SizeHH']; ?></td>

                        <td style="color:red;font-weight:bold;"><?php echo number_format($row_donhang['SoLuong']*$row_donhang['Gia']).'<sup>đ</sup>'; ?></td>
						
						<td><?php echo $row_donhang['NgayDat'] ?></td>
					
					
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