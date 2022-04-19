
<section id="cartegory" class="cartegory">
        <div class="container">
            <div class="cartegory-content row">
            <?php 
            $sql_danhmuc = mysqli_query($con,'SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC'); 
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
            ?>
                <div class="cartegory-item">
                    <img src="image/<?php echo $row_danhmuc['HinhDaiDien']?>" alt="không thể hiển thị"> 
                    <h2>
                      <a href="?quanly=danhmuc&id=<?php echo $row_danhmuc['MaLoaiHang'] ?>">
                        <?php echo $row_danhmuc['TenLoaiHang']?>
                      </a>
                    </h2>
                </div>
                <?php
              }
            ?>
            </div>
        </div>
</section>
<div id="conten">
          <div class="headline">
          <?php 
            $sql_cate_home = mysqli_query($con,'SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC'); 
            while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
              $id_danhmuc = $row_cate_home['MaLoaiHang'];
          ?>
            <h3><?php echo $row_cate_home['TenLoaiHang']?></h3>
          </div>
          <?php 
            $sql_products= mysqli_query($con,"SELECT * FROM hanghoa,mauhh WHERE hanghoa.MSHH=mauhh.MSHH ORDER BY hanghoa.MSHH ASC");
            while($row_sanpham=mysqli_fetch_array($sql_products)){
              if($row_sanpham['MaLoaiHang']==$id_danhmuc){
            ?>
            <ul class="products" style="display: flex;">
              <li>
                <div class="product-item">
                  <div class="product-top">
                    <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['MSHH']?>" class="product-thumb">
                      <img src="image/<?php echo $row_sanpham['image']?>" alt="không thể hiển thị">
                    </a>
                    <form action="index.php?quanly=giohang" method="post">
                          <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['MSHH'] ?>" />
								          <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['TenHH'] ?>" />
                          <input type="hidden" name="mausanpham" value="<?php echo $row_sanpham['MaMau'] ?>" />
                          <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['Gia'] ?>" />
                          <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['image'] ?>" />
                          <input type="hidden" name="soluong" value="1" />		
                          <input type="hidden" name="size" value="L" />		
                        <button type="submit" name="themgiohang" class="buy-now">Mua Ngay</button>
                      </form>
                    <!--mua ngay-->
                  </div>
                  <div class="product-info">
                    <a href="" class="product-cat"><?php echo $row_cate_home['TenLoaiHang']?></a>
                    <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['MSHH']?>" class="product-name"><?php echo $row_sanpham['TenHH'] ?></a>
                    <div class="product-price"><?php echo number_format($row_sanpham['Gia']) ?> <sup>đ</sup></div>
                  </div>
                </div>
              </li>
            </ul>
                <?php
                    }
                }
                ?>
            <?php
            }
            ?>
</div>
<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Giới thiệu về chúng tôi</h2>
				<p class="footer-main mb-4">
          <b>AKAI Fashion</b> - Tuyên ngôn thời trang của bạn.<br><br>

          <b>AKAI Fashion </b> là thương hiệu thời trang Việt Nam với mong muốn đem lại vẻ đẹp hiện đại và sự tự tin cho khách hàng, thông qua các dòng sản phẩm thời trang thể hiện cá tính và xu hướng.<br>
          Một trong những “tôn chỉ” về thiết kế của <b>AKAI Fashion</b> chính là sự đa dạng, với mong muốn mang đến cho người mặc những sản phẩm phù hợp nhất với ngoại hình và quan trọng hơn cả là cá tính của chính mình.<br><br>

          Hãy ghé thăm shop <b>AKAI Fashion </b> để đón đầu những xu hướng thời trang mới nhất và tận hưởng không gian mua sắm cao cấp.<br><br>

          <span style="color:red;">Hotline mua online :</span> <b>024.6662.999</b></p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Miễn phí vận chuyển</h3>
								<p>Đơn hàng trên 100$</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Vận chuyển nhanh</h3>
								<p>Toàn quốc</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Tin cậy</h3>
								<p>Sự đảm bảo</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>