<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>web/js/validate.js"></script>
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Таблица веса арматуры</h3>
			</div>
			<div class="box-body">
				<p>Сталь горячекатаная для армирования железобетонных конструкций.<br />
				Таблица для расчета веса арматуры по ГОСТ 5781-82.</p>
				<table class="arm_table table-responsive">
					<tr>
						<td class="arm_header">Номинальный диаметр стержня, d</td>
						<td class="arm_header">Площадь поперечного сечения стержня, см2</td>
						<td class="arm_header">Теоретическая масса 1 м профиля</td>
					</tr>
					<tr>
					  <td>6</td>
					  <td>0.283</td>
					  <td>0.222</td>
					</tr>
					<tr>
					  <td>8</td>
					  <td>0.503</td>
					  <td>0.395</td>
					</tr>
					<tr>
					  <td>10</td>
					  <td>785</td>
					  <td>0.617</td>
					</tr>
					<tr>
					  <td>12</td>
					  <td>1.131</td>
					  <td>0.888</td>
					</tr>
					<tr>
					  <td>14</td>
					  <td>1.54</td>
					  <td>1.21</td>
					</tr>
					<tr>
					  <td>16</td>
					  <td>2.01</td>
					  <td>1.58</td>
					</tr>
					<tr>
					  <td>18</td>
					  <td>2.54</td>
					  <td>2</td>
					</tr>
					<tr>
					  <td>20</td>
					  <td>3.14</td>
					  <td>2.47</td>
					</tr>
					<tr>
					  <td>22</td>
					  <td>3.8</td>
					  <td>2.98</td>
					</tr>
					<tr>
					  <td>25</td>
					  <td>4.91</td>
					  <td>3.85</td>
					</tr>
					<tr>
					  <td>28</td>
					  <td>6.16</td>
					  <td>4.83</td>
					</tr>
					<tr>
					  <td>32</td>
					  <td>8.01</td>
					  <td>6.31</td>
					</tr>
					<tr>
					  <td>36</td>
					  <td>10.18</td>
					  <td>7.99</td>
					</tr>
					<tr>
					  <td>40</td>
					  <td>12.57</td>
					  <td>9.87</td>
					</tr>
					<tr>
					  <td>45</td>
					  <td>15</td>
					  <td>12.48</td>
					</tr>
					<tr>
					  <td>50</td>
					  <td>19.63</td>
					  <td>15.41</td>
					</tr>
					<tr>
					  <td>55</td>
					  <td>23.76</td>
					  <td>18.65</td>
					</tr>
					<tr>
					  <td>60</td>
					  <td>28.27</td>
					  <td>22.19</td>
					</tr>
					<tr>
					  <td>70</td>
					  <td>38.48</td>
					  <td>30.21</td>
					</tr>
					<tr>
					  <td>80</td>
					  <td>50.27</td>
					  <td>39.46</td>
					</tr>			
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Калькулятор металлопроката</h3>
			</div>
			<div class="box-body">
				<form role="form" class="form-horizontal">
					<div class="form-group">
						<label for="size" class="col-sm-6 control-label">Масса погонного метра, кг.</label>
						<div class="col-sm-6">
							<select id="size" class="form-control">
								<option value="6">6</option>
								<option value="8">8</option>
								<option value="10">10</option>
								<option value="12">12</option>
								<option value="14">14</option>
								<option value="16">16</option>
								<option value="18">18</option>
								<option value="20">20</option>
								<option value="22">22</option>
								<option value="25">25</option>
								<option value="28">28</option>
								<option value="32">32</option>
								<option value="36">36</option>
								<option value="40">40</option>
								<option value="45">45</option>
								<option value="50">50</option>
								<option value="55">55</option>
								<option value="60">60</option>
								<option value="70">70</option>
								<option value="80">80</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="weight_1m" class="col-sm-6 control-label">Масса погонного метра, кг.</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="weight_1m" disabled=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="len" class="col-sm-6 control-label">Длина, м.</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="len" placeholder="0"/>
						</div>
					</div>
					<div class="form-group">
						<label for="weight" class="col-sm-6 control-label">Вес, кг.</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="weight" placeholder="0"/>
						</div>
					</div>
				</form>
				<img src="<?=base_url()?>web/calc/armatura/img/arm1.jpg" class="img-responsive" style="margin: auto;" />
				<p>а - профиль по ГОСТ 5781-82<br />
				б - европейский серповидный профиль по СТО АСЧМ 7-93 и ГОСТ 1088-94</p>
				<h4>Механические свойства арматурной стали</h4>
				<table class="arm_table table-responsive">
					  <tr>
					    <td class="arm_header">Класс арматурной стали</td>
					    <td class="arm_header">Предел текучести, Н/мм2</td>
					    <td class="arm_header">Временное сопр-ие разрыву, Н/мм2</td>
					  </tr>
					  <tr>
					    <td>A-I (А240)</td>
					    <td>235</td>
					    <td>373</td>
					  </tr>
					  <tr>
					    <td>A-II (А300)</td>
					    <td>295</td>
					    <td>490</td>
					  </tr>
					  <tr>
					    <td>Ас-II (Ас300)</td>
					    <td>295</td>
					    <td>441</td>
					  </tr>
					  <tr>
					    <td>A-III (А400)</td>
					    <td>390</td>
					    <td>590</td>
					  </tr>
					  <tr>
					    <td>A-IV (А600)</td>
					    <td>590</td>
					    <td>883</td>
					  </tr>
					  <tr>
					    <td>A-V (A800)</td>
					    <td>785</td>
					    <td>1030</td>
					  </tr>
					  <tr>
					    <td>A-VI (А1000)</td>
					    <td>980</td>
					    <td>1230</td>
					  </tr>			
				</table>
			</div>
		</div>
	</div>
	<div style="margin-left: 15px; margin-bottom: 6px;">
 		<? $this->load->view('templates/banner_view'); ?>
  </div>
</div>
<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calc/armatura/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/armatura/style.css"/>