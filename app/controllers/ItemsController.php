<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Database\QueryBuilder;

class ItemsController
{
    public function index()
    {
        $id = $_GET['id'];
        $collection = App::get('database')->selectOne('collections', 'id', $id);
        $items = App::get('database')->selectAll($collection->collection_category);
       
        $query = "SELECT * FROM collections WHERE user_id=" . "{$_SESSION['user']['id']}";
        $collections = QueryBuilder::query($query)->fetchAll(\PDO::FETCH_CLASS);

        $data = ['collections' => $collections, 'collection' => $collection, 'items' => $items];
        
        return view('collection', $data);
    }

    public function store()
    {
        // if ($_POST['verzamelingOpenbaar'] === 'true') {
        //     $openbaar = 1;
        // } else {
        //     $openbaar = 0;
        // }
        // App::get('database')->insert('collections', [
        //     'name' => $_POST['verzamelingNaam'],
        //     'color' => $_POST['verzamelingKleur'],
        //     'is_public' => $openbaar,
        //     'column_1' => $_POST['column1'],
        //  ]);
        
        // return redirect('');
    }
}
