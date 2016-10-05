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
          <p>Расчетная схема балки:</p><br />
          <?=$canvas;?>
          
          <?=$solution;?>
          <br />
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