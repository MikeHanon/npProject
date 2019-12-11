<?php $title = $row['artcile_name'];
require_once './config/dbconfig.php';

?>

<div class="product-page-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="prod-page-title">
                    <h2><?= $row['artcile_name'] ?></h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-4">
                <div class="left-profile-box-m prod-page">
                    <div class="pro-img">
                        <img src="<?= $row2['photo'] ?>" alt="photo profile" />
                    </div>
                    <div class="pof-text">
                        <h3><?= $row['username'] ?></h3>
                        <div class="check-box"></div>
                    </div>
                    <a href="index.php?action=profile&username=<?= $row['username'] ?>">Visitez le profile</a>
                </div>
            </div>
            <div class="col-md-7 col-sm-8">
                <div class="md-prod-page">
                    <div class="md-prod-page-in">
                        <div class="page-preview">
                            <div class="preview">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><?php if ($row['img_path'] != "") {
                                                                                echo "<img src=" . $row['img_path'] . " alt=" . $row['artcile_name'] . " />";
                                                                            } else {
                                                                                echo "<img  src='./images/product/1.png'  />";
                                                                            } ?></div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><?php if ($row['img_path'] != "") {
                                                                                                        echo "<img src=" . $row['img_path'] . " alt=" . $row['artcile_name'] . " />";
                                                                                                    } else {
                                                                                                        echo "<img  src='./images/product/1.png'  />";
                                                                                                    } ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="description-box">
                        <div class="dex-a">
                            <h4>Description</h4>
                            <p><?= $row['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                  <div class="price-box-right">
                     <h4>Price</h4>
                     <h3><?= $row['prix']?> € <span>par piece</span></h3>
                     <p>stock restant = <?=$row['quantite']?></p>
                     <a href="index.php?action=addArticle">Ajouter au panier</a>
                  </div>
                  
</div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>