# gmchina-xiuno-editormd
Editor.md for Xiuno BBS 4.0+

在 Xiuno BBS 中使用 Editor.md 创建帖子。

## 用法

1. 下载最新版本并解压，将文件夹更名为 `gmchina-xiuno-editormd` 后在后台启动插件
2. 修改当前使用的主题的 `post.htm` 文件，在 id 和 name 为 message 的代码中加入两段 Hook：
```html
<!--{hook post_editor_before.htm}-->
```
```html
<!--{hook post_editor_after.htm}-->
```
范例：
```html
<div class="form-group">
    <!--{hook post_editor_before.htm}-->
    <textarea class="form-control" placeholder="<?php echo lang('message');?>" name="message" id="message"><?php echo $form_message;?></textarea>
    <!--{hook post_editor_after.htm}-->
</div>
```
3. Enjoy!~~~

## TODO List

- [x] Editor.md 提供的所有功能
- [x] Markdown 语法发帖
- [x] 上传图片（保存到本地）
- [x] 标准的语法高亮（`<pre><code class="language-(lang)"></code></pre>`）（支持 Prism.js 高亮）
- [ ] 不需要手动在主题加入 Hook
- [ ] 重写图片本地上传图片接口（插件内为 Editor.md 提供的范例）
- [ ] 更多云存储的选择
- [ ] 加入设置页面提供设置项
- [ ] 发布后兼容 HTML

## 已知问题

1. 无法使用 Markdown 的引用块(`>`)，原因是 XiunoBBS 对特殊字符（`&`, `"`, `<`, `>`）进行转义导致语法被转义（XiunoBBS的锅）
2. 本地上传图片接口存储位置不规范（暂时）

~~3. 使用快捷回复若有使用换行会插入 `<br>` 标签，在之后的编辑时会被转义(`&lt;br&gt;`)~~（已修复，我的锅）
