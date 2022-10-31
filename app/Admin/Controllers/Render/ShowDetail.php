<?php

namespace App\Admin\Controllers\Render;

use App\Models\Repair;
use Illuminate\Contracts\Support\Renderable;

class ShowDetail implements Renderable
{

    public function render($key = null)
    {
        $repair = Repair::find($key);

        $detail = $repair->details;

        $user = $repair->costumers;

        $order= $repair->orders;

        $data = [
            'repair' => $repair->toArray(),
        ];
        return view('admin.modal.showDetail', ['data' => $data]);
    }
}
