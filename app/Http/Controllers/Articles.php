<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use DVDoug\BoxPacker\Packer;
//use DVDoug\BoxPacker\Test\TestBox;  // use your own `Box` implementation
use DVDoug\BoxPacker\Test\TestItem; // use your own `Item` implementation


class Articles extends Controller
{
    //

    

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

    /*
     * Add choices of box type - in this example the dimensions are passed in directly via constructor,
     * but for real code you would probably pass in objects retrieved from a database instead
     */
    $packer->addBox(new BoxSize('XS', 120, 180, 80, 5000));
    $packer->addBox(new BoxSize('XXL', 600, 600, 600, 20000));

    /*
     * Add items to be packed - e.g. from shopping cart stored in user session. Again, the dimensional information
     * (and keep-flat requirement) would normally come from a DB
     */
    $packer->addItem(new Items($itemName, $width, $height, $depth, $weight, true), 1); // item, quantity
    

    $packedBoxes = $packer->pack();

    echo "This item fitted into " . count($packedBoxes) . " box(es)" . PHP_EOL;
    foreach ($packedBoxes as $packedBox) {
        $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
        echo "This box is a {$boxType->getReference()}, it is {$boxType->getOuterWidth()}mm wide, {$boxType->getOuterLength()}mm long and {$boxType->getOuterDepth()}mm high" . PHP_EOL;
        echo "The combined weight of this box and the items inside it is {$packedBox->getWeight()}g" . PHP_EOL;

        echo "The items in this box are:" . PHP_EOL;
        $packedItems = $packedBox->getItems();
        foreach ($packedItems as $packedItem) { // $packedItem->getItem() is your own item object, in this case TestItem
            echo $packedItem->getItem()->getDescription() . PHP_EOL;
        }
    }

    }
}
