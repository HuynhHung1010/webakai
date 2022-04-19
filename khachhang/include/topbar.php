<secsion class="top">
        <div class="containers">
            <div class="row">
                <div class="top-logo">
                    <img src="image/logo.png" alt="không thể hiển thị">
                        <?php
						    if(isset($_SESSION['dangnhap_home'])){ 
					    ?>
						 
							<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>" class="text-white">
								<i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home'] ?></a>
					    <?php
					        }
						?>
                </div>
                <div class="top-menu-items">
                    <a href="index.php">Akai Fashion</a>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                        <form action="index.php?quanly=timkiem" method="POST">
                            <input  name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
						    <button name="search_button" type="submit" class="fas fa-search"></button>
                        </form>
                        </li>
                        <li>
                        <a href="index.php?quanly=dangnhap" >
                            <i class="fas fa-user-circle"></i></a>    
                        </li>
                        <!--<li>
                        <a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>    
                        </li>-->
                        <?php
                                //$sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang");
                                //$count = mysqli_num_rows($sql_select_giohang);
                        ?>
                        <li>
                            <a href="index.php?quanly=giohang">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </secsion>