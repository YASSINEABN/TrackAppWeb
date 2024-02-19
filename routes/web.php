<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use App\Models\phone;
use App\Http\Controllers\dataphone;
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
use App\Models\notif;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    return view('welcome');
});

Route::view('data','data')->name('add');


Route::any('/collections', function (Request $request) {

$phone = new phone;
$phone->NameApp=$request->NomAppareil;
$phone->Name=$request->Name;
$phone->Ville=$request->ville;
$phone->Numero=$request->numero;
$phone->Type=$request->type;
$phone->email=$request->email;
$phone->save();

Session::put('identifient',$request->NomAppareil);


// Envoyer l'e-mail
Mail::to($request->email)->send(new testmail());


    $client = new Client();
    $headers=[ 'Authorization' => 'Bearer AIzaSyC0EchAUDKPULXZE4Ri7eH9PnBo1S302Sg',
    'Content-Type' => 'application/json',];

    $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations/'.$request->NomAppareil;
    $data = [
        'fields' => [
            'latitude' => [
                'doubleValue' => '0',
            ],
            'longitude' => [
                'doubleValue' => '0',
            ],
         
        ],
    ];

    $response = $client->request('PATCH', $url, [
        'json' => $data,
        
        RequestOptions::VERIFY => false,
    ]);

    return redirect()->route('table');
})->name('send');
route::view('table','table');
route::view('rapport','rapport');
        route::any('delete/{id}', function($id) {
            $phone = phone::find($id);
        
            $client = new Client();
            $headers = [
                
                'Content-Type' => 'application/json',
            ];
        
            $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations/'.$phone->NameApp;
        
            $response = $client->request('DELETE', $url, [
               
                RequestOptions::VERIFY => false
            ]);
        
            $phone->delete();
        
            return redirect()->route('table');
        })->name('delete');



        route::any('edit/{id}', function ($id){
$phone=phone::find($id);
return view('edit')->with('infos',$phone);


        })->name('edit');

        Route::any('send2',function (Request $request){
            $phone = new phone;
            phone::find($request->id)->delete();
            $phone->id=$request->id;
$phone->NameApp=$request->NomAppareil;
$phone->Name=$request->Name;
$phone->Ville=$request->ville;
$phone->Numero=$request->numero;
$phone->email=$request->email;
$phone->Type=$request->type;
$phone->save();
Mail::to($request->email)->send(new testmail());
return redirect()->route('table');

        })->name('sendedit');


    

// Route::get('/data',[dataphone::class,'show'])->name('test');

Route::get('notif',function(){

    return view('notifications')->with('data',notif::all());
})->name('notif');
// Route::post('sendData',function(Request $request){
//     $notif = new notif;
//     $notif->altitude=$request->latitude;
//     $notif->longitude=$request->longitude;
//     $notif->nameplace=$request->nameplace;
//     $notif->save();
//     return redirect()->back();
    
    
// })->name('sendData');

Route::get('deleteData/{id}',function($id){
$notif = notif::find($id);
$notif->delete();
    return redirect()->back();
})->name('deleteData');

Route::any('editData', function (Request $request) {
    $newNotif = new notif;
    if($request->idd!==null){
    $notif = notif::find($request->idd);
    $notif->delete();

   
    $newNotif->id = $request->idd;
    $newNotif->altitude = $request->latitude;
    $newNotif->longitude = $request->longitude;
    $newNotif->nameplace = $request->nameplace;
    $newNotif->save();
    }else{
        $newNotif->altitude = $request->latitude;
        $newNotif->longitude = $request->longitude;
        $newNotif->nameplace = $request->nameplace;
        $newNotif->save();
    }

    return redirect()->back();
   
})->name('EditData');


Route::get('main',function(){
    return view('main');
});

Route::any('submit',function(Request $request){
if($request->username=="YassineAnoire" && $request->password=="yassine12")
    return redirect()->route('map');
    else 
    return redirect()->back()->with('msgerror',"u have an error ");


})->name('submit');