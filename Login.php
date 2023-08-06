<?php
	include("assets/class/login.php");
	$p=new mylogin();
    error_reporting(E_ERROR | E_PARSE);
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
    <title>Đăng nhập</title>
</head>
<style>
    *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    }
    .body{
        background-image: linear-gradient(#D2691E,#FF8C00,#E9967A);
        background-repeat: no-repeat;
        height: 788px;
    }
    .login{
        border: 0px solid black;
        height: 550px;
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
        background-color: #D2691E;
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
        background-color: #D2691E;
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
                <h2><i class="fas fa-user-circle"></i> Đăng nhập</h2>
            </div>
            <form action="" method="post">
                <div class="container">
                    <div class="form-group">
                        <label for="user"><h4>Tên đăng nhập:</h4></label>
                        <input class="form-control" id="user" type="text" name="user" placeholder="Tên đăng nhập..." required>
                    </div>
                    <div class="form-group">
                        <label for="pass"><h4>Mật Khẩu:</h4></label>
                        <input class="form-control" type="password" name="pass" id="pas" placeholder="Mật khẩu..." required>
                    </div>
                    <button class="btn" type="submit" name="log" id="log" value="Đăng nhập">Đăng nhập</button>
                    <div class="regi_login">
                        <a class="regi" href="Regi.php">Đăng ký tài khoản</a>
                    </div>
                </div>
                <?php
                    switch ($_POST['log']) {
                        case 'Đăng nhập':{
                            $user = $_REQUEST['user'];
                            $pass = $_REQUEST['pass'];
                            if ($user!='' && $pass!='') {
                                if ($p->login($user, $pass)==1) {
                                    session_start();
                                    $phanquyen = $_SESSION['phanquyen'];
                                    if ($phanquyen == 1) {
                                        header('location:main_admin.php');
                                    }else{
                                        if ($phanquyen == 2) {
                                            header('location:listHD.php');
                                        }else{
                                            header('location:index.php');
                                        }
                                    }
                                }else{
                                    echo'Đăng nhập không thành công';
                                }
                            }else{
                                echo'Vui lòng điền đầy đủ thông tin';
                            }
                            break;
                        }
                   }
                ?>
            </form>
        </div>
    </div>
</body>
</html>