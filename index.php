<?php
	include("assets/class/tmdt.php");
	$p=new tmdt();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel='shortcut icon' type="image/x-icon" href='assets/images/icon3.png' />
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Love Coffee</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
    <style>
      .banner{
        background-image: url(assets/images/hinh5.jpg);
	      background-attachment: fixed;
        background-repeat: no-repeat;
	      height: 600px;
        background-size: 100%;
        filter: brightness(80%);
      }
	  .product-item{
		height: 650px;
	  }
      .product-item .btn{
        background-color: red;
        color: white;
        width: 100%;
        margin-top: 20px;
      }
      .product-item .btn:hover{
        background-color: #FF8C00;
      }
      .product-item .form-group{
        margin-top: 20px;
      }
      .product-item .form-group .form-control{
        width: 100px;
        margin-left: 5px;
      }
      .product-item h3{
        text-align: center;
      }
      .product-item .price{
        font-size: 20px;
        margin-top: 20px;
      }
      .product-item img{
        height: 300px;
        padding: 15px;
      }
    </style>
  </head>

  <body>
      <header>
        <?php
          include("header.php");
        ?>
      </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text"></div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Sản phẩm</h2>
              <a href="products.php">Xem tất cả <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
		  <?php
            	$p->loadsanpham("select * from sanpham where maloai = 1 order by rand() limit 6");
           ?>
        </div>
      </div>
    </div>
    <div class="bg-2">
      <style>
        .bg-2{
          background-image: url(assets/images/bgro_2.jpg);
          background-attachment: fixed;
          background-repeat: no-repeat;
          /*background-size: 100%;*/
          height: 650px;
          filter: brightness(70%);
        }
      </style>
    </div>
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Love Coffee</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for the best products?</h4>
              <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
                <li><a href="#">Non cum id reprehenderit</a></li>
              </ul>
              <a href="about.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/hinh4.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <footer>
      <?php
        include("footer.php");
      ?>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
