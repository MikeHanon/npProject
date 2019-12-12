<?php 
require('./controller/controller.php');
session_start();
if(isset($_GET['action'])){
if($_GET['action'] == 'register'){
    register();
}else if ($_GET['action'] == 'verify')
{
    Verify();
}else if ($_GET['action'] == 'login')
{
    login2();
    
}else if ($_GET['action'] == 'profile'){
    profile();
}else if ($_GET['action'] == 'logout'){
    logout();
}else if($_GET['action'] == 'forgotPassword')
{
    forgotPassword();
}else if($_GET['action'] == 'resetPassword')
{
    resetPass();
}else if($_GET['action'] == 'updateinfo')
{
    updateInfo();
}else if($_GET['action'] == 'article')
{
    article();
}else if($_GET['action'] == 'createarticle')
{
    createArticle();
}else if($_GET['action'] == 'updateproduct')
{
    updateArticle();
}
else if($_GET['action'] == 'deleteproduct')
{
    deleteProduct();
}else if($_GET['action'] == 'addArticle')
{
    addToCart();
}else if($_GET['action'] == 'panier')
{
    cart();
}else if($_GET['action'] == 'validercommande')
{
    validerCommande();
}
}else{
    require ('./view/indexView.php');
}