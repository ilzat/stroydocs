<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>web/js/calculators.js"></script>
<script src="<?=base_url();?>web/js/validate.js"></script>
<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Сохраненная спецификация</h3>
			</div>
			<div class="box-body">
                <div class="table-responsive">
    				<table class="table spec">
    					<thead>
    						<tr>
    							<td style="width: 26px;">№</td>
    							<td>Наименование</td>
    							<td style="width: 60px;">Масса, кг.</td>
    							<td style="width: 40px;"></td>
    						</tr>
    					</thead>
    					<tbody>
    					</tbody>
    					<tfoot>
    						<tr>
    							<td colspan="2">Итого, кг.:</td>
    							<td id="result"></td>
    							<td></td>
    						</tr>
    					</tfoot>
    				</table>
                </div>
                Данная спецификация сохранена по ссылке:<br />
                <input class="form-control" id="link" type="text" value=""/><br />
                <p>
                    <a href="<?=base_url();?>kalkulyator_metalloprokata"class="btn btn-primary" style="margin-top: 8px;"><i class="fa fa-file-o"></i> Создать новую спецификацию</a>
                </p>
			</div>
		</div>
	</div>
</div>

<script src="<?=base_url();?>web/calc/calc_metall/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/calc_metall/style.css"/>
<script>
specArrJSON = '<?=$specArrJSON?>';
id = '<?=$id?>';
spec_view();
</script>

