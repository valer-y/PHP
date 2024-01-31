<?php

namespace App\Controllers;
use App\Controller;
use App\Models\Journals;

class HomeController extends Controller
{
    public function index()
    {
        $journals = [
            new Journals('First', 2023),
            new Journals('Second', 2023)
        ];

        $this->render('index', ['journals' => $journals]);
    }
}