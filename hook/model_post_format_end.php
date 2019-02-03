$editor_md_config = kv_get('editor_md_config');

include_once 'plugin/gmchina_xiuno_editormd/parser/'.$editor_md_config['parsedown_version'].'/Parsedown.php';
include_once 'plugin/gmchina_xiuno_editormd/parser/'.$editor_md_config['parsedown_version'].'/ParsedownExtra.php';
include_once 'plugin/gmchina_xiuno_editormd/purifier/HTMLPurifier.standalone.php';
$Parsedown = new Parsedown();
if(!$editor_md_config['parsedown_version']=='1.5.4')
{
    $Parsedown->setSafeMode(true);
}
$Extra = new ParsedownExtra();
$config= HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

if($post['doctype'] == 2){
    
    if ($post['message_cache']==''){                                                                            //空缓存
        $post['message_cache']=$purifier->purify($Extra->text($post['message']));                                //过滤并储存
        db_update('post', array('pid'=>$post['pid']), array('message_cache'=>$post['message_cache']));        //写入数据库
    }
    
    $post['message_fmt'] = "<div class='markdown-body'>".$post['message_cache']."</div>";
}