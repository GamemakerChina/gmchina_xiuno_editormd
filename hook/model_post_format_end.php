include_once 'plugin/gmchina_xiuno_editormd/parser/1.5.4/Parsedown.php';
include_once 'plugin/gmchina_xiuno_editormd/parser/1.5.4/ParsedownExtra.php';
$Parsedown = new Parsedown();
$Extra = new ParsedownExtra();

if($post['doctype'] == 2){
    $post['message_fmt'] = $Extra->text($post['message_fmt']);
}