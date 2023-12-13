<?php

declare(strict_types=1);

// Always require autoload when using packages
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

try {
    $client = new Client();

    $response = $client->post('https://www.yrgopelag.se/centralbank/startCode', [
        'form_params' => [
            'startCode' => 'uuid',
        ],
    ;
    $responseData = json_decode($response->getBody(), true);

    // Check if the response contains an API key
    if (isset($responseData['api_key'])) {
        $apiKey = $responseData['api_key'];
        echo 'API Key: ' . $apiKey;
    } else {
        // Handle the error
        echo 'Error: ' . $responseData['error'];
    }
} catch (RequestException $e) {
    // Handle Guzzle exceptions
    echo 'Error: ' . $e->getMessage();
}
