<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor:pointer;">新闻</h3>
	</div>
	<div class="content-box-content">
		<form action="feadmin/postsCreate" method="post" class="registerform" >
		<fieldset>
		<p>
			<label><span class="need">* </span>标题</label>
				<input class="text-input small-input" type="text" id="small-input" name="title"  />
		  <br />
		</p>
		<p>
			<label><span class="need">* </span>分类</label>
			<select name="category" class="small-input">
				<?php foreach($category as $row):?>
				<option value="<?php echo $row->cid;?>">
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
			<input type="file" class="text-input small-input" id="small-input" name="image"/>
		</p>
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
		<p>
		<p>
		  <input class="button" type="submit" value="提 交" />
		</p>
		</fieldset>
		<div class="clear"></div>
		<!-- End .clear -->
	  </form>
	</div>
</div>
<div class="clear"></div>
<br>
<br>