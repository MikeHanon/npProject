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
    
    ville = <?= $row2['nom_ville']?>
    code postale = <?=$row2['ville']?>
</section>
<section>
    nom : <?= $row2['nom']?>
    prenom: <?= $row2['prenom']?>
    adresse: <?= $row2['adresse']?>
    email:  <?= $row2['email']?>
    n° de compte : <?= $row2['compte'];?>
    <img src="<?php if($row2['photo']!='""'){echo $row2['photo'];}else{echo './images/profile.png';}?>" alt="photo profile">
</section>
<?php if($row['role'] == 2){?>
<section>
    <h2>Vos produit</h2>
    <div class="slider">
    <?php 
    
    foreach($productList as $result){ 
        var_dump($result) ?>
    <div class="prod-box">
                        <div class="prod-i">
                        <?php if($result['img_path']!= ""){echo "<img src=".$result['img_path']." alt=".$result['artcle_name']." />";}
                        
                        else{
                        echo "<img  src='./images/product/1.png'  />";
                        }?> 
                        </div>
                        <div class="prod-dit clearfix">
                            <div class="dit-t clearfix">
                                <div class="left-ti">
                                    <h4><?= $result['artcile_name']?></h4>
                                    <p>par <span><?= $result['username'] ?></span> </p>
                                </div>
                                <a href="#"><?= $result['prix'] ?></a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                    </div>
</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>