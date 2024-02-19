<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <x-navbar />

    

    <div class="row notification-container">
        <h2 class="text-center">My Notifications</h2>
        <p class="dismiss text-right"><a id="dismiss-all" href="#">Dimiss All</a></p>
        <div class="card notification-card notification-invitation">
          <div class="card-body">
            <table >
              @foreach ( $details as $key => $value)
            
              <tr>
                <td style="width:70%"><div class="card-title"><b> {{ $key }}</b> a visité <b>{{ $value }}</b></div></td>
                <td style="width:30%">
                 
                  <a href="#" class="btn btn-danger dismiss-notification" style="position: relative;margin-left:230px;margin-bottom: 25px">Dismiss</a>
                  <br>
                </td>
              </tr>
            
              @endforeach
            </table>
          </div>
        </div>
       
        
     
        
        
        
        
      </div>
</body>
</html>
<style>
    body{
  background-color: #fcfcfc;
}

.row{
  margin:auto;
  padding: 30px;
  width: 80%;
  display: flex;
  flex-flow: column;
  .card{
    width: 100%;
    margin-bottom: 5px;
    display: block;
    transition: opacity 0.3s;
  }
}


.card-body{
  padding: 0.5rem;
  table{
    width: 100%;
    tr{
      display:flex;
      td{
        a.btn{
          font-size: 0.8rem;
          padding: 3px;
        }
      }
      td:nth-child(2){
        text-align:right;
        justify-content: space-around;
      }
    }
  }
  
}

.card-title:before{
  display:inline-block;
  font-family: 'Font Awesome\ 5 Free';
  font-weight:900;
  font-size: 1.1rem;
  text-align: center;
  border: 2px solid grey;
  border-radius: 100px;
  width: 30px;
  height: 30px;
  padding-bottom: 3px;
  margin-right: 10px;
}

.notification-invitation {
  .card-body {
    .card-title:before {
      color: #90CAF9;
      border-color: #90CAF9;
      content: "\f007";
    }
  }
}

.notification-warning {
  .card-body {
    .card-title:before {
      color: #FFE082;
      border-color: #FFE082;
      content: "\f071";
    }
  }
}

.notification-danger {
  .card-body {
    .card-title:before {
      color: #FFAB91;
      border-color: #FFAB91;
      content: "\f00d";
    }
  }
}

.notification-reminder {
  .card-body {
    .card-title:before {
      color: #CE93D8;
      border-color: #CE93D8;
      content: "\f017";
    }
  }
}

.card.display-none{
  display: none;
  transition: opacity 2s;
}


</style>
<script>
    const dismissAll = document.getElementById('dismiss-all');
const dismissBtns = Array.from(document.querySelectorAll('.dismiss-notification'));

const notificationCards = document.querySelectorAll('.notification-card');

dismissBtns.forEach(btn => {
  btn.addEventListener('click', function(e){
    e.preventDefault;
    var parent = e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    parent.classList.add('display-none');
  })
});

dismissAll.addEventListener('click', function(e){
  e.preventDefault;
  notificationCards.forEach(card => {
    card.classList.add('display-none');
  });
  const row = document.querySelector('.notification-container');
  const message = document.createElement('h4');
  message.classList.add('text-center');
  message.innerHTML = 'All caught up!';
  row.appendChild(message);
})
</script>




    {{-- @foreach ($details as $key => $value) 
         {{ $key }} a visité {{ $value }}
    
    @endforeach --}}