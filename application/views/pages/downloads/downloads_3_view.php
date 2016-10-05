<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<?
				if (empty($cat_3_arr)) {
					echo "<strong>Категория пока пуста</strong>";
				} else {
				?>
				<table class="downloads_table down">
					<?php foreach ($cat_3_arr as $row): 
					switch ($row['icon']) {
					
					case 'zip':
						$icon = "winrar.png";
						break;
						
					default:
						$icon = "winrar.png";
					}
					
					?>
					<tr>
						<td class="down_icon">
							<img src="<?=base_url();?>web/pages/downloads/img/icons/<?=$icon?>" />
						</td>
						<td>
							<a href="<?=$row['link']?>"><?=$row['title']?></a>
							<p>
							<?
							if (!empty($row['desc'])) {
								echo $row['desc']."<br/>";
							}
							if (!empty($row['size'])) {
								echo $row['size']."<br/>";
							}
							if (!empty($row['status'])) {
								switch ($row['status']) {
								
								case "canceled":
									$status = "<span class='text-red'>отменен</span>";
									break;
									
								case "active":
									$status = "<span class='text-green'>действует</span>";
									break;
									
								default:
									$status = "не определен";
								}
								echo "Статус: ".$status;
							}
							?>
							</p>
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