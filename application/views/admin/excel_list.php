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
				<form action="excel/excel_search/">
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
					<input type="text" name="name" value="<?php echo @$_GET['name'];?>" />
					<input type="submit" value="搜索"  class="button"/>
				</form>
			</div>
			<form method="post" action="excel/excel_deletes">
				<table class="excel">
					<thead>
						<tr>
							<th>
							  <input class="check-all" type="checkbox" />
							</th>
							<th>ID</th>
							<th>分类</th>
							<th>发布时间</th>
							<th>名称</th>
							<th>材质</th>
							<th>厚度mm</th>
							<th>宽度mm</th>
							<th>长度mm</th>
							<th>库存</th>
							<th>总重t</th>
							<th>价格</th>
							<th>产地</th>
							<th>存放地</th>
							<th>备注</th>
							<th>操  作</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="15">
								<div class="bulk-actions align-left">
									<input type="submit" value="删除选中"  class="button" name="act"/>
									<input type="submit" value="更新时间"  class="button" name="act"/>
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
						<?php foreach ($excel['admin'] as $post):?>
						<tr>
							<td>
							  <input type="checkbox" name="checkbox[]" value="<?php echo $post->id; ?>" />
							</td>
							<td><?php echo $post->id;?></td>
							<td><a href="excel/excel_search/?category=<?php echo $post->category;?>" title="查询“<?php echo $post->cname;?>”分类"><?php echo $post->cname;?></a></td>
							<!-- <td><?php //echo date('Y-m-d', strtotime($post->addtime));?></td> -->
							<td><?php echo $post->addtime;?></td>
							<td><?php echo $post->name;?></td>
							<td><?php echo $post->material;?></td>
							<td><?php echo $post->thickness;?></td>
							<td><?php echo $post->width;?></td>
							<td><?php echo $post->length;?></td>
							<td><?php echo $post->stock;?></td>
							<td><?php echo $post->weight;?></td>
							<td><?php echo $post->price;?></td>
							<td><?php echo $post->place;?></td>
							<td><?php echo $post->location;?></td>
							<td><?php echo $post->remark;?></td>
							<td>
								<a href="excel/excel_edit/<?php echo $post->id;?>" title="修改"><img src="resources/images/icons/pencil.png" alt="修改" /></a> 
								<a href="excel/excel_delete/<?php echo $post->id;?>" title="删除" onclick="return(confirm('确定删除?'))"><img src="resources/images/icons/cross.png" alt="删除" /></a> 
									<!-- <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
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
	  <form action="excel/excel_create" method="post" class="registerform" onSubmit="return chkinput(this)" enctype="multipart/form-data">
		<fieldset>
		<!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		<p>
			<label><span class="need">* </span>分类</label>
			<select name="category" class="small-input">
				<?php foreach($category as $row):?>
				<?php 
					echo $is_onepage = $this->fe_model->num_form_where('excel',array('category'=>$row->cid));
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
			<label><span class="need">* </span>上传Excel文档(注:excel的格式只能是xls)</label>
			<input type="file" class="text-input small-input" id="small-input" name="excel" datatype="*"/>
			<span class="Validform_checktip"></span>
			<span>批量上传资源，请<a href="uploads/excel/excel.xls" title="下载模板">点击这里下载模板表格文件</a>，严格按照格式填写上传导入</span>
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