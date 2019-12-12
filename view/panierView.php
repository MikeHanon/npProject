<?php $title = 'Acceuil'; 
require_once './config/dbconfig.php';
?>


<?php ob_start(); ?>
<h2 style="margin-bottom:10px">Bienvenue sur votre panier</h2>
<table class="table"style="margin-top:10px">
<tr>
    <th>Nom de l'article</th>
    <th>quantité</th>
    <th>Prix</th>
  </tr>
  <?php foreach($row as $rows){ ?>
    <tr>
        <th><?= $rows['article_presta'] ?></th>
        <th><?= $rows['quantity'] ?></th>
        <th><?= ($rows['quantity']*$rows['prix']) ?></th>
    </tr>
    <?php } ?>
</table>

<?php 
$total = 0;
foreach($row as $rows){
    $total += ($rows['quantity']*$rows['prix']);  } ?>
    <p>prix total = <?=$total?> </p>

    <a href="index.php?action=validercommande">valider votre commande</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>