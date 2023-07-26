<?php
	include("assets/class/tmdt.php");
	$p=new tmdt();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/font-web/css/all.css">
	<link rel="stylesheet" href="assets/font-web/css/fontawesome.css">
	<link rel="stylesheet" href="assets/font-web/css/brands.css">
	<link rel="stylesheet" href="assets/font-web/css/solid.css">
    <title>Đăng Ký</title>
</head>
<style>
    *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    }
    .body{
        background-image: linear-gradient(#2F4F4F,#008B8B,#00CED1);
        background-repeat: no-repeat;
        height: 1000px;
    }
    .login{
        border: 0px solid black;
        height: 850px;
        width: 600px;
        border-radius: 10px;
        margin-left: 32%;
        margin-top: 40px;
        background-color: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .header{
        border: 0px solid black;
        border-bottom: 5px groove #A9A9A9;
        border-radius: 10px 10px 0px 0px;
        background-color: #008B8B;
    }
    .header h2{
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
        color: white;
    }
    form{
        margin-top: 40px;
    }
    form .form-group{
        margin-top: 10px;
    }
    form .btn{
        background-color: #008B8B;
        color: white;
        margin-top: 10px;
        width: 100%;
        height: 50px;
        font-size: 20px;
    }
    .regi_login{
        margin-top: 10px;
        margin-left: 220px;
    }
</style>
<body class="body">
    <div class="main">
        <div class="login">
            <div class="header">
                <h2><i class="fas fa-user-circle"></i> Đăng Ký</h2>
            </div>
            <form action="" method="post">
                <div class="container">
                    <div class="form-group">
                        <label for="user"><h4>Tên Khách Hàng:</h4></label>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Tên khách hàng..." required>
                    </div>
                    <div class="form-group">
                        <label for="user"><h4>Tên đăng nhập:</h4></label>
                        <input class="form-control" id="user" type="text" name="user" placeholder="Tên đăng nhập..." required>
                    </div>
                    <div class="form-group">
                        <label for="pass"><h4>Mật Khẩu:</h4></label>
                        <input class="form-control" type="password" name="pass" id="pas" placeholder="Mật khẩu..." required>
                    </div>
                    <div class="form-group">
                        <label for="user"><h4>Số điện thoại:</h4></label>
                        <input class="form-control" id="sdt" type="text" name="sdt" placeholder="Số điện thoại..." required>
                    </div>
                    <div class="form-group">
                        <label for="user"><h4>Email:</h4></label>
                        <input class="form-control" id="email" type="text" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label for="user"><h4>Địa chỉ:</h4></label>
                        <input class="form-control" id="address" type="text" name="address" placeholder="Địa chỉ..." required>
                    </div>
                    <button class="btn" type="submit" name="rgi" id="rgi" value="Đăng ký">Đăng Ký</button>
                    <div class="regi_login">
                        <a class="regi" href="Login.php">Quay lại đăng nhập</a>
                    </div>
                </div>
                <?php
                    switch ($_POST['rgi']) {
                        case 'Đăng ký':{
                            $name=$_POST['name'];
                            $sdt=$_POST['sdt'];
                            $address=$_POST['address'];
                            $email = $_POST['email'];
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $phanquyen = 3;
                            $conn = $p->connect();
                            $idtk= $p->themxoasua("insert into taikhoan(username,password,ten,phanquyen) values('$user','$pass','$name','$phanquyen')");
                            if($idtk==1){
                                echo '<script> alert("Đăng ký thành công");</script>';
                                $last_id = mysql_insert_id($conn);
                            }
                            $name=$_POST['name'];
                            $sdt=$_POST['sdt'];
                            $address=$_POST['address'];
                            $email = $_POST['email'];
                            $idkh = $p->themxoasua("insert into khachhang(tenkh,sodt,diachi,email,id_tk) values('$name','$sdt','$address','$email','$last_id')");
                            if ($idkh==1){
                               
                            }
                        }
                        break;
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>