<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<table class="certificates_table">
					<?php foreach ($cat_1_arr as $row): ?>
					<tr>
						<td class="down_icon">
							<img src="<?=base_url();?>web/pages/downloads/img/icons/folderopened_yellow.png" />
						</td>
						<td>
							<a href="<?=base_url();?>certificates/<?=$row['segment']?>"><?=$row['category']?></a>
						</td>
					</tr>
					<?php endforeach; ?>					
				</table>
			</div>
		</div>
	</div>
</div> 

<link rel="stylesheet" href="<?=base_url();?>web/pages/certificates/style.css"/>