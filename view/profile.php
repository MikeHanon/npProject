<?php $title = $_SESSION['userName']; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<h1>PROFILE</h1>
<p><?=$row['userEmail']?></p>
<p><?php
if($row['role']==2){
    echo 'vendeur';
}else if ($row['role'] == 3){
    echo 'acheteur';
}else if($row['role']== 1){
    echo 'admin';
}
?></p>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>