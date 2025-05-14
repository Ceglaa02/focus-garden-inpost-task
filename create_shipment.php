<?php

use App\InPostApiService;
use App\Package;
use App\Receiver;

/** Autoload */
require_once 'vendor/autoload.php';

/** ENV */
$envPath = __DIR__ . "/config/";
$dotenv = Dotenv\Dotenv::createImmutable($envPath);
$dotenv->load();

/** Create package */
$package = new Package();

/** Create receiver */
$receiver = new Receiver();

/** InPost API */
$inPostApiService = new InPostApiService();
$result = $inPostApiService->sendShipment($package, $receiver);