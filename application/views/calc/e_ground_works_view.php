<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>plugins/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="<?=base_url();?>web/js/validate.js"></script>
<div class="row">
  <div class="col-md-12">
    <ol class="contents">
      <li><a href="#_1">Траншея с вертикальными стенками на спланированной местности</a></li>
      <li><a href="#_2">Траншея с вертикальными стенками, с перепадом высот</a></li>
      <li><a href="#_3">Траншея с откосами на спланированной местности</a></li>
      <li><a href="#_4">Траншея с откосами, с перепадом высот</a></li>
      <li><a href="#_5">Котлован с вертикальными стенками на спланированной местности</a></li>
      <li><a href="#_6">Котлован с вертикальными стенками, с разными отметками вершин</a></li>
      <li><a href="#_7">Котлован с откосами на спланированной местности</a></li>
      <li><a href="#_8">Круглый колодец с откосами</a></li>
      <li><a href="#desc">Описание</a></li>
    </ol>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_1"></a>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#1. Траншея с вертикальными стенками на спланированной местности</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_1.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="1_width" class="col-md-8 control-label">Ширина траншеи (a), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="1_width" maxlength="5" value="1" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="1_height" class="col-md-8 control-label">Высота траншеи (H), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="1_height" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="1_length" class="col-md-8 control-label">Длина траншеи (L), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="1_length" maxlength="5" value="6" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Объем траншеи (V) = <span class="badge bg-green" id="answer_1_v"></span> м3</p>
        <p class="answer">Площадь поперечного сечения (F) = <span class="badge bg-green" id="answer_1_f"></span> м2</p>
        <p><span id="answer_1_v_str"></span></p>
        <p><span id="answer_1_f_str"></span></p>        
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_2"></a>
<div class="row ground_row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#2. Траншея с вертикальными стенками, с перепадом высот</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_2.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="2_width" class="col-md-8 control-label">Ширина траншеи (a), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="2_width" maxlength="5" value="1" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="2_height_1" class="col-md-8 control-label">Высота траншеи в начале (H1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="2_height_1" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="2_height_2" class="col-md-8 control-label">Высота траншеи в начале (H2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="2_height_2" maxlength="5" value="3" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="2_length" class="col-md-8 control-label">Длина траншеи (L), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="2_length" maxlength="5" value="6" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Объем траншеи (V) = <span class="badge bg-green" id="answer_2_v"></span> м3</p>
        <p class="answer">Площадь поперечного сечения (F<sub>1</sub>) = <span class="badge bg-green" id="answer_2_f_1"></span> м2</p>
        <p class="answer">Площадь поперечного сечения (F<sub>2</sub>) = <span class="badge bg-green" id="answer_2_f_2"></span> м2</p>
        <p><span id="answer_2_v_str"></span></p>
        <p><span id="answer_2_f_1_str"></span></p>  
        <p><span id="answer_2_f_2_str"></span></p>  
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_3"></a>
<div class="row ground_row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#3. Траншея с откосами на спланированной местности</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_3.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="3_ground_type" class="col-md-8 control-label">Укажите вид грунта</label>
                <div class="col-md-4">
                  <select class="form-control" id="3_ground_type">
                        <option value="0">Насыпной неуплотненный</option>
                        <option value="1">Песчаный и гравийный</option>
                        <option value="2">Супесь</option>
                        <option value="3" selected="">Суглинок</option>
                        <option value="4">Глина</option>
                        <option value="5">Лессы и лессовидные</option>
                        <option value="222" style="padding-top: 10px; background-color: #FF6600; color: black;">Расчет по размеру a<sub>2</sub></option>
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="3_width_1" class="col-md-8 control-label">Ширина основания траншеи (a1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="3_width_1" maxlength="5" value="1" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="3_width_1" class="col-md-8 control-label">Ширина верха траншеи (a2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="3_width_2" maxlength="5" value="" disabled="" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="3_height" class="col-md-8 control-label">Высота траншеи (H), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="3_height" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="3_length" class="col-md-8 control-label">Длина траншеи (L), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="3_length" maxlength="5" value="6" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Выбран грунт:  <span class="badge bg-green" id="answer_3_ground"></span></p>
        <p class="answer">Объем траншеи (V) = <span class="badge bg-green" id="answer_3_v"></span> м3</p>
        <p class="answer">Площадь поперечного сечения (F) = <span class="badge bg-green" id="answer_3_f"></span> м2</p>
        <p><span id="answer_3_a2_str"></span></p> 
        <p><span id="answer_3_v_str"></span></p>
        <p><span id="answer_3_f_str"></span></p>               
        
        <p><span style="color: red;">Внимание:</span> если вы задаете вид грунта, то программа сама высчитывает размер a<sub>2</sub> (по коэф. m из <a href="#gr_table">таблицы</a> в конце страницы). Если же вам надо вписать свое значение размера a<sub>2</sub>, то выберите вид грунта "расчет по размеру a<sub>2</sub>".</p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_4"></a>
<div class="row ground_row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#4. Траншея с откосами, с перепадом высот</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_4.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="4_ground_type" class="col-md-8 control-label">Укажите вид грунта</label>
                <div class="col-md-4">
                  <select class="form-control" id="4_ground_type">
                        <option value="0">Насыпной неуплотненный</option>
                        <option value="1">Песчаный и гравийный</option>
                        <option value="2">Супесь</option>
                        <option value="3" selected="">Суглинок</option>
                        <option value="4">Глина</option>
                        <option value="5">Лессы и лессовидные</option>
                        <option value="222" style="padding-top: 10px; background-color: #FF6600; color: black;">Расчет по размеру a<sub>2</sub></option>
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="4_width_1" class="col-md-8 control-label">Ширина основания траншеи (a1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="4_width_1" maxlength="5" value="1" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="4_width_1" class="col-md-8 control-label">Ширина верха траншеи (a2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="4_width_2" maxlength="5" value="" disabled="" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="4_height_1" class="col-md-8 control-label">Высота траншеи (H1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="4_height_1" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="4_height_2" class="col-md-8 control-label">Высота траншеи (H2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="4_height_2" maxlength="5" value="3" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="4_length" class="col-md-8 control-label">Длина траншеи (L), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="4_length" maxlength="5" value="6" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Выбран грунт:  <span class="badge bg-green" id="answer_4_ground"></span></p>
        <p class="answer">Объем траншеи (V) = <span class="badge bg-green" id="answer_4_v"></span> м3</p>
        <p class="answer">Площадь поперечного сечения (F1) = <span class="badge bg-green" id="answer_4_f_1"></span> м2</p>
        <p class="answer">Площадь поперечного сечения (F2) = <span class="badge bg-green" id="answer_4_f_2"></span> м2</p>
        <p><span id="answer_4_a2_str"></span></p>
        <p><span id="answer_4_a3_str"></span></p>
        <p><span id="answer_4_f_1_str"></span></p>
        <p><span id="answer_4_f_2_str"></span></p>
        <p><span id="answer_4_v_str"></span></p>
        
        <p><span style="color: red;">Внимание:</span> если вы задаете вид грунта, то программа сама высчитывает размер a<sub>2</sub> (по коэф. m из <a href="">таблицы</a> в конце страницы). Если же вам надо вписать свое значение размера a<sub>2</sub>, то выберите вид грунта "расчет по размеру a<sub>2</sub>".</p>
        <p style="font-weight: bold;">Уклон откосов в данном расчете принят одинаков по всей длине траншеи.</p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_5"></a>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#5. Котлован с вертикальными стенками на спланированной местности</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_5.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="5_width" class="col-md-8 control-label">Ширина котлована (L1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="5_width" maxlength="5" value="4" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="5_length" class="col-md-8 control-label">Длина котлована (L2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="5_length" maxlength="5" value="6" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="5_height" class="col-md-8 control-label">Высота котлована (H), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="5_height" maxlength="5" value="2" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Объем котлована (V) = <span class="badge bg-green" id="answer_5_v"></span> м3</p>
        <p class="answer">Площадь в плане (F) = <span class="badge bg-green" id="answer_5_f"></span> м2</p>
        <p><span id="answer_5_v_str"></span></p>
        <p><span id="answer_5_f_str"></span></p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_6"></a>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#6. Котлован с вертикальными стенками, с разными отметками вершин</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_6.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="6_width" class="col-md-8 control-label">Ширина котлована (L1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_width" maxlength="5" value="4" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="6_length" class="col-md-8 control-label">Длина котлована (L2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_length" maxlength="5" value="6" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="6_height_1" class="col-md-8 control-label">Высота котлована (H1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_height_1" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="6_height_2" class="col-md-8 control-label">Высота котлована (H2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_height_2" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="6_height_3" class="col-md-8 control-label">Высота котлована (H3), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_height_3" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="6_height_4" class="col-md-8 control-label">Высота котлована (H4), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="6_height_4" maxlength="5" value="2" />
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Объем котлована (V) = <span class="badge bg-green" id="answer_6_v"></span> м3</p>
        <p class="answer">Площадь в плане (F) = <span class="badge bg-green" id="answer_6_f"></span> м2</p>
        <p><span id="answer_6_v_str"></span></p>
        <p><span id="answer_6_f_str"></span></p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_7"></a>
<div class="row ground_row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#7. Котлован с откосами на спланированной местности</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_7.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="7_ground_type" class="col-md-8 control-label">Укажите вид грунта</label>
                <div class="col-md-4">
                  <select class="form-control" id="7_ground_type">
                        <option value="0">Насыпной неуплотненный</option>
                        <option value="1">Песчаный и гравийный</option>
                        <option value="2">Супесь</option>
                        <option value="3" selected="">Суглинок</option>
                        <option value="4">Глина</option>
                        <option value="5">Лессы и лессовидные</option>
                    </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="7_width_1" class="col-md-8 control-label">Ширина основания котлована (L1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="7_width_1" maxlength="5" value="4" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="7_width_2" class="col-md-8 control-label">Длина основания котлована (L2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="7_width_2" maxlength="5" value="6"/>
                </div>
              </div>
              
              <div class="form-group">
                <label for="7_height" class="col-md-8 control-label">Высота котлована (H), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="7_height" maxlength="5" value="2" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Выбран грунт:  <span class="badge bg-green" id="answer_7_ground"></span></p>
        <p class="answer">Объем котлована (V) = <span class="badge bg-green" id="answer_7_v"></span> м3</p>
        <p class="answer">Ширина верха котлована (L3) = <span class="badge bg-green" id="answer_7_width_3"></span> м2</p>
        <p class="answer">Длина верха котлована (L4) = <span class="badge bg-green" id="answer_7_width_4"></span> м2</p>
        <p><span id="answer_7_v_str"></span></p>
        <p><span id="answer_7_l_3_str"></span></p>
        <p><span id="answer_7_l_4_str"></span></p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="_8"></a>
<div class="row ground_row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">#8. Круглый колодец с откосами</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <img src="<?=base_url()?>web/calc/e_ground_works/img/_8.png" class="img-responsive" />
          </div>
          <div class="col-md-5">
            <form class="form-horizontal">
              
              <div class="form-group">
                <label for="8_width_1" class="col-md-8 control-label">Ширина основания (d1), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="8_width_1" maxlength="5" value="2" />
                </div>
              </div>
              
              <div class="form-group">
                <label for="8_width_2" class="col-md-8 control-label">Ширина по верху (d2), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="8_width_2" maxlength="5" value="3"/>
                </div>
              </div>
              
              <div class="form-group">
                <label for="8_height" class="col-md-8 control-label">Высота котлована (H), м.</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="8_height" maxlength="5" value="2" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <p class="answer">Объем котлована (V) = <span class="badge bg-green" id="answer_8_v"></span> м3</p>
        <p><span id="answer_8_v_str"></span></p>
      </div>
    </div>
  </div>
</div>

<div style="margin-left: 0px; margin-bottom: 6px;">
	<? $this->load->view('templates/banner_view'); ?>
</div>

<a name="desc"></a>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Описание</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
      <p>Траншея - это открытая выемка в земле, предназначенная для устройства ленточного фундамента, прокладки коммуникаций (водопровод, канализация, силовые кабеля, сети связи).</p>
        <p>При устройстве ленточного фундамента ширину траншеи рекомендуется принимать на 600 мм больше ширины основания фундамента bф (для возможности выполнения монтажных работ, проход людей).</p>        
        <p>Траншея с вертикальными стенками на спланированной местности - самая простая форма выемки. В основном применяется при низкой высоте траншеи и при производстве работ в зимних условиях, когда откосы траншеи заморожены, и нет опасности обвала грунта, так же применяется при устройстве механических креплений стен выемки (распорных; консольных; консольно-распорных).</p>
        <a name="gr_table"></a>
        <p style="text-align: center; font-weight: bold;">Крутизна откосов в зависимости от вида грунта и глубины выемки</p>
          <table class="table" id="gr_table">
          <tr>
          <td rowspan="2">Наименование грунтов</td>
          <td colspan="3">Крутизна откосов (отношение его высоты к заложению - 1:m) при глубине выемки, м, не более</td>
          </tr>
          <tr>
          <td>1.5</td><td>3</td><td>5</td>
          </tr>
          <tr>
          <td>Насыпной неуплотненный</td>
          <td>1:0,67</td><td>1:1</td><td>1:1,25</td>
          </tr>
          <tr>
          <td>Песчаный и гравийный</td>
          <td>1:0,5</td><td>1:1</td><td>1:1</td>
          </tr>
          <tr>
          <td>Супесь</td>
          <td>1:0,25</td><td>1:0,67</td><td>1:0,85</td>
          </tr>
          <tr>
          <td>Суглинок</td>
          <td>1:0</td><td>1:0,5</td><td>1:0,75</td>
          </tr>
          <tr>
          <td>Глина</td>
          <td>1:0</td><td>1:0,25</td><td>1:0,5</td>
          </tr>
          <tr>
          <td>Лессы и лессовидные</td>
          <td>1:0</td><td>1:0,5</td><td>1:0,5</td>
          </tr>
          </table>
        <p>Объем выемки траншеи можно опрделить как произведение площади поперечного сечения на длинну.</p>
        <p>Объем обратной засыпки определяется как разность между объемом выемки и монтируемых конструкций (фундаментных блоков, труб).</p>
        <p>Котлован — выемка в грунте, предназначенная для устройства оснований и фундаментов зданий и других инженерных сооружений.</p>
      </div>
    </div>
  </div>
</div>

<? $this->load->view('templates/comments_view'); ?>

<script src="<?=base_url();?>web/calc/e_ground_works/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/calc/e_ground_works/style.css"/>