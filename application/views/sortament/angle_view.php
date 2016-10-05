<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url();?>lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>lte/plugins/datatables/dataTables.bootstrap.css"/>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('#datatable').dataTable( {
    "order": [ 0, 'asc' ], //desc
		"processing": true,
		"serverSide": true,
		"ajax": {
		  "url": "/sortament/getSortamentByAjax",
      "type": "POST"
      },
    "columns": [
			{ "data": "id", "visible": true, "searchable": false}, 
      { "data": "name"}, 
      { "data": "status", "searchable": false}
		] ,                                                                                   
    "language": { "url": "//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Russian.json" },
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>',
            "sPaginationType": "bootstrap" , 
            "iDisplayLength": "all"  
	} );
} );
</script>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Hover Data Table</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
    			<thead>
    				<tr>
              <th style="width: 20px;">id</th> 
              <th>Название</th>            
    					<th>Статус документа</th>                             
    				</tr>
    			</thead>
    		</table>
      </div>
    </div>
  </div><!-- /.col -->
</div> <!-- /.row -->