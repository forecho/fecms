<h2><?php echo $title_for_layout;?></h2>
<div class="tab-content" id="tab2">
  <form action="feadmin/posts_update/<?php echo $posts_one->id;?>" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
	<fieldset>
	<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<p>
		<label><span class="need">* </span>标题</label>
			<input class="text-input medium-input" type="text" id="medium-input" name="title" datatype="*4-28" errormsg="昵称至少4个字符,最多28个字符！" value="<?php echo $posts_one->title;?>" />
			<span class="Validform_checktip"></span>
		<!-- Classes for input-notification: success, error, information, attention -->
	  <br />
	</p>
	<p>
		<label><span class="need">* </span>分类</label>
		<select name="category" class="small-input">
			<?php foreach($category as $row):?>
			<option value="<?php echo $row->cid;?>" <?php if($posts_one->category == $row->cid){echo 'selected="selected"';}?>>
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
	<p>
		<label>标题图(177*120)</label>
		<input type="file" class="text-input small-input" id="small-input" name="image" value="<?php echo $posts_one->image;?>"/>
		<?php if($posts_one->image != ""):?>
			<a href="uploads/img/<?php echo $posts_one->image;?>" title="查看" target="_blank">已上传图片</a>
		<?php endif;?>
	</p>
	<p>
		<label><span class="need">* </span>文本编辑器</label>
		<textarea id="editor_id" name="content" style="width:70%;height:450px;"><?php echo $posts_one->content;?></textarea>
	</p>
	<p>
		<label for=""><span class="need">* </span>时间</label>
			<input type="text" name="addtime" value="<?php echo $posts_one->addtime;?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" class= "text-input small-input" autocomplete="off" datatype="*" />
		<span class="Validform_checktip"></span>
	</p>
	<p>
		<label>关键词(Keywords)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="keywords" value="<?php echo $posts_one->keywords;?>"/>
	</p>
	<p>
		<label>描述(Description)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" value="<?php echo $posts_one->description;?>"/>
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