<?php
class mylogin{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "love_coffee";
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Không kết nối: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }

    public function login($user, $pass){
        $pas = md5($pass);
        $sql = "SELECT id_tk, username, password, phanquyen FROM taikhoan WHERE username='$user' AND password='$pass' LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $idtk = $row['id_tk'];
            $username = $row['username'];
            $password = $row['password'];
            $phanquyen = $row['phanquyen'];
            session_start();
            $_SESSION['idtk'] = $idtk;
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            $_SESSION['phanquyen'] = $phanquyen;
            return 1;
        } else {
            return 0;
        }
    }

    public function confirmlogin($idtk, $user, $pass, $phanquyen){
        $sql = "SELECT id_tk FROM taikhoan WHERE id_tk='$idtk' AND username='$user' AND password='$pass' AND phanquyen='$phanquyen' LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result->num_rows != 1) {
            header('location: Login.php');
        }
    }
}
?>