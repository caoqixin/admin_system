<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LoadData
{
    public function getQuality(Request $request)
    {
        $query = $request->get('q');
        $quality = config('manager.component.quality');

        return Category::find($query)->name == 'display' ? $quality['display'] : $quality['altri'];
    }
}
