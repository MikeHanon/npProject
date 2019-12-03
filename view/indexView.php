<?php $title = 'E-artisanat'; ?>

<?php ob_start(); ?>
<div class="main-product">
    <div class="container">
        <div class="row clearfix">
            <div class="find-box">
                <h1>Bienvenu sur E-artisanat</h1>
                <h4>le premier site d'économie collaborative sur l'artisanat, que se soit pour l'alimentation, le batiments, la fabrication
                    d'objet ou même de petit service vous trouverez tout chez nous
                </h4>
                <div class="row clearfix">
                  <div class="col-lg-3 col-sm-6 col-md-3">
                     <a href="#">
                        <div class="box-img">
                           <h4>Alimentation</h4>
                           <img src="../images/product/allimentation.png" alt="" />
                        </div>
                     </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-md-3">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Batiment</h4>
                           <img src="../images/product/batiment.png" alt="" />
                        </div>
                     </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-md-3">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Fabrication</h4>
                           <img src="../images/product/fabrication.png" alt="" />
                        </div>
                     </a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-md-3">
                     <a href="productpage.html">
                        <div class="box-img">
                           <h4>Services</h4>
                           <img src="../images/product/service.png" alt="" />
                        </div>
                     </a>
                  </div>
            </div>
        </div>
    </div>
        <?php $content = ob_get_clean(); ?>
            <?php require('template.php'); ?>