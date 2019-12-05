<?php
require_once('./class/classUser.php');

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function register()
{
    $reg_user = new user();

    if($reg_user->is_logged_in()!="")
    {
        $reg_user->redirect('index.php?action=profile');
    }
    if(isset($_POST['btn-signup']))
    {
        $uname = test_input($_POST['txtuname']);
        $email=test_input($_POST['txtemail']);
        $upass = test_input(password_hash($_POST['txtpass'], PASSWORD_DEFAULT));
        $role=$_POST['role'];
        $code = bin2hex(random_bytes(16));
        $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
        $stmt->execute([":email_id"=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount()>0)
        {
            $msg = "<div class='alert alert-error'><button class= 'close' data-dismiss='alert'>&times;</button>
            <strong>Désolé !</strong> cette adresse mail est déja utilisée. Veuillez réessayer avec une autre adresse ou cliquer <a href='./index.php?action=fpaswword'>ici</a> si vous avez oublié votre mot de passe</div>";
        }
        else
        {
            if($reg_user->register($uname,$email,$upass,$code,$role))
            {
                $id = $reg_user->lastID();
                
                $key = base64_encode($id);
                $id = $key;
                var_dump($id);

                $message = "
                Hello $uname,
                <br/><br/>
                Bienvenu sur E-artisanat! <br/>
                Pour completer ton inscription clique simplement sur le lien suivant <br/>
                <br/><br/>
                <a href='http://localhost/npProject/index.php?action=verify&id=$id&code=$code''>Clique ICI pour Activer ;)</a>
                <br/><br/>
                L'équipe de E-artisanat 
                ";
                $subject = "Confirmation Inscription E-artisanat";

                $reg_user->send_mail($email, $message,$subject);
                $msg = "
                <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong> Success!</strong> Nous vous avons envoyé un email à $email.
                Veuillez cliquer sur le lien dans le mail pour créer votre compte.
                </div>
                ";
            }
            else
            {
                echo "Désolé, nous n'avons pu exécuté la requête...";
            }
        }

    }
    require ('./view/registerView.php');

}
function Verify()
{
    $user = new user();

    if(empty($_GET['id']) && empty($_GET['code']))
    {
        $user->redirect('index.php?action=profile');
    }
    if(isset($_GET['id']) && isset($_GET['code'])){
        
        $id = base64_decode($_GET['id']);
        
        $code = $_GET['code'];
    }

    $statusY = 'Y';
    $statusN = 'N';

    $stmt = $user->runQuery("SELECT userID, userStatus FROM tbl_users WHERE userID=:uID AND tokenCode= :code LIMIT 1");
    $stmt->execute([':uID'=>$id, ':code'=>$code]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount()>0)
    {

        if($row['userStatus'] == $statusN)
        {
            $stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
            $data= [
                ":status"=>$statusY,
                ":uID"=>intval($id)
            ];
            var_dump($data);
            var_dump($stmt->execute($data));
            $stmt->execute($data);
            

            $msg = "<div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>WoW !</strong>  Votre compte est maintenant Activé <a href='index.php'>Connectez vous ici</a>
               </div>
      ";
        }
        else
        {
            $msg = "
             <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>sorry !</strong>  Votre compte est déja Activé : <a href='index.php'>Connectez vous ici</a>
          </div>
          ";
        }
    }
    else
    {
        $msg = "
         <div class='alert alert-error'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>sorry !</strong>  Aucun compte trouvé : <a href='index.php?action=register'>Inscrivez vous ici</a>
      </div>
      ";
    }
    require('./view/verifyView.php');
}

function login(){
    $user_login = new user();

    if($user_login->is_logged_in()!="")
    {
        $user_login->redirect('index.php?action=profile');
    }
    if(isset($_POST['btn-login']))
    {
        $email = trim($_POST['txtemail']);
        $upass = trim($_POST['txtupass']);
        
        if($user_login->login($email,$upass))
        {
         $user_login->redirect('index.php?action=profile');
        }
       }
    require('./view/indexView.php');
}