<?
$segm = $this->uri->segment(2);
function btn_color($step, $segm){
  $segment = $segm;
  if (strlen($segment) == 6) {
    $segment = substr($segment, 5);
    if ($segment > $step) {
      return "success";
    } elseif ($segment == $step) {
      return "info";
    } else {
      return "default";
    }
  }
}
?>
<div class="container" style="padding: 10px 0px;">
  <div class="row">
  	<div class="col-md-1">
      <a href="<?=base_url();?>beam/step_1" class="btn btn-xs btn-<?=btn_color(1, $segm);?>">Этап 1</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_2" class="btn btn-xs btn-<?=btn_color(2, $segm);?>">Этап 2</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_3" class="btn btn-xs btn-<?=btn_color(3, $segm);?>">Этап 3</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_4" class="btn btn-xs btn-<?=btn_color(4, $segm)?>">Этап 4</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_5" class="btn btn-xs btn-<?=btn_color(5, $segm)?>">Этап 5</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_6" class="btn btn-xs btn-<?=btn_color(6, $segm)?>">Этап 6</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_7" class="btn btn-xs btn-<?=btn_color(7, $segm)?>">Этап 7</a>
  	</div>
    <div class="col-md-1">
      <a href="<?=base_url();?>beam/step_8" class="btn btn-xs btn-<?=btn_color(8, $segm)?>">Этап 8</a>
  	</div>
    <div class="col-md-2">
      <a href="<?=base_url();?>beam" class="btn btn-xs btn-warning">Новый расчет</a>
  	</div>
  </div>
</div>