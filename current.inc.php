<?php
require 'common.inc.php';
if(!$discuz_uid){showmessage('not_loggedin', NULL, array(), array('login' => 1));}
if(!$_GET['pid']){showmessage('Error.');}
$db->query("UPDATE {$tablepre}hen_mypet SET current = 0 WHERE uid = {$discuz_uid}");

if($db->query("UPDATE {$tablepre}hen_mypet SET current = 1 WHERE uid = {$discuz_uid} AND pid = {$_GET['pid']}")){
	showmessage('Success.','plugin.php?id=hen_pet:mypet');
}else{
	showmessage('Error.');
}
?>