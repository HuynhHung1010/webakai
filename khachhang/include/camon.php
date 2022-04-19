<section class="payment">
    <div class="container">
        <div class="payment-top-wrap">
            <div class="payment-top">
                <div class="payment-top-delivery payment-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="payment-top-adress payment-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="payment-top-payment payment-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
    </div>
    <div class="container">
        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
        <hr>
        <?php
            $sql_select_donhang = mysqli_query($con,"SELECT * FROM dathang ORDER BY SoDonDH DESC LIMIT 1");
            $row_donhang = mysqli_fetch_array($sql_select_donhang);
            $id_donhang = $row_donhang['SoDonDH'];
        ?>
        <div class="camon">
            <p>Chào<span><?php echo $_SESSION['dangnhap_home'] ?></span>,đơn hàng của bạn với mã <span><?php echo number_format($id_donhang)?></span> đã được đặt thành công. </span></p>
            <p>Đơn hàng của bạn đã được xác nhận tự động.</p>
            <p><b>(Lưu ý:Akai Fashion sẽ không gọi xác nhận đơn hàng,đơn hàng được xử lý tự động và sẽ giao cho bạn trong thời gian sớm nhất.)</b></p>
            <p class="thank">Cám ơn <span><?php echo $_SESSION['dangnhap_home'] ?></span> đã tin dùng sản phẩm của Akai Fashion.</p>
        </div>
        <div class="payment-content-right-payment">
            <button> <a href="index.php"> TIẾP TỤC MUA SẮM</a></button>
        </div>
    </div>
</section>