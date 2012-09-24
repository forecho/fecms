<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor:pointer;">修改密码</h3>
	</div>
	<div class="content-box-content">
	<form action="feadmin/pwdChangeOK" method="post" class="registerform">
		<fieldset>
		<p>
		  <label><span class="need">* </span>原密码</label>
		  <input class="text-input small-input" type="password" id="small-input" name="pwd"   datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" />
		  <span class="Validform_checktip"></span>
		  <br />
		</p>
		<p>
		  <label><span class="need">* </span>新密码</label>
		  <input class="text-input small-input" type="password" id="small-input" name="pwd1" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" />
		  <span class="Validform_checktip"></span>
		  <br />
		</p>
		<p>
		  <label><span class="need">* </span>确认新密码</label>
		  <input class="text-input small-input" type="password" id="small-input" name="pwd2"  datatype="*" recheck="pwd1" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" />
		  <span class="Validform_checktip"></span>
		  <br />
		</p>
		
		<p>
			<input class="button" type="submit" value="提 交" />
		</p>
		</fieldset>
		<div class="clear"></div>
		<!-- End .clear -->
	</form>
	</div>
</div>
<br>
<br>