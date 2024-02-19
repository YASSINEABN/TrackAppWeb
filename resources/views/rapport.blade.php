<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #299be4;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
  
    td{
       
        justify-content: center;
        align-items: center;

   
    }
	
	
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
   th{
    text-align: center; 
   }



	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

</style>

</head>
<body>
   <div>
    <x-navbar />
   </div>
<div class="container" style="margin-top:80px; ">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                      
                        <h2>Details <b>Appareils</b></h2>
                    </div>
                    <div class="col-xs-7" style="flex-direction: column">
                    <div class="" id="export-btn">
                 
                        <a href="#" class="btn btn-primary" ><i class="material-icons">&#xE24D;</i> Export to Excel</a>						
                    </div>
                  
                </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Latitude</th>						
                        <th>Longitude</th>
                        <th>Accuracy</th>
                        <th>Speed (km/h)</th>
                        <th>Date</th>
                       
                       
                    </tr>
                </thead>
                <tbody id="table-body">
                    @if(isset($data['documents']))
                    @for($i=0;$i<count($data['documents']);$i++)
                    @if( $data['documents'][$i]['fields']['latitude']['doubleValue']!=0)
                    <tr>
                        <td>{{ $i +1 }}</td>
                        <td >{{ basename($data['documents'][$i]['name']) }}</td>
                        <td>{{  $data['documents'][$i]['fields']['latitude']['doubleValue'] }}</td>                        
                        <td>{{ $data['documents'][$i]['fields']['longitude']['doubleValue'] }}</td>
                        @if(isset($data['documents'][$i]['fields']['Accuracy']['integerValue']))
                        <td>{{  $data['documents'][$i]['fields']['Accuracy']['integerValue'] }}</td>
                        @else
                        <td>{{  $data['documents'][$i]['fields']['Accuracy']['doubleValue'] }}</td>
                        @endif
                        @if(isset($data['documents'][$i]['fields']['speed']['integerValue']))
                        <td>{{  $data['documents'][$i]['fields']['speed']['integerValue'] *3.2 }}</td>
                        @else
                        <td>{{  $data['documents'][$i]['fields']['speed']['doubleValue'] *3.2 }}</td>
                        @endif
                        <td>{{ date("m-d H:i:s",$data['documents'][$i]['fields']['time']['integerValue'] ) }}</td>
                    
                  
                    </tr>
                    @endif
                   @endfor
                   @endif
                   
                </tbody>
            </table>
            {{-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> --}}
        </div>
    </div>        
</div>     
</body>
</html>

<script>
     

       var exportBtn = document.getElementById("export-btn");
       var exportpdf = document.getElementById("export-pdf");
       exportBtn.addEventListener("click", function() {
  // Sélectionnez la table que vous souhaitez exporter
  var table = document.getElementById("table");

  // Exportez la table au format Excel
  $(table).tableExport({
    type: 'excel',
    escape: 'false'
  });
});


exportpdf.addEventListener("click", function() {
  // Sélectionnez la table que vous souhaitez exporter
  var table = document.getElementById("table");

  var doc = new jsPDF();

// Obtenez les données de la table au format HTML
var html = table.outerHTML;

// Ajoutez les données de la table au document PDF
doc.autoTable({ html: html });

// Téléchargez le document PDF
doc.save("table.pdf");

});




  


</script>