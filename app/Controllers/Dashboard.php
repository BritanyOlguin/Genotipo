<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!service('authentication')->check()) {
            return redirect()->to('/login');
        }

        $data['user'] = service('authentication')->user();

        return view('dashboard/index', $data);
    }
}
