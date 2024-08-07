<?php

namespace App\Controllers;

require_once __DIR__ . '/../models/DataModel.php'; // Adjusted to use relative path

use App\Models\DataModel;

class CRUDController
{
    public static function readAll()
    {
        $model = new DataModel();
        return $model->getAll();
    }

    public static function create($data)
    {
        $model = new DataModel();
        return $model->create($data);
    }

    public static function update($id, $data)
    {
        $model = new DataModel();
        return $model->update($id, $data);
    }

    public static function delete($id)
    {
        $model = new DataModel();
        return $model->delete($id);
    }
}
