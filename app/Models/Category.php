<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Medicine;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'description',
    ];

     // Define the relationship: A category has many medicines
     public function medicines()
     {
         return $this->hasMany(Medicine::class);
     }
}
