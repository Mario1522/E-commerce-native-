<?php
session_start();
include 'dashnoard/functions/connection.php';
if(isset($_SESSION['login-user'])){
  $userId = $_SESSION['login-user']['id'];

  $query = "select * from cart where userID = $userId";

  $run = mysqli_query($connection,$query);

  $num = mysqli_num_rows($run);

  if($num > 0){
    $cart = mysqli_fetch_all($run,MYSQLI_ASSOC);
  }


  $qWish = "select * from wishlist where userID = $userId";

  $runW = mysqli_query($connection,$qWish);

  $numW = mysqli_num_rows($runW);

  if($numW > 0){
    $wishlist = mysqli_fetch_all($runW,MYSQLI_ASSOC);
  }

}



?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:35 GMT -->
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
<link rel="stylesheet" href="assets/css/tiny-slider.css" />
<link rel="stylesheet" href="assets/css/glightbox.min.css" />
<link rel="stylesheet" href="assets/css/main.css" />
</head>
<style>
  .wishlist{
    position: relative;
  }
  .wishbtn{
    position: relative;
  }
  .wish-items{
    position: absolute;
    top: 72px;
    right: 0;
    width: 300px;
    background: #fff;
    padding: 20px 25px;
    -webkit-transition: all .3sease 0s;
    transition: all .3sease 0s;
    z-index: 99;
    border-radius: 4px;
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .137);
    box-shadow: 0 0 5px rgba(0, 0, 0, .137);
    opacity: 0;
    visibility: hidden;
  }
  .list{
    margin: 0 !important;
  }
  .list li{
    padding: 40px 0;
    padding-right: 30px;
    box-sizing: border-box !important;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 50px;
    width: 100%;
    border-bottom: 1px solid #000;
  }
  .del-wish{
    position: absolute;
    top : 0px;
    right: 0px;
    height: 20px;
    width: 20px;
    line-height: 18px;
    text-align: center;
    background: #fff;
    color: #222;
    border-radius: 50%;
    font-size: 9px;
    border: 1px solid #ededed;
    padding-left: 1px;
    transition: 0.5s;
    
  }
  .del-wish:hover{
    background: blue;
  }
  .name{
    border: none !important;
    border-radius: 0 !important;
    width: 100% !important;
    height: 0 !important;
    /* margin: 0 !important; */
    margin-bottom: 20px;
    padding: 0 !important;
    line-height: 1 !important;
    /* line-height: 0 !important; */
  }
  .name:hover{
    color: blue !important;
  }
  .wishlist:hover .wish-items{
    opacity: 1;
    visibility: visible;
  }

</style>
<body>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

<div class="preloader">
<div class="preloader-inner">
<div class="preloader-icon">
<span></span>
<span></span>
</div>
</div>
</div>


<header class="header navbar-area">

<div class="topbar">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="top-left">
<ul class="menu-top-link">
<li>
<div class="select-position">
<select id="select4">
<option value="0" selected>$ USD</option>
<option value="1">€ EURO</option>
<option value="2">$ CAD</option>
<option value="3">₹ INR</option>
<option value="4">¥ CNY</option>
<option value="5">৳ BDT</option>
</select>
</div>
</li>
<li>
<div class="select-position">
<select id="select5">
<option value="0" selected>English</option>
<option value="1">Español</option>
<option value="2">Filipino</option>
<option value="3">Français</option>
<option value="4">العربية</option>
<option value="5">हिन्दी</option>
<option value="6">বাংলা</option>
</select>
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-middle">
<ul class="useful-links">
<li><a href="index.php">Home</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="contact.php">Contact Us</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-end">
<div class="user">
<i class="lni lni-user"></i>
Hello
</div>
<ul class="user-login">
<li>
<a href="login.php">Sign In</a>
</li>
<li>
<a href="register.php">Register</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="header-middle">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-3 col-md-3 col-7">

<a class="navbar-brand" href="index-2.php">
<img src="assets/images/logo/logo.svg" alt="Logo">
</a>

</div>
<div class="col-lg-5 col-md-7 d-xs-none">

<div class="main-menu-search">

<div class="navbar-search search-style-5">
<div class="search-select">
<div class="select-position">
<select id="select1">
<option selected>All</option>
<option value="1">option 01</option>
<option value="2">option 02</option>
<option value="3">option 03</option>
<option value="4">option 04</option>
<option value="5">option 05</option>
</select>
</div>
</div>
                                        <div class="search-input">
                                        <input type="text" class="search" placeholder="Search">
                                        </div>
<div class="search-btn">
<button><i class="lni lni-search-alt"></i></button>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-2 col-5">
  <div class="middle-right-area">
    <div class="nav-hotline">
      <i class="lni lni-phone"></i>
      <h3>Hotline:
        <span>(+100) 123 456 7890</span>
      </h3>
    </div>
    <?php 
if(isset($_SESSION['login-user'])){ ?>
  <div class="navbar-cart">
    <div class="wishlist">
      <a href="javascript:void(0)" class="wishbtn">
        <i class="lni lni-heart"></i>
        <span class="total-items totW"><?php echo $numW ?></span>
      </a>
      <div class="wish-items">
        <div class="top">
        <?php echo $numW ?> items
        </div>
        <ul class="list">
          <?php
          if($numW > 0){

          foreach ($wishlist as $key => $value) { 
            $proId = $value['productID'];
            $sel = "select * from products where id = $proId";
            $rn = mysqli_query($connection,$sel);
            $productW = mysqli_fetch_assoc($rn);
            $imgs = explode("+",$productW['image']);
            $image = $imgs[0];
            
            ?>
           <li class="li">
            <button  class="remove del-wish" pro-id="<?php echo $value['id'] ?>" title="Remove this item"><i class="lni lni-close"></i></button>
            <div class="cart-img-head m-0">
              <a class="cart-img m-0" style="width : 70px" ><img src="dashnoard/images/<?php echo $image ?>" alt="#"></a>
            </div>
      
              <a href="product-details.php?id=<?php echo $productW['id'] ?>" class="name"><?php echo $productW['name'] ?></a>
            
            </li>
         <?php } }
          ?>
        </ul>
      </div>
    </div>
    
    
    
    
    
    
    
    <div class="cart-items">
      <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items totC"><?php echo $num ?></span>
      </a>
      
      <div class="shopping-item">
        <div class="dropdown-cart-header">
          <span><?php echo $num ?> Items</span>
          <a href="cart.php">View Cart</a>
        </div>
        <ul class="shopping-list">
          <?php
  if($num > 0){

    foreach ($cart as $key => $value) { 
      $proId = $value['productID'];
      $s = "select * from products where id = $proId";
      $r = mysqli_query($connection,$s);
      $product = mysqli_fetch_assoc($r);
      $images = explode("+",$product['image']);
      $img = $images[0];
      ?>
      <li class="li">
        <button  class="remove _del" pro-id="<?php echo $value["id"] ?>" title="Remove this item"><i class="lni lni-close"></i></button>
        <div class="cart-img-head">
          <a class="cart-img" href="product-details.php?id=<?php echo $product['id'] ?>"><img src="dashnoard/images/<?php echo $img ?>" alt="#"></a>
        </div>
        <div class="content">
          <h4><a href="product-details.php">
            <?php echo $product['name'] ?></a></h4>
            <p class="quantity"><?php echo $value['count'] ?>x - <span class="amount"><?php echo $value['total'] ?></span></p>
          </div>
        </li>
        <?php }
}
  ?>

</ul>
<div class="bottom">
  <div class="total">
    <span>Total</span>
    <span class="total-amount _total">
      <?php 

$totalCart = "select sum(total) as totalCart from cart where userID = $userId";

$runTotal = mysqli_query($connection,$totalCart);

$sum = mysqli_fetch_assoc($runTotal);

echo $finalResult = $sum['totalCart'];

?>


</span>
</div>

<div class="button">
  <a href="checkout.php" class="btn animate">Checkout</a>
</div>
  </div>
  </div>

  </div>
  </div>
<?php }
?>
<?php
if(isset($_SESSION['login-user'])){ ?>
  <a href="functions/auth/handle-logout.php" class="btn btn-sm btn-danger"> Log Out </a>
<?php }
?>
</div>
</div>
</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////// -->
  <div class="result"></div>
<!-- ////////////////////////////////////////////////////////////////// -->
<div class="container">
<div class="row align-items-center">
<div class="col-lg-8 col-md-6 col-12">
<div class="nav-inner">

<div class="mega-category-menu">
<span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
<ul class="sub-category">
<li><a href="product-grids.php">Electronics <i class="lni lni-chevron-right"></i></a>
<ul class="inner-sub-category">
<li><a href="product-grids.php">Digital Cameras</a></li>
<li><a href="product-grids.php">Camcorders</a></li>
<li><a href="product-grids.php">Camera Drones</a></li>
<li><a href="product-grids.php">Smart Watches</a></li>
<li><a href="product-grids.php">Headphones</a></li>
<li><a href="product-grids.php">MP3 Players</a></li>
<li><a href="product-grids.php">Microphones</a></li>
<li><a href="product-grids.php">Chargers</a></li>
<li><a href="product-grids.php">Batteries</a></li>
<li><a href="product-grids.php">Cables & Adapters</a></li>
</ul>
</li>
<li><a href="product-grids.php">accessories</a></li>
<li><a href="product-grids.php">Televisions</a></li>
<li><a href="product-grids.php">best selling</a></li>
<li><a href="product-grids.php">top 100 offer</a></li>
<li><a href="product-grids.php">sunglass</a></li>
<li><a href="product-grids.php">watch</a></li>
<li><a href="product-grids.php">man’s product</a></li>
<li><a href="product-grids.php">Home Audio & Theater</a></li>
<li><a href="product-grids.php">Computers & Tablets </a></li>
<li><a href="product-grids.php">Video Games </a></li>
<li><a href="product-grids.php">Home Appliances </a></li>
</ul>
</div>


<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
<ul id="nav" class="navbar-nav ms-auto">
<li class="nav-item">
<a href="index.php" class="active" aria-label="Toggle navigation">Home</a>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
<ul class="sub-menu collapse" id="submenu-1-2">
<li class="nav-item"><a href="about-us.php">About Us</a></li>
 <li class="nav-item"><a href="faq.php">Faq</a></li>
<?php
if(! isset($_SESSION['login-user'])){ ?>
<li class="nav-item"><a href="login.php">Login</a></li>
<li class="nav-item"><a href="register.php">Register</a></li>
<?php }
?>
<li class="nav-item"><a href="mail-success.php">Mail Success</a></li>
<li class="nav-item"><a href="404.php">404 Error</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Shop</a>
<ul class="sub-menu collapse" id="submenu-1-3">
<li class="nav-item"><a href="product-grids.php">Shop Grid</a></li>
<li class="nav-item"><a href="product-list.php">Shop List</a></li>
<li class="nav-item"><a href="product-details.php">shop Single</a></li>
<li class="nav-item"><a href="cart.php">Cart</a></li>
<li class="nav-item"><a href="checkout.php">Checkout</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Blog</a>
<ul class="sub-menu collapse" id="submenu-1-4">
<li class="nav-item"><a href="blog-grid-sidebar.php">Blog Grid Sidebar</a>
</li>
<li class="nav-item"><a href="blog-single.php">Blog Single</a></li>
<li class="nav-item"><a href="blog-single-sidebar.php">Blog Single
Sibebar</a></li>
</ul>
</li>
<li class="nav-item">
<a href="contact.php" aria-label="Toggle navigation">Contact Us</a>
</li>
</ul>
<?php
if(isset($_SESSION['login-user'])){?>
  <p class="d-flex gap-1 " style="margin-left: 30px;">Welcome <span class="text-success" style=" font-weight: 800;"><?php echo $_SESSION['login-user']['name'] ?></span></p>
<?php }
?>
</div> 
</nav>

</div>
</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="nav-social">
<h5 class="title">Follow Us:</h5>
<ul>
<li>
<a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>

</div>
</div>
</div>

</header>