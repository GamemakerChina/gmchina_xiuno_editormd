var initEditor;

$(function() {
    initEditor = editormd("editormd", {
        width   : "100%",
        height  : 640,
        syncScrolling : "single",
        path    : "plugin/gmchina_xiuno_editormd/editormd/lib/",
        imageUpload : true,
        imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
        imageUploadURL : "plugin/gmchina_xiuno_editormd/upload/local/upload.php",
        htmlDecode: "script, style, iframe, embed, div|on*"
    });
});
