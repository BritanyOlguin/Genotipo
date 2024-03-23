<?php

namespace App\Controllers;

use App\Models\ServicioModel;


class Home extends BaseController
{
    public function index()
    {
        $servicioModel = new ServicioModel();
        $data['servicios'] = $servicioModel->orderBy('id', 'asc')->findAll(3);

        return view('welcome_message', $data);
    }
}
