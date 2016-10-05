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
				<p>Журнал бетонных работ (в соответствии с требованиями СП 70.13330.2012) заполняется мастером или прорабом.</p>
				<p>В период укладки бетона надлежит отбирать не менее 2-х проб бетона от сменной поставки, каждая проба состоит из трех образцов размером 100х100х100 мм или 150×150×150 мм.</p>
				<p>В зимний период температура уложенной смеси должна контролироваться. Измерение температуры производится в наиболее и наименее прогреваемых частях конструкции.
Количество точек измерения температуры определяется из расчета:</p>
				<ul>
					<li>одна точка на 3 м3 бетона;</li>
					<li>6 м длины конструкции;</li>
					<li>4 м2 перекрытий;</li>
					<li>10 м2 подготовки полов или днищ.</li>
				</ul>
				<table>
					<tr>
						<td style="vertical-align: top; width: 60px;">
							<img src="<?=base_url()?>web/info/work_book/img/doc.png"/>
						</td>
						<td>
							<a href="http://downloads.stroydocs.com/itd/books/zhurnal_betonnyx_rabot.doc" target="_blank">Скачать</a> бланк журнала бетонных работ в формате Microsoft Word. 0,3 Мб.
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							<img src="<?=base_url()?>web/info/work_book/img/doc.png"/>
						</td>
						<td>
							<a href="http://downloads.stroydocs.com/itd/books/zhurnal_uxoda_za_betonom.doc" target="_blank">Скачать</a> бланк журнала по уходу за бетоном в формате Microsoft Word. 0,1 Мб.
						</td>
					</tr>
				</table>
				<img class="img-responsive" src="<?=base_url()?>web/info/work_book/img/zh_bet_rab.png" title="Оформление. <?=$title;?>" style="margin: auto;" />
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?=base_url();?>web/info/work_book/style.css"/>