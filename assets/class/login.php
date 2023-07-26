<?php
class mylogin{
    public function connect(){
            $con = mysql_connect("localhost", "ql_coffee", "123456789");
			if(!$con){
				echo 'Không kết nối';
				exit();
			}else{
				mysql_select_db("love_coffee");
				mysql_query("SET NAMES UTF8");
				return $con;
			}
        }
    public function login($user,$pass){
        $pas=md5($pass);
        $link=$this->connect();
        $sql="select id_tk, username, password, phanquyen from taikhoan where username='$user' and password='$pass' limit 1";
        $ketqua = mysql_query($sql,$link);
        $i=mysql_num_rows($ketqua);
        if ($i==1) {
            while ($row=mysql_fetch_array($ketqua)) {
                $idtk = $row['id_tk'];
                $username = $row['username'];
                $password = $row['password'];
                $phanquyen = $row['phanquyen'];
                session_start();
                $_SESSION['idtk']=$idtk;
                $_SESSION['user']=$username;
                $_SESSION['pass']=$password;
                $_SESSION['phanquyen']=$phanquyen;
                return 1;
            }
        } else {
            return 0;
        }
    }
    public function confirmlogin($idtk, $user, $pass, $phanquyen){
        $link= $this->connect();
        $sql = "select id_tk from taikhoan where id_tk='$idtk' and username='$user' and password='$pass' and phanquyen='$phanquyen' limit 1";
        $ketqua = mysql_query($sql,$link);
        $i = mysql_num_rows($ketqua);
        if ($i!=1) {
            header('location:Login.php');
        }
    }
}
?>
