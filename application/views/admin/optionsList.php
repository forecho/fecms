<div class="content-box">
  <!-- Start Content Box -->
	<div class="content-box-header">
		<h3><?php echo $title_for_layout;?></h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">列表</a></li>
			<!-- href must be unique and match the id of target div -->
			<li><a href="#tab2">添加</a></li>
		</ul>
		<div class="clear"></div>
	</div>
  <!-- End .content-box-header -->
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
			<form action="feadmin/companyUpdate/<?php echo $this->uri->segment(3)?>" method="post" class="registerform">
				<fieldset>
					<?php foreach($options as $row):?>
					<p>
						<label><span class="need">* </span><?php echo $row->option_name;?></label>
						<input class="text-input small-input" type="text" id="small-input" name="option_value" value="<?php echo $row->option_value;?>" datatype="*" />
						<span class="Validform_checktip"></span>
						<br />
					</p>
					<?php endforeach;?>
				<p>
					<input class="button" type="submit" value="提 交" />
				</p>
				</fieldset>
				<div class="clear"></div>
				<!-- End .clear -->
			</form>
		</div>
	<!-- End #tab1 -->
	<div class="tab-content" id="tab2">
	  <form action="feadmin/optionsCreate" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		<p>
			<label><span class="need">* </span>信息名称</label>
				<input class="text-input small-input" type="text" id="small-input" name="option_name" datatype="*4-18" errormsg="昵称至少4个字符,最多18个字符！" />
				<span class="Validform_checktip"></span>
			<!-- Classes for input-notification: success, error, information, attention -->
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
	<!-- End #tab2 -->
  </div>
  <!-- End .content-box-content -->
</div>
<script language="javascript">
function chkinput(form)
{
	var content=editor.hasContents()
		if(!content)
	{
		alert("请输入内容！");
		return(false);
	}
		return(true);
}
</script>