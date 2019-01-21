<?php

$editor_md_config = array(
    "parsedown_version"=>"1.7.1", 
    "img_upload"=>"true",
    "width"=>"100%",
    "height"=>640,
    "img_upload_formats"=>"'jpg','png','bmp','jpeg','gif','webp'",
    "html_decode"=>"false",
    "html_decode_fliter"=>"",
    "sync_scrolling"=>2,
    "custom_toolbar"=>"",
    "custom_toolbar_onoff"=>"false",
    "autoheight"=>"false",
    "readonly"=>"false",
    "theme_onoff"=>"false",
    "theme"=>"",
    "theme_preview"=>"",
    "codefold"=>"false",
    "tasklist"=>"false",
    "atLink"=>"false",
    "emailLink"=>"false",
    "tex"=>"false",
    "flowChart"=>"false",
    "sequenceDiagram"=>"false",
    "pageBreak"=>"false",
    "img_upload_service"=>"local",
    "cross_domain_upload"=>"false",
    "upload_callback_url"=>"",
    "qiniu_bucket"=>"",
    "qiniu_accessKey"=>"",
    "qiniu_secretKey"=>"",
    "qiniu_class_type"=>"",
    "qiniu_cdnurl"=>"",
    "qiniu_mimetype"=>""
);
kv_set("editor_md_config", $editor_md_config);

?>