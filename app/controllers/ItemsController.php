<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Database\QueryBuilder;
use App\Models\MusicModel;

class ItemsController
{
    public function index()
    {
        $id = $_GET['id'];
        $collection = App::get('database')->selectOne('collections', 'id', $id);
        $items = App::get('database')->selectAll($collection->collection_category);
        $data = ['collection' => $collection, 'items' => $items];
       
        if (isset($_SESSION) && isset($_SESSION['user'])) {
            $query = "SELECT * FROM collections WHERE user_id=" . "{$_SESSION['user']['id']}";
            $collections = QueryBuilder::query($query)->fetchAll(\PDO::FETCH_CLASS);
            $data['collections'] = $collections;
        }
        
        return view('collection', $data);
    }

    public function show()
    {
        return view('item');
    }

    public function create()
    {
        $collection_id = $_GET['collection_id'];
        $data['collection_id'] = $collection_id;
        return view('items-create', $data);
    }

    public function store()
    {
        App::get('database')->insert('music', [
            'name' => $_POST['name'],
            'format' => $_POST['format'],
            'artist' => $_POST['artist'],
            'album' => $_POST['album'],
            'song' => $_POST['song'],
            'genre' => $_POST['genre'],
            'id_code' => $_POST['id_code'],
            'year' => (int) $_POST['year'],
            // 'tracklist' => $_POST['tracklist'],
            'amount' => (int) $_POST['amount'],
            'description' => $_POST['description'],
            'notes' => $_POST['notes'],
            'collection_id' => $_POST['collectionId'],
            'created_by' => 1,
            'created' => date('Y-m-d H:i:s')
         ]);
        
        return redirect('verzamelingen');
    }

    public function edit()
    {
        $id = $_GET['item_id'];
        $item = MusicModel::getOneById($id);
        $data = ['item' => $item];
        return view('items-edit', $data);
    }

    public function update()
    {
        MusicModel::update([
            'name' => $_POST['name'],
            'format' => $_POST['format'],
            'description' => $_POST['description'],
            'artist' => $_POST['artist'],
            'album' => $_POST['album'],
            'song' => $_POST['song'],
            'genre' => $_POST['genre'],
            'id_code' => $_POST['id_code'],
            'year' => $_POST['year'],
            'tracklist' => $_POST['tracklist'],
            'amount' => $_POST['amount'],
            'notes' => $_POST['notes']
        ], $_POST['id']);
        
        return redirect('verzamelingen');
    }

    public function destroy()
    {
        $id = $_POST['item_id'];
        MusicModel::destroy($id);
        
        return redirect('verzamelingen');
    }
}
