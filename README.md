# gmchina_xiuno_editormd
Editor.md for Xiuno BBS 4.0+

在 Xiuno BBS 中使用 Editor.md 创建帖子。

## 用法

1. 下载最新版本并解压，将文件夹更名为 `gmchina_xiuno_editormd` 后在后台启动插件
2. 修改当前使用的主题的 `post.htm` 文件，在 id 和 name 为 message 的代码中加入两段 Hook ( #3 )：
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

## 关于上传

由于本地上传接口没按照标准来写（不知道怎么使用附件相关函数），所以位置为 `upload/images`，所以没有 `images` 文件夹的需手动在 `upload` 下创建并修改插件目录下的 `upload/local/upload.php`如有标准方案可贡献代码。

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
- [x] Parsedown Extra 扩展 Markdown 更多功能（具体查看 [PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra)）
- [x] 不需要手动在主题加入 Hook
- [x] 设置界面
- [ ] 重写图片本地上传图片接口（目前的接口已经足够使用）
- [ ] 更多云存储的选择
- [x] 发布兼容 HTML

## 图片存储支持

| 存储 | 支持情况 | 备注 |
| :------------: | :-------------: | :-------------: |
| 本地 | 支持 |     |
| 七牛 | 支持 |[xxiaopang](https://gitee.com/xxiaopang/xiaopang_editor)|
| 又拍 | 不支持 |     |
| 阿里云 OSS | 不支持 |     |
| 腾讯云 COS | 不支持 |     |
| SM.MS | 不支持 |     |
| GitHub | 不支持 |     |
| 微博图床 | 不支持 |     |

## 安全性问题

~~由于 Editor.md 已经很长时间没有更新，其预览模式可以引发 XSS 攻击！~~

~~虽然已经通过内置的过滤设置过滤掉了大部分危险标签，但依然可以输入不安全内容，如`[xss](javascript:alert%281%29)`~~

目前输出已使用 HTML Purifier 过滤，输出内容已经是安全的内容了。

2018-12-29：已使用 JS-XSS 过滤了预览模式的 XSS ，现可安全使用

Parsedown 则是从 1.7.0 开始加入了 Safe Mode 模式可以自动对输出进行净化，推荐使用 1.7.1 并将网站 PHP 版本更换为 5.3 及以上（推荐 PHP5.6 和 PHP7）

## 已知问题

1. ~~无法使用 Markdown 的引用块(`>`)，原因是 XiunoBBS 对特殊字符（`&`, `"`, `<`, `>`）进行转义导致语法被转义（XiunoBBS的锅）~~

> ~~虽然可以通过直接调用 `message` （非 `message_fmt`）达到修复效果，但这样会导致 XSS 攻击，为了安全就只能这样咯~~

1.2 版本开始，输出修改为 `message` （即用户输入的原始数据），这样会解决大量渲染问题，同时也兼容了 HTML，尽管 XSS 问题已经由 HTML Purifier 和 JS-XSS 过滤后基本消失，但依然请谨慎使用。

2. 本地上传图片接口存储位置不规范（暂时）  

3. ~~使用快捷回复若有使用换行会插入 `<br>` 标签，在之后的编辑时会被转义(`&lt;br&gt;`)~~（已修复，我的锅）

## 使用了

- XiunoPHP
- Editor.md ([hawtim ver.](https://github.com/hawtim/editor.md))
- Parsedown (含 Parsedown Extra)
- HTML Purifier
- JS-XSS

## 协议

MIT License
