<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DVDoug\BoxPacker\Packer;



class Articles extends Controller
{
    
    function fetch_articles(Request $req) {
        
        $articleNumber = (int)$req->articleNumber;
        
        $url = "https://www.partykungen.se/$articleNumber.json";
        $data =  Http::get($url)->json();
        //return $data;
     
        $width = $data ['product_stocks'][0]['width'];
        $height = $data ['product_stocks'][0]['height'];
        $depth = $data ['product_stocks'][0]['depth'];
        $weight = $data ['product_stocks'][0]['weight'];
        $itemName = $data ['name'];
        //ddd($data);
      
        
    $packer = new Packer();


    $packer->addBox(new BoxSize('XS', 120, 180, 80, 5000));
    $packer->addBox(new BoxSize('XXL', 600, 600, 600, 20000));


    $packer->addItem(new Items($itemName, $width, $height, $depth, $weight, true), 1); // item, quantity
    

    $packedBoxes = $packer->pack();

    echo "This item fitted into " . count($packedBoxes) . " box(es)" . PHP_EOL;
    foreach ($packedBoxes as $packedBox) {
        $boxType = $packedBox->getBox(); 
        echo "This box is a {$boxType->getReference()}, it is {$boxType->getOuterWidth()}mm wide, {$boxType->getOuterLength()}mm long and {$boxType->getOuterDepth()}mm high" . PHP_EOL;
        echo "The combined weight of this box and the items inside it is {$packedBox->getWeight()}g" . PHP_EOL;
        echo $width;
        echo "The items in this box are:" . PHP_EOL;
        $packedItems = $packedBox->getItems();
        foreach ($packedItems as $packedItem) { 
            echo $packedItem->getItem()->getDescription() . PHP_EOL;
        }
    }

    }
}
