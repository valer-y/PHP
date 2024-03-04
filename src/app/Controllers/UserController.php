<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\View;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class UserController
{
    #[Get('/users/create')]
    public function create() : View
    {
        return View::make('users/register');
    }

    #[Post('/users')]
    public function register()
    {
        $name =$_POST['name'];
        $email = $_POST['email'];
        $firstName = explode( ' ', $name)[0];

        $text = <<<Body
Hello $firstName,
Thank you for signing
Body;
        $html = <<<HTMLBody
<h1 style="color: green">Test</h1>
HTMLBody;

        $email = (new Email())
            ->from('info@example.com')
            ->to($email)
            ->subject('Welcome message')
            ->text($text)
            ->attach('Hello!', 'welcome.txt')
            ->html($html);

        $dsn = $_ENV['MAILER_DSN'];

        $transport = Transport::fromDsn($dsn);

        $mailer = new Mailer($transport);

        $mailer->send($email);
    }
}