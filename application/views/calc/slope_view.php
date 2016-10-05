<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.css"/>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.skinHTML5.css"/>
<script src="<?=base_url();?>lte/plugins/ionslider/ion.rangeSlider.min.js"></script>

<script src="<?=base_url();?>plugins/konva/konva.min.js"></script>  

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-body">
        <form class="form-horizontal" id="form">
          <div class="box-body">
            
            <div class="form-group">
              <label for="angle" class="col-md-4 col-md-offset-1 control-label">Угол, град.</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="angle" name="angle" maxlength="4" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="percent" class="col-md-4 col-md-offset-1 control-label">Уклон, %</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="percent" name="percent" maxlength="4" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="basis" class="col-md-4 col-md-offset-1 control-label">Катет, мм</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="basis" name="basis" maxlength="8" value="10"/>
              </div>
            </div>
          </div><!-- /.box-body -->
        </form>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Угол</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <input id="angle_slider" type="text" name="angle_slider"/>
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
        <p>С помощью кальулятора перевода из процентов в градусы можно визуально измерить и оценить необходимый угол (<b>уклон</b>). Данные расчеты очень часто требуются при проектировании и устройстве скатных крыш (наклон), строительстве автомобильных дорог, проектирование пандусов и .п. Многие инженеры допускают ошибки при данных расчетах, т.к. считают что зависимость перевода из процентов в градусы линейная, но это не так.</p>
        <p><b>Перевод из процентов в градусы</b><br />
        Проценты = tg (Градусы) * 100
        </p>
        <p><b>Перевод из градусов в проценты</b><br />
        Градусы = arctg (Проценты / 100)
        </p>
      </div>
    </div>
  </div>
</div>

<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calc/slope/app.js"></script>
<script src="<?=base_url();?>web/calc/slope/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/slope/style.css"/>

