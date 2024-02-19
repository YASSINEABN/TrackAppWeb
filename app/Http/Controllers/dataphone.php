<!-- <?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class dataphone extends Controller
{
    public function show()
    {
        // $serviceAccount = (__DIR__.'/testlocation-8c657-firebase-adminsdk-smxhl-c7b1297027.json');

        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->withDatabaseUri('https://testlocation-8c657.firebaseio.com/');
        //     $caCertPath = 'D:\telechargemant\cacert.pem';

        //     $curl = curl_init();

        //     // Set the cURL options
        //     curl_setopt_array($curl, [
        //         CURLOPT_URL => 'https://oauth2.googleapis.com/token',
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_SSL_VERIFYPEER => true,
        //         CURLOPT_CAINFO => $caCertPath,
        //     ]);

        // $httpClient = new Client([
        //     'verify' => false, // Disable SSL verification
        // ]);

        // $database = $firebase->createDatabase($httpClient);
        // $reference = $database->getReference('locations');
        // $snapshot = $reference->getSnapshot();
        // $data = $snapshot->getValue();

        // return view('firebase.data', compact('data'));
    }
} 
