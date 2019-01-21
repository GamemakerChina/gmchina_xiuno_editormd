<?php
$res=array(
    'success'=>'',
    'message'=>'',
    'url'=>'',
);

require("Qiniu/autoload.php");
//require 'plugin/gmchina_xiuno_editormd/upload/qiniu/Qiniu/src/Qiniu/Auth.php';
$config = include("config.php");

$name='editormd-image-file';
$file=$_FILES[$name];
$file['ext']=pathinfo($file['name'], PATHINFO_EXTENSION);
$ext = strtolower($file['ext']);

$mimetype=explode(",", str_replace(array("，",';','；'," "),",",$config['mimetype']));

if(in_array($ext, $mimetype) == false) {
    $res['success']=0;
    $res['message']="文件非法，禁止上传！";
    echo json_encode($res);
    exit();
}else {
    $key =md5(date('YmdHis') . rand(0, 9999)) . '.' . $ext;
    $accessKey = $config['accessKey'];
    $secretKey = $config['secretKey'];
    $auth = new Qiniu\Auth($accessKey, $secretKey);
    $bucket = $config['bucket'];
    $domain = $config['cdnurl'];
    $token = $auth->uploadToken($bucket);
    $uploadMgr = new Qiniu\Storage\UploadManager();
    list($ret, $err) = $uploadMgr->putFile($token, $key, $file['tmp_name']);
    if ($err !== null) {
        $res['success']=0;
        $res['message']=$err;
        echo json_encode($res);
        exit();
    }else {
        $res['success']=1;
        $res['message']="上传成功";
        $res['url']=$domain.'/'.$ret['key'].$config['class_type'];;
        echo json_encode($res);
        exit();            
    }
}
?>