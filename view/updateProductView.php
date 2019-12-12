<?php $title = $row['artcile_name'];
require_once './config/dbconfig.php';

?>
<form action="" method="post" enctype="multipart/form-data" >
<div class="product-page-main">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
                <div class="prod-page-title">
                    
                    <label for="article_name">Nom de l'article</label>
                    <input class="form-control" type="text" name="article_name" id="" value="<?= $row['artcile_name'] ?>" required>

                </div>
            </div>
        </div>
        <div class="row">
           
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
                            <label for="avatar"> ajouter une image :</label>
                            <input type="file" name="avatar" value="<?= $row['img_path'] ?>" id="avatar">
                            <input type="hidden" name="test" value="<?= $row['img_path'] ?>">
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
                            <textarea name="description" id="" cols="85" rows="10" style="border : 1px solid black"  required><?= $row['description'] ?></textarea>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                  <div class="price-box-right">
                     <h4>Prix</h4>
                     <label for="prix">Prix</label>
                <input class="form-control" type="text" name="prix" id="" value="<?= $row['prix']?>" required>  <span>€ par piece</span>
                <label for="quantité">stock = </label>
                <input class="form-control" type="text" name="quantité" id="" value="<?=$row['quantite']?>" required>

                     <label for="category_id"> Catégorie </label>
                <select  class="form-control" name="category_id">
                    <option  id="" value="1"<?=($row['category_id']=== "1"? 'selected' : '')?>>Alimentation</option>
                    <option  id="" value="2"<?=($row['category_id']=== "2"? 'selected' : '')?>>Batiments</option>
                    <option  id="" value="3"<?=($row['category_id']=== "3"? 'selected' : '')?>>Fabrication</option>
                    <option  id="" value="4"<?=($row['category_id']=== "4"? 'selected' : '')?>>Service</option>
                </select>
                <button class="btn btn-primary" style="margin-top: 10px" name="update" type="submit">modifier l'article</button>
                  </div>
                  
</div>
        </div>
    </div>
</div>
<script>
console.log(document.getElementById('avatar').value)
</script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>