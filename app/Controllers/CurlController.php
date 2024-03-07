<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;

class CurlController
{
    #[Get('/curl')]
    public function index()
    {
        $handle = curl_init();

        $apiKey = $_ENV['EMAILABLE_API_KEY'];
        $email = "yazykov.valery@gmail.com";

        $params = [
            'api_key' => $apiKey,
            'email' => $email
        ];

        $url = 'https://api.emailable.com/v1/verify?' . http_build_query($params);

        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($handle);

        if(false !== $content) {
            $data = json_decode($content);

            echo "<pre>";
            print_r($data);
        }


    }
}
