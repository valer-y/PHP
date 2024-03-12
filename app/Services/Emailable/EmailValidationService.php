<?php

namespace App\Services\Emailable;

use App\Contracts\EmailValidationInterface;
use App\DTO\EmailValidationResult;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SebastianBergmann\Type\RuntimeException;

class EmailValidationService implements EmailValidationInterface
{
    private string $baseUrl = 'https://api.emailable.com/v1/';

    public function __construct(private string $apiKey)
    {
//        $_ENV['EMAILABLE_API_KEY']
    }

    public function verify(string $email) : EmailValidationResult {

        $stack = HandlerStack::create();

        $maxRetry = 3;

        $stack->push($this->getRetryMidllevare($maxRetry));

        $client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 5,
            'handler'  => $stack,
        ]);

        $apiKey = $this->apiKey;
        $email = "yazykov.valery@gmail.com";

        $params = [
            'api_key' => $apiKey,
            'email' => $email
        ];

        $responce = $client->get('verify', ['query' => $params]);

        $body = json_decode($responce->getBody()->getContents(), true);

        return new EmailValidationResult($body['score'], $body['state'] === 'deliverable');
    }

    private function getRetryMidllevare(int $maxRetry)
    {
        return Middleware::retry(function (
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?\RuntimeException $e = null
        ) use ($maxRetry) {
            if($retries >= $maxRetry) {
                return false;
            }

            if($response && in_array($response->getStatusCode(), [249, 429, 503])) {
                return true;
            }

            if($e instanceof ConnectException) {
                return true;
            }

            return false;
        }

        );
    }
}