<?php
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
require 'forumdata/cache/plugin_hen_pet.php';
$config = $_DPLUGIN['hen_pet']['vars'];
if($config['open']==2){showmessage('Plugin was close.');}
$config['admin'] = explode(',', $config['admin']);
$is_admin = in_array($discuz_uid, $config['admin']);
?>