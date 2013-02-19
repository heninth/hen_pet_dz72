<?php
require 'common.inc.php';
if(!$is_admin){showmessage('Access Denied.');}

if($_GET['pid']){
$_GET['pid'] = intval($_GET['pid']);
if($db->query("DELETE FROM {$tablepre}hen_petshop WHERE pid='{$_GET['pid']}' LIMIT 1")&&$db->query("DELETE FROM {$tablepre}hen_mypet WHERE pid='{$_GET['pid']}'")){
showmessage('Success.','plugin.php?id=hen_pet:admin');
}
}
?>