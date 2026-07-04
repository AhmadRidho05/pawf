<?php

namespace App\Controllers;

class portfolio extends BaseController
{
    public function index(): string
    {
        return view('v_portfolio');
    }
}
