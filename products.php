<?php
	include("assets/class/tmdt.php");
	$p=new tmdt();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
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
      .products-heading {
	      background-image: url(assets/images/hinh6.jpg);
        height: 550px;
        background-attachment: fixed;
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
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Love Coffee</h4>
              <h2>Sản Phẩm</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
             <ul>
                <li class="active" data-filter="*" style="font-size: 15px; padding-left: 10px;">Tất cả sản phẩm</li>
				<?php
                  	$p->loadloai("select * from loai_sp order by loai_sp asc");
              	?>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                  <?php
                    $p -> loadsanpham("select * from sanpham order by maloai asc");
				   ?>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
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
