<h2><?php echo $title_for_layout;?></h2>
<div class="tab-content" id="tab2">
  <form action="excel/excel_update/<?php echo $excel_one->id;?>" method="post" class="registerform" enctype="multipart/form-data">
	<fieldset>
	<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
	<p>
		<label><span class="need">* </span>文档标题</label>
			<input class="text-input small-input" type="text" id="small-input" name="title" datatype="*4-18" errormsg="昵称至少4个字符,最多18个字符！" value="<?php echo $excel_one->title;?>" />
			<span class="Validform_checktip"></span>
		<!-- Classes for input-notification: success, error, information, attention -->
	  <br />
	</p>
	<p>
		<label><span class="need">* </span>分类</label>
		<select name="category" class="small-input">
			<?php foreach($category as $row):?>
			<option value="<?php echo $row->cid;?>" <?php if($excel_one->category == $row->cid){echo 'selected="selected"';}?>>
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
		<label><span class="need">* </span>上传Excel文档(注:excel的格式只能是xls)</label>
		<input type="file" class="text-input small-input" id="small-input" name="excel" value="<?php echo $excel_one->excel;?>"/>
		<?php if($excel_one->excel != ""):?>
			[<a href="excel/excel_view/<?php echo $excel_one->excel;?>" title="查看" target="_blank">查看Excel</a>]
			[<a href="uploads/excel/<?php echo $excel_one->excel;?>" title="下载" target="_blank">下载Excel</a>]
		<?php endif;?>
		<span class="Validform_checktip"></span>
	</p>
	<p>
		<label for=""><span class="need">* </span>时间</label>
			<input type="text" name="addtime" value="<?php echo $excel_one->addtime;?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" class= "text-input small-input" autocomplete="off" datatype="*" />
		<span class="Validform_checktip"></span>
	</p>
	<p>
		<label>关键词(Keywords)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="keywords" value="<?php echo $excel_one->keywords;?>"/>
	</p>
	<p>
		<label>描述(Description)</label>
		<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" value="<?php echo $excel_one->description;?>"/>
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