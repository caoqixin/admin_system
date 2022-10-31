<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'name'];

    public function components()
    {
        return $this->belongsToMany(Component::class,
            'component_categories', 'category_id', 'component_id');
    }
}
