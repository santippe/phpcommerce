<?php
    session_start(); 
    $url = $_SERVER["REQUEST_URI"];
    //$myvl = explode('?',explode('/',$url)[1])[0];
    $myvl = explode('?',substr($url,1))[0];
    $ext = explode('.',$myvl);
    if(count($ext)>1){
        $myvl = $ext[0];
    }    
    $myvl = ($myvl==''?'index':$myvl);
    $path = $_SERVER["DOCUMENT_ROOT"];    
    $db = new SQLite3($path . '/data/commerce.db');
?>
<?php require_once('code.php'); ?>
<?php 
    if ($myvl!='server' && $myvl !='test' && $myvl!='testmail' && $myvl != 'mappone' && $_REQUEST["mail"]!="mail" && $myvl != "menu") {
        //echo $_REQUEST["mail"]!="mail";
?>
<html>
    <?php require_once('head.php'); ?>    
    <?php require_once($myvl . '.php'); ?>
</html>
<?php } else require_once($myvl . '.php'); ?>