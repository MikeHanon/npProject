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
                            <div class="profile-right-b">
                                
                                <a class="fo-btn" href="index.php?action=updateinfo&id=<?=$_SESSION['userSession']?>">Modifier</a>
                            </div>
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
                            <div class="pof-text">
                                <h3><?= $row['userName'] ?></h3>
                                <div class="check-box"></div>
                            </div>
                            <p><?php
                                if ($row['role'] == 2) {
                                    echo 'vendeur';
                                } else if ($row['role'] == 3) {
                                    echo 'acheteur';
                                } else if ($row['role'] == 1) {
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
                                    <?php if ($row['role'] == 2) { ?>
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Vos produit <span><?= $count ?></span></a></li>
                                    <?php } ?>
                                    <li><a href="#tab2default" data-toggle="tab">A propos</a></li>
                                    <li><a href="#tab3default" data-toggle="tab">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">
                                    <?php if ($row['role'] == 2) { ?>
                                        <div class="product-box-main row">
                                            <?php

                                                foreach ($productList as $result) {
                                                    ?>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="small-box-c">
                                                        <div class="small-img-b">
                                                            <?php if ($result['img_path'] != "") {
                                                                        echo "<img src=" . $result['img_path'] . " alt=" . $result['artcle_name'] . " />";
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
                                                <?php }
                                                } ?>
                                                
                                                    </div>
                                                    <a class="fo-btn" href="index.php?action=addproduct">ajouter un produit</a>
                                                </div>
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="tab2default">
                                 <div class="about-box">
                                    <h2>A propos de moi</h2>
                                    <p> ville = <?= $row2['nom_ville'] ?></p>
                                    <p>code postale = <?= $row2['ville'] ?></p>
                                    <p>nom : <?= $row2['nom'] ?></p>
                                    <p>prenom: <?= $row2['prenom'] ?></p>
                                    <p>adresse: <?= $row2['adresse'] ?></p>
                                    <p>email: <?= $row2['email'] ?></p>
                                    <p>n° de compte : <?= $row2['compte']; ?></p>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab3default">
                                  <form action="" class="form-group" methode="post">
                                      <input class="form-control" type="text" name="subject" id="" placeholder="sujet" required>
                                      <input class="form-control" type="email" name="email" id="" placeholder="adresse mail" required>
                                      <br />
                                      <textarea style="border : 1px solid black" class="mt-5"  name="message" id="" cols="127" rows="10" required></textarea>
                                      <button type="submit" name="btn-send">envoyer</button>
                                  </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>

           
      


    </div>
    </section>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>