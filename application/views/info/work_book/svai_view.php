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
				<p>Форма ООФ "ЦКС"</p>
				<table>
					<tr>
						<td style="vertical-align: top; width: 60px;">
							<img src="<?=base_url()?>web/info/work_book/img/xls.png"/>
						</td>
						<td>
							<a href="http://downloads.stroydocs.com/itd/books/zhurnal_pogruzheniya_(zabivki)_svaj.xls" target="_blank">Скачать</a> бланк журнала погружения (забивки) свай в формате Microsoft Excel. 0,1 Мб.
						</td>
					</tr>
				</table>
				<img class="img-responsive" src="<?=base_url()?>web/info/work_book/img/zh_svai.png" title="Оформление. <?=$title;?>" style="margin: auto;" />
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?=base_url();?>web/info/work_book/style.css"/>