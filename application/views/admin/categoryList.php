<div class="content-box">
  <!-- Start Content Box -->
	<div class="content-box-header">
		<h3>分类导航</h3>
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
			<!-- <div class="notification attention png_bg"> 
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div> 这是一个内容框.你可以放置你想要的任何东西，当然，你可以关闭这个通知拥有上方的叉叉 </div>
			</div> -->
			<table>
				<thead>
					<tr>
						<th>导航名称</th>
						<th>操&nbsp;&nbsp;&nbsp;作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($category as $row):?>
					<tr>
						<td>
						<?php
							$count = count(explode('-',$row->bpath));
							for($i=2;$i<$count;$i++){
								echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							}	
							echo '|-',$row->name;
						?>
						</td>
						<td>
							<a href="feadmin/category/<?php echo $row->id;?>" title="修改"><img src="resources/images/icons/pencil.png" alt="修改" /></a> 
							&nbsp;
							<a href="feadmin/categoryDelete/<?php echo $row->id;?>" title="删除"><img src="resources/images/icons/cross.png" alt="删除" /></a> 
							<!-- <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
						</td>
					</tr>
				  <?php endforeach;?>
				</tbody>
		  </table>
		</div>
	<!-- End #tab1 -->
	<div class="tab-content" id="tab2">
	  <form action="feadmin/categoryCreate/" method="post" class="registerform">
		<fieldset>
		<p>
			<label><span class="need">* </span>请选择父级目录</label>
			<select name="id" class="small-input">
				<option value="0">根目录</option>
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
		
		<p>
		  <label><span class="need">* </span>导航名称</label>
		  <input class="text-input small-input" type="text" id="small-input" name="name" datatype="s2-10" errormsg="昵称至少2个字符,最多10个字符！" />
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
	<!-- End #tab2 -->
  </div>
  <!-- End .content-box-content -->
</div>