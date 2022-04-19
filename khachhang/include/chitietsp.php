<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id='';
    }
    $sql_chitiet=mysqli_query($con,"SELECT * FROM hanghoa,mauhh WHERE hanghoa.MSHH=mauhh.MSHH AND hanghoa.MSHH ='$id'");
    //$sql_chitiet = mysqli_query($con,"SELECT * FROM hanghoa WHERE MSHH='$id'"); 
    while($row_chitiet=mysqli_fetch_array($sql_chitiet)){
?>
<section class="product">
        <div class="container">
            <div class="product-top row">
                <p><a href="index.php">Trang chủ</a></p> <span>⟶</span> <p> <a href="index.php"> Sản phẩm</a></p> <span>⟶</span> <p class="acti"><?php echo $row_chitiet['TenHH']?></p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="image/<?php echo $row_chitiet['image']?>" alt="không thể hiển thị">
                    </div>
                    <div class="product-content-left-small-img">
                    <?php
                        $sql_image=mysqli_query($con,"SELECT * FROM hinhhanghoa WHERE MSHH='$id'");
                        while($row_image=mysqli_fetch_array($sql_image)){
                    ?>
                        <img src="image/<?php echo $row_image['Tenhinh']?>" alt="không thể hiển thị">   
                    <?php
                        }
                    ?> 
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $row_chitiet['TenHH']?></h1>
                        <p>MSP: SP0<?php echo $row_chitiet['MSHH']?></p>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?php echo number_format($row_chitiet['Gia'])?><sup>đ</sup></p>
                    </div>
                    <div class="product-content-right-product-color">
                        <p><span style="font-weight: bold;">Màu sắc</span>: <?php echo $row_chitiet['TenMau']?> <span style="color: red;">*</span></p>
                        <div class="product-content-right-product-color-img">
                            <img src="image/<?php echo $row_chitiet['Hinh']?>" alt="không thể hiển thị">
                        </div>
                    </div>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold;">Size:</p>
                        <form action="index.php?quanly=giohang" method="post">
                            <div class="size">
                                <span><input type="radio" name="size" value="S">S</span>
                                <span><input type="radio" name="size" value="M">M</span>
                                <span><input type="radio" name="size" value="L">L</span>
                                <span><input type="radio" name="size" value="XL">XL</span>
                                <span><input type="radio" name="size" value="XXL">XXL</span>
                            </div>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng:</p>
                            <input type="number" name="soluong" min="1" value="1"> 
                    </div>
                    <p style="color: red;">Vui lòng chọn size</p>
                                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['MSHH'] ?>" />
								<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['TenHH'] ?>" />
                                <input type="hidden" name="mausanpham" value="<?php echo $row_chitiet['MaMau'] ?>" />
								<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['Gia'] ?>" />
								<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['image'] ?>" />
								<!--<input type="hidden" name="soluong" value="1" />
                                <button type="submit" name="themgiohang" ><i class="fas fa-shopping-cart"></i><p>MUA HÀNG</p></button>-->
                                <input type="submit" name="themgiohang" value="+ Thêm giỏ hàng" class="button" />	
                        </form>
                    <!--
                    <div class="product-content-right-product-button">	   
                        <button><p>TÌM TẠI CỬA HÀNG</p></button>
                    </div>-->
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"></i> <p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i> <p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            ∨
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                        <p style="font-weight: bold;">Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                        <p style="font-weight: bold;">Bảo quản</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?php echo $row_chitiet['QuyCach']?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    <?php echo $row_chitiet['BaoQuan'] ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
<?php
    }
?>
    <!-- "product-related"------------------- -->
    <!--
    <section class="product-related container">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
        <div class=" row product-content">
            <div class="product-related-item">
                <a href="product-sp0002.html">
                    <img src="aothunxam1.jpg" alt="không thể hiển thị">
                </a>
                <h1>ÁO THUN TAY ÁO PHÔÍ TÚI MS SP000002</h1>
                <p>499.000<sup>đ</sup></p>
            </div>
            <div class="product-related-item">
                <a href="product-sp0003.html">
                    <img src="ao-caro4.jpg" alt="không thể hiển thị">
                </a>
                <h1>ÁO THUN HỌA TIẾT ĐỘNG VẬT MS SP000003</h1>
                <p>289.000<sup>đ</sup></p>
            </div>
            <div class="product-related-item">
                <a href="product-sp0004.html">
                    <img src="aothunden1.jpg" alt="không thể hiển thị">
                </a>
                <h1>ÁO THUN AKAI MEN MS SP000004</h1>
                <p>399.000<sup>đ</sup></p>
            </div>
            <div class="product-related-item">
                <a href="product-sp0005.html">
                    <img src="ao-chu4.jpg" alt="không thể hiển thị">
                </a>
                <h1>ÁO THUN CITY RIDER 1987 MS SP000005</h1>
                <p>199.000<sup>đ</sup></p>
            </div>
            <div class="product-related-item">
                <a href="product-sp0006.html">
                    <img src="aothun-chu6.jpg" alt="không thể hiển thị">
                </a>
                <h1>ÁO THUN BATMAN MS SP000006</h1>
                <p>289.000<sup>đ</sup></p>
            </div>
        </div>-->
</section>