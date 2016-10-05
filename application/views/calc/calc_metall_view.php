<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>web/js/calculators.js"></script>
<script src="<?=base_url();?>web/js/validate.js"></script>

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Калькулятор металлопроката</h3>
			</div>
			<div class="box-body">
				<form role="form">
				<div class="row">
					<div class="col-md-12">					
						<div class="form-group">
							<div id="img_menu">					
								<button type="button" class="btn btn-default active" id="btn_beam"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/beam.png" /></button>
								<button type="button" class="btn btn-default" id="btn_channel"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/channel.png" /></button>
								<button type="button" class="btn btn-default" id="btn_angle"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/angle.png" /></button>
								<button type="button" class="btn btn-default" id="btn_angle_2"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/angle_2.png" /></button>
								<button type="button" class="btn btn-default" id="btn_sq_pipe"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/sq_pipe.png" /></button>
								<button type="button" class="btn btn-default" id="btn_sq_pipe_2"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/sq_pipe_2.png" /></button>
								<button type="button" class="btn btn-default" id="btn_pipe"><img src="<?=base_url();?>web/calc/calc_metall/img/icons/pipe.png" /></button>
							</div>
						</div>
						<div class="form-group">
							<select class="form-control" style="" id="profile" name="profile">
								<option value="">Двутавр с уклоном полок по ГОСТ 8239-89</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-md-4">	
						<div class="form-group">
							<span id="size_desc"></span><br />
							<select class="form-control" style="min-width: 100px;" name="size" id="size" size="10">
							</select>
						</div>
					</div>
					<div class="col-xs-8 col-md-8">
						<div class="form-group">
							<label for="length" class="control-label"><i class="fa fa-arrows-h"></i> Длина, м</label>
					 		<input class="form-control" name="length" id="length" type="text" placeholder="0"/>
						</div>
						<div class="form-group">
							<label for="weight" class="control-label"><i class="fa fa-balance-scale"></i> Масса, кг</label>
					 		<input class="form-control" name="weight" id="weight" type="text" placeholder="0"/>
						</div>
						<div class="form-group">
							<button type="button" id="add_to_spec" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Добавить в спецификацию</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>Масса погонного метра: <span id="weight_1_m_str"></span> кг.</p>
						<p>Статус норматива: <span id="normat_status"></span></p>						
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Спецификация</h3>
			</div>
			<div class="box-body">
                <div class="table-responsive">
    				<table class="table spec">
    					<thead>
    						<tr>
    							<td style="width: 26px;">№</td>
    							<td>Наименование</td>
    							<td style="width: 60px;">Масса, кг.</td>
    							<td style="width: 40px;"></td>
    						</tr>
    					</thead>
    					<tbody>
    						<tr>
    							<td colspan="4">Спецификация пока пуста</td>
    						</tr>
    					</tbody>
    					<tfoot>
    						<tr>
    							<td colspan="2">Итого, кг.:</td>
    							<td id="result"></td>
    							<td></td>
    						</tr>
    					</tfoot>
    				</table>
                </div>
				<div class="form-group" style="height: 40px;">
                    <button type="button" id="save_btn" class="btn btn-primary" style="float: right; margin-top: 8px;"><i class="fa fa-floppy-o"></i> Сохранить спецификацию</button>
				</div>
				<div class="form-group">
					<p id="save_result" style="display: none;">
						Спецификация успешно сохранена!<br />
						Вы можете открыть, либо поделиться сохраненной спецификацией по ссылке:<br />
						<input class="form-control" id="link" type="text" value=""/><br />
						<a href="" id="link_2" target="_blank"><span class="label label-success" style="float: right;">о т к р ы т ь</span></a>
						
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				<p style="text-align: justify;"><img src="/web/calc/calc_metall/img/calc.png" alt="Онлайн калькулятор" title="Онлайн калькулятор" style="float: left;"/>
                Новая разработка - онлайн калькулятор металлопроката. Сервис реализует все стандартные функции металлического калькулятора, а так же добавлена возможность создавать спецификации. Многие пользователи уже положительно оценили простоту и быстроту создания спецификаций, т. к. они хранятся на сайте бессрочно и отсутствует необходимость создавать табличку в excel для того чтобы поделиться с коллегами.  Таким образом, мы считаем данное решение - максимально удобное для пользователя.
                
					<ul style="float: left; clear: left;">
						<li>Большой выбор профилей</li>
						<li>Расчет массы по длине и наоборот</li>						
						<li>Просмотр статуса нормативного документа</li>
						<li>Отображается масса одного погонного метра профиля</li>						
						<li><strong>Возможность создавать спецификации металлопроката</strong>, генерация ссылки на спецификацию для обмена данными с коллегами</li>
						<li>Простой и удобный интерфейс, с иконками металлопроката</li>
					</ul>
				</p>
				<p style="float: left; clear: left;">Строительный калькулятор металлопроката позволяет вычислить веса и длины следующих профилей:
					<ul style="float: left; clear: left;">
						<li>Прокат листовой горячекатаный по ГОСТ 19903-74</li>
						<li>Уголок равнополочный по ГОСТ 8509-93</li>
						<li>Уголок неравнополочный по ГОСТ 8510-86</li>
						<li>Швеллер с параллельными гранями полок по ГОСТ 8240-89</li>
						<li>Швеллер с уклоном полок по ГОСТ 8240-89</li>
						<li>Швеллер с параллельными гранями полок по ГОСТ 8240-97</li>
						<li>Швеллер с уклоном полок по ГОСТ 8240-97</li>
						<li>Швеллер (В) по ГОСТ 5267.1-90</li>
						<li>Швеллер гнутый равнополочный по ГОСТ 8278-83 из сталей С239-С245</li>
						<li>Швеллер гнутый равнополочный по ГОСТ 8278-83 из сталей С255-С275</li>
						<li>Двутавр с уклоном полок по ГОСТ 8239-89</li>
						<li>Двутавр нормальный (Б) по СТО АСЧМ 20-93</li>
						<li>Двутавр широкополочный (Ш) по СТО АСЧМ 20-93</li>
						<li>Двутавр колонный (К) по СТО АСЧМ 20-93</li>
						<li>Двутавр нормальный (Б) по ГОСТ 26020-83</li>
						<li>Двутавр широкополочный (Ш) по ГОСТ 26020-83</li>
						<li>Двутавр колонный (К) по ГОСТ 26020-83</li>
						<li>Двутавр колонный (Д) по ГОСТ 26020-83</li>
						<li>Двутавр специальный (М,С) по ГОСТ 19425-74</li>
						<li>Труба электросварная прямошовная по ГОСТ 10704-91</li>
						<li>Труба стальная водогазопроводная по ГОСТ 3262-75</li>
						<li>Труба квадратная по ГОСТ 30245-2003</li>
						<li>Труба прямоугольная по ГОСТ 30245-2003</li>
					</ul>
				</p>
			</div>
		</div>
	</div>
</div>
<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calc/calc_metall/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/calc_metall/style.css"/>

<script>
load_profile("beam");

specArr = new Array();
</script>