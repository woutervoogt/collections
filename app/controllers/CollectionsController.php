<?php

namespace App\Controllers;

use App\Core\App;

class CollectionsController
{
    public function index()
    {
        $collections = App::get('database')->selectAll('collections');
        return view('collections', $collections);
    }

    public function verzamelingAanmaken()
    {
        if (array_key_exists('verzamelingTemplate', $_GET)) {
            return view('verzameling-aanmaken', $_GET);
        }
        
        return view('verzameling-aanmaken');
    }

    public function showCollection()
    {
        $id = $_GET['id'];
        $collection = App::get('database')->selectOne('collections', 'id', $id);
        $items = App::get('database')->selectAll($collection->collection_category);
        $data = ['collection' => $collection, 'items' => $items];
        return view('collection', $data);
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
