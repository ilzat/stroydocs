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
				<table class="table" id="converter_table_2">
					<thead>
					<tr>
						<th colspan="4" style="font-weight: bold!important;">
							<? $this->load->view('calculators/converter/select_view'); ?>
						</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td><input id="text_1" type="text" class="form-control" placeholder="0" onkeyup="acceleration(1);"/></td>
							<td style="width: 90px!important;">
								<select id="select_1_1" class="form-control" onchange="acceleration(1);">
									<option value="1">км</option>
									<option value="0.001">м</option>
									<option value="0.00001">см</option>
									<option value="0.000001">мм</option>
									<option value="0.0000254">дюйм</option>
									<option value="127137.6">g</option>
								</select> 
							</td>
							<td class="margin_none" style="width: 12px!important;">
								<span class="opt_1">/</span>
							</td>
							<td style="width: 100px!important;">
								<select id="select_1_2" class="form-control opt_1" onchange="acceleration(1);">
									<option value="12960000">час^2</option>
									<option value="3600">мин^2</option>
									<option value="1">сек^2</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><input id="text_2" type="text" class="form-control" placeholder="0" onkeyup="acceleration(2);"/></td>
							<td>
								<select id="select_2_1" class="form-control" onchange="acceleration(1);">
									<option value="1">км</option>
									<option value="0.001">м</option>
									<option value="0.00001">см</option>
									<option value="0.000001">мм</option>
									<option value="0.0000254">дюйм</option>
									<option value="127137.6">g</option>
								</select>
							</td>
							<td class="margin_none">
								<span class="opt_2">/</span>
							</td>
							<td>
								<select id="select_2_2" class="form-control opt_2" onchange="acceleration(1);">
									<option value="12960000">час^2</option>
									<option value="3600">мин^2</option>
									<option value="1">сек^2</option>
								</select>
							</td>
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
        <p>Калькулятор перевода единиц километр - метр - сантиметр - миллиметр - дюйм - g / кв. час - кв. минута - кв. секунда в разных комбинациях.</p>
		<p>Дюйм — единица измерения расстояния в некоторых европейских неметрических системах мер. Исторически — ширина большого пальца руки взрослого мужчины. Под дюймом чаще всего понимают английский дюйм, равный 2,54 см.</p>
		<p>g - ускорение свободного падения на поверхности Земли (обычно произносится как «Же») варьируется от 9,780 м/с2 на экваторе до 9,832 м/с2 на полюсах. Стандартное («нормальное») значение, принятое при построении систем единиц, составляет g = 9,80665 м/с2.</p>
		<p>Результат округляется до 10 знаков послезапятой.</p>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url();?>web/calculators/converter/app.js"></script>
<script src="<?=base_url();?>web/calculators/converter/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calculators/converter/style.css"/>