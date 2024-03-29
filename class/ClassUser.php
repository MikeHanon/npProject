<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once './config/dbconfig.php';
Class User
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
            $password = $upass;
            $stmt = $this->conn->prepare("INSERT INTO tbl_users(userName, userEmail, userPass, tokenCode, role) VALUES (:user_name, :user_mail, :user_pass, :active_code, :role)");
           
           $data =[ 
            ":user_name"=> $uname,
            ":user_mail"=>$email,
            ":user_pass"=> $password,
            ":active_code"=> $code,
            ":role"=>$role
           ];
            $stmt->execute($data);
           
            return $stmt;
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    function login($email,$upass)
    {
        
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail = :email LIMIT 1  ");
            $stmt->execute([':email'=>$email]);
            
           
            if($stmt->rowCount() > 0)
            {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
                $test = $userRow['userPass'];
                 
                if($userRow['userStatus'] == "Y")
                {
                    
                    if(password_verify($upass,$userRow['userPass'] ))
                    {
                        $_SESSION['userSession'] = $userRow['userID'];
                        $_SESSION['userName'] = $userRow['userName'];
                        $_SESSION['role'] = $userRow['role'];
                        return true;
                    }
                    else
                    {
                        
                        header("Location: index.php?action=login&error");
                        exit;
                        
                    }
                }
                else
                {
                    header("Location: index.php?action=login&inactive&$stmt");
                    
                    exit;
                }
            
            }
            else
            {
               
                header("Location: index.php?action=login&error");
                
                
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
        
        require_once('PHPMailer/PHPMailer.php');
       
        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->SMTPDebug  = 0;                     
        $mail->SMTPAuth   = true;                  
        $mail->SMTPSecure = "ssl";                 
        $mail->Host       = "smtp.gmail.com";      
        $mail->Port       = 465;             
        $mail->AddAddress($email);
        $mail->Username="e.artisanat.info@gmail.com";
        $mail->Password="Ter44242";
        $mail->From='e.artisanat.info@gmail.com';
        $mail->FromName = 'E-artisanat.be';
        $mail->AddReplyTo('e.artisanat.info@gmail.com', 'E-artisanat.be');
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }
}
class Admin extends User
{

}

class Seller extends User
{

}

class Buyer extends User
{

}
?>
