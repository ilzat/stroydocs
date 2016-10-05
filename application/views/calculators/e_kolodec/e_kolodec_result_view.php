<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-md-7">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Элементы колодца подобраны:</h3>
        <a href="<?=base_url()?>e_kolodec" class="btn btn-primary btn-info pull-right">Новый расчет</a>
      </div><!-- /.box-header -->
      <div class="box-body">
          <div class="box-body">
            <?=$canvas;?>            
          </div>
      </div>
    </div>
  </div><!-- /.col -->
  <div class="col-md-5">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Состав колодца</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="kolodec">
          		<thead>
          			<tr>      
                  <th>Элемент</th>
                  <th>h</th>
      			     </tr>
      		    </thead>
              <tbody>
          			<?php foreach ($kolodec_value['number'] as $key=>$value): ?>
                <tr>
                  <td><?=$kolodec_value['name'][$key];?></td>
                  <td><?=$kolodec_value['number'][$key];?></td>
                </tr>
                <?php endforeach; ?>
          		</tbody>  
		        </table>         
          </div><!-- /.box-body -->
      </div>
    </div>
  </div><!-- /.col -->

</div> <!-- /.row -->

<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calculators/e_kolodec/app.js"></script>
<script src="<?=base_url();?>web/calculators/e_kolodec/draw.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calculators/e_kolodec/style.css"/>