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
        <p>Характерная точка - это точка приложения: сосредоточенной нагрузки, опоры, момента, граница распределенной нагрузки.</p>      
        <form action="<?=base_url();?>beam/step_2" method="POST" id="beam_form" class="form-horizontal">
        
        <div class="form-group" style="text-align: left;">
          <label for="pointsQty" class="col-sm-7 control-label">Введите количество характерных точек:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pointsQty" id="pointsQty" value="<?=@$this->session->userdata['POST_Step_1']['pointsQty'];?>"/>
          </div>            
        </div>
        
        
        <button type="submit" class="btn btn-info">Отправить</button>
        
        <p style="margin-top: 20px;"><em>Например: Для расчетной схемы балки, приведенной ниже, количество характерных точек равняется 7.</em>
        </p>
        <p class="desc" style="text-align: center;"><img src="<?=base_url();?>web/calculators/beam/img/example_1.png" class="img-responsive" /></p>
        </form>
        
      </div>
    </div>
  </div><!-- /.col -->
  
  <div class="col-md-4">
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
    pointsQty = Number($('input[name="pointsQty"]').val());
}

function check_form(){
  scanner();
  error = false;
  errorT = '';
  
  pointsQty = pointsQty.toString();     
  num_pattern = /^[0-9]{1,2}$/;
  if(!pointsQty.match(num_pattern) || Number(pointsQty<=1) || Number(pointsQty>20)) {
        error = true;
        errorT = errorT + 'Количество точек задано неверно<br/>';
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
