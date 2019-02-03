<?php
!defined('DEBUG') AND exit('Access Denied.');
$tablepre = $db->tablepre;

db_exec("ALTER TABLE {$tablepre}kv DROP COLUMN editor_md_config;");
db_exec("ALTER TABLE {$tablepre}post DROP COLUMN message_cache;");

kv_delete('editor_md_config');

?>