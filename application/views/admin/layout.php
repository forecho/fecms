<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<!-- <title><?php echo __TITLE__;?></title> -->
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

<!-- <script type="text/javascript" src="ueditor/editor_config.js"></script>
<script type="text/javascript" src="ueditor/editor_all.js"></script>
<link rel="stylesheet" href="ueditor/themes/default/ueditor.css"/> -->
<script charset="utf-8" src="resources/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="resources/kindeditor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#editor_id');
        });
</script>

<script type="text/javascript" src="resources/My97DatePicker/WdatePicker.js"></script>

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
      <a href="<?php echo base_url('feadmin/posts_list');?>" title="后台首页"><img id="logo" src="resources/images/logo1.png" alt="访问深度阅读" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="feadmin/pwd_change" title="修改密码"><?php echo  $this->session->userdata('username');?></a><!--, 你有  <a href="#messages" rel="modal" title="3 Messages">3 条信息</a> --><br />
        <br />
        <a href="<?php echo base_url();?>" title="前台首页">查看网站</a> | <a href="feadmin/logout" title="退出">退出</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
       <li> <a href="#" class="nav-top-item <?php if($this->uri->segment(2) == 'category_list' || $this->uri->segment(2) == 'category'){echo 'current';}?>">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          导航 </a> 
		  <ul>
		  	<li><a <?php if($this->uri->segment(2) == 'category_list' || $this->uri->segment(2) == 'category'){echo 'class="current"';}?> href="feadmin/category_list">导航列表</a></li>
		  </ul>
		  </li>
        <li> <a href="#" class="nav-top-item <?php if($this->uri->segment(2) == 'posts_list'|| $this->uri->segment(2) == 'posts_search' || $this->uri->segment(2) == 'posts'){echo 'current';}?>">
          <!-- Add the class "current" to current menu item -->
          文章 </a>
          <ul>
            <li><a <?php if($this->uri->segment(2) == 'posts_list'|| $this->uri->segment(2) == 'posts_search' || $this->uri->segment(2) == 'posts'){echo 'class="current"';}?> href="feadmin/posts_list">管理文章</a></li>
            <!-- Add class "current" to sub menu items also -->
            <!-- <li><a href="feadmin/category">添加导航</a></li> -->
			
          </ul>
        </li>

        <li> <a href="#" class="nav-top-item <?php if($this->uri->segment(2) == 'options_list') {echo 'current';}?>">网站配置信息</a>
          <ul>
            <li><a href="feadmin/options_list" <?php if($this->uri->segment(2) == 'options_list') {echo 'class="current"';}?>>配置信息管理</a></li>
          </ul>
        </li>
		<li> <a href="#" class="nav-top-item <?php if($this->uri->segment(2) == 'excel_list'|| $this->uri->segment(2) == 'excel_search' || $this->uri->segment(2) == 'excel_edit' || $this->uri->segment(2) == 'excel_view' || $this->uri->segment(2) == 'excel_create_one') {echo 'current';}?>">Excel表格管理</a>
          <ul>
            <li><a <?php if($this->uri->segment(2) == 'excel_list'|| $this->uri->segment(2) == 'excel_search' || $this->uri->segment(2) == 'excel_edit' || $this->uri->segment(2) == 'excel_view'){echo 'class="current"';}?> href="excel/excel_list">Excel内容</a></li>
            <li><a <?php if($this->uri->segment(2) == 'excel_create_one'){echo 'class="current"';}?> href="excel/excel_create_one">上传单条数据</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">图片管理</a>
          <ul>
            <li><a href="#">上传图片</a></li>
            <li><a href="#">管理图片</a></li>
            <li><a href="#">管理相册</a></li>
            <li><a href="#">相册设置</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item"> 留言管理 </a>
          <ul>
            <li><a href="#">留言列表</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item">首页幻灯片管理</a>
          <ul>
            <li><a href="#">首页幻灯片列表</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #main-nav -->
      
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
		<?php
			if(!$this->session->userdata('username')){
				redirect('feadmin/login');
			}else{
				echo $content_for_layout; 
			}
		?>
    <!-- End Notifications -->
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 Your Company | Powered by <a href="http://www.forecho.com">forecho.com</a> | <a href="#">回到顶部</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
</html>