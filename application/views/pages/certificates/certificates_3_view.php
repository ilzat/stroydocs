<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?=$header?></h3>
			</div>
			<div class="box-body">
				<?
				if (empty($cat_3_arr)) {
					echo "<strong>Категория пока пуста</strong>";
				} else {
				?>
				<div class="row">
					<div class="col-md-5">
						<img class="img-responsive" src="<?=base_url();?>web/pages/certificates/img/metall/<?=$cat_2_row['segment']?>.jpg" style="padding: 6px;" />
					</div>
					<div class="col-md-7">
						<p><?=$cat_2_row['description']?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="certificates">
								<tr style="font-weight: bold;">
									<td>Номер <br/>сертификата</td>
									<td>Наименование</td>
									<td>Стандарт</td>
									<td>Профиля</td>
									<td>Дата</td>
									<td>Сталь</td>
									<td>Грузополучатель</td>
									<td>Ссылка</td>
								</tr>
								<?php foreach ($cat_3_arr as $row):?>
								<tr>
									<td style="text-align: left;"><?=$row['number']?></td>
									<td><?=$row['name']?></td>
									<td style="text-align: left;"><?=$row['standard']?></td>
									<td><?=$row['size']?></td>
									<td><?=$row['date']?></td>
									<td><?=$row['steel']?></td>
									<td style="text-align: left;"><?=$row['recipient']?></td>
									<td><a class="blue_strong" href="<?=base_url()?>web/pages/certificates/files/metall/<?=$row['type'].'/'.$row['number']?>.zip">Скачать</a></td>
								</tr>
								
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
				<?
				}
				?>
			</div>
		</div>
	</div>
</div> 

<link rel="stylesheet" href="<?=base_url();?>web/pages/certificates/style.css"/>