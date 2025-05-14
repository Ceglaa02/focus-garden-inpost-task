<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class InPostApiService
{
    /** @var string:  Bearer token for InPost API */
    private string $token;

    /** @var Client */
    private Client $client;

    /** @var string: Endpoint url for InPost API */
    private $endPoint;

    public function __construct()
    {
        $this->token = $_ENV['INPOST_API_TOKEN'];
        $this->endPoint = str_replace(':organization_id', $_ENV['INPOST_GROUP_ID'], $_ENV['INPOST_API_END_POINT']);
        $this->client = new Client(['base_uri' => $_ENV['INPOST_API_URL']]);
    }

    /** @return array: Return InPost API headers */
    private function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    /**
     *
     * @param Package $package : Package Instance
     * @param Receiver $receiver : Receiver Instance
     *
     * @return array: Return InPost API body
     */
    private function getBody(Package $package, Receiver $receiver): array
    {
        return [
            'receiver' => $receiver->getReceiverData(),
            'parcels' => $package->getPackageData(),
            'service' => $package->getPackageService(),
            'reference' => 'test-shipment'
        ];
    }

    /**
     * Send shipment
     *
     * @param Package $package : Package Instance
     * @param Receiver $receiver : Receiver Instance
     *
     * @return array: Return shipment data
     */
    public function sendShipment(Package $package, Receiver $receiver): array
    {
        try {
            echo "\n";
            echo "<-------------------- Retriving package data.... -------------------->";
            echo "\n";
            $body = $this->getBody($package, $receiver);

            echo "<-------------------- Retriving package collected -------------------->";
            echo "\n";

            echo "<-------------------- Sending package data.... -------------------->";
            echo "\n";

            $response = $this->client->post($this->endPoint, [
                'headers' => $this->getHeaders(),
                'json' => $body
            ]);

            echo "<-------------------- Retriving shipment data.... -------------------->";
            echo "\n";

            $result = json_decode($response->getBody(), true);

            echo "<-------------------- Shipment created  -------------------->";
            echo "\n";

            var_dump($result);

            return $result;
        } catch (GuzzleException $e) {
            echo "<-------------------- Shipment failure  -------------------->";
            echo "\n";

            var_dump($e->getMessage());

            return [];
        }
    }
}