<?php
	include("assets/class/tmdt.php");
	$p=new tmdt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Danh Sách Sản Phẩm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/font-web/css/all.css">
	<link rel="stylesheet" href="assets/font-web/css/fontawesome.css">
	<link rel="stylesheet" href="assets/font-web/css/brands.css">
	<link rel="stylesheet" href="assets/font-web/css/solid.css">
</head>
<?php
    header("refresh: 10");
?>
<body style="background-color: #DAA520;">
    <div class="container">
        <?php
			$p->load_loai_list("select * from loai_sp"); 
		?>
        <table class="table table-bordered table-hover" style="margin-top: 10px;">
			<thead style="color: white;">
                <tr>
                    <th colspan="7" style="text-align: center; background-color: #CD5C5C;"><h2><i class="fas fa-list-alt"></i> Danh Sách Sản Phẩm</h2></th>
                </tr>
				<tr align="center" style="background-color: #D2691E;">
					<th>STT</th>
                    <th width="150px">Mã Sản Phẩm</th>
					<th>Tên Sản Phẩm</th>
					<th>Hình Ảnh</th>
					<th>Số Lượng</th>
					<th>Giá Bán</th>
					<th>Mã loại</th>
				</tr>
			</thead>
		<?php
			$laymaloai=$_REQUEST['id'];
			if($laymaloai > 0){
				$p -> loadDS("select * from sanpham where maloai ='$laymaloai' order by gia asc");
			}else{
				$p->loadDS("select * from sanpham order by maloai asc");	
			}
		?>
	  </table>
    </div>
</body>
</html>