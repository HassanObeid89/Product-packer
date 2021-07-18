<?php

namespace App\Http\Controllers;

use DVDoug\BoxPacker\Packer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Articles extends Controller
{
    

    public function fetch_articles(Request $req)
    {

        $articleNumber = (int) $req->articleNumber;

        $url = "https://www.partykungen.se/$articleNumber.json";
        $data = Http::get($url)->json();
        if (!null) {
            return $this->packItems($data);
        } else {
            alert('opppsss!!!');
        }

    }

    public function packItems($data)
    {
        $show = true;
        $width = $data['product_stocks'][0]['width'];
        $height = $data['product_stocks'][0]['height'];
        $depth = $data['product_stocks'][0]['depth'];
        $weight = $data['product_stocks'][0]['weight'];
        $itemName = $data['name'];
        $articleNumber = $data['id'];

        $packer = new Packer();

        $packer->addBox(new BoxSize('XS', 120, 180, 80, 5000));
        $packer->addBox(new BoxSize('XXL', 600, 600, 600, 20000));

        $packer->addItem(new Items($itemName, $width, $height, $depth, $weight, true), 1); // item, quantity

        $packedBoxes = $packer->pack();

        foreach ($packedBoxes as $packedBox) {
            $boxType = $packedBox->getBox();
            $packedItems = $packedBox->getItems();
            foreach ($packedItems as $packedItem) {
                $boxSize= $boxType->getReference();
            }
        }

        //return view("packer-card", ['data'=>$data]);

        return view("productView", array(
            'width' => $width,
            'height' => $height,
            'depth' => $depth,
            'boxSize' => $boxSize,
            'packedBoxes' => count($packedBoxes),
            'itemName' => $itemName,
            'articleNumber' => $articleNumber,
            'show' => $show,
        ));

    }
}
