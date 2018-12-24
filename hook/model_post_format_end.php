include_once 'plugin/gmchina_xiuno_editormd/parser/1.7.1/Parsedown.php';
include_once 'plugin/gmchina_xiuno_editormd/parser/1.7.1/ParsedownExtra.php';
include_once 'plugin/gmchina_xiuno_editormd/purifier/HTMLPurifier.standalone.php';
$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true);  //Safe Mode(若使用 1.5.4 版本需移除或注释)
$Extra = new ParsedownExtra();
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

if($post['doctype'] == 2){
    $post['message_fmt'] = $purifier->purify($Extra->text($post['message_fmt']));
}
