include_once 'plugin/gmchina_xiuno_editormd/parser/1.7.1/Parsedown.php';
include_once 'plugin/gmchina_xiuno_editormd/parser/1.7.1/ParsedownExtra.php';
include_once 'plugin/gmchina_xiuno_editormd/purifier/HTMLPurifier.standalone.php';
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true);
$Extra = new ParsedownExtra();
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

if($post['doctype'] == 2){
    $post['message_fmt'] = $purifier->purify($Extra->text($post['message_fmt']));
}