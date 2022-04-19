<div id="conten">
          <div class="headline">
          <?php 
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }else{
                $id='';
            } 
            $sql_cate = mysqli_query($con,"SELECT * FROM loaihanghoa,hanghoa,mauhh WHERE loaihanghoa.MaLoaiHang=hanghoa.MaLoaiHang 
            AND hanghoa.MSHH=mauhh.MSHH AND hanghoa.MaLoaiHang='$id' ORDER BY hanghoa.MSHH ASC");
            $sql_category = mysqli_query($con,"SELECT * FROM loaihanghoa,hanghoa WHERE loaihanghoa.MaLoaiHang=hanghoa.MaLoaiHang 
            AND hanghoa.MaLoaiHang='$id' ORDER BY hanghoa.MSHH ASC"); 
            
            $row_title=mysqli_fetch_array($sql_category);
            $title=$row_title['TenLoaiHang']
          ?>
            <h3><?php echo $title?></h3>
          </div>
            <?php
                while($row_sanpham = mysqli_fetch_array($sql_cate)){
            ?>
            <ul class="products">
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
                      <form>
                    <!--mua ngay-->
                  </div>
                  <div class="product-info">
                    <a href="" class="product-cat"><?php echo $row_sanpham['TenLoaiHang']?></a>
                    <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['MSHH']?>" class="product-name"><?php echo $row_sanpham['TenHH'] ?></a>
                    <div class="product-price"><?php echo number_format($row_sanpham['Gia']) ?> <sup>đ</sup></div>
                  </div>
                </div>
              </li>
            </ul>
            <?php
            }
            ?>
</div>