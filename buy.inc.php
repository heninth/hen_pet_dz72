<?php
require 'common.inc.php';
if(!$_GET['pid']){showmessage('Error.');}
if(!$discuz_uid){showmessage('not_loggedin', NULL, array(), array('login' => 1));}
$pet = $db->fetch_first("SELECT price,islimited,limited FROM {$tablepre}hen_petshop WHERE pid = {$_GET['pid']}");
if($pet['islimited'] == 1 && $pet['limited'] <= 0){showmessage('Sold Out.');}
if(!$pet){showmessage('Pet Dosen\'t exit.');}
if($db->fetch_first("SELECT pid FROM {$tablepre}hen_mypet WHERE uid = {$discuz_uid} AND pid = {$_GET['pid']}")){showmessage('You already buy this pet.');}

$money = $db->fetch_first("SELECT extcredits{$config['money']} FROM {$tablepre}members WHERE uid = {$discuz_uid}");
if($pet['price'] > $money['extcredits'.$config['money']]){showmessage('You don\'t have enough money.');}
$change = $money['extcredits'.$config['money']] - $pet['price'];

if($db->query("UPDATE {$tablepre}members SET extcredits{$config['money']} = {$change} WHERE uid = {$discuz_uid} LIMIT 1")){
	if($pet['islimited']==1){
		$limit_rem = $pet['limited']-1;
		$db->query("UPDATE {$tablepre}hen_petshop SET limited = {$limit_rem} WHERE pid = {$_GET['pid']}");
	}
	$db->query("INSERT INTO {$tablepre}hen_mypet (uid,pid) VALUES ('{$discuz_uid}','{$_GET['pid']}')");
		showmessage('Success.','plugin.php?id=hen_pet:mypet');
}
?>