
<?php
if(isset($_POST['dangnhap_home'])) {
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap_home'] = $row_dangnhap['HoTenKH'];
				$_SESSION['khachhang_id'] = $row_dangnhap['MSKH'];
        //header('Location: index.php?quanly=giaohang');
			}else{
				echo '<script>alert("Tài khoản mật khẩu sai")</script>';
			}
		}
  }
?>
<div class="main">
    <form action="" method="post" class="form" id="form-2">
      <h3 class="heading">Đăng nhập</h3>
      <p class="desc">Wellcom Akai❤️</p>

      <div class="spacer"></div>

      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email_login" type="text" placeholder="VD: email@domain.com" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Mật khẩu</label>
        <input id="password" name="password_login" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"></span>
      </div>
    
      <button type="submit" class="form-submit" name="dangnhap_home">Đăng nhập</button>

      <h3>Chưa có tài khoản <a href="index.php?quanly=dangky">Đăng ký</a></h3>
    </form>
    <script src="../js/login.js"></script>
</div>
 