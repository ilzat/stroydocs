<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>web/js/validate.js"></script>

<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?=$doc_title_desc?></h3>
			</div>
			<div class="box-body">
				<table class="table lin_size" id="converter_table">
					<thead>
					<tr>
						<th colspan="2" style="font-weight: bold!important;">
							<? $this->load->view('calculators/converter/select_view'); ?>
						</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 55%;">Километр</td>
							<td><input id="text_0" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(0);"/></td>
						</tr>
						<tr>
							<td>Метр</td>
							<td><input id="text_1" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(1);" /></td>
						</tr>
						<tr>
							<td>Сантиметр</td>
							<td><input id="text_2" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(2);" /></td>
						</tr>
						<tr>
							<td>Миллиметр</td>
							<td><input id="text_3" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(3);" /></td>
						</tr>
						<tr>
							<td>Дюйм</td>
							<td><input id="text_4" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(4);" /></td>
						</tr>
						<tr>
							<td>Аршин</td>
							<td><input id="text_5" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(5);" /></td>
						</tr>
						<tr>
							<td>Верста</td>
							<td><input id="text_6" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(6);" /></td>
						</tr>
						<tr>
							<td>Вершок</td>
							<td><input id="text_7" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(7);" /></td>
						</tr>
						<tr>
							<td>Миля морская (уставн.)</td>
							<td><input id="text_8" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(8);" /></td>
						</tr>
						<tr>
							<td>Миля морская (англ.)</td>
							<td><input id="text_9" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(9);" /></td>
						</tr>
						<tr>
							<td>Сажень</td>
							<td><input id="text_10" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(10);" /></td>
						</tr>
						<tr>
							<td>Фут</td>
							<td><input id="text_11" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(11);" /></td>
						</tr>
						<tr>
							<td>Ярд</td>
							<td><input id="text_12" type="text" class="form-control" placeholder="0" onkeyup="lin_size_convert(12);" /></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<? $this->load->view('calculators/converter/sidebar_view'); ?>
	</div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Описание</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <p>Онлайн конвертирование величин Километр - Метр - Сантиметр - Миллиметр - Дюйм - Аршин - Верста - Вершок - Миля морская (уставн.) - Миля морская (англ.) - Сажень - Фут - Ярд. Калькулятор работает автоматически, достаточно лишь заполнить любое поле.</p>
		<p>Результат округляется до 10 знаков послезапятой.</p>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url();?>web/calculators/converter/app.js"></script>
<script src="<?=base_url();?>web/calculators/converter/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calculators/converter/style.css"/>