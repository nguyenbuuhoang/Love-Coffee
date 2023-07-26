<?php
    session_start();
    if (isset($_SESSION['idtk']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])) {
        include("assets/class/login.php");
        $p=new mylogin();
        $p->confirmlogin($_SESSION['idtk'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
    }else{
        header('location:Login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel='shortcut icon' href='assets/images/icon3.png' />
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Admin</title>

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
<style>
    #bg1{
        border-radius: 0px 0px 50px 50px;
    }
    #box1{
        border: 1px solid black;
        height: 100px;
    }
    #box2{
        border: 1px solid black;
        height: 100px;
    }
    #box3{
        border: 1px solid black;
        height: 100px;
    }
    .container-fluit ul{
        margin-left: 200px;
    }
    .container-fluit ul > li{
        display: inline-block;
    }
    .container-fluit ul > #box1{
        background-color: #FF8C00;
        padding: 50px;
        padding-left: 70px;
        margin-left: 25px;
        border: 0px solid black;
        border-radius: 10px;
        height: 150px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .container-fluit ul > #box2{
        background-color: #F08080;
        padding: 50px;
        padding-left: 70px;
        margin-left: 25px;
        border: 0px solid black;
        border-radius: 10px;
        height: 150px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .container-fluit ul > #box3{
        background-color: #008B8B;
        padding: 50px;
        padding-left: 70px;
        margin-left: 25px;
        border: 0px solid black;
        border-radius: 10px;
        height: 150px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .container-fluit ul li > a{
        font-size: 30px;
        color: black;
    }
    .container-fluit ul li > a:hover{
        text-decoration: none;
        color: white;
    }
    #bg2{
        border: 0px solid black;
        margin-top: 134px;
        height: 300px;
        border-radius: 50px 50px 0px 0px;
        background-color: #FFA07A;
    }
    #bg2 h3{
        text-align: center;
        padding-top: 120px;
        font-size: 40px;
    }
</style>
<body>
    <div id="bg1" class="jumbotron" style="background-color: #FFA07A;">
        <h1 style="text-align: center; font-size: 70px;"><i class="fas fa-user-shield"></i> Admin</h1>
    </div>
    <div class="container-fluit">
        <ul>
            <li id="box1"><a href="admin.php">Quản Lý Sản Phẩm</a></li>
            <li id="box2"><a href="listSP.php">Danh Sách Sản Phẩm</a></li>
            <li id="box3"><a href="listHD.php">Quản Lý Đơn Hàng</a></li>
        </ul>
    </div>
    <div id="bg2">
        <h3><i class="fas fa-coffee"></i> Love Coffee</h3>
    </div>
</body>
</html>