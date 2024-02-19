<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un vehicule</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style>    
        body {
            color: #333;
            background: #fafafa;
            font-family: "Patua One", sans-serif;
        }
        .contact-form {
            padding: 50px;
            margin: 30px 0;
        }
        .contact-form h1 {
            color: #19bc9d;
            font-weight: bold;
            margin: 0 0 15px;
        }
        .contact-form .form-control, .contact-form .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .contact-form .form-control:focus {
            border-color: #19bc9d;
        }
        .contact-form .btn-primary {
            color: #fff;
            min-width: 150px;
            font-size: 16px;
            background: #19bc9d;
            border: none;
        }
        .contact-form .btn-primary:hover {
            background: #15a487; 
        }
        .contact-form .btn i {
            margin-right: 5px;
        }
        .contact-form label {
            opacity: 0.7;
        }
        .contact-form textarea {
            resize: vertical;
        }
        .hint-text {
            font-size: 15px;
            padding-bottom: 20px;
            opacity: 0.6;
        }
    </style>
    </head>
    <body>
        <div style="display: flex">
    <div class="container" style="width:800px;margin-left:-30px">
        <div class="row">
            <div class="">
                <div class="contact-form">
                    <h1>Add Ur Appareil To Track It</h1>
                    <p class="hint-text">Remplir Tous Les champs par des correct informations pour eviter un Probleme.</p>       
                    <form method="POST" action="{{ route('send') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputName">Nom du Agent</label>
                                    <input type="text" name="NomAppareil" class="form-control" id="inputName" required " >
                                </div>
                            </div>                
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputEmail">Nom de telephone</label>
                                    <input type="text" class="form-control" id="inputEmail" required name="Name" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputPhone">Ville</label>
                                    <input type="text" class="form-control" id="inputPhone" required name="ville">
                                </div>
                            </div>
                        </div>      
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputName">Numero De Telephone</label>
                                    <input type="text" class="form-control" id="inputName" required name="numero">
                                </div>
                            </div>    
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputName">email</label>
                                    <input  class="form-control" id="inputName" required name="email" type="email">
                                </div>
                            </div>                
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputEmail">Type De L'appareil</label>
                                    <select class="form-control" id="device" name="type">
                                        <option value="android">Android</option>
                                        <option value="iphone">IOS</option>
                                    </select>
                                </div>
                            </div>
                           
                        </div>  
                           
                      
                        <button type="submit" class="btn btn-primary" style="margin-left:240px;margin-top: 30px"><i class="fa fa-paper-plane"></i>Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="position: fixed; margin-left:800px">
        <img src="{{asset('images/one.png')}}" alt="" srcset="" height="500px" width="800px" style="margin-left: -80px;margin-top:50px" id="redcar">

        
     </div>
     </div>
     </div>
    </body>
    </html>
</div>
<style>
   
</style>
<script>


</script>