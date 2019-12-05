<?php $title = 'Acceuil'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<section id="login">
    <section class="container">
  <?php if(isset($msg)) { echo $msg; } ?>
    </section> <!-- /container -->
</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>