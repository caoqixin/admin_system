<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use DefaultDatetimeFormat;
    use HasFactory;



    protected $fillable = [
        'taked_at',
        'expired_at',
        'is_expired'
    ];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }
}
