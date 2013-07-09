<h2><?php echo $title_for_layout;?> </h2>
<form action="excel/excel_create_ok" method="post">
	<input type="hidden" name="category" value="<?php echo $excel_post['category'];?>" />
	<input type="hidden" name="addtime" value="<?php echo $excel_post['addtime'];?>" />
	<input type="hidden" name="excel_path" value="<?php echo $excel_path;?>" />
	<input class="button" type="submit" value="确定在[<?php echo $category_name;?>]下导入下列资源" />
	<span>共<?php echo $excel_rows-3;?>条资源</span>
	
	<table cellpadding="0" cellspacing="0">
		<?php foreach($excel_datas as $row): ?>
		<tr>
			<?php for ($i = 1; $i <= 11; $i++):?>
			<td width="80"><?php echo $row[$i]; ?></td>
			<?php endfor;?>
		</tr>
		<?php endforeach; ?>
	</table>
</form>