<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor:pointer;">新闻</h3>
	</div>
	<div class="content-box-content">
		<table>
			<tr>
				<td width="100px"><b>Title</b></td>
				<td><b>Content</b></td>
			</tr>
			<?php
				foreach ($posts->result()  as $post):
					echo '<tr>';
					echo '<td>' . $post->title . '</td>';
					echo '<td>' . $post->content . '</td>';
					echo '</tr>';
				endforeach;
			?>
		</table>
		<div class="pagination">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
<div class="clear"></div>
<div id="myEditor"></div>
<script type="text/javascript">
    var editor = new baidu.editor.ui.Editor();
    editor.render("myEditor");
</script>
<br>
<br>