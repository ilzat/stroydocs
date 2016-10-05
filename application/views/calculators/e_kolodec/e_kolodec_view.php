<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>plugins/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="<?=base_url();?>web/js/validate.js"></script>

<div class="row">
  <div class="col-md-7">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Задайте параметры</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form class="form-horizontal" method="POST" id="form">
          <div class="box-body">
            
            <div class="form-group">
              <label for="name" class="col-md-7 control-label">Название колодца:</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="name" name="name" maxlength="10" value="К-1" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="place" class="col-md-7 control-label">Место установки:</label>
              <div class="col-md-5">
                <div class="radio">
                  <label>
                    <input type="radio" name="place" value="city" checked="" /> Застроенная территория
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="place" value="car" /> На проезжей части с усовершенствованным покрытием
                  </label>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label for="diameter" class="col-md-7 control-label">Диаметр колодца, Дк, мм:</label>
              <div class="col-md-5">
                <select class="form-control" id="diameter" name="diameter">
                    <option value="1000">1000</option>
                    <option value="1500" selected="">1500</option>
                    <option value="2000">2000</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="depth" class="col-md-7 control-label">Глубина колодца по профилю, H, мм:</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="depth" name="depth" maxlength="5" value="3000" />
              </div>
            </div>
            
            <div class="form-group">
              <label for="h_work" class="col-md-7 control-label">Высота рабочей части, Hp, мм:</label>
              <div class="col-md-5">
                <select class="form-control" id="h_work" name="h_work">
                    <option value="1200">1200</option>
                    <option value="1500">1500</option>
                    <option value="1800" selected="">1800</option>
                    <option value="2100">2100</option>
                    <option value="2400">2400</option>
                    <option value="2700">2700</option>
                    <option value="3000">3000</option>
                    <option value="3300">3300</option>
                    <option value="3600">3600</option>
                    <option value="3900">3900</option>
                    <option value="4200">4200</option>
                    <option value="4500">4500</option>
                    <option value="4800">4800</option>
                </select>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="trap_type" class="col-md-7 control-label">Тип люка:</label>
              <div class="col-md-5">
                <select class="form-control" id="trap_type" name="trap_type">
                    <option value="light" selected="">Легкий</option>
                    <option value="heavy">Тяжелый</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="k_300_have" class="col-md-7 control-label">Использовать кольца высотой 0.3 м.:</label>
              <div class="col-md-5">
                <div class="radio">
                  <label>
                    <input type="radio" name="k_300_have" value="1" checked="" /> Да
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="k_300_have" value="0" /> Нет
                  </label>
                </div>
              </div>
            </div>
            
            <button type="submit" class="btn btn-info">Отправить</button>
            <br />
            <?php echo validation_errors(); ?> 
            
          </div><!-- /.box-body -->
        </form>
      </div>
    </div>
  </div><!-- /.col -->
  
  <div class="col-md-5">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Пример подбора элементов колодца:</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <img src="<?=base_url();?>web/calculators/e_kolodec/img/kolodec_example.png" class="img-responsive" />
      </div>
    </div>
  </div>
</div> <!-- /.row -->

<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calculators/e_kolodec/app.js"></script>
<link rel="stylesheet" href="web/calculators/e_kolodec/style.css"/>