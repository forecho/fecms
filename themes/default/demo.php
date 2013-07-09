<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php echo load_common(); ?>
<title><?php echo __TITLE__; ?></title>
<style type="text/css">
h2{margin-top:20px;}
</style>
</head>

<body style="padding-left:20px;">
<h1>前端页面</h1>
视图位于 themes/default 文件夹下
<p>转到 <a href="<?php echo site_url('admin/demo/index'); ?>">后端页面</a></p>

<h2>对话框插件</h2>
<?php echo load_artdialog(); ?>
<a id="artdialog" href="javascript:void(0);" onClick="$.alert('哈哈，我在这里！', 'artdialog'); return false;">点击我看看</a>

<h2>验证码</h2>
<span id="captcha"><?php echo captcha(); ?></span><a href="javascript:void(0);" onClick="return change_captcha('captcha');">更换图片</a>

<h2>微博登录并获取信息（测试帐号：yrhzp@sina.cn 密码：lensic）</h2>
<?php if($uid): ?>
昵称：<a href="http://weibo.com/<?php echo $weibo_info['id']; ?>" target="_blank"><?php echo $weibo_info['name']; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('demo/unset_session'); ?>">注销微博</a>
<br /><br />
<h3>他关注的人：</h3>
<div>
<?php foreach($weibo_friends_datas['users'] as $data): ?>
	<ul style="float:left; margin-right:20px;">
    	<li><a href="http://weibo.com/<?php echo $data['id']; ?>" target="_blank"><img src="<?php echo $data['profile_image_url']; ?>" width="50" height="50" /></a></li>
        <li><a href="http://weibo.com/<?php echo $data['id']; ?>" target="_blank"><?php echo $data['name']; ?></a></li>
    </ul>
<?php endforeach; ?>
	<div class="cls"></div>
</div>
<br /><br />
<h3>他关注的人的信息：</h3>
<?php foreach($weibo_datas['statuses'] as $data): ?>
<div style="margin:5px 0px;">
	<div style="float:left; width:5%; text-align:center;"><a target="_blank" href="http://weibo.com/<?php echo $data['user']['id']; ?>"><img src="<?php echo $data['user']['profile_image_url']; ?>" width="50" height="50" /></a></div>
    <div style="float:left; width:85%;">
    	<div><a href="http://weibo.com/<?php echo $data['user']['id']; ?>" target="_blank"><?php echo $data['user']['name']; ?></a></div>
        <div><?php echo $data['text']; ?></div>
    </div>
    <div style="clear:both;"></div>
</div>
<?php endforeach; ?>
<?php else: ?>
<a href="<?php echo weibo_login(); ?>"><img src="<?php echo __COMMON_STATIC__; ?>images/weibo_32.png" /></a>
<?php endif; ?>

<h2>发送邮件</h2>
<form action="<?php echo site_url('demo/send_email'); ?>" method="post">
	<p>输入你的邮箱：<input type="text" name="email" /></p>
    <p>发送到你邮箱的内容：<textarea name="content"></textarea></p>
    <input type="submit" value="发送邮件" />
</form>

<h2>读取 excel 内容</h2>
<table cellpadding="0" cellspacing="0">
	<?php foreach($excel_datas as $data): ?>
    <tr>
    	<td width="80"><?php echo $data[1]; ?></td>
        <td width="80"><?php echo $data[2]; ?></td>
        <td width="80"><?php echo $data[3]; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>日历插件</h2>
<?php echo load_jscal(); ?>
<input type="text" id="calendar" /><input type="button" id="show_jscal" value="选择日期" />
<script type="text/javascript">
Calendar.setup({
	showTime   : true,
	inputField : 'calendar',
	trigger    : 'show_jscal',
	dateFormat : '%Y-%m-%d %H:%M'
});
</script>

<h2>在线编辑器</h2>
<?php echo load_kindeditor(); ?>
<textarea id="editor_id"></textarea>
<script type="text/javascript">
var options = 
{
	width : '800px',
	height : '300px',
	allowFileManager : true,
	uploadJson : '<?php echo site_url('common/editor_upload'); ?>',
	fileManagerJson : '<?php echo site_url('common/editor_manager'); ?>',
	afterUpload : function (){
		//alert(1);
	}
};
var editor;
KindEditor.ready(function(K) {
	editor = K.create('#editor_id', options);
});
</script>

<h2>自定义 md5 加密</h2>
<p>加密 123456</p>
<p>MD5 加密为：<?php echo md5(123456); ?></p>
<p>自定义加密为：<?php echo str_md5(123456); ?></p>

<h2>分页</h2>
<?php echo $page_info; ?>
<script type="text/javascript">
page_location('center');
</script>

<h2>
如有问题及建议可联系本人 <a href="http://wpa.qq.com/msgrd?v=3&uin=494686707&site=qq&menu=yes" title="点击这里给我发消息"><img border="0" src="http://wpa.qq.com/pa?p=2:494686707:41" /></a>，本作品用于学习交流，请勿侵犯作者的知识产权，谢谢。

过后会继续封装及集成功能，而且会开发一后台管理系统，敬请期待！
</h2>
</body>
</html>