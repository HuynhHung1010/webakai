<?php
    if(isset($_POST['themgiohang'])){
        $tensanpham=$_POST['tensanpham'];
        $sanpham_id=$_POST['sanpham_id'];
        $size=$_POST['size'];
        $mausanpham=$_POST['mausanpham'];
        $gia=$_POST['giasanpham'];
        $hinhanh=$_POST['hinhanh'];
        $soluong=$_POST['soluong'];
        //$sql_giohang=mysqli_query($con,"INSERT INTO chitietdathang (MSHH,SoLuong,GiaDatHang,GiamGia) values ('$sanpham_id','$soluong','$giasanpham','$giamgia') ");
        $sql_kiemtra_sl=mysqli_query($con,"SELECT * FROM hanghoa WHERE MSHH='$sanpham_id'");
        $row_kiemtra=mysqli_fetch_array($sql_kiemtra_sl);
        $soluong_ton=$row_kiemtra['SoLuongHang'];
        if($soluong_ton>0 && $soluong_ton-$soluong>=0){
            $sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            $count = mysqli_num_rows($sql_select_giohang);
            if($count>0){
                $row_sanpham = mysqli_fetch_array($sql_select_giohang);
                $soluong = $row_sanpham['soluong'] + 1;
                $sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
            }else{
                $soluong = $soluong;
                $sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong,MaMau,Size) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$mausanpham','$size')";
            }
            $insert_row = mysqli_query($con,$sql_giohang);
            if($insert_row==0){
                    header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
            }
        }else{
            echo '<script>alert("Sản Phẩm Này Hiện tại Đã Hết Hàng")</script>';
        }
    }elseif(isset($_POST['capnhatsoluong'])){
        for($i=0;$i<count($_POST['product_id']);$i++){
            $sanpham_id = $_POST['product_id'][$i];
            $soluong = $_POST['soluong'][$i];
                /*if($soluong<=0){
                    $sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
                }else{*/
            $sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
                
            }
       
    }elseif(isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $sql_delete=mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id='$id'");
            //header('Location:index.php?quanly=giohang');

    }
        
?>
<?php
    $sql_lay_giohang=mysqli_query($con,"SELECT * FROM tbl_giohang,mauhh WHERE mauhh.MaMau=tbl_giohang.MaMau ORDER BY giohang_id");
?>
<section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                <form action="" method="POST">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                            <th>Quản lý</th>
                        </tr>
                        <?php
                        $i=0;
                        $tongtien=0;
                        $giafreeship=0;
                            while($row_fetch_giohang=mysqli_fetch_array($sql_lay_giohang)){
                                $tiensp = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                                $tongtien+=$tiensp;
                                $i++;
                        ?>
                        <tr>
                            <td><img src="image/<?php echo $row_fetch_giohang['hinhanh']?>" alt="không thể hiển thị" style="height=100px;width:80px;"></td>
                            <td><p><?php echo $row_fetch_giohang['tensanpham'] ?></p></td>
                            <td><p style="color:red;font-weight:bold;"><?php echo $row_fetch_giohang['TenMau'] ?></p></td>
                            <td><p><?php echo $row_fetch_giohang['Size'] ?></p>
                            </td>
                            <td><input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                <input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
                            </td>
                            <td><p><b><?php echo number_format($row_fetch_giohang['giasanpham'])?> <sup>đ</sup></b></p></td>
                            <td>
                                <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id']?>"><i class="fal fa-times-octagon"></i>Xóa</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <?php
                                $sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang");
                                $count = mysqli_num_rows($sql_select_giohang);
                                if($count>0){
                                    echo '<td class="capnhat" colspan="7"><input type="submit" value="CẬP NHẬT GIỎ HÀNG" name="capnhatsoluong"></td>';
                                }else{
                                    echo'';
                                }
                            ?>
                        </tr>
                    </table>
                </form>
                </div>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            <td><?php echo number_format($i) ?></td>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            <td><p><?php echo number_format($tongtien)?><sup>đ</sup></p></td>
                        </tr>
                        <tr>
                            <td>TẠM TÍNH</td>
                            <td><p style="color: black; font-weight: bold;"><?php echo number_format($tongtien)?><sup>đ</sup></p></td>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 500.000 <sup>đ</sup></p>
                        <?php 
                            if($tongtien<500000){
                                $giafreeship=500000-$tongtien;
                                echo '<p style="color: red; font-weight: bold;">Mua thêm <span style="font-size: 18px;">'.number_format($giafreeship).'<sup>đ</sup></span> để được miễn phí SHIP</p>';
                            }else{
                                echo'';
                            }
                        ?>
                        <!--
                        <p style="color: red; font-weight: bold;">Mua thêm <span style="font-size: 18px;">
                            <sup>đ</sup></span> để được miễn phí SHIP</p>-->
                    </div>
                    <div class="cart-content-right-button">
                        <button class="home"><a href="index.php"> TIẾP TỤC MUA SẮM</a></button>
                        <button class="giaohang"><a href="index.php?quanly=giaohang"> THANH TOÁN</a></button>
                    </div>
                    <div class="cart-content-right-dangnhap">
                        <p>TÀI KHOẢN AKAI</p> <br>
                        <p>Hãy <a href="index.php?quanly=dangnhap">Đăng nhập</a>tài khoản của bạn để tích điểm thành viên</p>
                    
                    </div>
            </div>
            </div>
        </div>
    </section>