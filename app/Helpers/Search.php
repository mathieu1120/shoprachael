<?php

namespace App\Helpers;

class Search {

    public $country;
    public $city;
    public $state;
    public $name;
    public $sold;
    public $sold_at_from;
    public $sold_at_to;
    public $shipping_at_from;
    public $shipping_at_to;
    public $created_at_from;
    public $created_at_to;

    public function __construct($attributes = []) {
        if ($attributes) {
            foreach ($attributes as $attribute => $value) {
                if (property_exists(self::class, $attribute)) {
                    $this->$attribute = $value;
                }
            }
        }
    }
}