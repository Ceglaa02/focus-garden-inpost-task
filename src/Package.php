<?php

namespace App;

class Package
{
    /** @return array: Return package data */
    public function getPackageData(): array
    {
        return  [
            [
                'id' => 'courier_box_s',
                'dimensions' => [
                    'length' => '80',
                    'width' => '360',
                    'height' => '640',
                    'unit' => 'mm',
                ],
                'weight' => [
                    'amount' => '10',
                    'unit' => 'kg'
                ],
                'is_non_standard' => false
            ]
        ];
    }

    /** @return string: Return package service */
    public function getPackageService(): string
    {
        return 'inpost_courier_standard';
    }
}