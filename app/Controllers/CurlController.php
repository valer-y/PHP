<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Contracts\EmailValidationInterface;
use App\Services\Emailable\EmailValidationService;

class CurlController
{

    public function __construct(private EmailValidationService $emailValidationService)
    {
    }

    #[Get('/curl')]
    public function index()
    {
       $email = "yazykov.valery@gmail.com";
       $result = $this->emailValidationService->verify($email);

       var_dump($result);
    }
}
