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
                                <?php if ($_SESSION['userSession'] == $row2['id']) { ?>
                                    <a class="fo-btn" href="index.php?action=updateinfo&id=<?= $_SESSION['userSession'] ?>">Modifier</a>
                                <?php } ?>
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
                                    <li><a href="#tab<?= ($row['role'] == 3) ? 1 : 2 ?>default" data-toggle="tab">A propos</a></li>
                                    <?php if ($_SESSION['userSession'] != $row2['id']) { ?>
                                        <li><a href="#tab3default" data-toggle="tab">Contact</a></li>
                                    <?php } else { ?>
                                        <li><a href="#tab3default" data-toggle="tab">Message <span><?= $countMessage ?></span></a></li>
                                    <?php } ?>
                                    <li><a href="#tab4default" data-toggle="tab">Avis</a></li>
                                    <?php if ($row['role'] == 1){ ?>
                                    <li><a href="#tab5default" data-toggle="tab">GESTION ADMIN</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <?php if ($row['role'] == 3 OR $row['role'] == 1) {
                                    echo ' ';
                                } else { ?>
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
                                                                                echo "<img src=" . $result['img_path'] . " alt=" . $result['artcile_name'] . " />";
                                                                            } else {
                                                                                echo "<img  src='./images/product/1.png'  />";
                                                                            } ?>
                                                            </div>
                                                            <div class="dit-t clearfix">
                                                                <div class="left-ti">
                                                                    <h4><?= $result['artcile_name'] ?></h4>
                                                                    <p>par <span><a href="index.php?action=profile&username=<?= $result['username'] ?>"><?= $result['username'] ?></a></span></p>
                                                                </div>
                                                                <a href="index.php?action=article&id=<?=$result['id_article']?>" tabindex="0"><?= $result['prix'] ?> €</a>
                                                            </div>
                                                    

                                                        </div>
                                                        
                                                    </div>
                                                    <?php }
                                                        } ?>
                                                        <a class="fo-btn" href="index.php?action=createarticle">ajouter un produit</a>
                                            </div>
                                    </div>
                                <?php } ?>
                                <div class="tab-pane fade <?= ($row['role'] == 3 OR $row['role'] == 1 ) ? "in active" : ' ' ?>" id="tab<?= ($row['role'] == 3) ? 1 : 2 ?>default">
                                    <div class="about-box">
                                        <h2>A propos de moi</h2>
                                        <p> ville = <?= $row2['nom_ville'] ?></p>
                                        <p>code postale = <?= $row2['ville'] ?></p>
                                        <p>nom : <?= $row2['nom'] ?></p>
                                        <p>prenom: <?= $row2['prenom'] ?></p>
                                        <p>adresse: <?= $row2['adresse'] ?></p>
                                        <p>email: <?= $row2['email'] ?></p>
                                        <?php if ($_SESSION['userSession'] == $row2['id']) { ?>
                                            <p>n° de compte : <?= $row2['compte']; ?></p>
                                        <?php }
                                        var_dump($row2['id']);
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3default">
                                    <?php if ($_SESSION['userSession'] != $row2['id']) { ?>
                                        <form action="" class="form-group" method="post">
                                            <input type="hidden" name="id" value="<?= $row2['id'] ?>">
                                            <label for="subject">Sujet</label>
                                            <input class="form-control" type="text" name="subject" id="" placeholder="sujet" required>
                                            <br />
                                            <label for="message">message</label>
                                            <textarea style="border : 1px solid black" class="mt-5" name="message" id="" cols="127" rows="10" required></textarea>
                                            <button type="submit" name="btn-send">envoyer</button>
                                        </form>
                                    <?php } else {  ?>
                                        <div class="container">
                                            
                                                <div class="row">

                                                    <div class="col-md-2">
                                                    <ul>
                                                    <?php
                                                $i = 0;
                                                foreach ($allMessage as $res) {
                                                    
                                                    $fromUserId->execute([':uid' => $res['from_user_id']]);
                                                    $sender = $fromUserId->fetch(PDO::FETCH_ASSOC);
                                                   
                                                    ?>
                                                        <li onclick="display(<?= $i ?>)" style="border-bottom: 1px solid black" >
                                                        <p> <?= $res['subject'] ?></p>
                                                        <p><?= $res['message'] ?></p>
                                                    </li>
                                                    <?php $i++; } ?>
                                                    </ul>
                                                    </div>
                                                <?php 
                                                $j=0;
                                                foreach ($allMessage as $res) {
                                                    print_r ($res);
                                                    echo '<br> <br>'
                                                ?>
                                                    <div class="col-md-10" id="response<?= $j ?>" style="display:none">
                                                        <p id="username<?=$j?>"><?= $sender['username'] ?></p>
                                                        <p id="subject<?=$j?>"> <?= $res['subject'] ?></p>
                                                        <p id="message<?=$j?>"><?= $res['message'] ?></p>

                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?=$res['from_user_id']?>">
                                                            <input type="hidden" name="subject" value="<?=$res['subject']?>">
                                                            <textarea style="border : 1px solid black" class="my-5" name="message" id="" cols="50" rows="3"></textarea>
                                                            <button type="submit" name="reply">envoyer</button>
                                                        </form>
                                                    </div>
                                                <?php $j++;
                                                        
                                                    }
                                                    if(isset($_POST['reply']))
                                                        {
                                                            $statement = $user_home->runQuery("INSERT INTO message (to_user_id, from_user_id, subject, message, status) VALUES (:to_user_id, :from_user_id, :subject, :message, 1)");
                                                            $data=[
                                                                ':to_user_id'=>$_POST['id'],
                                                                ':from_user_id'=> $_SESSION['userSession'],
                                                                ':subject'=>$_POST['subject'],
                                                                ':message'=>$_POST['message'],
                                                            ];
                                                            $statement->execute($data);
                                                        } ?>
                                                </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane fade" id="tab4default"> 
                                    <div class="comment">
                                        <?php 
                                        if($countComment<0){
                                        foreach($comment as $row12) {
                                            
                                            ?>
                                            <p><strong> <?= $row12['from_username'] ?></strong> <span><?= $row12['timestamp']?></span> </p>
                                            <p><?= $row12['comment'] ?></p>
                                            <p>note = <?= $row12['note']?> /5</p>
                                            <hr>
                                        <?php }}?>
                                    </div>
                                    <?php if(isset($_GET['username'])){ ?>
                                    <form action="" method="post">
                                        <label for="comment">commentaire</label>
                                        <textarea name="comment" id="" cols="80" rows="10" style="border: 1px solid black"></textarea>
                                        <label for="note">note</label>
                                        <select name="note" id="">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button type="submit" name="addcomment">ajouter un commentaire</button>
                                    </form>
                                    <?php } ?>
                                </div>
                                <?php if($row['role']== 1){ ?>
                                <div class="tab-pane fade" id="tab5default"> 
                                    <table class="table">
                                        <tr>
                                            <td>Username</td>
                                            <td>Email</td>
                                            <td>role</td>
                                            <td>modifier</td>
                                            <td>supprimer</td>
                                        </tr>
                                    
                                    <?php foreach($alluser as $oneUser) {?>
                                        <tr>
                                            <th><?=$oneUser['userName']?></th>
                                            <th><?=$oneUser['userEmail']?></th>
                                            <th><?=$oneUser['role']?></th>
                                            <th> <a href="index.php?action=updateinfo&id=<?=$oneUser['userID']?>">modifier</a>
                                            <th> <a href="index.php?action=deleteuser&id=<?=$oneUser['userID']?>">delete</a> </th>
                                            </th>
                                            
                                        </tr>
                                    <?php }?>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>





    </div>
    </section>
    <script>
 
        function display(i) {
            document.getElementById(`response${i}`).style.display = "block"
        }
    </script>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>