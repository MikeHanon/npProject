<?php $title = 'Acceuil'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<h1>PROFILE</h1>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>