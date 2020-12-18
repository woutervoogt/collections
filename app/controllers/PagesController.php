<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function verzamelingen()
    {
        return view('verzamelingen');
    }

    public function contact()
    {
        return view('contact');
    }
}
