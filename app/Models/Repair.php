<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use DefaultDatetimeFormat;
    use HasFactory;

    protected $fillable = ['type', 'status', 'deposit', 'price'];
    protected $casts = [
        'problem' => 'array'
    ];



    public function costumers()
    {
        return $this->belongsToMany(Costumer::class,
            'customer_repairs', 'repair_id', 'customer_id');
    }

    public function components()
    {
        return $this->belongsToMany(Component::class,
            'repair_components', 'repair_id', 'component_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,
            'order_repairs', 'repair_id', 'order_id');
    }

    public function details()
    {
        return $this->belongsToMany(RepairDetail::class,
            'detail_repairs', 'repair_id', 'detail_id');
    }

    public function warranty()
    {
        return $this->hasOne(Warranty::class, 'repair_id');
    }

//    public function status(): Attribute
//    {
//        return new Attribute(
//            get: fn($value) => (config('manager.repair.status')[config('manager.repair.type')[$this->type]])[$value],
//        );
//    }

}
