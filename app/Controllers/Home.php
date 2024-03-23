<?php

namespace App\Controllers;

use App\Models\ServicioModel;


class Home extends BaseController
{
    public function index()
    {
        $servicioModel = new ServicioModel();
        // Suponiendo que tienes un método en tu modelo que obtiene los últimos 3 servicios
        $data['servicios'] = $servicioModel->orderBy('id', 'asc')->findAll();

        // Ahora, pasas $data a la vista
        return view('welcome_message', $data);
    }
}
