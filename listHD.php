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

    <title>Quản Lý Đơn Hàng</title>

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
    header("refresh: 30");
?>
<script>
	$(document).ready(function(){
	  $("#iptim").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myHD tr").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
</script>
<body style="background-color: #F5F5F5;">
    <div class="container-fluit">
        <form action="" method="post" id="formhd">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td colspan="9" align="right">
                            <input id="iptim" style="width: 300px; height: 35px;" type="text" name="txt" id="txt" placeholder="Tìm kiếm...">
                            <button class="btn btn-danger" type="submit" value="Xóa đơn hàng" name="del" id="del"><i class="fas fa-minus-circle"></i> Xóa Đơn Hàng</button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"></i> Xem chi tiết</button>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="9" style="text-align: center; background-color: #CD5C5C;"><h2><i class="fas fa-user-edit"></i> Quản Lý Đơn Hàng</h2></th>
                    </tr>
                    <tr align="center" style="background-color: #FFA07A;">
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày lập hóa đơn</th>
                        <th>Tổng tiền</th>
                        <th>Mã giảm</th>
                        <th>Hình thức thanh toán</th>
                    </tr>
                </thead>
                <?php
                    $p->loadHD("select * from hoadon order by ngayhd desc");
                ?>
            </table>
            <?php
                switch ($_POST['del']) {
                    case 'Xóa đơn hàng':
						$idxoa = $_REQUEST['id'];
						if($idxoa > 0){
							if($p->themxoasua("delete from hoadon where id_hd='$idxoa'")==1){
								echo '<script> alert("Xóa hóa đơn thành công");</script>';
							}else{
								echo 'Xóa không thành công';
							}
						}else{
							echo '<h5 class="text-danger font-italic" style="padding: 10px;">Vui lòng chọn đơn hàng cần xóa</h5>';
						}
						break;
					}
            ?>
        </form>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #40E0D0;">
                <h4 class="modal-title" style="font-family: Arial;">Chi Tiết Đơn Hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-hover">
                    <thead align="center">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Size</th>
                            <th>Giá Sản Phẩm</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
					<?php
						$layidhd=$_REQUEST['id'];
						if($layidhd > 0){
							$p -> loadCTHD("select * from chitiet_hd where id_hd ='$layidhd' order by giasp asc");
						}else{
                            echo '<h5 class="text-danger font-italic" style="padding: 10px;">Vui lòng chọn đơn hàng cần xem</h5>';
                        }
					?>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>

            </div>
        </div>
    </div>
</body>
</html>