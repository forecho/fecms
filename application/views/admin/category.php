<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor:pointer;">修改分类导航</h3>
	</div>
	<div class="content-box-content">
	<form action="feadmin/categoryUpdate/<?php echo $this->uri->segment(3)?>" method="post" class="registerform">
		<fieldset>
		<p>
			<label><span class="need">* </span>请选择父级目录</label>
			<select name="cid" class="small-input">
				<option value="0">根目录</option>
				<?php foreach($category as $row):?>
				<option value="<?php echo $row->cid;?>" <?php if($row->cid == $categoryOne->pid){echo 'selected="selected"';}?>>
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
			<label>导航栏目类型</label>
			<select name="type">
				<option value="0" <?php if($categoryOne->type == 0){echo 'selected="selected"';}?>>菜单分类</option>
				<option value="1" <?php if($categoryOne->type == 1){echo 'selected="selected"';}?>>单页面</option>
			</select>
		</p>
		<p>
		  <label><span class="need">* </span>导航名称</label>
		  <input class="text-input small-input" type="text" id="small-input" name="name" value="<?php echo $categoryOne->name;?>" datatype="s2-10" errormsg="昵称至少2个字符,最多10个字符！" />
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