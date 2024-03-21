<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicioModel extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'descripcion', 'imagen'];
    protected $useTimestamps = true;
}