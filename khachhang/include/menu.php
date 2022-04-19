<div id="wrapper">
      <nav>
        <ul id="main-menu">
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="">Giới thiệu</a></li>
          <?php
            $sql_danhmuc = mysqli_query($con,'SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC'); 
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
          ?>
          <li>
            <a href="?quanly=danhmuc&id=<?php echo $row_danhmuc['MaLoaiHang'] ?>">
                <?php echo $row_danhmuc['TenLoaiHang']?>
            </a>
          </li>
          <?php
            }
          ?>
          <li><a href="">Blog</a></li>
          <li><a href="">Liên hệ</a></li>
          <li><a href="../../giongnoi/index.html">Thời tiết</a></li>
        </ul>
      </nav>
</div>