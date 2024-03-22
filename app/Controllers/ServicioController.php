<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicioModel;

class ServicioController extends BaseController
{
    protected $servicioModel;

    public function __construct()
    {
        // Instanciar el modelo para poder usarlo en los métodos del controlador
        $this->servicioModel = new ServicioModel();
    }

    public function index()
    {
        if (!service('authentication')->check()) {
            return redirect()->to('/login');
        }

        $data['user'] = service('authentication')->user();

        // Recuperar todos los servicios y pasarlos a la vista
        $data['servicios'] = $this->servicioModel->findAll();
        return view('servicios/index', $data);
    }

    public function nuevo()
    {
        // Mostrar un formulario para crear un nuevo servicio
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
            // Mueve el archivo al directorio de almacenamiento. Asegúrate de que 'public/storage' exista.
            $file->move(FCPATH . 'storage', $newName);

            $data = [
                'titulo' => $this->request->getVar('titulo'),
                'descripcion' => $this->request->getVar('descripcion'),
                'imagen' => $newName, // Guarda la ruta relativa en la base de datos
            ];
        } else {
            // Manejo del caso en que la carga del archivo falle o no se proporcione archivo
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
        // Mostrar un formulario de edición para un servicio existente
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

            // Si existe una imagen anterior, elimínala
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
        // Primero, obtén el registro del servicio para saber qué archivo de imagen eliminar
        $servicio = $this->servicioModel->find($id);

        if ($servicio) {
            // Construye la ruta completa al archivo de imagen
            $imagenPath = FCPATH . 'storage/' . $servicio['imagen'];

            // Verifica si el archivo existe y elimínalo
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }

            // Una vez eliminada la imagen, procede a eliminar el registro del servicio
            $this->servicioModel->delete($id);

            // Redirecciona o maneja la respuesta como prefieras
            return redirect()->to('/servicios')->with('message', 'Servicio eliminado correctamente');
        } else {
            // Maneja el caso en que el servicio no se encuentra o ya fue eliminado
            return redirect()->to('/servicios')->with('error', 'El servicio no se encuentra');
        }
    }
}
