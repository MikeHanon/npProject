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
    $reg_user = new User();

    if($reg_user->is_logged_in()!="")
    {
        $reg_user->redirect('index.php?action=profile');
    }
    if(isset($_POST['btn-signup']))
    {
        $uname = test_input($_POST['txtuname']);
        $email=test_input($_POST['txtemail']);
        $upass = password_hash($_POST['txtpass'], PASSWORD_DEFAULT);
  
        $role=$_POST['role'];
        $code = bin2hex(random_bytes(16));
        $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
        $stmt2 = $reg_user->runQuery(" INSERT INTO user_info (username,email) VALUES (:user_name, :user_mail)");
        $stmt->execute([":email_id"=>$email]);
       $stmt2->execute([":user_name"=>$uname,":user_mail"=>$email]) ;
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
    $user = new User();

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

function login2(){
    
    $user_login = new User();
    
    if($user_login->is_logged_in()!="")
    {
        $user_login->redirect('index.php?action=profile');
    }
    if(isset($_POST['txtemail']))
    {
        
        $email = ($_POST['txtemail']);
        $upass = ($_POST['txtupass']);
        
        if($user_login->login($email,$upass))
        {
         $user_login->redirect('index.php?action=profile');
        }
       }
    require('./view/loginView.php');
}

function profile()
{
    if($_SESSION['role']==1){
        $user_home = new Admin();
    }else if($_SESSION['role']==2){
        $user_home = new Seller();
    }else if($_SESSION['role']==3){
        $user_home = new Buyer();
    }
    

    if(!$user_home->is_logged_in())
    {
        $user_home->redirect('index.php');
    }
    $stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userName=:uname");
    $stmt2 = $user_home->runQuery("SELECT * FROM user_info WHERE username =:uname");
    $product = $user_home->runQuery("SELECT * FROM article WHERE username = :uname");
    $messagec = $user_home->runQuery("SELECT * FROM message WHERE to_user_id = :uid AND status = 1");
    $message = $user_home->runQuery("SELECT * FROM message user_info WHERE to_user_id= :uid");
    $fromUserId = $user_home->runQuery("SELECT username FROM user_info WHERE id= :uid");
if(isset($_GET['username']))
{
    $stmt->execute([':uname'=>$_GET['username']]);
    $stmt2->execute([':uname'=>$_GET['username']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    
    $product->execute([':uname'=>$row2['username']]);
    $productList=  $product->fetchAll();
    $count = $product->rowCount();
}else{
    $stmt->execute([':uname'=>$_SESSION['userName']]);
    $stmt2->execute([':uname'=>$_SESSION['userName']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $messagec->execute([':uid'=>$row2['id']]);
    $message->execute([':uid'=>$row2['id']]);
    $product->execute([':uname'=>$_SESSION['userName']]);
   
    $productList=  $product->fetchAll();
    $count = $product->rowCount();
    $countMessage = $messagec->rowCount(); 
    $allMessage = $message->fetchAll(PDO::FETCH_ASSOC);
   
    
}
  if(isset($_POST['btn-send']))
  {
      $statement = $user_home->runQuery("INSERT INTO message (to_user_id, from_user_id, subject, message, status) VALUES (:to_user_id, :from_user_id, :subject, :message, 1)");
      $data=[
          ':to_user_id'=>$row2['id'],
          ':from_user_id'=> $_SESSION['userSession'],
          ':subject'=>$_POST['subject'],
          ':message'=>$_POST['message'],
      ];
      $statement->execute($data);
  }
 
    
    require('./view/profile.php');
   

}

function logout()
{
    if($_SESSION['role']==1){
        $user = new Admin();
    }else if($_SESSION['role']==2){
        $user = new Seller();
    }else if($_SESSION['role']==3){
        $user = new Buyer();
    }
    if(!$user->is_logged_in())
{
 $user->redirect('index.php?action=profile');
}

if($user->is_logged_in()!="")
{
 $user->logout(); 
 $user->redirect('index.php');
}
}

function forgotPassword()
{
    $user = new User;

    if($user->is_logged_in()!="")
    {
        $user->redirect('index.php');
    }

    if(isset($_POST['btn-submit']))
    {
        $email = $_POST['txtemail'];

        $stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
        $stmt->execute([":email"=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount()== 1)
        {
            $id = base64_encode($row['userID']);
            $code = bin2hex(random_bytes(16));
            $stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
            $stmt->execute([":token"=>$code,":email"=>$email]);
            $message = "
            Bonjour, $email 
            <br /> <br />
            Nous avons recus une demnde de réinitialisation de votre mot de passe. Si vous en êtes a l'origine,
            veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe, si ce n'est pas le cas ignorer simplement cet email.
            <br/> <br />
            Cliquer sur le lien suivant pour réinitialiser votre mot de passe
            <br /> <br />
            <a <a href='http://localhost/npProject/index.php?action=resetPassword&id=$id&code=$code'> cliquer ICI pour réinitialiser votre mot de passe</a>
            <br /> <br />
            Merci <br />
            L'équipe d'E-artisanat";
            $subject = "Réinitialisation de votre mot de passe";
            $user->send_mail($email,$message,$subject);
            $msg = "<div class='alert alert-success'> <button class='close' data-dismiss='alert'>&times;</button>
            Nous avons envoyé un email à $email.<br />
            Cliquez sur le lien de réinitialisation du mot de passe dans l'email pour générer un nouveau mot de passe. </div>";
        }
        else
        {
            $msg = "<div class= 'alert alert-danger'> <button class='close' data-dismaiss='alert>&times;</button>
            <strong>Désolé!</strong> cet email n'a pas été trouvé</div>";
        }
    }
    require('./view/forgotPasswordView.php');
}

function resetPass()
{
    $user = new User;
    if(empty($_GET['id']) && empty($_GET['code']))
    {
        $user->redirect('index.php');
    }

    if(isset($_GET['id']) && isset($_GET['code']))
    {
        $id=base64_decode($_GET['id']);
        $code = $_GET['code'];

        $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
        $stmt->execute([":uid"=>$id,":token"=>$code]);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount()== 1)
        {
            if(isset($_POST['btn-reset-pass']))
            {
                $pass = $_POST['pass'];
                $cpass = $_POST['confirm-pass'];

                if($cpass!==$pass)
                {
                    $msg = "<div class='alert alert-block'>
                    <button class ='close' data-dismiss='alert'>&times;</button>
                    <strong>Désolé</strong> les mots de passe ne coresspondent pas</div>";
                }
                else
                {
                    $stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
                    $stmt->execute([":upass"=>password_hash($cpass,PASSWORD_DEFAULT),":uid"=>$rows['userID']]);
                    $msg = "<idv class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>
                    Mot de passe changé.</div>";

                    header("refresh:5; index.php?action=login");
                }
            }
        }
        else
        {
            exit;
        }
        require('./view/resetPasswordView.php');
    }
}
function image()
{
    
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
  $uploadOk = 1;
  $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if (isset($_POST["changeAvatar"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check !== false) {
      echo "OK file" . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "this file is not image";
      $uploadOk = 0;
    }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Existing file.";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["avatar"]["size"] > 5000000) {
    echo "heavy file";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if (
    $FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
    && $FileType != "gif"
  ) {
    echo "Correct file only.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Oops it did not work.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
      $array = explode('.', $_FILES['avatar']['name']);
      $fileName = $array[0];

      return $target_file;
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

function updateInfo()
{
    if($_SESSION['role']==1){
        $user = new Admin();
    }else if($_SESSION['role']==2){
        $user = new Seller();
    }else if($_SESSION['role']==3){
        $user = new Buyer();
    }
if(isset($_POST['changeAvatar']))
{
    $target_file = image();
    
    $stmt = $user->runQuery("UPDATE user_info SET photo=:imgPath WHERE id = :id ");
    $stmt->execute([":id"=> $_GET['id'], ":imgPath"=> $target_file]);

}
    if(isset($_POST['btnUpdate']))
    {
        
        $data=[
            ":id"=> $_GET['id'],
            ":name"=>$_POST['name'],
            ":lastname"=>$_POST['lastname'],
            ":address"=>$_POST['adresse'],
            ":email"=> $_POST['email'],
            ":account"=>$_POST['account'],
            ":cp"=>intval($_POST['cp']),
            ":city"=>$_POST['city'],
            
        ];
        $stmt = $user->runQuery("UPDATE user_info SET nom=:name, prenom=:lastname, adresse=:address, email=:email, compte=:account, ville=:cp, nom_ville=:city WHERE id = :id");
        $stmt->execute($data);
        header("location: index.php?action=profile");
    }
    $stmt2 = $user->runQuery("SELECT * FROM user_info WHERE id =:uid");
    $stmt2->execute([':uid'=>$_SESSION['userSession']]);
    $product = $user->runQuery("SELECT * FROM article WHERE username = :uname");
    $product->execute([':uname'=>$_SESSION['userName']]);
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $count = $product->rowCount();
    $productList=  $product->fetchAll();
require('./view/updateinfoView.php');
}

function article()
{
    $user = new User;
    if(!$user->is_logged_in())
    {
        $user->redirect('index.php');
    }
$stmt = $user->runQuery("SELECT * FROM article WHERE id_article = :idarticle");
$stmt2 = $user->runQuery("SELECT photo FROM user_info WHERE username = :uname");
$stmt->execute([':idarticle'=>$_GET['id']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt2->execute([':uname'=>$row['username']]);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);


require('./view/articleView.php');
}