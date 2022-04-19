<?php
    if(isset($_GET['dangxuat'])){
        $id = $_GET['dangxuat'];
        if($id==1){
            unset($_SESSION['dangnhap_home']);
        }
    }elseif(isset($_POST['thanhtoan'])){
        $name=$_POST['name'];
        $cty=$_POST['cty'];
        $phone=$_POST['phone'];
        $fax=$_POST['fax'];
        $email=$_POST['email'];
        $password=md5 ($_POST['password']);
        $note=$_POST['note'];
        $diachi=$_POST['diachi'];
        $giaohang=$_POST['htthanhtoan'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaydat=date("Y-m-d H:i:s");
        //$sql_khachhang = mysqli_query($con,"INSERT INTO tb_khachhang(Ten,Sodt,SoF,email,giaohang) values ('$name','$phone',''$fax',$email','$giaohang')");
 	    $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(HoTenKH,TenCongTy,SoDienThoai,SoFax,email,password,note,giaohang) values ('$name','$cty','$phone','$fax','$email','$password','$note','$giaohang')");
        if($sql_khachhang){
            $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY MSKH DESC LIMIT 1");
            $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
            $khachhang_id = $row_khachhang['MSKH'];
            $sql_diachi = mysqli_query($con,"INSERT INTO diachi(Diachi,MSKH) values ('$diachi','$khachhang_id')");
            $sql_themdathang = mysqli_query($con,"INSERT INTO dathang(MSKH,NgayDH) values ('$khachhang_id','$ngaydat')");
        }
        if($sql_themdathang){
            $sql_select_donhang = mysqli_query($con,"SELECT * FROM dathang ORDER BY SoDonDH DESC LIMIT 1");
            $row_donhang = mysqli_fetch_array($sql_select_donhang);
            $id_donhang = $row_donhang['SoDonDH'];
            $khachhanggd_id = $row_donhang['MSKH'];
            $sql_huydon=mysqli_query($con,"INSERT INTO huydon (SoDonDH) values ('$id_donhang')");
            for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
                $sanpham_id = $_POST['thanhtoan_product_id'][$i];
                $soluong = $_POST['thanhtoan_soluong'][$i];
                $giasanpham = $_POST['thanhtoan_giasanpham'][$i];
                $mausanpham = $_POST['thanhtoan_mausanpham'][$i];
                $sizesanpham = $_POST['thanhtoan_size'][$i];
                $sql_donhang = mysqli_query($con,"INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang,MaMau,Size) values ('$id_donhang','$sanpham_id','$soluong','$giasanpham','$mausanpham','$sizesanpham')");
                $sql_giaodich = mysqli_query($con,"INSERT INTO giaodich(SoDonDH,MSKH,MSHH,SoLuong,MaMau,SizeHH) values ('$id_donhang','$khachhanggd_id','$sanpham_id','$soluong','$mausanpham','$sizesanpham')");
                $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            }
        }
        echo '<script>alert("Đặt hàng thành công ")</script>';
    }elseif(isset($_POST['thanhtoandangnhap'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaydat=date("Y-m-d H:i:s");
        $khachhang_id = $_SESSION['khachhang_id'];
        $sql_themdathang = mysqli_query($con,"INSERT INTO dathang(MSKH,NgayDH) values ('$khachhang_id','$ngaydat')");
        if($sql_themdathang){
            $sql_select_donhang = mysqli_query($con,"SELECT * FROM dathang ORDER BY SoDonDH DESC LIMIT 1");
            $row_donhang = mysqli_fetch_array($sql_select_donhang);
            $id_donhang = $row_donhang['SoDonDH'];
            $sql_huydon=mysqli_query($con,"INSERT INTO huydon (SoDonDH) values ('$id_donhang')");
            for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
                $sanpham_id = $_POST['thanhtoan_product_id'][$i];
                $soluong = $_POST['thanhtoan_soluong'][$i];
                $giasanpham = $_POST['thanhtoan_giasanpham'][$i];
                $mausanpham = $_POST['thanhtoan_mausanpham'][$i];
                $sizesanpham = $_POST['thanhtoan_size'][$i];
                $sql_donhang = mysqli_query($con,"INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang,MaMau,Size) values ('$id_donhang','$sanpham_id','$soluong','$giasanpham','$mausanpham','$sizesanpham')");
                $sql_giaodich = mysqli_query($con,"INSERT INTO giaodich(SoDonDH,MSKH,MSHH,SoLuong,MaMau,SizeHH) values ('$id_donhang','$khachhang_id','$sanpham_id','$soluong','$mausanpham','$sizesanpham')");
                $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            }
        }
        echo '<script>alert("Đặt hàng thành công ")</script>';
    }
?>
<section class="delivery">
    <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="delivery-top-adress delivery-top-item">
                        <i class="fas fa-map-marker-alt "></i>
                    </div>
                    <div class="delivery-top-payment delivery-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
            </div>
        </div>
    </div>
    <?php 
				if(isset($_SESSION['dangnhap_home'])){
					echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'  <a href="index.php?quanly=giaohang&dangxuat=1">Đăng xuất</a></p>';
				}else{
					echo '';
				}
	?>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <p>Vui lòng chọn địa chỉ giao hàng</p>
                <div class="delivery-content-left-dangnhap row">
                    <i class="fas fa-sign-in-alt"></i>
                    <p> <a href="index.php?quanly=dangnhap">Đăng nhập</a>(Nếu bạn đã có tài khoản của AKAI)</p>
                </div>
                <div class="delivery-content-left-dangky row">
                    <input checked name="loaikhach" type="radio" >
                    <p> <span style="font-weight: bold;">Đăng ký</span> (Tạo mới tài khoản với thông tin bên dưới)</p>
                </div>
                <form action="" method="post">
                    <?php 
                        $sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang");
                        $count_giohang_select = mysqli_num_rows($sql_giohang_select);

                        if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
                            while($row_1 = mysqli_fetch_array($sql_giohang_select)){
                    ?>
                                <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
                                <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
                                <input type="hidden" name="thanhtoan_giasanpham[]" value="<?php echo $row_1['giasanpham'] ?>">
                                <input type="hidden" name="thanhtoan_mausanpham[]" value="<?php echo $row_1['MaMau'] ?>">
                                <input type="hidden" name="thanhtoan_size[]" value="<?php echo $row_1['Size'] ?>">
                                
                            <?php 
                            }
                            ?>
                                <button type="submit" name="thanhtoandangnhap"><a href="index.php?quanly=camon"><p style="font-weight: bold;">ĐẶT HÀNG</p></a></button>
                            <div class="delivery-content-left-button row">
                                <a href="index.php?quanly=giohang"><span>«</span><p>Quay lại giỏ hàng</p></a>
                            </div>
                        <?php
                        } 
                        ?>
                    </form>
                    <?php
			            if(!isset($_SESSION['dangnhap_home'])){ 
			        ?>
                        <div class="delivery-content-left-input-top row">
                        <form action="" method="post">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ tên <span style="color: red;">*</span></label>
                                <input type="text"  name="name" required="">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Tên công ty <span style="color: red;">*</span></label>
                                <input type="text" name="cty">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Số điện thoại<span style="color: red;">*</span></label>
                                <input type="tel"  name="phone" required="" placeholder="VD:0369888899" pattern="[0-9]{10}">
                            </div>
                            
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Số Fax <span style="color: red;">*</span></label>
                                <input type="tel"  name="fax" placeholder="VD:1111777789889" pattern="[0-9]{12}" required="">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Email<span style="color: red;">*</span></label>
                                <input type="text" name="email" placeholder="VD:email@gmail.com" required="">
                            </div>
                            <!--/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/-->
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Password <span style="color: red;">*</span></label>
                                <input type="text"  name="password" required="">
                            </div>
                            
                            <div class="delivery-content-left-input-bottom">
                                <label for="">Địa chỉ <span style="color: red;">*</span></label>
                                <input type="text" name="diachi" required="">
                            </div>
                            <div class="delivery-content-left-input-bottom">
                                <label for="">Ghi chú <span style="color: red;">*</span></label>
                                <textarea style="resize: none;" placeholder="Ghi chú" name="note"></textarea>
                            </div> 
                            <div class="payment-content-right-mnv">
                                <select name="htthanhtoan" >
                                    <option>Chọn hình thức thanh toán</option>
                                    <option value="0">Thanh toán qua ATM</option>
                                    <option value="1">Thanh toán khi nhận hàng</option>
                                </select>
                            </div>
                        </div>   
                        <div class="delivery-content-left-button row">
                            <a href="index.php?quanly=giohang"><span>«</span><p>Quay lại giỏ hàng</p></a>
                            <?php
                                $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id");
                                while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){ 
                            ?>
                                <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                                <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                                <input type="hidden" name="thanhtoan_giasanpham[]" value="<?php echo $row_thanhtoan['giasanpham'] ?>">
                                <input type="hidden" name="thanhtoan_mausanpham[]" value="<?php echo $row_thanhtoan['MaMau'] ?>">
                                <input type="hidden" name="thanhtoan_size[]" value="<?php echo $row_thanhtoan['Size'] ?>">
                            <?php
                                } 
                            ?>
                            <!--<input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%" value="Thanh toán">-->
                            <button type="submit" name="thanhtoan"><a href="index.php?quanly=camon"><p style="font-weight: bold;">ĐẶT HÀNG</p></a></button>
                            <button type="submit" name="thanhtoan"><a href="index.php?quanly=camon"><p style="font-weight: bold;">THANH TOÁN ONLINE</p></a></button>
                        </div>
                    </form>
                </div>
                <?php
                    }
                ?>
                <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                        $tongtien=0;
                        $tongtientam=0;
                        $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id");
                        while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){
                            $tiensp = $row_thanhtoan['soluong'] * $row_thanhtoan['giasanpham'];
                            $tongtientam+=$tiensp;
                            $tongtien=$tongtientam+69000;

                    ?>
                    <tr>
                        <td><?php echo $row_thanhtoan['tensanpham']?></td>
                        <td></td>
                        <td><?php echo $row_thanhtoan['soluong']?></td>
                        <td><p><?php echo number_format($row_thanhtoan['giasanpham'])?><sup>đ</sup></p></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng</td>
                        <td style="font-weight: bold;"><p><?php echo number_format($tongtientam) ?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Thuế VAT</td>
                        <td style="font-weight: bold;"><p>69,000 <sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                        <td style="font-weight: bold;"><p><?php echo number_format($tongtien) ?><sup>đ</sup></p></td>
                    </tr>
                </table>
                </div>
            </div>       
        </div>
    </section>