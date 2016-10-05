<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><?=$title;?></h3>
			</div>
			<div class="box-body">
				<p>Форма СП 70.13330.2012</p>
				<table>
					<tr>
						<td style="vertical-align: top;">
							<img src="<?=base_url()?>web/info/work_book/img/doc.png"/>
						</td>
						<td>
							<a href="http://downloads.stroydocs.com/itd/books/zhurnal_svarochnyx_rabot.doc" target="_blank">Скачать</a> бланк журнала сварочных работ в формате Microsoft Word. 0,1 Мб.
						</td>
					</tr>
				</table>
				<img class="img-responsive" src="<?=base_url()?>web/info/work_book/img/zh_svar_rab.png" title="Оформление. <?=$title;?>" style="margin: auto;" />
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?=base_url();?>web/info/work_book/style.css"/>