<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use DVDoug\BoxPacker\Item;
use JsonSerializable;
use stdClass;

class Items implements Item, JsonSerializable
{
    /**
     * @var string
     */
    private $articleName;

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
    private $weight;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $a;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $b;

    /**
     * TestItem constructor.
     */
    public function __construct(
        string $articleName,
        int $width,
        int $height,
        int $depth,
        int $weight,
        bool $keepFlat
    ) {
        $this->articleName = $articleName;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->weight = $weight;
        $this->keepFlat = $keepFlat;

        $this->a = new stdClass();
        $this->b = new stdClass();

        $this->a->b = $this->b;
        $this->b->a = $this->a;
    }

    public function getDescription(): string
    {
        //$articleName = $data ['name'];
        return $this->articleName;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->height;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getKeepFlat(): bool
    {
        return $this->keepFlat;
    }


    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'articleName' => $this->articleName,
            'width' => $this->width,
            'height' => $this->height,
            'depth' => $this->depth,
            'weight' => $this->weight,
            'keepFlat' => $this->keepFlat,
        ];
    }
}
