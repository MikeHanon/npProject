<?php $title = 'search'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>

<div class="products">
    <div class="main-products">
        <h2>TRENDING PRODUCTS</h2>
        <div class="product-slidr">
            <div class="slider">
               <?php foreach($row as $rows){?>
                <div>
                    <div class="prod-box">
                        <div class="prod-i">
                            <img src="<?=$rows['img_path']?>" alt="#" />
                        </div>
                        <div class="prod-dit clearfix">
                            <div class="dit-t clearfix">
                                <div class="left-ti">
                                    <h4><?=$rows['artcile_name']?></h4>
                                    <p>By <span><?=$rows['username']?></span>
                                </div>
                                <a href="index.php?action=article&id=<?=$rows['id_article']?>"><?=$rows['prix']?></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
               <?php }?>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>