<?php

namespace Pakjepakjes\Pakjepakjes;


class Package
{
    public $height = 10;
    public $width = 10;
    public $weight = 4000;
    public $length = 10;
    public $kind = '';
    public $value = '';

    public function __construct(array $packagedetails)
    {
        foreach ($packagedetails as $key => $val) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $val;
            }
        }
    }

    public function toArray()
    {
        return (array)$this;
    }
}
