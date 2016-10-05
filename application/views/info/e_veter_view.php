<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body table-responsive">
        <table id="datatable" class="table table-bordered table-hover dataTable">
    		<thead>
    			<tr>      
                    <th>Рисунок</th>
                    <th>Населенный пункт</th>
                    <th>Регион</th>
                    <th>Страна</th>
    			</tr>
    		</thead>
            <tbody>
    			<tr>
    				<td colspan="4" class="dataTables_empty">Загрузка данных...</td>
    			</tr>
    		</tbody>  
		</table>
      </div>
    </div>
  </div>
</div>

	<div style="margin-left: 0px; margin-bottom: 6px;">
 		<? $this->load->view('templates/banner_view'); ?>
  </div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
        <div style="text-align: center;">
                <div id="veter_jan">
                    <p id="veter_jan_header" class="veter_header"></p>
                    <canvas id="myCanvas" width="240" height="240" style="display:none;"></canvas>
                    <img id="canvasImg" alt="Скачать розу ветров. Январь"/>
                </div>
                <div id="veter_jul">
                    <p id="veter_jul_header" class="veter_header"></p>
                    <canvas id="myCanvas2" width="240" height="240" style="display:none;"></canvas>    
                    <img id="canvasImg2" alt="Скачать розу ветров. Июль"/>    
                </div>
        </div>
        <div style="text-align: center;">
                <div id="veter_jan_jul">
                    <p id="veter_jan_jul_header" class="veter_header"></p>
                    <canvas id="myCanvas3" width="240" height="240" style="display:none;"></canvas>   
                    <img id="canvasImg3" alt="Скачать розу ветров. Январь. Июль"/>
                </div>
        </div>
      </div>
    </div>
  </div><!-- /.col -->
</div> <!-- /.row -->

	<div style="margin-left: 0px; margin-bottom: 6px;">
 		<? $this->load->view('templates/banner_view'); ?>
  </div>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header">
		<h3 class="box-title">Повторяемость направлений ветра. Город <span id="city_name" class="blue"></span></h3>
	</div>
      <div class="box-body table-responsive">
        <table class="table veter_table">
        	<tr>
				<td colspan="8" class="cold">в январе, %</td>
				<td colspan="8" class="heat">в июле, %</td>
			</tr>
			<tr>
				<td class="cold">С</td>
				<td class="cold">СВ</td>
				<td class="cold">В</td>
				<td class="cold">ЮВ</td>
				<td class="cold">Ю</td>
				<td class="cold">ЮЗ</td>
				<td class="cold">З</td>
				<td class="cold">СЗ</td>
				<td class="heat">С</td>
				<td class="heat">СВ</td>
				<td class="heat">В</td>
				<td class="heat">ЮВ</td>
				<td class="heat">Ю</td>
				<td class="heat">ЮЗ</td>
				<td class="heat">З</td>
				<td class="heat">СЗ</td>
			</tr>
			<tr>
				<td class="cold" id="Jan_S"></td>
				<td class="cold" id="Jan_SV"></td>
				<td class="cold" id="Jan_V"></td>
				<td class="cold" id="Jan_UV"></td>
				<td class="cold" id="Jan_U"></td>
				<td class="cold" id="Jan_UZ"></td>
				<td class="cold" id="Jan_Z"></td>
				<td class="cold" id="Jan_SZ"></td>
				<td class="heat" id="Jul_S"></td>
				<td class="heat" id="Jul_SV"></td>
				<td class="heat" id="Jul_V"></td>
				<td class="heat" id="Jul_UV"></td>
				<td class="heat" id="Jul_U"></td>
				<td class="heat" id="Jul_UZ"></td>
				<td class="heat" id="Jul_Z"></td>
				<td class="heat" id="Jul_SZ"></td>
			</tr>
		</table>
      </div>
    </div>
  </div>
</div> 

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Описание</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <p><span style="font-weight: bold; color: red;">Внимание:</span> Данные взяты из СНиП 2.01.01-82 "Строительная климатология и геофизика". Названия населенных пунктов и регионов могут не совпадать с текущими именами. Будьте внимательны!</p>
        <p>Роза ветров («Роза компаса»). Определение<br />
Векторная диаграмма, характеризующая в метеорологии и климатологии, режим ветра в данном месте по многолетним наблюдениям и выглядит как многоугольник, у которого длины лучей, расходящихся от центра диаграммы в разных направлениях, пропорциональны повторяемости ветров этих направлений. Роза ветров, построенная по реальным данным наблюдений, позволяет по длине лучей построенного многоугольника выявить направление преобладающего ветра, со стороны которого чаще всего приходит воздушный поток в данную местность.</p>
<p><a href="<?=base_url();?>web/info/e_veter/files/roza_vetrov_moskvy.zip">Скачать розу ветров Москвы</a> в формате автокад (dwg).</p>
<p>На нашем сайте вы сможете найти и скачать розы ветров для таких крупных городов России, как: Москва, Санкт-Петербург, Новосибирск, Екатеринбург, Нижний Новгород, Казань, Самара, Омск, Челябинск, Ростов-на-Дону, Уфа, Волгоград, Красноярск, Пермь, Воронеж, Саратов, Краснодар, Тольятти, Тюмень, Ижевск, Барнаул, Ульяновск, Иркутск, Владивосток, Ярославль, Хабаровск, Махачкала, Оренбург, Новокузнецк, Томск, Кемерово, Рязань, Астрахань, Пенза, Набережные Челны, Липецк.</p>
      </div>
    </div>
  </div>
</div>

<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>plugins/konva/konva.min.js"></script>  

<script src="<?=base_url();?>lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/datatables/dataTables.bootstrap.css"/>

<script src="<?=base_url();?>web/info/e_veter/app.js"></script>
<script src="<?=base_url();?>web/info/e_veter/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/info/e_veter/style.css"/>


