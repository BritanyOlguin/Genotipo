<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicioModel;

class ServicioController extends BaseController
{
    protected $servicioModel;

    public function __construct()
    {
        $this->servicioModel = new ServicioModel();
    }

    public function index()
    {
        if (!service('authentication')->check()) {
            return redirect()->to('/login');
        }

        $data['user'] = service('authentication')->user();

        $data['servicios'] = $this->servicioModel->findAll();
        return view('servicios/index', $data);
    }

    public function nuevo()
    {
        return view('servicios/nuevo');
    }

    public function guardar()
    {
        $validationRule = [
            'imagen' => [
                'rules' => 'uploaded[imagen]',
                'errors' => [
                    'uploaded' => 'Debe seleccionar una imagen.',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('imagen');
        if ($file->isValid() && !$file->hasMoved()) {

            $extension = $file->getClientExtension();

            $newName = date('dmY') . '_' . $file->getName();
            $file->move(FCPATH . 'storage', $newName);

            $data = [
                'titulo' => $this->request->getVar('titulo'),
                'descripcion' => $this->request->getVar('descripcion'),
            ];
        } else {
            $data = [
                'titulo' => $this->request->getVar('titulo'),
                'descripcion' => $this->request->getVar('descripcion'),
            ];
        }

        $this->servicioModel->save($data);

        return redirect()->to('/servicios');
    }


    public function editar($id)
    {
        $data['servicio'] = $this->servicioModel->find($id);
        return view('servicios/editar', $data);
    }

    public function actualizar()
    {
        $id = $this->request->getVar('id');
        $servicioExistente = $this->servicioModel->find($id);

        $data = [
            'titulo' => $this->request->getVar('titulo'),
            'descripcion' => $this->request->getVar('descripcion'),
        ];

        $file = $this->request->getFile('imagen');
        if ($file !== null && $file->isValid() && !$file->hasMoved()) {

            if (!empty($servicioExistente['imagen'])) {
                $rutaImagenAnterior = FCPATH . 'storage/' . $servicioExistente['imagen'];
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior);
                }
            }

            // Procesa la nueva imagen
            $newName = date('dmY') . '_' . $file->getName();
            $file->move(FCPATH . 'storage', $newName);
            $data['imagen'] = $newName;
        }

        $this->servicioModel->update($id, $data);

        return redirect()->to('/servicios');
    }



    public function eliminar($id)
    {
        $servicio = $this->servicioModel->find($id);

        if ($servicio) {
            $imagenPath = FCPATH . 'storage/' . $servicio['imagen'];

            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }

            $this->servicioModel->delete($id);

            return redirect()->to('/servicios')->with('message', 'Servicio eliminado correctamente');
        } else {
            return redirect()->to('/servicios')->with('error', 'El servicio no se encuentra');
        }
    }
}
