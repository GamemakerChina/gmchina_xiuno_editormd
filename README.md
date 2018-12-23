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

## 关于多个 Parsedown 版本

| Parsedown 版本 | Parsedown Extra 版本 |
| :------------: | :------------------: |
| 1.5.4 | 0.7.0 |
| 1.7.1 | 0.7.1 |
| 1.8.0-beta5 | 0.8.0-beta1 |

每个 Parsedown 版本均对应一个 Parsedown Extra 版本。

1.5.4 用于 PHP 5.2 环境，原因是 Parsedown 从 1.6.0 开始不再对 PHP 5.2 提供支持，强行使用 1.6.0 以上版本会导致 500 错误。

1.7.1 为目前最新的正式版本。

1.8.0-beta5 为目前最新的 beta 版本

如需使用不同版本请修改 `model_post_format_end.php` 前两行，默认使用 1.7.1。

## TODO List

- [x] Editor.md 提供的所有功能
- [x] Markdown 语法发帖
- [x] 上传图片（保存到本地）
- [x] 标准的语法高亮（`<pre><code class="language-(lang)"></code></pre>`）（支持 Prism.js 高亮）
- [x] Parsedown Extra 扩展 Markdown 更多功能（具体查看 [PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra)（HTML 插入并不能用，原因同已知问题第一条）
- [ ] 不需要手动在主题加入 Hook
- [ ] 设置界面
- [ ] 重写图片本地上传图片接口（插件内为 Editor.md 提供的范例）
- [ ] 更多云存储的选择
- [ ] 加入设置页面提供设置项
- [ ] 发布兼容 HTML

## XSS!

由于 Editor.md 已经很长时间没有更新，其预览模式可以引发 XSS 攻击！

如有修复方案请贡献代码，感谢

## 已知问题

1. 无法使用 Markdown 的引用块(`>`)，原因是 XiunoBBS 对特殊字符（`&`, `"`, `<`, `>`）进行转义导致语法被转义（XiunoBBS的锅）  
    > 虽然可以通过直接调用 message （非 `message_fmt`）达到修复效果，但这样会导致 XSS 攻击，为了安全就只能这样咯
2. 本地上传图片接口存储位置不规范（暂时）  
~~3. 使用快捷回复若有使用换行会插入 `<br>` 标签，在之后的编辑时会被转义(`&lt;br&gt;`)~~（已修复，我的锅）
