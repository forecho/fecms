<div class="content-box">
  <!-- Start Content Box -->
	<div class="content-box-header">
		<h3><?php echo $title_for_layout;?></h3>
		<div class="clear"></div>
	</div>
  <!-- End .content-box-header -->
  <div class="content-box-content">
	<div class="tab-content default-tab" id="tab1">
	  <form action="excel/excel_create_one_ok" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
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
			<label><span class="need">* </span>名称</label>
			<input type="text" name="name" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>材质</label>
			<input type="text" name="material" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>厚度mm</label>
			<input type="text" name="thickness" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>宽度mm</label>
			<input type="text" name="width" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>长度mm</label>
			<input type="text" name="length" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>库存</label>
			<input type="text" name="stock" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>总重t</label>
			<input type="text" name="weight" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>价格</label>
			<input type="text" name="price" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>产地</label>
			<input type="text" name="place" class= "text-input small-input" datatype="*"/>
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label><span class="need">* </span>存放地</label>
			<input type="text" name="location" class= "text-input small-input" datatype="*" />
			<span class="Validform_checktip"></span>
		</p>
		<p>
			<label>备注</label>
			<input type="text" name="remark" class= "text-input small-input" />
		</p>
		<p>
			<label for=""><span class="need">* </span>时间</label>
				<input type="text" name="addtime" value="<?php echo date("Y-m-d H:i:s");?>" id="d11" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class= "text-input small-input" autocomplete="off" datatype="*" />
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
	<!-- End #tab2 -->
  </div>
  <!-- End .content-box-content -->
</div>