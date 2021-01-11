<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Database\QueryBuilder;

class CollectionsController
{
    public function index()
    {
        // $collections = App::get('database')->selectAll('collections');
        if (isset($_SESSION) && isset($_SESSION['user'])) {
            $data = [];
            $query = "SELECT * FROM collections WHERE user_id=" . "{$_SESSION['user']['id']}";
            $collections = QueryBuilder::query($query)->fetchAll(\PDO::FETCH_CLASS);
            $data = ['collections' => $collections];
            return view('collections', $data);
        } else {
            redirect('login');
        }
    }

    public function createCollection()
    {
        if (array_key_exists('verzamelingTemplate', $_GET)) {
            return view('verzameling-aanmaken', $_GET);
        }
        
        return view('collections-create');
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
            'name' => $_POST['name'],
            'color' => $_POST['color'],
            'collection_category' => $_POST['category'],
            'description' => $_POST['description'],
            'is_public' => $openbaar,
            'user_id' => $_SESSION['user']['id'],
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
         ]);
        
        return redirect('');
    }
}
