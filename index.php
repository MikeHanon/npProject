<?php 
require('./controller/controller.php');
session_start();
if(isset($_GET['action'])){
if($_GET['action'] == 'register'){
    require('./view/registerView.php');
}
}else{
    require('./view/indexView.php');
}