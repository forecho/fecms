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
			<form action="feadmin/options_update" method="post" class="registerform">
				
				<table>
					<thead>
						<tr>
							<th>参数名称</th>
							<th>参数值</th>
							<th>参数变量名</th>
							<th>参数说明</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($options as $row):?>
						<tr>
							
							<td><?php echo $row->name;?></td>
							<td><input class="text-input medium-input datepicker" type="text" id="medium-input" name="<?php echo $row->option_name;?>" value="<?php echo $row->option_value;?>" datatype="*" /></td>
							<td><?php echo $row->option_name;?></td>
							<td><?php echo $row->option_explain;?></td>
							<td>
								<?php if($row->option_type == 1):?>
								<a href="feadmin/options_delete/<?php echo $row->id;?>" title="删除" onclick="return(confirm('确定删除?'))"><img src="resources/images/icons/cross.png" alt="删除" /></a>
								<?php endif;?>
							</td>
							
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
					
				<p>
					<input class="button" type="submit" value="提 交" />
				</p>
				<div class="clear"></div>
				<!-- End .clear -->
			</form>
		</div>
	<!-- End #tab1 -->
	<div class="tab-content" id="tab2">
	  <form action="feadmin/options_create" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		<p>
			<label><span class="need">* </span>参数名称</label>
				<input class="text-input small-input" type="text" id="small-input" name="name" datatype="*4-18" errormsg="昵称至少4个字符,最多18个字符！" />
				<span class="Validform_checktip"></span>
			<!-- Classes for input-notification: success, error, information, attention -->
		  <br />
		</p>
		<p>
			<label><span class="need">* </span>参数变量名</label>
				<input class="text-input small-input" type="text" id="small-input" name="option_name" datatype="w4-18" ajaxurl="feadmin/option_name" />
				<span class="Validform_checktip"></span>
				<small>变量名只能使用字母数字下划线组成，且只能用字母开头，不区分大小写，长度4-18字符</small>
			<!-- Classes for input-notification: success, error, information, attention -->
		  <br />
		</p>
		<p>
			<label><span class="need">* </span>参数值</label>
				<input class="text-input small-input" type="text" id="small-input" name="option_value" datatype="*" />
				<span class="Validform_checktip"></span>
			<!-- Classes for input-notification: success, error, information, attention -->
		  <br />
		</p>
		
		<p>
			<label>参数说明</label>
			<textarea class="textarea" name="option_explain" cols="79" rows="5"></textarea>
		</p>
		<p>
			<input type="hidden" name="option_type" value="1" />
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