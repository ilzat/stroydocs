<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!--
<div class="modal-header">
    
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Коэффициент условий работы</h4>

</div>	-->		<!-- /modal-header -->
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/iCheck/all.css"/>
<script src="<?=base_url();?>lte/plugins/iCheck/icheck.min.js"></script>
<style>
.td_radio {
  text-align: center;
}
.value {
  text-align: center;
}
#table_k_work th {
  text-align: center;
}
</style>
<div class="modal-body">
  <table class="table table-bordered" id="table_k_work">
    <tr>
      <th style="width: 10px">#</th>
      <th>Элементы конструкций</th>
      <th>Коэф. <br/>условий работы </th>
      <th style="width: 40px">Выбор</th>
    </tr>
    <tr>
      <td>1.</td>
      <td>Балки сплошного сечения и сжатые элементы ферм перекрытий под залами театров, клубов, кинотеатров, под трибунами, под помещениями магазинов, книгохранилищ и архивов и т.п. при временной нагрузке, не превышающей вес перекрытий</td>
      <td class="value">0,90</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Колонны общественных зданий при постоянной нагрузке, равной не менее 0,8 расчетной, и опор водонапорных башен</td>
      <td class="value">0,95</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" checked /></td>
    </tr>
    <tr>
      <td>3.</td>
      <td>Колонны одноэтажных производственных зданий с мостовыми кранами</td>
      <td class="value">1,05</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>4.</td>
      <td>Сжатые основные элементы (кроме опорных) решетки составного таврового сечения из двух уголков в сварных фермах покрытий и перекрытий при расчете на устойчивость указанных элементов с гибкостью λ > 60</td>
      <td class="value">0,80</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>5.</td>
      <td>Растянутые элементы (затяжки, тяги, оттяжки, подвески) при расчете на прочность по неослабленному сечению</td>
      <td class="value">0,90</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>6.</td>
      <td>Элементы конструкций из стали с пределом текучести до 440 Н/мм2, несущие статическую нагрузку, при расчете на прочность по сечению, ослабленному отверстиями для болтов (кроме фрикционных соединений)</td>
      <td class="value">1,10</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>7.</td>
      <td>Сжатые элементы решетки пространственных решетчатых конструкций из одиночных уголков, прикрепляемые одной полкой (для неравнополочных уголков - большей полкой):</td>
      <td class="value"></td>
      <td class="td_radio"></td>
    </tr>
    <tr>
      <td>7а.</td>
      <td>непосредственно к поясам сварными швами либо двумя болтами и более, установленными вдоль уголка:</td>
      <td class="value">0,90</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td></td>
      <td> - раскосы по рисунку 15,а и распорки по рисунку 15,б, в, е</td>
      <td class="value">0,90</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td></td>
      <td> - раскосы по рисунку 15,в, г, д, е</td>
      <td class="value">0,80</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>7б.</td>
      <td>непосредственно к поясам одним болтом или через фасонку независимо от вида соединения</td>
      <td class="value">0,75</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>8.</td>
      <td>Сжатые элементы из одиночных уголков, прикрепляемых одной полкой (для неравнополочных уголков - меньшей полкой), за исключением элементов плоских ферм из одиночных уголков и элементов, указанных в позиции 7 настоящей таблицы, раскосов по рисунку 15, б, прикрепляемых непосредственно к поясам сварными швами либо двумя болтами и более, установленными вдоль уголка, и плоских ферм из одиночных уголков</td>
      <td class="value">0,75</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>9.</td>
      <td>Опорные плиты из стали с пределом текучести до 390 Н/мм2, несущие статическую нагрузку, толщиной, мм:</td>
      <td class="value"></td>
      <td class="td_radio"></td>
    </tr>
    <tr>
      <td>9а.</td>
      <td>до  40</td>
      <td class="value">1,20</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>9б.</td>
      <td>40 до 60</td>
      <td class="value">1,15</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    <tr>
      <td>9в.</td>
      <td>60 до 80</td>
      <td class="value">1,10</td>
      <td class="td_radio"><input type="radio" name="k_work" class="square-blue" /></td>
    </tr>
    
  </table>

</div>			<!-- /modal-body -->
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
    <button type="button" class="btn btn-primary">Отправить</button>
</div>			<!-- /modal-footer -->
<script>
//Red color scheme for iCheck
$('input[type="radio"].square-blue').iCheck({
  checkboxClass: 'icheckbox_square-blue',
  radioClass: 'iradio_square-blue'
});
</script>