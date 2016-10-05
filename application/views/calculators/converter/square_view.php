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
				<table class="table" id="converter_table">
					<thead>
					<tr>
						<th colspan="2" style="font-weight: bold!important;">
							<? $this->load->view('calculators/converter/select_view'); ?>
						</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 55%;">Квадратный километр</td>
							<td><input id="text_0" type="text" class="form-control" placeholder="0" onkeyup="square_convert(0);"/></td>
						</tr>
						<tr>
							<td>Квадратный метр</td>
							<td><input id="text_1" type="text" class="form-control" placeholder="0" onkeyup="square_convert(1);" /></td>
						</tr>
						<tr>
							<td>Квадратный сантиметр</td>
							<td><input id="text_2" type="text" class="form-control" placeholder="0" onkeyup="square_convert(2);" /></td>
						</tr>
						<tr>
							<td>Квадратный миллиметр</td>
							<td><input id="text_3" type="text" class="form-control" placeholder="0" onkeyup="square_convert(3);" /></td>
						</tr>
						<tr>
							<td>Квадратный дюйм</td>
							<td><input id="text_4" type="text" class="form-control" placeholder="0" onkeyup="square_convert(4);" /></td>
						</tr>
						<tr>
							<td>Акр</td>
							<td><input id="text_5" type="text" class="form-control" placeholder="0" onkeyup="square_convert(5);" /></td>
						</tr>
						<tr>
							<td>Ар</td>
							<td><input id="text_6" type="text" class="form-control" placeholder="0" onkeyup="square_convert(6);" /></td>
						</tr>
						<tr>
							<td>Гектар</td>
							<td><input id="text_7" type="text" class="form-control" placeholder="0" onkeyup="square_convert(7);" /></td>
						</tr>
						<tr>
							<td>Квадратная верста</td>
							<td><input id="text_8" type="text" class="form-control" placeholder="0" onkeyup="square_convert(8);" /></td>
						</tr>
						<tr>
							<td>Квадратная миля</td>
							<td><input id="text_9" type="text" class="form-control" placeholder="0" onkeyup="square_convert(9);" /></td>
						</tr>
						<tr>
							<td>Квадратный сажень</td>
							<td><input id="text_10" type="text" class="form-control" placeholder="0" onkeyup="square_convert(10);" /></td>
						</tr>
						<tr>
							<td>Квадратный фут</td>
							<td><input id="text_11" type="text" class="form-control" placeholder="0" onkeyup="square_convert(11);" /></td>
						</tr>
						<tr>
							<td>Квадратный ярд</td>
							<td><input id="text_12" type="text" class="form-control" placeholder="0" onkeyup="square_convert(12);" /></td>
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
        <p>Онлайн конвертирование величин Квадратный километр - Квадратный метр - Квадратный сантиметр - Квадратный миллиметр - Квадратный дюйм - Акр - Ар - Гектар - Квадратная верста - Квадратная миля - Квадратный сажень - Квадратный фут - Квадратный ярд. Калькулятор работает автоматически, достаточно лишь заполнить любое поле.</p>
		<p>Результат округляется до 10 знаков послезапятой.</p>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url();?>web/calculators/converter/app.js"></script>
<script src="<?=base_url();?>web/calculators/converter/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calculators/converter/style.css"/>