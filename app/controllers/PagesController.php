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

    public function verzamelingToevoegen()
    {
        if (array_key_exists('verzamelingTemplate', $_GET)) {
            return view('verzameling-toevoegen', $_GET);
        }
        
        return view('verzameling-toevoegen');
    }
}
