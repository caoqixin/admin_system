<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    use DefaultDatetimeFormat;

    protected $fillable = ['name', 'phone_number', 'last_repaired_at'];

    public function repairs()
    {
        return $this->belongsToMany(Repair::class,
            'customer_repairs', 'customer_id', 'repair_id');
    }
}
