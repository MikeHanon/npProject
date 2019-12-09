<?php $title = 'Mot de passe oublié'; 
require_once './config/dbconfig.php';
?>

<?php ob_start(); ?>
<section>
    <section class="container">
        <form action="" class="formgroup" method="post">
            <h2 class="form-signin-heading">Mot de passe oublié</h2><hr/>
            <?php
            if(isset($msg))
            {
                echo $msg;
            }
            else
            {
                ?>
                <section class="alert alert-info">
                    Veuillez entrer votre adresse email. Vous recevrez un lien pour créer un nouveau mot de passe via email.
                </section>
            <?php    
            }
            ?>
            <input type="email" name="txtemail" id="" class="input-block-level" placeholder="Addresse email" required>
            <hr />
            <button class="btn btn-danger btn-primary" name="btn-submit">Générer un nouveau mot de passe</button>
            
        </form>
    </section>
</section>
<?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>