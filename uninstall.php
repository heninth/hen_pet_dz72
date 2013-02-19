<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$pre = 'cdb';

$sql = <<<EOF

DROP TABLE IF EXISTS `{$pre}_hen_petshop`;
DROP TABLE IF EXISTS `{$pre}_hen_mypet`;

EOF;

runquery($sql);

$finish = TRUE;
?>