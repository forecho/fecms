<h2><?php echo $title_for_layout;?></h2>
<div class="tab-content" id="tab2">
  <form action="excel/excel_update/<?php echo $excel_one->id;?>" method="post" class="registerform" enctype="multipart/form-data">
	<fieldset>
	<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
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
		<label>名称</label>
		<input type="text" name="name" value="<?php echo $excel_one->name;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>材质</label>
		<input type="text" name="material" value="<?php echo $excel_one->material;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>厚度mm</label>
		<input type="text" name="thickness" value="<?php echo $excel_one->thickness;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>宽度mm</label>
		<input type="text" name="width" value="<?php echo $excel_one->width;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>长度mm</label>
		<input type="text" name="length" value="<?php echo $excel_one->length;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>库存</label>
		<input type="text" name="stock" value="<?php echo $excel_one->stock;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>总重t</label>
		<input type="text" name="weight" value="<?php echo $excel_one->weight;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>价格</label>
		<input type="text" name="price" value="<?php echo $excel_one->price;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>产地</label>
		<input type="text" name="place" value="<?php echo $excel_one->place;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>存放地</label>
		<input type="text" name="location" value="<?php echo $excel_one->location;?>" class= "text-input small-input" />
	</p>
	<p>
		<label>备注</label>
		<input type="text" name="remark" value="<?php echo $excel_one->remark;?>" class= "text-input small-input" />
	</p>
	<p>
		<label><span class="need">* </span>时间</label>
			<input type="text" name="addtime" value="<?php echo $excel_one->addtime;?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class= "text-input small-input" autocomplete="off" datatype="*" />
		<span class="Validform_checktip"></span>
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