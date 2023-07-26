<?php
	session_start();

	include("assets/class/tmdt.php");
	$p=new tmdt();


	if(!isset($_SESSION['sanpham'])){
		$_SESSION['sanpham']=array();	
	}
    //Xóa toàn bộ giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)){
        unset($_SESSION['sanpham']);
    }
    //Xóa từng sản phẩm
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
        array_splice($_SESSION['sanpham'],$_GET['delid'],1);
    }
	if(isset($_POST['addbuy'])&&($_POST['addbuy'])){
		$tensp = $_POST['tensp'];
		$giasp = $_POST['giasp'];
		$soluong = $_POST['sl'];
        if(isset($_POST['chk'])){
            $size = $_POST['chk'];
        }else{
            $size = false;
        }

        if ($size == 'Nhỏ') {
            $giasp = $_POST['giasp'];
        }else{
            if ($size =='Vừa') {
                $giasp = $giasp + 5000;
            }else{
                if ($size == 'Lớn') {
                    $giasp = $giasp + 10000;
                }
            }
        }
        $thanhtien = $soluong * $giasp;

        // Kiem tra san pham da có trong giỏ hàng chưa

        $fl=0;
        for ($i=0; $i < sizeof($_SESSION['sanpham']); $i++) { 
            if ($_SESSION['sanpham'][$i][0]==$tensp && $_SESSION['sanpham'][$i][4]==$size) {
                $fl=1;
                $soluongnew=$soluong+$_SESSION['sanpham'][$i][3];
                $_SESSION['sanpham'][$i][3]=$soluongnew;
                $giaspnew=$_SESSION['sanpham'][$i][1];
                $_SESSION['sanpham'][$i][1]=$giaspnew;
                $thanhtiennew = $soluongnew * $giaspnew;
                $_SESSION['sanpham'][$i][2]=$thanhtiennew;
                break;
            }
        }
        if($fl==0){
            $sp=array($tensp,$giasp,$thanhtien,$soluong,$size);
            $_SESSION['sanpham'][]=$sp;
        }
	}
	function showgiohang(){
		if(isset($_SESSION['sanpham'])&&(is_array($_SESSION['sanpham']))){
			for($i=0; $i < sizeof($_SESSION['sanpham']); $i++){
                $ttien += $_SESSION['sanpham'][$i][2];
				echo '<tbody class="sanpham">
							<tr>
								<td style="text-align: right;">'.($i + 1).'</td>
								<td width="90px">'.$_SESSION['sanpham'][$i][0].'</td>
								<td width="20px" style="text-align: right;">'.$_SESSION['sanpham'][$i][3].'</td>
                                <td width="70px" style="text-align: center;">'.$_SESSION['sanpham'][$i][4].'</td>
								<td width="70px" style="text-align: right;">'.$_SESSION['sanpham'][$i][1].' vnđ</td>
                                <td width="70px" style="text-align: right;">'.$_SESSION['sanpham'][$i][2].' vnđ</td>
                                <td align="center">
                                    <button class="btn btn-danger delid"><a href="buying.php?delid='.$i.'"><i class="fas fa-trash-alt"></i> Xóa</a></button>
                                </td>
							</tr>';
            }
		}
        
        echo'<tr>
                <th colspan="6">Tổng đơn hàng: </th>
                <td style="text-align: right;">'.$ttien.' vnđ</td>
            </tr>
        </tbody>';
	}
    function addhoadon(){
        if(isset($_SESSION['sanpham'])&&(is_array($_SESSION['sanpham']))){
			for($i=0; $i < sizeof($_SESSION['sanpham']); $i++){
                $ttien += $_SESSION['sanpham'][$i][2];
				echo '<tbody class="sanpham">
							<tr>
								<td style="text-align: right;">'.($i + 1).'</td>
								<td width="90px">'.$_SESSION['sanpham'][$i][0].'</td>
								<td width="20px" style="text-align: right;">'.$_SESSION['sanpham'][$i][3].'</td>
                                <td width="70px" style="text-align: center;">'.$_SESSION['sanpham'][$i][4].'</td>
                                <td width="70px" style="text-align: right;">'.$_SESSION['sanpham'][$i][2].' vnđ</td>
							</tr>
                        </tbody>';            
            }
        }
                echo'<tr>
                        <th colspan="4">Tổng đơn hàng: </th>
                        <td style="text-align: right;">'.$ttien.' vnđ</td>
                    </tr>
                    <tr>
                        <th colspan="4">Mã giảm giá</th>
                        <td><input type="text" class="form-control" name="code" id="code" placeholder="Code..."></td>
                    </tr>
                    <tr>
                        <th colspan="4">Thanh toán</th>
                        <td>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio" name="chk" value="Tiền mặt">
                                <label class="custom-control-label" for="customRadio">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="chk" value="Chuyển khoản">
                                <label class="custom-control-label" for="customRadio2">Chuyển khoản</label>
                            </div>
                        </td>
                    </tr>
            </tbody>'; 
    }
	function tongdonhang(){
		$ttien = 0;
		if(isset($_SESSION['sanpham'])&&(is_array($_SESSION['sanpham']))){
			for($i=0; $i < sizeof($_SESSION['sanpham']); $i++){
                $ttien += $_SESSION['sanpham'][$i][2];
				
            }
		}
		return $ttien;
	}
	$conn = $p->connect();
	if(isset($_POST['sub'])&&($_POST['sub'])){
		$name=$_POST['name'];
		$sdt=$_POST['sdt'];
		$address=$_POST['address'];
		$tong=tongdonhang();
		$magiam=$_POST['code'];
        if(isset($_POST['chk'])){
            $hinhthuc = $_POST['chk'];
        }else{
            $hinhthuc = false;
        }
		$date = date('Y-m-d H:i:s');
		
		$idbill = $p->themxoasua("insert into hoadon(tenkh,sodt,diachi,ngayhd,tong,magiam,htthanhtoan) values('$name','$sdt','$address','$date','$tong','$magiam','$hinhthuc')");
		if($idbill==1){
			echo '<script> alert("Đặt hàng thành công");</script>';
			$last_id = mysql_insert_id($conn);
		}
		for($i=0; $i < sizeof($_SESSION['sanpham']); $i++){
			$tensp = $_SESSION['sanpham'][$i][0];
			$giasp = $_SESSION['sanpham'][$i][1];
			$soluong = $_SESSION['sanpham'][$i][3];
			$size = $_SESSION['sanpham'][$i][4];
			$thanhtien = $_SESSION['sanpham'][$i][2];
			$addhang = $p->themxoasua("insert into chitiet_hd(tensp,soluong,size,giasp,thanhtien,id_hd) values('$tensp','$soluong','$size','$giasp','$thanhtien','$last_id')");
			if($addhang == 1){
				
			}
		}
	}
?>
<style>
    .delid > a{
        color: white;
    }
    .delid > a:hover{
        color: white;
    }
    .delall{
        float: right;
    }
    .delall >a{
        color: white;
    }
    .delall > a:hover{
        color: white;
    }
    .nextbuy{
        float: left;
    }
    .nextbuy >a{
        color: white;
    }
    .nextbuy > a:hover{
        color: white;
    }
    .addbill{
        margin-left: 10px;
    }
    .addbill > a{
        color: white;
    }
    .addbill > a:hover{
        color: white;
    }
    .modal{
        padding-top: 90px;
    }
    .up > a{
        color: white;
    }
    .up > a:hover{
        color: white;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/font-web/css/all.css">
	<link rel="stylesheet" href="assets/font-web/css/fontawesome.css">
	<link rel="stylesheet" href="assets/font-web/css/brands.css">
	<link rel="stylesheet" href="assets/font-web/css/solid.css">
    <title>Love Coffee</title>
</head>
<style>
    *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    }
    .main_buy{
        height: 700px;
        padding-top: 100px;
    }
    .main_buy .giohang{
        margin-left: 10px;
    }
    .sidebuy{
        border-left: 5px double black;
        height: 700px;
        
    }
</style>
<script>
		function ktrphone(){
			var phone = document.getElementById("sdt").value;
			var reg = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			if(phone.trim()===''){
				document.getElementById("er2").innerHTML="Số điện thoại là bắt buộc";
				return false;
			}else{
				if(!reg.test(phone)){
					document.getElementById("er2").innerHTML="Số điện thoại không hợp lệ (chỉ 10 số)";
					return false;
				}else{
					document.getElementById("er2").innerHTML="";
					return true;
				}
			}
		}
</script>
<body>
    <header>
        <?php
          include("header.php");
        ?>
    </header>
    <div class="main_buy">
        <div class="container">
            <div class="row">
                <table class="table table-hover table-bordered giohang">
                    <thead class="table-warning">
                        <tr align="center">
                            <th width="20px">STT</th>
                            <th width="100px">Tên Sản Phẩm</th>
                            <th width="70px">Số lượng</th>
                            <th width="70px">Size</th>
                            <th width="70px">Đơn Giá</th>
                            <th width="80px">Thành tiền</th>
                            <th width="70px">Xóa</th>
                        </tr>
                    </thead>
                    <?php
                        showgiohang();
                    ?>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <button id="modal" class="btn btn-primary addbill" data-toggle="modal" data-target="#myModal"><a href="#"><i class="fas fa-check"></i> Xác nhận</a></button>
                                <button class="btn btn-success nextbuy"><a href="products.php"><i class="fas fa-sign-out-alt"></i> Tiếp tục mua hàng</a></button>
                                <button class="btn btn-danger delall"><a href="buying.php?delcart=1"><i class="fas fa-trash-alt"></i> Xóa giỏ hàng</a></button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="container">
            <!-- The Modal -->
            <div class="modal modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                
                    <!-- Modal Header -->
                        <div class="modal-header" style="background-color: #00CED1;">
                            <h4 class="modal-title">Hóa Đơn</h4>
                        </div>
                    
                    <!-- Modal body -->
                        <div class="modal-body">
                            <span id="er2" class="text-danger"></span>
                            <form class="form-modal form-inline" method="post">
                                <div class="form-group">
                                    <label for="txt">Tên khách hàng:</label>
                                    <input type="text" name="name" id="txt" class="form-control" placeholder="Tên khách hàng..." style="margin-left: 10px;"required>
                                </div>
                                <div class="form-group" style="margin-left: 20px;">
                                  <label for="sdt">Số điện thoại:</label>
                                  <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Số điện thoại..." style="margin-left: 10px;" onblur="ktrphone()" required>
                                </div>
                                <div class="form-group" style="margin-top: 15px;">
                                  <label for="address">Địa chỉ:</label>
                                  <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ..." style="margin-left: 85px; width: 592px;" required>
                                </div>
                                <table class="table hoadon" style="margin-top: 20px;">
                                    <thead class="table-warning">
                                        <tr align="center">
                                            <th width="20px">STT</th>
                                            <th width="150px">Tên Sản Phẩm</th>
                                            <th width="80px">Số lượng</th>
                                            <th width="80px">Size</th>
                                            <th width="80px">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            addhoadon();
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    
                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Đóng</button>
							<input class="btn btn-primary" type="submit" name="sub" id="sub" value="Đặt hàng">
                        </div>
						</form>
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
</body>
</html>