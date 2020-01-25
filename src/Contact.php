<?php

namespace Pakjepakjes\Pakjepakjes;


class Contact
{
    public $name = '';
    public $street = '';
    public $housenumber = '';
    public $country = '';
    public $zipcode = '';
    public $city = '';
    public $email = '';
    public $phone = '';

    public function __construct(array $contact)
    {
        foreach ($contact as $key => $val) {
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
