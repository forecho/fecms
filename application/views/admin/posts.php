<div class="tab-content" id="tab2">
  <form action="feadmin/postsUpdate/<?php echo $postsOne->id;?>" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
	<fieldset>
	<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<p>
		<label><span class="need">* </span>标题</label>
			<input class="text-input small-input" type="text" id="small-input" name="title" datatype="*4-18" errormsg="昵称至少4个字符,最多18个字符！" value="<?php echo $postsOne->title;?>" />
			<span class="Validform_checktip"></span>
		<!-- Classes for input-notification: success, error, information, attention -->
	  <br />
	</p>
	<p>
		<label><span class="need">* </span>分类</label>
		<select name="category" class="small-input">
			<?php foreach($category as $row):?>
			<option value="<?php echo $row->cid;?>" <?php if($postsOne->category == $row->cid){echo 'selected="selected"';}?>>
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
		<input type="file" class="text-input small-input" id="small-input" name="image" value="<?php echo $postsOne->image;?>"/>
		<?php if($postsOne->image != ""):?>
			<a href="uploads/img/<?php echo $postsOne->image;?>" title="查看" target="_blank">已上传图片</a>
		<?php endif;?>
	</p>
	<p>
		<label><span class="need">* </span>文本编辑器</label>
		<textarea id="editor_id" name="content" style="width:90%;height:450px;"><?php echo $postsOne->content;?></textarea>
	</p>
	<p>
		<label for=""><span class="need">* </span>时间</label>
			<input type="text" name="addtime" value="<?php echo $postsOne->addtime;?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" class= "text-input small-input" autocomplete="off" datatype="*" />
		<span class="Validform_checktip"></span>
	</p>
	<p>
		<label>关键词(Keywords)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="keywords" value="<?php echo $postsOne->keywords;?>"/>
	</p>
	<p>
		<label>描述(Description)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" value="<?php echo $postsOne->description;?>"/>
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