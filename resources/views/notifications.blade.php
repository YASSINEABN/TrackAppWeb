<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <script src="https://www.bing.com/api/maps/mapcontrol?key=AsF4q8op3YDfeYwGiOi-xOZdYVHcqCTWKZFpinQLrMOWpTwB7kDKVLzYfhll8Q47"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Input Design</title>
  <style>
    .custom-input {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Ajoute l'ombre */
    }
    
  </style>
</head>

<body>
  <a href="{{ route('visite') }}">
  <img src="{{ asset('images/notification.png') }}" alt="" srcset="" height="50px" width="50px" style="padding-top: 20px;padding-left: 5px">
</a>
    <x-navbar />
    <div style="display:flex;margin-top:60px">
    <div id="map" style="margin-left:20px;width:600px;height: 500px;padding-right: 600px"></div>
    <div id="input">
    <form action="{{ route('EditData')  }}" method="post" style="">
        @csrf
        <input type="text" name="idd" id="idd" hidden >
  <div class="container mt-3" >
    <div class="row">
      <div class="col-md-4">
        <label for="input1" class="form-label">Latitude</label>
        <input type="text" class="form-control custom-input" id="input1" placeholder="Latitude" name="latitude" required>
      </div>
      <div class="col-md-4">
        <label for="input2" class="form-label">Longitude</label>
        <input type="text" class="form-control custom-input" id="input2" placeholder="Longitude" name="longitude" required>
      </div>
      <div class="col-md-4">
        <label for="input2" class="form-label">Nom Du Place</label>
        <input type="text" class="form-control custom-input" id="input3" placeholder="Name du Place" name="nameplace" required>
      </div>
     
    </div>
    <button class="btn btn-outline-primary" style="width: 150px; margin-left:280px;margin-top:15px" id="add">Add</button>
    <button class="btn btn-outline-primary" style="width: 150px; margin-left:280px;margin-top:15px;display: none" id="edit"><a style="" >Edit </a></button>
  </div>
</form>
<div style="background-color: rgba(255, 255, 255, 0.16);width: 100%;overflow-y: scroll;max-height: 70%" >
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
             
            </div>
            <table class="table table-bordered"  id="dataTable">
                <thead>
                    <tr>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Nom Du Place</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $data as $dataa)
                        
                
                    <tr>
                        <td>{{ $dataa->altitude }}</td>
                        <td>{{ $dataa->longitude }}</td>
                        <td>{{ $dataa->nameplace }}</td>
                        <td>
						
                            <a class="edit" title="Edit"  onclick="editData({{ $dataa->altitude }},{{ $dataa->longitude }},'{{ $dataa->nameplace }}',{{ $dataa->id }})"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="{{ route('deleteData',$dataa->id) }}"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>     
</div>
</div>


</div>

{{-- <div style="position: fixed; width: 100%; z-index: 999;">
  <a href="{{ route('visite') }}">
    <button class="btn btn-outline-primary" style="width: 100%; margin-top:10px; color: white; border-color: white;" >Notifications</button>
  </a>
</div> --}}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>


let map;

function initMap() {
  map = new Microsoft.Maps.Map('#map', {
    credentials: 'AsF4q8op3YDfeYwGiOi-xOZdYVHcqCTWKZFpinQLrMOWpTwB7kDKVLzYfhll8Q47',
  });

  Microsoft.Maps.Events.addHandler(map, 'click', function (e) {
    const point = new Microsoft.Maps.Point(e.getX(), e.getY());
    const location = e.target.tryPixelToLocation(point);

    const latitude = location.latitude.toFixed(2);
    const longitude = location.longitude.toFixed(2);

    document.getElementById('input1').value = latitude;
    document.getElementById('input2').value = longitude;
    // Do something with the latitude and longitude values, such as storing them or displaying them to the user
   
  });
}
window.onload = function () {
  const script = document.createElement('script');
  script.src = 'https://www.bing.com/api/maps/mapcontrol?callback=initMap';
  document.body.appendChild(script);
};
var i=0;
document.getElementById('nav-action').onclick = function() {
  i++;
  if (i % 2 !== 0) {
    document.getElementById('map').style.display = 'none';
    document.getElementById('input').style.display = 'none';

  } else {
    document.getElementById('map').style.display = 'block';
    document.getElementById('input').style.display = 'block';
  }
  console.log(i);
};


function editData( lat, long,nameplace,id){
    document.getElementById('add').style.display="none";
    document.getElementById('edit').style.display="block";
    document.getElementById('idd').value = id;
    document.getElementById('input1').value=lat;
    document.getElementById('input2').value=long;
    document.getElementById('input3').value=nameplace;
    
}
$(document).ready(function() {
    $('#dataTable').DataTable({
        "paging": true,
        "pageLength": 4, // Nombre d'attributs par page
    });
});

</script>


<style>
    body{
        overflow: hidden;
    }
    .table-wrapper {
		width: 700px;
	
       
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
</style>