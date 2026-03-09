<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message', ['item1' => 'news/create', 'item2' => 'news/overview', 'item3' => 'news/update', 'item4' => 'news/delete']);
         
    }
}
