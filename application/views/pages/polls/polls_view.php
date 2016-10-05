<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?=$question?></h3>
			</div>
			<div class="box-body">
				<div id="pollcontainer"></div>
				<p id="loader" >Загрузка...</p>
				<input type="text" id="poll_id" value="<?=$poll_id?>" style="display: none;" />
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<p class="well" id="desc"><?=$desc?></p>
			</div>
		</div>
	</div>
</div> 
<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/pages/polls/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/pages/polls/style.css"/>