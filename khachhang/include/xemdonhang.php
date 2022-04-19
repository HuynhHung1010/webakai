<?php
    if(isset($_GET['dangxuat'])){
        $id = $_GET['dangxuat'];
        if($id==1){
            unset($_SESSION['dangnhap_home']);
        }
	}
?>
<?php
	if(isset($_GET['huydon'])&& isset($_GET['magiaodich'])){
		$huydon = $_GET['huydon'];
		$magiaodich = $_GET['magiaodich'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_giaodich = mysqli_query($con,"UPDATE huydon SET HuyDon='$huydon' WHERE SoDonDH='$magiaodich'");
?>
<?php
	if(isset($_POST['capnhatdanhgia'])){
		$magiaodich=$_POST['magiaodich'];
		$makhachhang=$_POST['makhachhang'];
		$tinhtrang=1;
		for($i=0;$i<count($_POST['mahanghoa']);$i++){
			$mahanghoa = $_POST['mahanghoa'][$i];
			$danhgia=$_POST['star'][$i];
			$nhanxet=$_POST['nhanxet'][$i];
			$sql_danhgia=mysqli_query($con,"INSERT INTO danhgia(SoDonDH,MSKH,MSHH,DanhGia,NhanXet,TinhTrangDG) values ('$magiaodich','$makhachhang','$mahanghoa','$danhgia','$nhanxet','$tinhtrang')");
		}
		echo '<script>alert("Bạn đã đánh giá thành công...!")</script>';
	}
?>

<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<?php 
							if(isset($_SESSION['dangnhap_home'])){
								echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'  <a href="index.php?quanly=giaohang&dangxuat=1">Đăng xuất</a></p>';
							}else{
								echo '';
							}
						?>
							<div class="row">
								<?php
								if(isset($_SESSION['dangnhap_home'])){
									echo 'Lịch sử Đơn hàng đã đặt của: '.$_SESSION['dangnhap_home'];
								} 
								?>
							<div class="col-md-12">
								
								<?php
								if(isset($_GET['khachhang'])){
									$id_khachhang = $_GET['khachhang'];
								}else{
									$id_khachhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM giaodich,huydon WHERE giaodich.SoDonDH=huydon.SoDonDH AND giaodich.MSKH='$id_khachhang' GROUP BY giaodich.SoDonDH"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
									
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<th>Yêu cầu hủy đơn</th>
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['SoDonDH']; ?></td>
									
										
										<td><?php echo $row_donhang['NgayDat'] ?></td>
										<td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['SoDonDH'] ?>">Xem chi tiết</a></td>
										<td><?php 
										if($row_donhang['TinhTrang']==0){
											echo 'Đã đặt hàng';
										}else{
											echo 'Đã xử lý | Đang giao hàng';
										}
										?></td>
										<td>
											<?php
											if($row_donhang['TinhTrang']==0){
												if($row_donhang['HuyDon']==0){ 
												?>
												<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['SoDonDH'] ?>&huydon=1">Yêu cầu hủy</a>
												<?php
												}elseif($row_donhang['HuyDon']==1){											
												?>
												<p>Đang chờ hủy...</p>
												<?php
												}else{
													echo 'Đã hủy';
												}
												?>
											<?php
											}else{
													echo 'Đang giao hàng';	
												}
											?>
										</td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>


							<div class="col-md-12">
								<p>Chi tiết đơn hàng</p><br>
								<?php
								if(isset($_GET['magiaodich'])){
									$magiaodich = $_GET['magiaodich'];
								}else{
									$magiaodich = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM giaodich,tbl_khachhang,hanghoa,mauhh WHERE giaodich.MSHH=hanghoa.MSHH AND tbl_khachhang.MSKH=giaodich.MSKH AND hanghoa.MSHH=mauhh.MSHH AND giaodich.SoDonDH='$magiaodich' ORDER BY giaodich.MaGD DESC"); 
								?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã đơn hàng giao dịch</th>
										<th>Sản phẩm</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Màu sản phẩm</th>
										<th>Size </th>
										<th>Giá tiền</th>
										<th>Ngày đặt</th>
										
									</tr>
									<?php
									$i = 0;
									$tongtien=0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$tiensp = $row_donhang['SoLuong'] * $row_donhang['Gia'];
                        				$tongtien+=$tiensp;
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['SoDonDH']; ?></td>

										<td><img src="image/<?php echo $row_donhang['image']?>" alt="không thể hiển thị" style="height=100px;width:80px;"></td>
									
										<td><?php echo $row_donhang['TenHH']; ?></td>

										<td><?php echo $row_donhang['SoLuong']; ?></td>

										<td><?php echo $row_donhang['TenMau']; ?></td>

										<td><?php echo $row_donhang['SizeHH']; ?></td>

										<td style="font-size:17px;font-weight:bold;"><?php echo number_format($row_donhang['SoLuong']*$row_donhang['Gia']).'<sup>đ</sup>'; ?></td>
										
										<td><?php echo $row_donhang['NgayDat'] ?></td>
									
										
									</tr>
									<?php 
										$sql_danhgia=mysqli_query($con,"SELECT * FROM danhgia");
						
										$row_danhgia = mysqli_fetch_array($sql_danhgia)
		
									?>
										<?php
											if($row_danhgia['SoDonDH']!=$row_donhang['SoDonDH']&&$row_danhgia['MSHH']!=$row_donhang['MSHH']){
											
										?>
									<tr>
										<td style="font-size:15px;font-weight:bold;color:red">Đánh giá<span style="color: red;">*</span></td>
										<td colspan="8">
											<div class="stars">
												<form action="" method="post">
													<input class="star star-5" id="star-5" type="radio" name="star[]" value="5"/>
													<label class="star star-5" for="star-5"></label>
													<input class="star star-4" id="star-4" type="radio" name="star[]" value="4"/>
													<label class="star star-4" for="star-4"></label>
													<input class="star star-3" id="star-3" type="radio" name="star[]" value="3"/>
													<label class="star star-3" for="star-3"></label>
													<input class="star star-2" id="star-2" type="radio" name="star[]" value="2"/>
													<label class="star star-2" for="star-2"></label>
													<input class="star star-1" id="star-1" type="radio" name="star[]" value="1"/>
													<label class="star star-1" for="star-1"></label>
											</div>
										</td>
									</tr>
													<input type="hidden" name="mahanghoa[]" value="<?php echo $row_donhang['MSHH'] ?>">
													<input type="hidden" name="magiaodich" value="<?php echo $row_donhang['SoDonDH'] ?>">
													<input type="hidden" name="makhachhang" value="<?php echo $_SESSION['khachhang_id'] ?>">
									<tr>
										<td style="font-size:15px;font-weight:bold;color:red">Nhận xét<span style="color: red;">*</span></td>
										<td colspan="7">
                                			<textarea style="resize: none;" rows="4" cols="80" placeholder="Nhận xét..." name="nhanxet[]"></textarea>
										</td>
										<td><input type="submit" name="capnhatdanhgia" value="Đánh giá" style="background-color:black;color:white"></td>
									</tr>
									</form>
											<?php
												}else{
													echo '';
												}
											
											?>
									 <?php
										} 
									?> 
									<tr>
										<td style="color:blue;">Tổng tiền đơn hàng</td>
										<td colspan="8" style="font-size:17px;font-weight:bold;"><?php echo number_format($tongtien)?><sup>đ</sup></td>
									</tr>
								</table>
							</div>
							</div>

						
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>
	<!-- //top products -->