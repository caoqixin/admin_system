<?php

namespace App\Admin\Controllers\Render;

use App\Models\Costumer;
use Illuminate\Contracts\Support\Renderable;

class showUserRepair implements Renderable
{

    public function render($key = null)
    {
        $user = Costumer::find($key);

        $data = [
            'repairs' => $user->repairs,
        ];
        return view('admin.modal.userRepair', ['data' => $data]);
    }
}
