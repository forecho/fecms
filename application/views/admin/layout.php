<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<base href="<?php echo base_url()?>" />
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<!-- <script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
jQuery Datepicker Plugin
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script> -->

<script type="text/javascript" src="ueditor/editor_config.js"></script>
<script type="text/javascript" src="ueditor/editor_all_min.js"></script>
<link rel="stylesheet" href="ueditor/themes/default/ueditor.css"/>

<script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>

<script type="text/javascript" src="resources/scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/Validform_v5.1_min.js"></script>
<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
	
	$(".registerform").Validform({
		tiptype:2
	});
})
</script>
<!-- <link rel="stylesheet" href="resources/demo/css/style.css" type="text/css" media="all" /> -->

</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href="http://www.readeep.com"><img id="logo" src="resources/images/logo.png" alt="访问深度阅读" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="#" title="Edit your profile">管理员</a>, 你有 <a href="#messages" rel="modal" title="3 Messages">3 条信息</a><br />
        <br />
        <a href="#" title="http://www.readeep.com">查看网站</a> | <a href="#" title="Sign Out">退出</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="#/" class="nav-top-item no-submenu">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          仪表盘 </a> </li>
        <li> <a href="#" class="nav-top-item current">
          <!-- Add the class "current" to current menu item -->
          文章 </a>
          <ul>
            <li><a class="current" href="feadmin/">管理文章</a></li>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="feadmin/post">管理列表</a></li>
            <!-- <li><a href="feadmin/category">添加导航</a></li> -->
			<li><a href="feadmin/categoryList">导航列表</a></li>
			<li><a href="feadmin/form">表单</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">页面 </a>
          <ul>
            <li><a href="#">创建新页面</a></li>
            <li><a href="#">管理页面</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 图片长廊 </a>
          <ul>
            <li><a href="#">上传图片</a></li>
            <li><a href="#">管理图片</a></li>
            <li><a href="#">管理相册</a></li>
            <li><a href="#">相册设置</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 活动日程表 </a>
          <ul>
            <li><a href="#">日程浏览</a></li>
            <li><a href="#">创建新日程</a></li>
            <li><a href="#">日程设置</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">设置</a>
          <ul>
            <li><a href="#">常规设置</a></li>
            <li><a href="#">外观设置</a></li>
            <li><a href="#">个人资料设置</a></li>
            <li><a href="#">用户和权限</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        <h3>3条信息</h3>
        <p> <strong>17th May 2009</strong> by 管理员<br />
          日志 <small><a href="#" class="remove-link" title="Remove message">移动</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane 管理员<br />
         日志 <small><a href="#" class="remove-link" title="Remove message">移动</a></small> </p>
        <p> <strong>25th April 2009</strong> by 管理员<br />
        日志 <small><a href="#" class="remove-link" title="Remove message">移动</a></small> </p>
        <form action="#" method="post">
          <h4>新信息</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">发送给</option>
            <option value="option2">每个人</option>
            <option value="option3">管理员</option>
          </select>
          <input class="button" type="submit" value="发送" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
		<?php echo $content_for_layout; ?>
    <!-- End Notifications -->
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 Your Company | Powered by <a href="http://www.readeep.com">readeep.com</a> | <a href="#">回到顶部</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
</html>
