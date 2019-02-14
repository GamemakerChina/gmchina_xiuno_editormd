<?php 
!defined('DEBUG') AND exit('Access Denied.');

$parsedown_version = param('parsedown_version');
//图片上传
$img_upload = param('img_upload');
$img_upload_formats = param('img_upload_formats');
$img_upload_service = param('img_upload_service');
$cross_domain_upload = param('cross_domain_upload');
$upload_callback_url = param('upload_callback_url');
//七牛
$qiniu_bucket = param('qiniu_bucket');
$qiniu_accessKey = param('qiniu_accessKey');
$qiniu_secretKey = param('qiniu_secretKey');
$qiniu_class_type = param('qiniu_class_type');
$qiniu_cdnurl = param('qiniu_cdnurl');
$qiniu_mimetype = param('qiniu_mimetype');
//杂项
$width = param('width');
$height = param('height');
$html_decode = param('html_decoden');
$html_decode_fliter = param('html_decode_fliter');
$sync_scrolling = param('sync_scrolling');
$custom_toolbar = param('custom_toolbar');
$custom_toolbar_onoff = param('custom_toolbar_onoff');
$autoheight = param('autoheight');
$readonly = param('readonly');
$theme_onoff = param('theme_onoff');
$theme = param('theme');
$theme_editor = param('theme_editor');
$theme_preview = param('theme_preview');
$codefold = param('codefold');
$tasklist = param('tasklist');
$atLink = param('atLink');
$emailLink = param('emailLink');
$tex = param('tex');
$flowChart = param('flowChart');
$sequenceDiagram = param('sequenceDiagram');
$pageBreak = param('pageBreak');
//安装后提示
$edit_info = param('edit_info');

$editor_md_config = kv_get('editor_md_config');

if($method == 'GET') {
    //Parsedown 版本切换
    $parsedown_version = form_radio('parsedown_version', array('1.8.0-beta5'=>'1.8.0-beta5', '1.7.1'=>'1.7.1', '1.5.4'=>'1.5.4（用于 PHP5.2）'), $editor_md_config['parsedown_version']);
    //图片上传
    $img_upload = form_radio('img_upload', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['img_upload']);
    $img_upload_formats = form_text('img_upload_formats', $editor_md_config['img_upload_formats'], '100%', '使用 ‘,’ 隔开');
    $img_upload_service = form_radio('img_upload_service', array('local'=>'本地', 'qiniu'=>'七牛（PHP 5.3+）'), $editor_md_config['img_upload_service']);
    $cross_domain_upload = form_radio('cross_domain_upload', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['cross_domain_upload']);
    $upload_callback_url = form_text('upload_callback_url', $editor_md_config['upload_callback_url'], '100%', '');
    //七牛
    $qiniu_bucket = form_text('qiniu_bucket', $editor_md_config['qiniu_bucket'], '100%', '');
    $qiniu_accessKey = form_text('qiniu_accessKey', $editor_md_config['qiniu_accessKey'], '100%', '');
    $qiniu_secretKey = form_text('qiniu_secretKey', $editor_md_config['qiniu_secretKey'], '100%', '');
    $qiniu_class_type = form_text('qiniu_class_type', $editor_md_config['qiniu_class_type'], '100%', '');
    $qiniu_cdnurl = form_text('qiniu_cdnurl', $editor_md_config['qiniu_cdnurl'], '100%', '');
    $qiniu_mimetype = form_text('qiniu_mimetype', $editor_md_config['qiniu_mimetype'], '100%', '');
    //滚动
    $sync_scrolling = form_radio('sync_scrolling', array('true'=>'双向滚动', 2=>'单向滚动', 'false'=>'关闭'), $editor_md_config['sync_scrolling']);
    //长度宽度
    $width = form_text('width', $editor_md_config['width'], '100%', '输入百分比');
    $height = form_text('height', $editor_md_config['height'], '100%', '若为百分比需带双引号');
    //HTML解析
    $html_decode = form_radio('html_decode', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['html_decode']);
    $html_decode_fliter = form_text('html_decode_fliter', $editor_md_config['html_decode_fliter'], '100%', '使用 ‘,’ 隔开');
    //自定义工具栏
    $custom_toolbar_onoff = form_radio('custom_toolbar_onoff', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['custom_toolbar_onoff']);
    $custom_toolbar = form_textarea('custom_toolbar', $editor_md_config['custom_toolbar']);
    //自动高度
    $autoheight = form_radio('autoheight', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['autoheight']);
    //只读模式（可能维护的时候有用）
    $readonly = form_radio('readonly', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['readonly']);
    //编辑器主题
    $theme_onoff = form_radio('theme_onoff', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['theme_onoff']);
    $theme = form_text('theme', $editor_md_config['theme'], '100%', '编辑器基本主题（如导航栏）');
    $theme_editor = form_text('theme_editor', $editor_md_config['theme_editor'], '100%', '编辑器代码区主题');
    $theme_preview = form_text('theme_preview', $editor_md_config['theme_preview'], '100%', '编辑器预览区主题');
    //代码折叠
    $codefold = form_radio('codefold', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['codefold']);
    //任务列表（GFM 功能）
    $tasklist = form_radio('tasklist', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['tasklist']);
    //@链接
    $atLink = form_radio('atLink', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['atLink']);
    $emailLink = form_radio('emailLink', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['emailLink']);
    //TeX / LaTeX 科学公式语言
    $tex = form_radio('tex', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['tex']);
    //FlowChart 流程图
    $flowChart = form_radio('flowChart', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['flowChart']);
    //SequenceDiagram 时序图 / 序列图
    $sequenceDiagram = form_radio('sequenceDiagram', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['sequenceDiagram']);
    //分页符
    $pageBreak = form_radio('pageBreak', array('true'=>'开启', 'false'=>'关闭'), $editor_md_config['pageBreak']);
    //安装后提示
    $edit_info = form_checkbox('edit_info', $editor_md_config['edit_info'], 不再提示, 1);

    include _include(APP_PATH.'plugin/gmchina_xiuno_editormd/setting.htm');
} else {
    $editor_md_config['parsedown_version'] = param('parsedown_version');
    $editor_md_config['img_upload'] = param('img_upload');
    $editor_md_config['img_upload_formats'] = param('img_upload_formats');
    $editor_md_config['img_upload_service'] = param('img_upload_service');
    $editor_md_config['cross_domain_upload'] = param('cross_domain_upload');
    $editor_md_config['upload_callback_url'] = param('upload_callback_url');
    $editor_md_config['qiniu_bucket'] = param('qiniu_bucket');
    $editor_md_config['qiniu_accessKey'] = param('qiniu_accessKey');
    $editor_md_config['qiniu_secretKey'] = param('qiniu_secretKey');
    $editor_md_config['qiniu_class_type'] = param('qiniu_class_type');
    $editor_md_config['qiniu_cdnurl'] = param('qiniu_cdnurl');
    $editor_md_config['qiniu_mimetype'] = param('qiniu_mimetype');
	$editor_md_config['width'] = param('width');
	$editor_md_config['height'] = param('height');
	$editor_md_config['sync_scrolling'] = param('sync_scrolling');
    $editor_md_config['html_decode'] = param('html_decode');
    $editor_md_config['html_decode_fliter'] = param('html_decode_fliter');
    $editor_md_config['custom_toolbar_onoff'] = param('custom_toolbar_onoff');
    $editor_md_config['custom_toolbar'] = param('custom_toolbar');
    $editor_md_config['autoheight'] = param('autoheight');
    $editor_md_config['readonly'] = param('readonly');
    $editor_md_config['theme_onoff'] = param('theme_onoff');
    $editor_md_config['theme'] = param('theme');
    $editor_md_config['theme_editor'] = param('theme_editor');
    $editor_md_config['theme_preview'] = param('theme_preview');
    $editor_md_config['codefold'] = param('codefold');
    $editor_md_config['tasklist'] = param('tasklist');
    $editor_md_config['atLink'] = param('atLink');
    $editor_md_config['emailLink'] = param('emailLink');
    $editor_md_config['tex'] = param('tex');
    $editor_md_config['flowChart'] = param('flowChart');
    $editor_md_config['sequenceDiagram'] = param('sequenceDiagram');
    $editor_md_config['pageBreak'] = param('pageBreak');
    $editor_md_config['edit_info'] = param('edit_info');
    kv_set('editor_md_config', $editor_md_config);
    
    message(0, '修改成功');
    
    $file = fopen(APP_PATH."plugin/gmchina_xiuno_editormd/upload/qiniu/config.php", "w");
    $config_data = "<?php
        return array(
            'bucket' => '{$editor_md_config['qiniu_bucket']}',
            'accessKey' => '{$editor_md_config['qiniu_accessKey']}',
            'secretKey' => '{$editor_md_config['qiniu_secretKey']}',
            'class_type' => '{$editor_md_config['qiniu_class_type']}',
            'cdnurl' => '{$editor_md_config['qiniu_cdnurl']}',
            'mimetype' => '{$editor_md_config['qiniu_mimetype']}',
        );";
    try{
        $res = fwrite($file, $config_data);
        fclose($file);
        if ($res){
            message(1, '保存成功');
        }else{
            message(-1, '保存失败');
        }
    }catch (Exception $e){
        message(-1, $e->getMessage());
    }
}
?>
