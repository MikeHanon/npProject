<?php
require_once '../config/dbconfig.php';
Class USER
{
    private $conn;
    public function __construct()
    {
        $database = New Database();
        $db= $database->dbConnection();
        $this->conn=$db;
    }
    public function runQuery($sql)
    {
        $stmt =$this->conn->prepare($sql);
        return $stmt;
    }
    public function lastID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }
    public function register($uname,$email,$upass,$code,$role)
    {
        try
        {
            $password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO tbl_users(userName, userEmail, userPass, tokenCode, role) VALUES (:user_name, :user_mail, :user_pass, :active_code, :role)");
            $stmt->bindparam(":user_name", $uname);
            $stmt->bindparam(":user_mail",$email);
            $stmt->bindparam(":user_pass", $password);
            $stmt->bindparam(":active_code", $code);
            $stmt->bindparam(":role",$role);
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function login($uname,$email,$upass)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE userName = :uname OR userEmail = :email LIMIT 1  ");
            $stmt->execute([':uname'=>$uname, ':email'=>$email]);
            $userRow = $stmt->fetcht(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0)
            {
                if($userRow['userStatus'] == "Y")
                {
                    if(password_verify($upass, $userRow['user_pass']))
                    {
                        $_SESSION['userSession'] = $userRow['userID'];
                        $_SESSION['userName'] = $userRow['userName'];
                        $_SESSION['role'] = $userRow['role'];
                        return true;
                    }
                    else
                    {
                        header("Location: index.php?error");
                        exit;
                    }
                }
                else
                {
                    header("Location: index.php?inactive");
                    exit;
                }
            }
            else
            {
                header("Location: index.php?error");
                exit;
            }
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function is_logged_in()
    {
        if(isset($_SESSION['userSession']))
        {
            return true;
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

    public function send_mail($email,$message,$subject)
    {
        
    }
}
?>