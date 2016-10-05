$(document).ready(function() {
	$('#datatable').dataTable( {
    "order": [ 0, 'asc' ], //desc
		"processing": true,
		"serverSide": true,
		"ajax": {
		  "url": "/info/getVeterByAjax",
      "type": "POST"
      },
    "columns": [
              { "data": "draw", "searchable": false},
              { "data": "city"},
              { "data": "region"}, 
              { "data": "country"}
		] ,
    "language": { "url": "//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Russian.json" },
        "paging":         true,
        "lengthChange": false,
		"pageLength": 6,
        "ordering": false
	} );
	
    drawVeter(9,7,7,15,16,20,13,13,17,10,10,8,6,11,16,22,'Москва');
} );