<?php $title = 'Acceuil'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<div class="container">
<form class="form-group" action="" method="post">
    <label for="subject">sujet</label>
    <input class="form-control" type="text" name="subject" id="">
    <label for="email">email:</label>
    <input  class="form-control" type="email" name="email" id="">
    <label for="message">votre message</label>
    <textarea class="form-control" name="message" id="" cols="120" rows="10"></textarea>
    <button style="margin-top:10px" class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
</form>
</div>

<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>