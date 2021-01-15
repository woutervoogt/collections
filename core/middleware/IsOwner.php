<?php

namespace App\Core\Middleware;

use App\Models\CollectionModel;

class IsOwner
{
    private $isOwner = false;

    public function __construct()
    {
        $collection_id = null;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // dd($_SERVER['REQUEST_METHOD']);
            $collection_id = $_GET['collection_id'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            dd($_SERVER['REQUEST_METHOD']);
            $collection_id = $_POST['collection_id'];
        }

        if (!empty($collection_id)) {
            $collection_uid = CollectionModel::getOneById($collection_id)->user_id;
            $this->isOwner = isset($_SESSION) && isset($_SESSION['user']) && $_SESSION['user']['id'] === $collection_uid;
        }

        $this->redirect();
    }

    private function redirect()
    {
        if (!$this->isOwner) {
            redirect('403');
        }
    }
}
