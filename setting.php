<?php 
!defined('DEBUG') AND exit('Access Denied.');
$action = param(3);

$parsedown_version = param('parsedown_version');
$img_upload = param('img_upload');
$width = param('width');
$height = param('height');
$img_upload_name = param('img_upload_name');
$html_decode = param('html_decoden');
$html_decode_fliter = param('html_decode_fliter');
$sync_scrolling = param('sync_scrolling');
$custom_toolbar = param('custom_toolbar');
$custom_toolbar_onoff = param('custom_toolbar_onoff');
$autoheight = param('autoheight');
$readonly = param('readonly');
$theme_onoff = param('theme_onoff');
$theme = param('theme');
$codefold = param('codefold');
$tasklist = param('tasklist');
$atLink = param('atLink');
$emailLink = param('emailLink');
$tex = param('tex');
$flowChart = param('flowChart');
$sequenceDiagram = param('sequenceDiagram');
$pageBreak = param('pageBreak');
$image_upload_url = param('image_upload_url');
$cross_domain_upload = param('cross_domain_upload');
$upload_callback_url = param('upload_callback_url');
$editor_md_config = kv_get('editor_md_config');

if($method == 'GET') {
    if(empty($editor_md_config)) {
        $editor_md_config = array(
            'parsedown_version'=>$parsedown_version, 
            'img_upload'=>$img_upload,
            'width'=>$width,
            'height'=>$height,
            'img_upload_name'=>$img_upload_name,
            'html_decode'=>$html_decode,
            'html_decode_fliter'=>$html_decode_fliter,
            'sync_scrolling'=>$sync_scrolling,
            'custom_toolbar'=>$custom_toolbar,
            'custom_toolbar_onoff'=>$custom_toolbar_onoff,
            'autoheight'=>$autoheight,
            'readonly'=>$readonly,
            'theme_onoff'=>$theme_onoff,
            'theme'=>$theme,
            'codefold'=>$codefold,
            'tasklist'=>$tasklist,
            'atLink'=>$atLink,
            'emailLink'=>$emailLink,
            'tex'=>$tex,
            'flowChart'=>$flowChart,
            'sequenceDiagram'=>$sequenceDiagram,
            'pageBreak'=>$pageBreak,
            'image_upload_url'=>$image_upload_url,
            'cross_domain_upload'=>$cross_domain_upload,
            'upload_callback_url'=>$upload_callback_url
        );
        kv_set('editor_md_config', $editor_md_config);
    }
    //Parsedown 版本切换
    $parsedown_version = form_radio('sync_scrolling', array('1.8.0-beta5'=>'1.8.0-beta5', '1.7.1'=>'1.7.1', '1.5.4'=>'1.5.4（用于 PHP5.2）'), '1.7.1');
    //图片上传
    $img_upload = form_radio_yes_no('img_upload', $editor_md_config['img_upload'], 0);
    $img_upload_name = form_text('img_upload_name', $editor_md_config['img_upload_name'], '100%', '使用 ‘,’ 隔开');
    $image_upload_url = form_text('image_upload_url', $editor_md_config['image_upload_url'], '100%', '');
    $cross_domain_upload = form_radio_yes_no('cross_domain_upload', $editor_md_config['cross_domain_upload'], 0);
    $upload_callback_url = form_text('upload_callback_url', $editor_md_config['upload_callback_url'], '100%', '');
    //滚动
    $sync_scrolling = form_radio('sync_scrolling', array(1=>'双向滚动', 2=>'单向滚动', 0=>'关闭'), $editor_md_config['sync_scrolling']);
    //长度宽度
    $width = form_text('width', $editor_md_config['width'], '100%', '若为百分比需带双引号');
    $height = form_text('height', $editor_md_config['height'], '100%', '若为百分比需带双引号');
    //HTML解析
    $html_decode = form_radio_yes_no('html_decode', $editor_md_config['html_decode'], 0);
    $html_decode_fliter = form_text('html_decode_fliter', $editor_md_config['html_decode_fliter'], '100%', '使用 ‘,’ 隔开');
    //自定义工具栏
    $custom_toolbar_onoff = form_radio_yes_no('custom_toolbar_onoff', $editor_md_config['custom_toolbar_onoff'], 0);
    $custom_toolbar = form_textarea('custom_toolbar', $editor_md_config['custom_toolbar']);
    //自动高度
    $autoheight = form_radio_yes_no('autoheight', $editor_md_config['autoheight'], 0);
    //只读模式（可能维护的时候有用）
    $readonly = form_radio_yes_no('readonly', $editor_md_config['readonly'], 0);
    //编辑器主题
    $theme_onoff = form_radio_yes_no('theme_onoff', $editor_md_config['theme_onoff'], 0);
    $theme = form_text('theme', $editor_md_config['theme'], '100%', '');
    //代码折叠
    $codefold = form_radio_yes_no('codefold', $editor_md_config['codefold'], 0);
    //任务列表（GFM 功能）
    $tasklist = form_radio_yes_no('tasklist', $editor_md_config['tasklist'], 0);
    //@链接
    $atLink = form_radio_yes_no('atLink', $editor_md_config['atLink'], 0);
    $emailLink = form_radio_yes_no('emailLink', $editor_md_config['emailLink'], 0);
    //TeX / LaTeX 科学公式语言
    $tex = form_radio_yes_no('tex', $editor_md_config['tex'], 0);
    //FlowChart 流程图
    $flowChart = form_radio_yes_no('flowChart', $editor_md_config['flowChart'], 1);
    //SequenceDiagram 时序图 / 序列图
    $sequenceDiagram = form_radio_yes_no('sequenceDiagram', $editor_md_config['sequenceDiagram'], 1);
    //分页符
    $pageBreak = form_radio_yes_no('pageBreak', $editor_md_config['pageBreak'], 0);

    include _include(APP_PATH.'plugin/gmchina_xiuno_editormd/setting.htm');
} else {
    $editor_md_config['parsedown_version'] = param('parsedown_version');
    $editor_md_config['img_upload'] = param('img_upload');
    $editor_md_config['img_upload_name'] = param('img_upload_name');
    $editor_md_config['image_upload_url'] = param('image_upload_url');
    $editor_md_config['cross_domain_upload'] = param('cross_domain_upload');
    $editor_md_config['upload_callback_url'] = param('upload_callback_url');
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
    $editor_md_config['codefold'] = param('codefold');
    $editor_md_config['tasklist'] = param('tasklist');
    $editor_md_config['atLink'] = param('atLink');
    $editor_md_config['emailLink'] = param('emailLink');
    $editor_md_config['tex'] = param('tex');
    $editor_md_config['flowChart'] = param('flowChart');
    $editor_md_config['sequenceDiagram'] = param('sequenceDiagram');
    $editor_md_config['pageBreak'] = param('pageBreak');
	kv_set('editor_md_config', $editor_md_config);	
    
    message(0, '修改成功');
}
?>
