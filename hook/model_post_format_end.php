include_once "plugin/gmchina_xiuno_editormd/parser/Parsedown.php";
$Parsedown = new Parsedown();

if($post['doctype'] == 2){
    $post['message_fmt'] = $Parsedown->text($post['message_fmt']);
}