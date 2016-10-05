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
        <form action="<?=base_url();?>beam/step_5" method="POST" id="beam_form" class="form-horizontal">
          <p>Расчетная схема балки:</p><br />
          <?=$canvas;?>
          <br />
          <p style="margin-bottom: 6px;">Укажите реакции сосредоточенных вертикальных нагрузок в точках (учитывая знак: с минусом - вниз, с плюсом - вверх), <strong>кН</strong>:</p>
                    
          <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++): ?>
          
          <div class="form-group" style="text-align: left;">
            <label for="pointEnergy_<?=$i?>" class="col-sm-2 control-label">F (<?=$i?>) = </label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="pointEnergy_<?=$i?>" id="pointEnergy_<?=$i?>" value="<?=@$this->session->userdata['POST_Step_4']["pointEnergy_$i"];?>"/>
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
    
    <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++): ?>
    pointEnergy_<?=$i?> = Number($('input[name="pointEnergy_<?=$i?>"]').val());
    <?php endfor; ?>
}

function check_form(){
  scanner();
  error = false;
  errorT = '';
  
  num_pattern = /^[0-9.-]*$/;
  <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++): ?>
  pointEnergy_<?=$i?> = pointEnergy_<?=$i?>.toString();
  pointEnergy_<?=$i?> = pointEnergy_<?=$i?>.replace(",", ".");
  pointEnergy_<?=$i?> = pointEnergy_<?=$i?>.replace("+", "");
  if(!pointEnergy_<?=$i?>.match(num_pattern) || Number(pointEnergy_<?=$i?>)<(-1001) || Number(pointEnergy_<?=$i?>)>1001) {
        error = true;
        errorT = errorT + 'Сила F<?=$i?> задана неверно<br/>';
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