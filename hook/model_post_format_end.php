include_once "plugin/gmchina_xiuno_editormd/parser/Parsedown-5.2.php";
$Parsedown = new Parsedown();

if($post['doctype'] == 2){
    $post['message_fmt'] = $Parsedown->text($post['message_fmt']);
}

if($post['doctype'] == 1) {
	$post['message_fmt'] = htmlspecialchars($post['message_fmt']);
}