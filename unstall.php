<?php
!defined('DEBUG') AND exit('Access Denied.');
$tablepre = $db->tablepre;

db_exec("ALTER TABLE {$tablepre}kv DROP COLUMN editor_md_config;");

kv_delete('editor_md_config');

?>