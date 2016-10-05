<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.css"/>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.skinHTML5.css"/>
<script src="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.min.js"></script>

<script src="<?=base_url();?>plugins/konva/konva.min.js"></script>  

<div class="row">
  <div class="col-sm-6">
    <div class="box box-primary">
      <div class="box-body">
        <form class="form-horizontal" id="form">
          <div class="box-body">
            
            <div class="form-group">
              <label for="angle" class="col-md-7 control-label">Внутренний диаметр, мм</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="diameter" name="diameter" maxlength="4" value="50" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="percent" class="col-md-7 control-label">Длина труб, м</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="length_pipe" name="length_pipe" maxlength="6" value="1000" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="basis" class="col-md-7 control-label">Высота заполнения, мм</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="filling_height" name="filling_height" maxlength="3"/>
              </div>
            </div>
          </div><!-- /.box-body -->
        </form>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <div class="box box-primary">
      <div class="box-body">
         <input id="diameter_slider" type="text" name="diameter_slider"/><br />
         <input id="length_pipe_slider" type="text" name="length_pipe_slider"/><br />
         <input id="filling_height_slider" type="text" name="filling_height_slider"/>
      </div>
    </div> 
  </div><!-- /.col -->
</div> <!-- /.row -->


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Рисунок</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div id="container" align="center" style="overflow-x: scroll;"></div>
      </div>
      <div class="box-footer">
        <div class="row" style="font-weight: bold;">
          <div class="col-md-6">
            <span id="volume_text"></span>
          </div>
          <div class="col-md-6">
            <span id="sectional_area"></span>
          </div>
        </div>
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
        <p>Калькулятора расчета объема жидкости (воды) в трубе необходим при расчете или выполнении работ по устройству систем отопления, водоснабжения и канализации (водотведения) и т.п. количество воды определяется очень просто: произведение площади сечения и длины трубопровода.</p>
        <p><b>Формула определения объема воды в трубе:</b><br />
        <p>V = S <sub>сеч.</sub> * L <sub>трубы</sub><br />
        S <sub>сеч.</sub> = Pi * R<sup>2</sup>
        </p>
        <p>Особенностью данного калькулятора является то, что в нем можно определить объем неполностью заполненных горизонтальных трубопроводов. Однако, данная задача не является элементарной, и придется вспомнить курс геометрии, чтобы выполнить данные расчеты.</p>
        <p><b>Формула определения площади сечения неполностью заполненных труб:</b><br />
        <img src="<?=base_url();?>web/calc/volume_pipes/img/sector.png" alt="Формула определения площади сечения неполностью заполненных труб" />
        </p>
      </div>
    </div>
  </div>
</div>
<? $this->load->view('templates/comments_view'); ?>


<script src="<?=base_url();?>web/calc/volume_pipes/app.js"></script>
<script src="<?=base_url();?>web/calc/volume_pipes/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/volume_pipes/style.css"/>


