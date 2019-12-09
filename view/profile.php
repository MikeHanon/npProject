<?php $title = $_SESSION['userName']; 
require_once './config/dbconfig.php';
var_dump($_SESSION);
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
<section>
    ville = <?= $city2['city_name']?>
    code postale = <?=$city2['CP']?>
</section>
<section>
    nom : <?= $row2['nom']?>
    prenom: <?= $row2['prenom']?>
    adresse: <?= $row2['adresse']?>
    email:  <?= $row2['email']?>
    n° de compte : <?= $row2['compte']?>
    <img src="<?php if($row2['photo']!=""){echo($row2['photo'];}else{echo './image/product/1.png';}?>" alt="">
</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>