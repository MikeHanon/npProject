<?php $title = $_SESSION['userName'];
require_once './config/dbconfig.php';

?>

<?php ob_start(); ?>
<div class="profile-box banner-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-b">
                    <img style="height: 400px;" src="images/bg_main.png" alt="#" />
                    <div class="dit-p">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-profile-box">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 pr">
                    <div class="profile-pro-left">
                        <div class="left-profile-box-m">
                            <div class="pro-img">
                                <img src="<?php if ($row2['photo'] != '""') {
                                                echo $row2['photo'];
                                            } else {
                                                echo './images/profile.png';
                                            } ?>" alt="photo profile" />
                                     
                            </div>
                           <form action="" method="post" enctype="multipart/form-data">
                               <input type="file" name="avatar" id="avatar">
                               <button type="submit" name="changeAvatar">changer avatar</button>
                           </form>
                            <div class="pof-text">
                                <h3><?= $_SESSION['userName'] ?></h3>
                                <div class="check-box"></div>
                            </div>
                            <p><?php
                                if ($_SESSION['role'] == 2) {
                                    echo 'vendeur';
                                } else if ($_SESSION['role'] == 3) {
                                    echo 'acheteur';
                                } else if ($_SESSION['role'] == 1) {
                                    echo 'admin';
                                }

                                ?></p>
                        </div>
                    </div>
                </div>



                <div class="col-md-10 col-sm-8">
                    <div class="profile-pro-right">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="nav nav-tabs pull-left">
                                    <?php if ($_SESSION['role'] == 2) { ?>
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Vos produit <span><?= $count ?></span></a></li>
                                    <?php } ?>
                                    <li><a href="#tab<?= ($_SESSION['role'] == 3)? 1 : 2?>default" data-toggle="tab">A propos</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                            <?php if($_SESSION['role'] == 3){echo ' ';}else{ ?>
                                <div class="tab-pane fade in active" id="tab1default">
                                    <?php if ($_SESSION['role'] == 2) { ?>
                                        <div class="product-box-main row">
                                            <?php

                                                foreach ($productList as $result) {
                                                    ?>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="small-box-c">
                                                        <div class="small-img-b">
                                                            <?php if ($result['img_path'] != "") {
                                                                        echo "<img src=" . $result['img_path'] . " alt=" . $result['artcile_name'] . " />";
                                                                    } else {
                                                                        echo "<img  src='./images/product/1.png'  />";
                                                                    } ?>
                                                        </div>
                                                        <div class="dit-t clearfix">
                                                            <div class="left-ti">
                                                                <h4><?= $result['artcile_name'] ?></h4>
                                                                <p>par <span><?= $result['username'] ?></span></p>
                                                            </div>
                                                            <a href="#" tabindex="0"><?= $result['prix'] ?> €</a>
                                                        </div>
                                                        </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                                
                                                    
                                                    <a class="fo-btn" href="index.php?action=addproduct">ajouter un produit</a>
                                                </div>
                                        </div>
                                
                                <?php } ?>
                                <div class="tab-pane fade <?=($_SESSION['role'] == 3)?"in active" : ' '?>" id="tab<?= ($_SESSION['role'] == 3)? 1 : 2?>default">
                                 <div class="about-box">
                                     <form class="form-group" action="" method="post">
                                    <h2>A propos de moi</h2>
                                    <label for="city">Ville</label>
                                    <input class="form-control" type="text" name="city" value = "<?= $row2['nom_ville'] ?>"> 
                                    <label for="cp">Code Postal</label>
                                    <input class="form-control" type="text" name="cp" value="<?= $row2['ville'] ?>">
                                    <label for="name">Nom:</label>
                                    <input class="form-control" type="text" name="name" value="<?= $row2['nom'] ?>">
                                    <label for="lastname">Prénom</label>
                                    <input class="form-control" type="text" name="lastname" value="<?= $row2['prenom'] ?>">
                                    <label for="adresse">Addresse</label>
                                    <input class="form-control" type="text" name="adresse" value="<?= $row2['adresse'] ?>">
                                    <label for="email">addresse email : </label>
                                    <input class="form-control" type="email" name="email" value="<?= $row2['email'] ?>">
                                    <label for="account">n° de compte</label>
                                    <input class="form-control" type="text" name="account" value="<?= $row2['compte']; ?>">
                                    <button class="btn btn-primary" type="submit" name="btnUpdate" class="">mettre a jour</button>
                                    </form>
                                 </div>
                              </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>



   
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>