<div class="content-box">
  <!-- Start Content Box -->
	<div class="content-box-header">
		<h3>文章内容</h3>
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
			<!-- This is the target div. id must match the href of this div's tab -->
			<div class="notification attention png_bg"> 
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div> 这是一个内容框.你可以放置你想要的任何东西，当然，你可以关闭这个通知拥有上方的叉叉 </div>
			</div>
			<table>
				<thead>
					<tr>
						<th>
						  <input class="check-all" type="checkbox" />
						</th>
						<th>文章标题</th>
						<th>分类</th>
						<th>发布时间</th>
						<th>操  作</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6">
							<div class="bulk-actions align-left">
								<select name="dropdown">
									<option value="option1">选择一个开始···</option>
									<option value="option3">删除</option>
								</select>
								<a class="button" href="#">选中项目操作</a>
							</div>
							<div class="pagination">
								<?php echo $this->pagination->create_links(); ?>
							</div>
								<!-- End .pagination -->
							<div class="clear"></div>
						</td>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($posts['admin'] as $post):?>
					<tr>
						<td>
						  <input type="checkbox" />
						</td>
						<td><?php echo $post->title;?></td>
						<td><a href="#" title="title"><?php echo $categoryOne->category;?></a></td>
						<td><?php echo $post->addtime;?></td>
						<td>
							<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> 
							<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
							<!-- <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
						</td>
					</tr>
				  <?php endforeach;?>
				</tbody>
		  </table>
		</div>
	<!-- End #tab1 -->
	<div class="tab-content" id="tab2">
	  <form action="feadmin/postsCreate" method="post" class="registerform" onSubmit="return chkinput(this)">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		<p>
			<label><span class="need">* </span>标题</label>
				<input class="text-input small-input" type="text" id="small-input" name="title" datatype="s4-18" errormsg="昵称至少4个字符,最多18个字符！" />
				<span class="Validform_checktip"></span>
			<!-- Classes for input-notification: success, error, information, attention -->
		  <br />
		</p>
		<p>
			<label><span class="need">* </span>分类</label>
			<select name="category" class="small-input">
				<?php foreach($category as $row):?>
				<option value="<?php echo $row->id;?>">
					<?php
						$count = count(explode('-',$row->bpath));
						for($i=1;$i<$count;$i++){
								echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							}	
							echo '|-',$row->name;
						?>
				</option>
				<?php endforeach;?>
			</select>
		</p>
		  <!-- <label>复选框</label>
		  <input type="checkbox" name="checkbox1" />
		  这是一个复选框
		  <input type="checkbox" name="checkbox2" />
		  		 这是另外一个复选框 </p>
		  		<p>
		  <label>单选按钮</label>
		  <input type="radio" name="radio1" />
		  这是一个单选按钮<br />
		  <input type="radio" name="radio2" />
		  这是另外一个单选按钮 </p> -->
		<p>
			<label><span class="need">* </span>文本编辑器</label>
			<script type="text/plain" id="myEditor" ></script>
			<script type="text/javascript">
				var editor = new baidu.editor.ui.Editor();
				editor.render("myEditor");
			</script>
		 <!--  <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea> -->
		</p>
		<p>
			<label for=""><span class="need">* </span>时间</label>
			<?php $class = 'id="d11" onClick="WdatePicker()" class= "text-input small-input" autocomplete="off" datatype="*"';echo form_input('addtime',date("Y-m-d"),$class);?>
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label>关键词(Keywords)</label>
			<input class="text-input medium-input datepicker" type="text" id="medium-input" name="keywords" />
		</p>
		<p>
			<label>描述(Description)</label>
			<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" />
		</p>
		<!-- <p>
		  <label>大的输入框</label>
		  <input class="text-input large-input" type="text" id="large-input" name="large-input" />
		</p> -->
		<p>
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