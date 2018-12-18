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
        htmlDecode: "p, h1, h2, h3, h4, h5, h6, span, img, a, br, table, ul, li, tbody, th, tr, td, strong"
    });
});
