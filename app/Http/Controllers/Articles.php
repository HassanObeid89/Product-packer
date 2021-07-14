<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Articles extends Controller
{
    //

    function fetch_articles(Request $req) {
        
        $articleNumber = (int)$req->articleNumber;
        
        $url = "https://www.partykungen.se/$articleNumber.json";
        $data =  Http::get($url)->json();
        $width = $data ['product_stocks'][0]['width'];
        $height = $data ['product_stocks'][0]['height'];
        $depth = $data ['product_stocks'][0]['depth'];
        dd($width,$height,$depth);
        

        //return view('item', ['data'=>$data ]);





    // $ch = curl_init();

    // $url = "https://www.partykungen.se/$articleNumber.json";

    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $resp = curl_exec($ch);

    // if($e = curl_error($ch)){
    //     echo $e;
    // }
    // else{
    //     $decoded = json_decode($resp);
    // }

    // curl_close($ch);
    // ddd($decoded);

        
      }

       
    }

