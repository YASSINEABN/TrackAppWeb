
<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Change a map's style</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    
    <style>
    body { margin: 0; padding: 0; }
    #map { position: fixed; top: 0; bottom: 0; width: 100%; }

    .hidden {
  transform: translateX(-200px);
  display: none;
}
    </style>
   
    </head>
    <body>
  

    <div id="map" >
     
    </div>
  

    <div >
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      
      <div id="menu" style="margin-top:60px; margin-left:450px; background-color: #efefef96; border-radius: 50px">
          
          <input id="streets-v12" type="radio" name="rtoggle" value="streets" >
          <label for="streets-v12" style="color: rgb(0, 0, 0)">streets</label>
         
          <input id="satellite-streets-v12" type="radio" name="rtoggle" value="satellite" checked="checked"  >
         
          <label for="satellite-streets-v12" style="color: rgb(0, 0, 0)">satellite streets</label>
       
        
         
      </div>
      <img  id="next" src="{{ asset('images/next.png') }}" alt=""  style="width:35px;height: 35px;margin-bottom:10px;cursor: pointer;position: fixed;margin-top:50px;" >
         
    
      <div  class="hidden" id="menuu" style="height:91%;width:400px;margin-top:30px;margin-left:10px;box-shadow: 2px 2px 5px rgba(255, 0, 0, 0.5);border-radius: 10px;overflow-x: hidden;transition: transform 0.5s;">
      <div style="margin-top:10px; position: relative;">  
          {{-- @extends('layouts.totalcars') --}}
         
          <img  id="left" src="{{ asset('images/left.png') }}"   style="width:30px;height: 30px;margin-bottom:10px;cursor: pointer;">
              
              <div>
               
                  <div class="dashboard-container" style="display: flex;padding-left: 80px"  >
               
               
              <div style="margin-right:50px; display: flex;margin-left:-50px">
               <img src="{{ asset('images/iphone (2).png') }}" alt="" srcset="" style="width:80px;height: 80px;margin-top:-10px;">
               @if(isset($count2))
               <h1 >{{  $count2  }}</h1>
              
                   
               @else
                   <h1>0</h1>
               @endif
              </div> 
             
               <img src="{{ asset('images/no-phone.png') }}" alt="" srcset="" style="width:80px;height: 80px;margin-top:-10px ; ">
               @if(isset($documentCount2))
               <h1>{{ $documentCount2}}</h1>
               @else
               <h1>0</h1>
              @endif
           
             
              
                  
      
      </div>
      
      </div>
      <div id="hh" style="overflow-y: auto">
        @if(isset($documentCount))
      @for($i=0;$i<$documentCount;$i++)
      <hr>
      
      <div style="display:flex; margin-top: 10px; background-color: rgba(224, 217, 217, 0.487);height: 80px; box-shadow: 2px 2px 5px rgba(0,0,0,0.5);border-radius: 10px" onclick="changeMap({{$val1[$i]['fields']['longitude']['doubleValue']}},{{$val1[$i]['fields']['latitude']['doubleValue']}})">
        <img src="{{ asset('images/smartphone.png') }}"  style="width:50px;height: 50px;margin-top:10px;"/>
        @if($val1[$i]['fields']['latitude']['doubleValue']==0)
        <p style="padding-left: 10px;font-weight: 500;color: red">{{basename($val1[$i]['name'])}}</p>
        @else
        <p style="padding-left: 10px;font-weight: 500;color: green">{{basename($val1[$i]['name'])}}</p>
        @endif
       
        <br>
        <div style="position: fixed;padding: 25px;margin-left: 60px">
        {{ date("Y-m-d H:i:s")}}
      </div>
        <br>
      
        <div>
       
        </div>
      </div>
      
      @endfor
      @else

      <h1>aucun appareil a afficher</h1>
      @endif
      </div>
      </div>
      </div>
      
      
      </div>
   
      </div>
      
     <div>
        <x-navbar />
     </div>
            </body>
            </html>




    <script>
        
        
        mapboxgl.accessToken = 'pk.eyJ1IjoieWFzc2luZS1hbm9pcmUiLCJhIjoiY2xoYWNmaTdkMGZ6NTNmbGcwZ20yamE0MSJ9.0mJVWqgbrunctWD5L1nIWQ';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/satellite-streets-v12', // style URL
            center: [-7.8000, 29.7990],//starting position [lng, lat]
        
            zoom: 4.5,// starting zoom
            attributionControl: false,
      
        });
        @if(isset($documentCount) && isset($val1))
        var val1 = {!! json_encode($val1) !!};
        
        var documentCount = {!! $documentCount !!};
        console.log(documentCount);

        for (var i = 0; i < documentCount; i++) {
            var fields = val1[i].fields;
            var longitude = fields.longitude.doubleValue;
            var latitude = fields.latitude.doubleValue;
            console.log(longitude);
            console.log(latitude);
            
            var marker = new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        }
        @endif

        const layerList = document.getElementById('menu');
        const inputs = layerList.getElementsByTagName('input');

        for (const input of inputs) {
            input.onclick = (layer) => {
                const layerId = layer.target.id;
                map.setStyle('mapbox://styles/mapbox/' + layerId);
            };
        }
       
document.getElementById('left').onclick = function(){
  document.getElementById('menuu').classList.add('hidden');
  document.getElementById('next').style.display = 'block';
}
document.getElementById('next').onclick = function(){
  document.getElementById('menuu').classList.remove('hidden');
  document.getElementById('next').style.display = 'none';
}

function changeMap(longitude, latitude) {
  map.setCenter([longitude, latitude]);
  map.setZoom(15);
}

    </script>

    </body>
    </html>
    <!-- Inclure la bibliothèque Web Speech API -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.2/web-animations-next.min.js"></script>

    <!-- Ajouter un bouton pour activer la reconnaissance vocale -->


    <!-- Ajouter un script pour gérer la reconnaissance vocale -->
    <style>
        div::-webkit-scrollbar {
        width: 8px;
        height: 4px;
      }
      
      div::-webkit-scrollbar-track {
        box-shadow: inset 0 2px 6px grey;
        border-radius: 10px;
      }
      
      div::-webkit-scrollbar-thumb {
        background-image: linear-gradient(180deg,#d1cfd1 0%, #5d8ec3 99%);
        border-radius: 10px;
        height: 100px; 
      }
      
      div::-webkit-scrollbar-thumb:hover {
        background: #56dbd4;
      }
        #menu,#menuu {
            position: absolute;
            background: #efefef;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
        
            
        }
        .mapboxgl-ctrl-attrib .mapboxgl-ctrl-logo {
        display:none;
    }
    
      
      
      </style>
  