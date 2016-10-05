<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.modal .modal-body {
    max-height: 540px;
    overflow-y: auto;
}
</style>
<h2 class="page-header">AdminLTE Custom Tabs</h2>
<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-left" style="width: 100%;">
        <li class="pull-left header"><i class="fa fa-th"></i> Параметры</li>
        
        <li class="active"><a href="#tab_1-1" data-toggle="tab">Общие</a></li>
        <li><a href="#tab_2-2" data-toggle="tab">Сечение</a></li>
        <li><a href="#tab_3-2" data-toggle="tab">Усилия</a></li>
        <li><a href="#tab_3-2" data-toggle="tab">Расчетная длина</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1-1">
          <div class="row">
            <div class="col-md-6">
              <form role="form">
                  <div class="box-body">
                  
                    <div class="form-group">
                      <label for="height">Высота стойки</label>
                      <input type="text" class="form-control" id="height" name="height" placeholder="Высота стойки"/>
                    </div>
                    
                    <div class="form-group">
                      <label for="steel">Сталь</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="steel" name="steel" placeholder="Сталь"/>
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-flat" type="button">Выбор</button>
                        </span>
                      </div><!-- /input-group -->
                    </div>
                    
                    <div class="form-group">
                      <label for="k_work">Коэффициент условий работы</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="k_work" name="k_work" placeholder="Коэффициент условий работы"/>
                        <span class="input-group-btn">
                          <a data-toggle="modal" class="btn btn-info btn-flat" href="/column_modal/k_work" data-target="#myModal">Выбор</a>
                        </span>
                      </div><!-- /input-group -->
                    </div>
                    
                    <div class="form-group">
                      <label for="k_safety">Коэффициент надежности по ответственности</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="k_safety" name="k_safety" placeholder="Коэффициент надежности по ответственности"/>
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-flat" type="button">Выбор</button>
                        </span>
                      </div><!-- /input-group -->
                    </div>
                    
                      
                    
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                  </div><!-- /.box-footer -->
                </form>
                
                

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  role="document">
        
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
          
          
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3-2">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
  </div><!-- /.col -->
</div> <!-- /.row -->