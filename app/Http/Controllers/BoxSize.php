<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use DVDoug\BoxPacker\Box;
use JsonSerializable;

class BoxSize implements Box, JsonSerializable
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $depth;

    /**
     * @var int
     */
    private $maxWeight;

    
    /**
     * TestBox constructor.
     */
    public function __construct(
        string $reference,
        int $width,
        int $height,
        int $depth,
        //int $emptyWeight = 0,
        int $maxWeight
        
    ) {
        $this->reference = $reference;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        //$this->emptyWeight = $emptyWeight;
        $this->maxWeight = $maxWeight;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getInnerWidth(): int
    {
        return $this->width;
    }

    public function getInnerLength(): int
    {
        return $this->height;
    }

    public function getInnerDepth(): int
    {
        return $this->depth;
    }


    public function getOuterWidth(): int
    {
        return $this->width;
    }

    public function getOuterLength(): int
    {
        return $this->height;
    }

    public function getOuterDepth(): int
    {
        return $this->depth;
    }

    public function getEmptyWeight():int
    {
        return 0;
    }

    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'reference' => $this->reference,
            'width' => $this->width,
            'height' => $this->height,
            'depth' => $this->depth,
            //'emptyWeight' => $this->emptyWeight,
            //'maxWeight' => $this->maxWeight
        ];
    }
}
