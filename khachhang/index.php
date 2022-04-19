<?php
  session_start();
  include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akai Fashion</title>
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/product-main.css">
    <link rel="stylesheet" href="css/product-style.css">
    <link rel="stylesheet" href="css/danhgia.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="../quantri/bootstrap.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="css/danhmuc.css">
    
    <style>
      #conten {
        max-width: 1170px;
        margin: 0 auto;
      }
      #head-link{
        text-align: center;
      
      }
    </style>
</head>
<body>
  <div id="main">
    <?php
      include('include/topbar.php');
      include('include/menu.php');
      if(isset($_GET['quanly'])){
        $temp=$_GET['quanly'];
      }else{
        $temp='';
      }
      if($temp=='danhmuc'){
        include('include/slider.php');
        include('include/danhmuc.php');
      }elseif($temp=='dangnhap'){
        include('include/login.php');
      }elseif($temp=='dangky'){
        include('include/dangky.php');
      }elseif($temp=='xemdonhang'){
        include('include/xemdonhang.php');
      }elseif($temp=='chitietsp'){
        include('include/chitietsp.php');
      }elseif($temp=='giohang'){
        include('include/giohang.php');
      }elseif($temp=='giaohang'){
        include('include/giaohang.php');
      }elseif($temp=='camon'){
        include('include/camon.php');
      }elseif($temp=='timkiem'){
        include('include/timkiem.php');
      }
      elseif($temp=='login'){
        include('include/login.php');
      }elseif($temp=='dangky'){
          include('include/dangky.php');
      }
      else{
        include('include/slider.php');
        include('include/home.php');
      }
      include('include/footer.php');
    ?>
    <script src="/js/login.js"></script>
    <script src="js/slide.js"></script>
    
  </div>
</body>
</html>