<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<?
				if (empty($cat_2_arr)) {
					echo "<strong>Категория пока пуста</strong>";
				} else {
				?>
				<table class="downloads_table">
					<?php foreach ($cat_2_arr as $row): ?>
					<tr>
						<td class="down_icon">
							<img src="<?=base_url();?>web/pages/downloads/img/icons/folderopened_yellow.png" />
						</td>
						<td>
							<a href="<?=base_url();?>downloads/<?=$cat_1_row['segment'].'/'.$row['segment']?>"><?=$row['sub_category']?></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?
				}
				?>
			</div>
		</div>
	</div>
</div> 

<script src="<?=base_url();?>web/pages/downloads/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/pages/downloads/style.css"/>