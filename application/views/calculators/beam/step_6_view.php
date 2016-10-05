<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-body">
        <? $this->load->view('calculators/beam/steps_menu_view'); ?>
      </div>
    </div>
  </div>
</div> <!-- /.row -->

<script src="<?=base_url();?>plugins/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="<?=base_url();?>web/js/validate.js"></script>

<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><?=$doc_title;?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form action="<?=base_url();?>beam/step_7" method="POST" id="beam_form" class="form-horizontal">
          <p>Расчетная схема балки:</p><br />
          <?=$canvas;?>
          <br />
          <p style="margin-bottom: 6px;">Укажите значения распределенных нагрузок на участках L (учитывайте знак: с плюсом - вверх, с минусом - вниз), <strong>кН/м</strong>:</p>
                    
          <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++): ?>
          
          <div class="form-group" style="text-align: left;">
            <label for="load_<?=$i?>" class="col-sm-3 control-label">Участок L<?=$i?> - </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="load_<?=$i?>" id="load_<?=$i?>" value="<?=@$this->session->userdata['POST_Step_6']["load_$i"];?>"/>
            </div>
            <div class="col-sm-5">
            </div> 
          </div>
          
          <?php endfor; ?>
        <button type="submit" class="btn btn-info">Отправить</button>
        </form>
      </div>
    </div>
  </div><!-- /.col -->
  
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Информация</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <? $this->load->view('calculators/beam/sidebar_view'); ?>
      </div>
    </div>
  </div>
  <div style="margin-left: 15px; margin-bottom: 6px;">
 		<? $this->load->view('templates/banner_view'); ?>
  </div>
</div> <!-- /.row -->

<? $this->load->view('templates/comments_view'); ?>

<link rel="stylesheet" href="<?=base_url();?>web/calculators/beam/style.css"/>
<script>
$('#beam_form').submit(function(){
  
  return check_form();
});

function check_form_btn(){
  $("#beam_form").submit();
}

function scanner(){ 
    
    <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++): ?>
    load_<?=$i?> = Number($('input[name="load_<?=$i?>"]').val());
    <?php endfor; ?>
}

function check_form(){
  scanner();
  error = false;
  errorT = '';
  
  num_pattern = /^[0-9.-]*$/;
  <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++): ?>
  load_<?=$i?> = load_<?=$i?>.toString();
  load_<?=$i?> = load_<?=$i?>.replace(",", ".");
  load_<?=$i?> = load_<?=$i?>.replace("+", "");
  if(!load_<?=$i?>.match(num_pattern) || Number(load_<?=$i?>)<(-1001) || Number(load_<?=$i?>)>1001) {
        error = true;
        errorT = errorT + 'Нагрузка на участке L<?=$i?> задана неверно<br/>';
  }
  
  
  <?php endfor; ?>
  
  
  if (!error) {
    return true;    
  } else {
    var n = noty({
      text: errorT,
      type: 'error',
      layout: 'top',
      timeout: 4000
    });
    return false;
  }
}
</script>