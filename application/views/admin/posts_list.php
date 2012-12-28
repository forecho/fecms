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
			<!-- This is the target div. id must match the href of this div's tab -->
			
			<div class="bulk-actions search">
				<form action="feadmin/posts_search/">
					<select name="category">
						<option value="0">全部分类</option>
						<?php foreach($category as $row):?>
						<option value="<?php echo $row->cid;?>" <?php if(@$_GET['category'] == $row->cid){echo 'selected="selected"';}?>>
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
					<input type="text" name="title" value="<?php echo @$_GET['title'];?>" />
					<input type="submit" value="搜索"  class="button"/>
				</form>
			</div>
			
			<!-- <div class="notification attention png_bg"> 
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
				<?php if(@$category_one):?>
					<?php echo $category_one->name;?> 分类下所有的文章
				<?php else:?>
					全部分类文章
				<?php endif;?> 
				</div>
			</div> -->
			<form method="post" action="feadmin/posts_deletes">
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
									<!-- <select name="dropdown">
										<option value="option1">选择一个开始···</option>
										<option value="option3">删除</option>
									</select> -->
									<input type="submit" value="删除选中项目"  class="button"/>
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
						<?php foreach ($posts['admin'] as $post):
							?>
						<tr>
							<td>
							  <input type="checkbox" name="checkbox[]" value="<?php echo $post->id; ?>" />
							</td>
							<td><a href="feadmin/posts/<?php echo $post->id;?>" title="修改文章"><?php echo $post->title;?></a></td>
							<td><a href="feadmin/posts_search/?category=<?php echo $post->category;?>" title="查询“<?php echo $post->name;?>”分类"><?php echo $post->name;?></a></td>
							<!-- <td><?php //echo date('Y-m-d', strtotime($post->addtime));?></td> -->
							<td><?php echo $post->addtime;?></td>
							<td>
								<a href="feadmin/posts/<?php echo $post->id;?>" title="修改"><img src="resources/images/icons/pencil.png" alt="修改" /></a> 
								<?php if($post->type != 1){?>
									<a href="feadmin/posts_delete/<?php echo $post->id;?>" title="删除" onclick="return(confirm('确定删除?'))"><img src="resources/images/icons/cross.png" alt="删除" /></a> 
									<!-- <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
								<?php }?>
							</td>
						</tr>
					  <?php 
					  endforeach;?>
					</tbody>
			  </table>
		  </form>
		</div>
	<!-- End #tab1 -->
	<div class="tab-content" id="tab2">
	  <form action="feadmin/posts_create" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		<p>
			<label><span class="need">* </span>标题</label>
				<input class="text-input small-input" type="text" id="small-input" name="title" datatype="*4-18" errormsg="昵称至少4个字符,最多18个字符！" />
				<span class="Validform_checktip"></span>
			<!-- Classes for input-notification: success, error, information, attention -->
		  <br />
		</p>
		<p>
			<label><span class="need">* </span>分类</label>
			<select name="category" class="small-input">
				<?php foreach($category as $row):?>
				<?php 
					$is_onepage = $this->fe_model->num_form_where('posts',array('category'=>$row->cid));
					if($row->type == 1 && $is_onepage ==1){}
					else{
				?>
				<option value="<?php echo $row->cid;?>">
					<?php
						$count = count(explode('-',$row->bpath));
						for($i=1;$i<$count;$i++){
								echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							}	
							echo '|-',$row->name;
						?>
				</option>
				<?php }endforeach;?>
			</select>
		</p>
		<p>
			<label>标题图(177*120)</label>
			<input type="file" class="text-input small-input" id="small-input" name="image"/>
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
			<textarea id="editor_id" name="content" style="width:90%;height:450px;"></textarea>
			<!-- <script type="text/plain" id="myEditor" ></script>
			<script type="text/javascript">
				var editor = new baidu.editor.ui.Editor();
				editor.render("myEditor");
			</script> -->
		 
		</p>
		<p>
			<label for=""><span class="need">* </span>时间</label>
				<input type="text" name="addtime" value="<?php echo date("Y-m-d H:i:s");?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class= "text-input small-input" autocomplete="off" datatype="*" />
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