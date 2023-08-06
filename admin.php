<?php
	include("assets/class/tmdt.php");
	$p=new tmdt();
	$layid=0;
	if(isset($_REQUEST['id'])){
		$layid = $_REQUEST['id'];
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Quản Lý Sản Phẩm</title>

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
<body style="background-color: #E6E6FA;">
	<div class="admin_main container">
		<form action="" id="form1" name="form1" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
			<table class="table table-bordered" width="555" border="1">
				<thead>
					<tr>
						<th colspan="5" style="background-color: #D2691E;"><h3 align="center" style="color: white;"><i class="fas fa-user-cog"></i> Quản lý Sản Phẩm</h3></th>
					</tr>
				</thead>
				<tbody style="background-color: white;">
					<tr>
						<th><label for="tensp">Tên sản phẩm</label></th>
						<td width="700px"><input class="form-control" type="text" name="tensp" id="tensp" placeholder="Tên sản phẩm..." value="<?php echo $p->loadCot("select tensp from sanpham where masp = '$layid' limit 1");?>"/></td>
					</tr>
					<tr>
						<th><label for="sl">Số Lượng</label></th>
						<td><input class="form-control" type="number" name="sl" id="sl" min="1" max="1000" placeholder="Số lượng..." value="<?php echo $p->loadCot("select soluong from sanpham where masp = '$layid' limit 1");?>"></td>
					</tr>
					<tr>
						<th><label for="gia">Giá</label></th>
						<td><input class="form-control" type="text" name="gia" id="gia" placeholder="Giá sản phẩm..." value="<?php echo $p->loadCot("select gia from sanpham where masp = '$layid' limit 1");?>"></td>
					</tr>
					<tr>
						<th><label for="file">Hình ảnh</label></th>
						<td>
							<input type="file" name="myfile" id="myfile">
						</td>
					</tr>
					<tr>
						<th><label for="ml">Mã loại</label></th>
						<td><input class="form-control" type="number" name="ml" id="ml" min="1" max="4" placeholder="Mã loại..." value="<?php echo $p->loadCot("select maloai from sanpham where masp = '$layid' limit 1");?>"></td>
					</tr>
				</tbody>
				<tfoot style="background-color: #FFDEAD;">
					<tr align="center">
						<td colspan="2">
							<button class="btn btn-secondary" type="submit" value="Thêm sản phẩm" name="add" id="add">
								<i class="fas fa-plus-circle"></i>
								Thêm sản phẩm
							</button>
							<button class="btn btn-danger" type="submit" value="Xóa sản phẩm" name="add" id="add">
								<i class="fas fa-trash-alt"></i>
								Xóa sản phẩm
							</button>
							<button class="btn btn-info" type="submit" value="Sửa sản phẩm" name="add" id="add">
								<i class="fas fa-edit"></i>
								Sửa sản phẩm
							</button>
						</td>
					</tr>
				</tfoot>
			</table>
			<?php
				switch($_POST['add']){
					case 'Thêm sản phẩm':{
						$tensp=$_REQUEST['tensp'];
						$soluong=$_REQUEST['sl'];
						$gia=$_REQUEST['gia'];
						$maloai=$_REQUEST['ml'];
						$name=$_FILES['myfile']['name'];
						$type=$_FILES['myfile']['type'];
						$size=$_FILES['myfile']['size'];
						$tmp_name=$_FILES['myfile']['tmp_name'];
						if($name!='' && $type =='image/jpeg' || $type =='image/png'){
							if($p->upload_file($name,$tmp_name,"data_img")==1){
								
								if($p->themxoasua("insert into sanpham(tensp,soluong,hinhanh,gia,maloai) values('$tensp','$soluong', '$name','$gia','$maloai')")==1){
									echo '<script> alert("Thêm sản phẩm thành công");</script>';
								}else{
									echo 'Thêm sản phẩm thất bại';
								}
								
							}else{
								echo 'Upload không thành công.';
							}
						}else{
							echo 'Vui lòng chọn hình đại diện';
						}
						break;
					}
					case 'Xóa sản phẩm':{
						$idxoa = $_REQUEST['id'];
						if($idxoa > 0){
							if($p->themxoasua("delete from sanpham where masp='$idxoa' limit 1")==1){
								echo '<script> alert("Xóa sản phẩm thành công");</script>';
								
							}else{
								echo 'Xóa không thành công';
							}
						}else{
							echo 'Vui lòng chọn sản phẩm cần phải xóa';
						}
						break;
					}
					case 'Sửa sản phẩm':{
						$idsua = $_REQUEST['id'];
						$tensp=$_REQUEST['tensp'];
						$soluong=$_REQUEST['sl'];
						$gia=$_REQUEST['gia'];
						$maloai=$_REQUEST['ml'];
						if($idsua > 0){
							if($p->themxoasua("UPDATE sanpham SET tensp ='$tensp',soluong ='$soluong',gia ='$gia',maloai ='$maloai' where masp ='$idsua' limit 1")==1){
								echo '<script> alert("Sửa sản phẩm thành công");</script>';
							}else{
								echo 'Sửa không thành công';
							}
						}else{
							echo 'Vui lòng chọn sản phẩm cần sửa';
						}
						break;
					}
				}
			?>
		</form>
		<style>
			#list-admin > a:hover{
				text-decoration: none;
				color: black;
			}
		</style>
		<table class="table table-hover" style="margin-top: 10px;">
			<thead style="background-color: #D2691E; color: white;">
				<tr align="center">
					<th>STT</th>
					<th>Tên Sản Phẩm</th>
					<th>Hình Ảnh</th>
					<th>Số Lượng</th>
					<th>Giá Bán</th>
					<th>Mã loại</th>
				</tr>
			</thead>
		<?php
			$p->loadList("select * from sanpham order by maloai asc");	
		?>
	  </table>
	</div>
</body>
</html>