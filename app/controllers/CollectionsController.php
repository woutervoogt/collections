<?php

namespace App\Controllers;

use App\Core\App;

class CollectionsController
{
    public function verzamelingen()
    {
        return view('verzamelingen');
    }

    public function verzamelingAanmaken()
    {
        if (array_key_exists('verzamelingTemplate', $_GET)) {
            return view('verzameling-aanmaken', $_GET);
        }
        
        return view('verzameling-aanmaken');
    }

    public function index()
    {
        $id = $_GET['id'];
        $collection = (array) App::get('database')->selectOne('collections', 'id', $id)[0];

        return view('verzameling', $collection);
    }

    public function store()
    {
        if ($_POST['verzamelingOpenbaar'] === 'true') {
            $openbaar = 1;
        } else {
            $openbaar = 0;
        }
        App::get('database')->insert('collections', [
            'name' => $_POST['verzamelingNaam'],
            'color' => $_POST['verzamelingKleur'],
            'is_public' => $openbaar,
            'column_1' => $_POST['column1'],
         ]);
        
        return redirect('');
    }
}
