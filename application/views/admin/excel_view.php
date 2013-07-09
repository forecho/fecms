<h2><?php echo $title_for_layout;?> 内容</h2>
<table cellpadding="0" cellspacing="0">
	<?php foreach($excel_datas as $row): ?>
    <tr>
		<?php for ($i = 1; $i <= $excel_cols; $i++):?>
    	<td width="80"><?php echo $row[$i]; ?></td>
		<?php endfor;?>
    </tr>
    <?php endforeach; ?>
</table>