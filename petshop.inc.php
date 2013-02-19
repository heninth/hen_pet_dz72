<?php
require 'common.inc.php';
$width = $config['width'];
$colum = $config['colum'];
$navigation = 'Pet Shop';
include template('hen_pet:header');

$money = $db->fetch_first("SELECT extcredits{$config['money']} FROM {$tablepre}members WHERE uid = {$discuz_uid}");
echo '<center><strong>คุณมีเงิน <span style="color:#F93;">'.$money['extcredits'.$config['money']].' </span>'.$GLOBALS['extcredits'][$config['money']]['title'].'</strong></center><br />';
$re = $db->query("SELECT * FROM {$tablepre}hen_petshop WHERE (onsell = '1' AND islimited = '0' ) OR (onsell = '1' AND islimited = '1' AND limited > '0')");

$tmp_td = 0;

echo '<style type="text/css">.pname{color:#39F;}.ppricet{color:#F93;}.ppricen{color:#0C3;}.plimitt{color:#B00;}</style>';
echo '<center><table width="'.$width.'px;"><tr style="width:'.($width/$colum).'px;">';

while($p = $db->fetch_array($re)){

	if($tmp_td==$colum){
		echo '</tr><tr style="width:'.($width/$colum).'px;">';
		$tmp_td = 0;
	}
	
	echo '<td><center><div style="width:'.($width/$colum).'px;height:180px;background:url('.$p['image'].') center no-repeat;">';
	
	if($p['islimited']==1){
		echo '<div style="width:'.($width/$colum).'px;height:180px;background:url(\'',$config['limitedurl'],'\') top right no-repeat;"></div>';
	}
		
	echo '</div><br /><strong class="pname">'.$p['name'].'</strong><br />';
	echo '<span class="ppricet">Price : </span><span class="ppricen">'.$p['price'].'</span><br />';
	
	if($p['islimited']==1){
		echo '<span class="plimitt">Limited: ',$p['limited'],'</span><br />';
	}
	
	echo '<a href="plugin.php?id=hen_pet:buy&pid='.$p['pid'].'">Buy Pet</a>';
	echo '</center></td>';
	$tmp_td++;
}
echo '</tr></table></center>';
include template('hen_pet:footer');
?>