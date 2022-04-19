<?php 
    if(isset($_POST['dangky'])){
        $name=$_POST['name'];
        $cty=$_POST['cty'];
        $phone=$_POST['phone'];
        $fax=$_POST['fax'];
        $email=$_POST['email'];
        $password=md5 ($_POST['repassword']);
        $diachi=$_POST['diachi'];
        $giaohang=$_POST['giaohang'];
        $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(HoTenKH,TenCongTy,SoDienThoai,SoFax,email,password,giaohang) values ('$name','$cty','$phone','$fax','$email','$password','$giaohang')");  
        echo '<script>altert("Đăng ký thành công")</script>';
        header('Location:index.php');   
    }else{
        echo '<script>alert("Đăng ký chưa thành công")</script>';
    }
?>
<div class="main">
    <form action="" method="POST" class="form" id="form-1">
        <h3 class="heading">Thành viên đăng ký</h3>
        <p class="desc">Wellcom Akai❤️</p>

        <div class="spacer"></div>

        <div class="form-group">
            <label for="fullname" class="form-label"> Họ tên đầy đủ</label>
            <input id="fullname" name="name" type="text" placeholder="VD: Huỳnh Hùng" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Tên công ty </label>
            <input type="text" name="cty" placeholder="Tên công ty " class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số điện thoại<span style="color: red;">*</span></label>
            <input type="tel"  name="phone" required="" placeholder="VD:0369888899" pattern="[0-9]{10}" class="form-control">
        </div>
                            
        <div class="form-group">
            <label for="" class="form-label">Số Fax <span style="color: red;">*</span></label>
            <input type="tel"  name="fax" placeholder="VD:1111777789889" pattern="[0-9]{12}" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Địa chỉ <span style="color: red;">*</span></label>
            <input type="text" name="diachi" placeholder="Nơi nhận hàng, vd: An Giang..." required="" class="form-control">
        </div>
      <div class="form-group">
        <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
        <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Mật khẩu <span style="color: red;">*</span></label>
        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <span style="color: red;">*</span></label>
        <input id="password_confirmation" name="repassword" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
        <span class="form-message"></span>
        <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
      </div>

      <button type="submit" class="form-submit" name="dangky">Đăng ký</button>
    </form>
</div>