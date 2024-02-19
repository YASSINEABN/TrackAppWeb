<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Models\phone;
use App\Models\notif;

use GuzzleHttp\RequestOptions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//envoyer les donnés et afficher les appareils a map
Route::get('/data',function(){
    $count=0;
    $count2=0;
    $client = new Client();

    $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations';
 
    

    $response = $client->request('GET', $url, [
  
        RequestOptions::VERIFY => false // Désactiver la vérification SSL
    ]);

    
    $body = $response->getBody();
    $data = json_decode($body, true);
    if($data != null){
for($i=0;$i<count($data['documents']);$i++){
if( $data['documents'][$i]['fields']['latitude']['doubleValue']==0){
$count++;
}else{
    $count2++;
}
}
return view('welcome')->with([
    'val1' => $data['documents'],
    'documentCount' => count($data['documents']),
    'count2' => $count2,
    'documentCount2' => $count
]);
    }
    return view('welcome');

   
})->name('map');

    Route::get('/table',function(){
        return view('table')->with('phone',phone::all());
      
    })->name('table');
    
    // Find the document with the name "test"
    // $testDocument = null;
    // foreach ($data['documents'] as $document) {
    //     if ($document['name'] === 'projects/testlocation-8c657/databases/(default)/documents/locations/test') {
    //         $testDocument = $document;
    //         break;
    //     }
    // }

    // if ($testDocument) {
    //     // Extract and return the fields of the test document
    //     return view('welcome')->with([
    //         'val1'=> $testDocument['fields']['latitude']['doubleValue'],
    //         'val2'=>$testDocument['fields']['longitude']['doubleValue']
    //       ]);
       
     
    // } else {
    //     // Document not found
    //     return 'Document with name "test" not found.';
    // }


//recuperer les nom d'une collection
Route::get('/test',function(){
    $client = new Client();

    $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations';
 
    

    $response = $client->request('GET', $url, [
  
        RequestOptions::VERIFY => false // Désactiver la vérification SSL
    ]);

    
    $body = $response->getBody();
    $data = json_decode($body, true);


   return $data['documents'][0]['fields']['time']['integerValue'];
});

Route::get('rapport',function(){
  $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations';
  $client = new Client();


    $response = $client->request('GET', $url, [
  
        RequestOptions::VERIFY => false // Désactiver la vérification SSL
    ]);

    
    $body = $response->getBody();
    $data = json_decode($body, true);

    return view('rapport')->with('data',$data);
})->name('rapport');
Route::get('notif',function(){
    $details = array();
    $url = 'https://firestore.googleapis.com/v1/projects/testlocation-8c657/databases/(default)/documents/locations';
    $client = new Client();
  
  
      $response = $client->request('GET', $url, [
    
          RequestOptions::VERIFY => false // Désactiver la vérification SSL
      ]);
  $infos = notif::all();
      
      $body = $response->getBody();
      $data = json_decode($body, true);
      for($i=0;$i<count($data['documents']);$i++){

    for($j=0;$j<count($infos);$j++){
        if( number_format($data['documents'][$i]['fields']['latitude']['doubleValue'], 2)== $infos[$j]['altitude'] &&  number_format($data['documents'][$i]['fields']['longitude']['doubleValue'], 2)== $infos[$j]['longitude']){
           $details[basename($data['documents'][$i]['name'])]=$infos[$j]['nameplace'];
        }
    }
      }




      return view('visite')->with('details',$details);
    
 
}
)->name('visite');