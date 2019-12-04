<?php
class USER 
{
    private $db;

    function __construct($dbCon)
    {
        $this->db = $dbCon;
    }

    public function resgister($name, $surname, $username, $password, $role, $adresse, $email, $compte, $city, $photo)
    {
        try
        {
            $new_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO user (username, password, role) VALUES(:username, :password, :role);
            INSERT INTO `user_info`(`username`, `nom`, `prenom`, `adresse`, `email`, `compte`, `ville`, `photo`) VALUES(:username, :name, :surname, :adresse, :email, :compte, :city, :photo)
            ");

            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $new_password);
            $stmt->bindparam(':role', $role);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':surname', $surname);
            $stmt->bindparam(':adresse', $adresse);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':compte', $compte);
            $stmt->bindparam(':city', $city);
            $stmt->bindparam(':photo', $photo);
            $stmt->execute();
            return $stmt;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function login($username, $password)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :username LIMIT 1");
            $stmt->execute(array(':username'=>$username));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount()>0)
            {
                if(password_verify($password,$userRow['password']))
                {
                    $_SESSION['user_session']= $userRow['username'];
                    return true;
                }else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("location: $url");
    }
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
?>