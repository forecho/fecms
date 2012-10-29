<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ForEcho 后台管理系统</title>
<base href="<?php echo base_url()?>" />
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="resources/scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/Validform_v5.1_min.js"></script>
<script type="text/javascript">
$(function(){
	//$(".registerform").Validform();  //就这一行代码！;
		
	$(".registerform").Validform({
		tiptype:function(msg,o,cssctl){
			var objtip=$("#msgdemo2");
			cssctl(objtip,o.type);
			objtip.text(msg);
		},
		//ajaxPost:true
	});
})
</script>
</head>
<body id="login">
	
	<div id="login-wrapper" class="png_bg">
		<div id="login-top">
		
			<h1>Simpla Admin</h1>
			<!-- Logo (221px width) -->
			<img id="logo" src="resources/images/logo1.png" alt="Simpla Admin logo" />
		</div> <!-- End #logn-top -->
		
		<div id="login-content">
			
			<form action="feadmin/login" class="registerform" method="post">
			
				<p>
					<label>用户名</label>
					<input class="text-input" type="text" datatype="*" name="username"/>
					<span class="Validform_checktip"></span>
				</p>
				<div class="clear"></div>
				<p>
					<label>密码</label>
					<input class="text-input" type="password" datatype="*" name="password"/>
					<span class="Validform_checktip"></span>
				</p>
				<div class="clear"></div>
				<!-- <p id="remember-password">
					<input type="checkbox" />记住我
				</p> -->
				<div class="clear"></div>
				<p>
					<?php if(isset($error)){echo '<span style="color:red">'.$error.'</span>';}?>
					<input class="button" type="submit" value="登录" /><span id="msgdemo2" style="margin-left:30px;"></span>
				</p>
				
			</form>
		</div> <!-- End #login-content -->
		
	</div> <!-- End #login-wrapper -->
</body>
</html>
