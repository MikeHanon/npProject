<?php $title = $_SESSION['userName'];
require_once './config/dbconfig.php';

?>

<?php ob_start(); ?>
<div class="profile-box banner-p">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-b">
                     <img style="height: 500px;" src="images/bg_main.png" alt="#" />
                     <div class="dit-p">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                           <!-- <div class="profile-left-b">
                              <ul>
                                 <li><a href="#">Manufacturer </a></li>
                                 <li><a href="#">Furniture</a></li>
                                 <li><a href="#">Est.2002</a></li>
                                 <li><a href="#">54-100 employees</a></li>
                              </ul>
                           </div> -->
                           <div class="profile-right-b">
                              <a class="vi-btn" href="#">Visit website</a>
                              <a class="fo-btn" href="#">Follow</a>
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
        </div>

        <p></p>
        <p><?php
            if ($row['role'] == 2) {
                echo 'vendeur';
            } else if ($row['role'] == 3) {
                echo 'acheteur';
            } else if ($row['role'] == 1) {
                echo 'admin';
            }

            ?></p>
            <div class="col-md-10 col-sm-8">
                  <div class="profile-pro-right">
                     <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading clearfix">
                           <ul class="nav nav-tabs pull-left">
                              <li class="active"><a href="#tab1default" data-toggle="tab">Products <span>321</span></a></li>
                              <li><a href="#tab2default" data-toggle="tab">About</a></li>
                              <li><a href="#tab3default" data-toggle="tab">Contact</a></li>
                           </ul>
                           </div>
                        <div class="panel-body">
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab1default">
                                 <div class="product-box-main row">
                                    <div class="col-md-4 col-sm-6">
                                       <div class="small-box-c">
                                          <div class="small-img-b">
                                             <img src="images/tr1.png" alt="#" />
                                          </div>
                                          <div class="dit-t clearfix">
                                             <div class="left-ti">
                                                <h4>Product</h4>
                                                <p>Under <span>Sofa Corner</span></p>
                                             </div>
                                             <a href="#" tabindex="0">$1220</a>
                                          </div>
                                          <div class="prod-btn">
                                             <a href="#"><i class="fa fa-star" aria-hidden="true"></i> Save to wishlist</a>
                                             <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like this</a>
                                             <p>23 likes</p>
                                          </div>
                                       </div>
                                    </div>
        <section>

            ville = <?= $row2['nom_ville'] ?>
            code postale = <?= $row2['ville'] ?>
        </section>
        <section>
            nom : <?= $row2['nom'] ?>
            prenom: <?= $row2['prenom'] ?>
            adresse: <?= $row2['adresse'] ?>
            email: <?= $row2['email'] ?>
            n° de compte : <?= $row2['compte']; ?>
            <img src=>
        </section>
        <?php if ($row['role'] == 2) { ?>
            <section>
                <h2>Vos produit</h2>
                <div class="slider">
                    <?php

                        foreach ($productList as $result) {
                            ?>
                        <div class="prod-box">
                            <div class="prod-i">
                                <?php if ($result['img_path'] != "") {
                                            echo "<img src=" . $result['img_path'] . " alt=" . $result['artcle_name'] . " />";
                                        } else {
                                            echo "<img  src='./images/product/1.png'  />";
                                        } ?>
                            </div>
                            <div class="prod-dit clearfix">
                                <div class="dit-t clearfix">
                                    <div class="left-ti">
                                        <h4><?= $result['artcile_name'] ?></h4>
                                        <p>par <span><?= $result['username'] ?></span> </p>
                                    </div>
                                    <p><?= $result['prix'] ?></p>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
                </div>
            </section>
            <?php $content = ob_get_clean(); ?>
            <?php require('template.php'); ?>