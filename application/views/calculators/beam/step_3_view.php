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
        <form action="<?=base_url();?>beam/step_4" method="POST" id="beam_form" class="form-horizontal">
          <p>Расчетная схема балки:</p><br />
          <?=$canvas;?>
          <br />
          <p style="font-weight: bold; margin-bottom: 6px;">Укажите тип опор:</p>
          
          <div class="form-group" style="text-align: left;">
            
            <div class="col-sm-6">
              <label for="mainstayNoMoving" class="control-label">Неподвижный шарнир: </label>
              <select name="mainstayNoMoving" class="form-control" style="width: 60px; display: inline;">
                <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++): ?>
                    <?php if ($this->session->userdata['mainstayNoMoving']['joint'] == $i):?>
                    <option value="<?=$i?>" selected="1"><?=$i?></option>
                    <?php else:?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?php endif?>
                <?php endfor; ?>
              </select>
            </div>
            
            <div class="col-sm-6">
              <label for="mainstayMoving" class="control-label">Подвижный шарнир: </label>
              <select name="mainstayMoving" class="form-control" style="width: 60px; display: inline;">
                <?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']);$i++): ?>
                    <?php if ($this->session->userdata['mainstayMoving']['joint'] == $i):?>
                    <option value="<?=$i?>" selected="1"><?=$i?></option>
                    <?php else:?>
                        <?php if ($this->session->userdata['POST_Step_1']['pointsQty'] == $i): // если последняя точка?> 
                        <option value="<?=$i?>" selected="1"><?=$i?></option>
                        <?php else:?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php endif?>
                    <?php endif?>
                <?php endfor; ?>
              </select>
            </div>
          </div>
          <p style="margin-bottom: 15px;"><em><strong>Примечание:</strong> расположение опоры соответствет выбранной характерной точке на расчетной схеме.</em></p>
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
    
    mainstayNoMoving = Number($('select[name="mainstayNoMoving"]').val());
    mainstayMoving = Number($('select[name="mainstayMoving"]').val());
}

function check_form(){
  scanner();
  error = false;
  errorT = '';
  
  
  if(mainstayNoMoving == mainstayMoving) {
        error = true;
        errorT = errorT + 'Опоры не могут находиться в одной точке';
  }
  
  
  
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