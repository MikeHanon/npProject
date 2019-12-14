<?php $title = 'Acceuil'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<?php if(!$user->is_logged_in())
    { ?>
<div class="container">
<div class="row">
            <div class="main-start-box">
                <div class="bg_img_left"><img src="./images/bg_img1.png" alt="#" /></div>
                <div class="container">
                    <div class="buyer-box clearfix">
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="left-buyer">
                                <img class="img-responsive" src="<?=$row['img_path']?>" alt="#" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="right-buyer">
                                <h4><?=$row['category_name']?></h4>
                                
                                
                                <p> <?=$row['description']?>
                                </p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php }else
    { ?>
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
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
               <?php }?>
            </div>
        </div>
    <?php } ?> 
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>