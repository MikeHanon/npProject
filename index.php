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
    require('./view/profile.php');
}
}else{
    require ('./view/indexView.php');
}