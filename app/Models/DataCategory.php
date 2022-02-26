<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCategory extends Model
{
    use HasFactory;

    protected $table = 'data_category';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
