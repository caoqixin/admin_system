<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairDetail extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'password', 'imei', 'note'];

    public function repairs()
    {
        return $this->belongsToMany(Repair::class,
            'detail_repairs', 'detail_id', 'repair_id');
    }
}
