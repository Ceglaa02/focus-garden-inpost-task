<?php

namespace App;

class Receiver
{
    /** @return array: Return receiver data */
    public function getReceiverData(): array
    {
        return [
            'email' => 'sklep@focusgarden.pl',
            'phone' => '664377354',
            'company_name' => 'Focus Garden',
            'address' => [
                'street' => "ul. B. Krzywoustego",
                'building_number' => '3',
                'city' => 'Poznan',
                'post_code' => '61-144',
                'country_code' => 'PL'
            ]
        ];
    }
}